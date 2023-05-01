<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{


    public string $message  = "";
    public string $color  = "";

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message,$color)
    {
        //

        $this->message = $message;
        $this->color = $color;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}

