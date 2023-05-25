<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FloatingButton extends Component
{
    /**
     * The icon name.
     *
     * @var string
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string  $icon
     * @return void
     */
    public function __construct($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.floating-button');
    }
}
