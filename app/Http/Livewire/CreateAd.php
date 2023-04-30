<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;

class CreateAd extends Component
{
    public string $title;
    public string $body;
    public $price;
    public $category;

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
    ];

    public function store()
    {
        $category = Category::find($this->category);
        $category->ads()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Anuncio creado con exito');
        $this->cleanForm();
        //return redirect()->route('ads.index');
    }

    public function cleanForm()
    {
        $this->title = "";
        $this->body = "";
        $this->category = "";
        $this->price = "";
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-ad');
    }
}