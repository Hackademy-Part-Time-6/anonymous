<?php

namespace App\Http\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
        $ad = $category->ads()->create([
            'title' => strtoupper($this->title),
            'body' => strtoupper($this->body),
            'price' => $this->price,
        ]);
        
        //Auth::user()->Ad::ads()->save($ad);

        Auth::user()->ads()->save($ad);

        session()->flash('message', 'Anuncio creado con èxito');
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