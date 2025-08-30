<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Grafico extends Component
{
    public $id;
    public $titulo;
    public $width;
    public $height;

    public function __construct($id, $titulo, $width = "400px", $height = "350px")
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grafico');
    }
}
