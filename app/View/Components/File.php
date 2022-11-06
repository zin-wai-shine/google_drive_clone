<?php

namespace App\View\Components;

use Illuminate\View\Component;

class File extends Component
{
    public $drive, $size;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($drive='', $size='')
    {
        $this->drive = $drive;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file');
    }
}
