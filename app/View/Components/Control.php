<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Control extends Component
{
    public $folder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($folder)
    {
        $this->folder = $folder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.control');
    }
}
