<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Models\Ad;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ResizeImage;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditAd extends Component
{
    use WithFileUploads;

    public $ad;

    public $title;
    public $category;
    public $price;
    public $body;
    public $temporary_images = [];

    public $images = [];
    public $image;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric',
    ];

    protected $messages = [
        'required' => 'El campo es requerido por favor rellenelo',
        'min' => 'El campo necesita un minimo requerido',
        'numeric' => 'El campo es numerico ingrese numeros',

        'temporary_images.required' => 'La imagen es obligatoria',
        'temporary_images.*.image' => 'Los archivos tienen que ser imagenes',
        'temporary_images.*.max' => 'La imagen supera los :max mb',
        'images.image' => 'El archivo tiene que ser una imagen',
        'images.max' => 'La imagen supera los :max mb',
    ];


    public function mount(Ad $ad)
    {
        $this->ad = $ad;
        $this->title = $ad->title;
        $this->category = $ad->category_id;
        $this->price = $ad->price;
        $this->body = $ad->body;
    }

    public function render()
    {
        return view('livewire.edit-ad', [
            'categories' => Category::all(),
        ]);
    }

    public function update(Ad $ad)
    {
        $this->title = strtoupper($this->title);
        $this->body = strtoupper($this->body);

        // Validar los datos
        $validatedData = $this->validate($this->rules, $this->messages);

        // Actualizar los campos del anuncio con los datos validados
        $this->ad->update($validatedData);

        // dd(count($this->images));
    
        if (count($this->images)) {
            $newFileName = "ads/$ad->id";
            foreach ($this->images as $image) {
                // Verificar si el objeto es una instancia de UploadedFile
                if ($image instanceof UploadedFile) {
                    $newImage = $ad->images()->create([
                        'path' => $image->store($newFileName, 'public')
                    ]);
    
                    dispatch(new GoogleVisionRemoveFaces($newImage->id));
                    dispatch(new ResizeImage($newImage->path, 400, 300));
                    dispatch(new GoogleVisionSafeSearchImage($newImage->id));
                    dispatch(new GoogleVisionLabelImage($newImage->id));
                }
            }
    
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

    
        session()->flash('message', ['type' => 'success', 'text' => 'Ad updated successfully']);
        return redirect()->route('user.ads');
    }


    public function removeImage($key)
{
    if (isset($this->images[$key])) {
        $image = $this->images[$key];

        // Eliminar la imagen del directorio
        Storage::disk('public')->delete($image->path);

        // Eliminar la imagen de la base de datos
        $image->delete();

        // Eliminar la imagen del arreglo de imágenes
        unset($this->images[$key]);

        // Limpiar el arreglo de imágenes temporales
        $this->temporary_images = [];

        session()->flash('message', ['type' => 'success', 'text' => 'Image deleted successfully']);
    }
}

    public function updatedTemporaryImages()
    {
        if (
            $this->validate([
                'temporary_images.*' => 'image|max:2048'
            ])
        ) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }


}
