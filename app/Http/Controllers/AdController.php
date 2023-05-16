<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Ad;
use App\Models\Image as ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdController extends Controller
{
    public $images = [];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('ad.create'); 
    }

    public function show(Ad $ad) {
        return view('ad.show',compact('ad'));
    }

    public function edit($id){
        $ad = Ad::where('is_accepted', null)
            ->where('id', $id)
            ->firstOrFail();

        return view("revisor.edit", compact('ad'));
    }

    public function update(Request $request, $id)
        {
            $ad = Ad::findOrFail($id);

            // Actualizar campos existentes
            $ad->title = strtoupper($request->input('title'));
            $ad->price = strtoupper($request->input('price'));
            $ad->body = strtoupper($request->input('body'));
        
            // Guardar cambios en el modelo
            $ad->save();

            if ($request->has('delete_images')) {
                $deleteImages = $request->input('delete_images');

                foreach ($deleteImages as $imageId) {
                    $image = ImageModel::findOrFail($imageId);
                    $image->delete(); // Eliminar de la base de datos

                    // Eliminar del sistema de archivos
                    if ($image->path && Storage::exists($image->path)) {
                        Storage::delete($image->path);
                    }
                }
            }
           
            if ($request->hasFile('images')) {
                $this->images = $request->file('images');
                
                // Eliminar las imágenes antiguas
                foreach ($ad->images as $image) {
                    // Eliminar del sistema de archivos
                    if ($image->path && Storage::exists($image->path)) {
                        Storage::delete($image->path);
            
                        // Eliminar de la base de datos
                        $image->delete();
                    }
                }
             // Actualizar la imagen en la base de datos, y en el directorio de archivos 
                if (count($this->images)) {
                    $newFileName = "ads/$ad->id";
                    foreach ($this->images as $image) {
                        $newImage = $ad->images()->create([
                            'path' => $image->store($newFileName, 'public')
                        ]);
                        dispatch(new ResizeImage($newImage->path, 400, 300));
                    }
                    File::deleteDirectory(storage_path('/app/livewire-tmp'));
                    session()->flash('message', ['type' => 'success', 'text' => 'Anuncio actualizado con éxito']);
                }else {
                    session()->flash('message', ['type' => 'danger', 'text' => 'El Anuncio no se actualizo con éxito']);
                }
                    
            }
            return redirect()->route('revisor.edit',$ad->id);
        }
}