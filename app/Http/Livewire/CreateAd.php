<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;

class CreateAd extends Component
{
    public  string $title;
    public  string $body;
    public   $price;

    protected $rules = [
        'title' =>'required|min:4',
        'body' =>'required|min:8',
        'price' =>'required|numeric',
    ];

    protected $messages = [
        'required'=> 'El campo es requerido por favor rellenelo',
        'min'=> 'El campo necesita un minimo requerido',
        'numeric'=> 'El campo es numerico ingrese numeros',
    ];

    public function store() {

        Ad::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        session()->flash('message','Anuncio creado con exito');

        $this->cleanForm();
        //return redirect()->route('ads.index');
    }

    public function cleanForm() {
        $this->title = "";
        $this->body = "";
        $this->price = "";
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-ad');
    }
}
