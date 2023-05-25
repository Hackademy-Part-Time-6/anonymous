<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableData extends Component
{
    public $number;
    public $category;
    public $title;
    public $user;
    public $estatus;
    public $editIcon;
    public $configIcon;

    public function __construct($number,$category ,$title, $user, $estatus, $editIcon, $configIcon)
    {
        $this->number = $number;
        $this->category = $category;
        $this->title = $title;
        $this->user = $user;
        $this->estatus = $estatus;
        $this->editIcon = $editIcon;
        $this->configIcon = $configIcon;
    }

    public function render()
    {
        return view('components.table-data');
    }
}
