<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tcontroller extends Component
{
    public $fileId, $folder, $folderId, $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fileId='', $folder='', $folderId='', $link='')
    {
        $this->fileId = $fileId;
        $this->folder = $folder;
        $this->folderId = $folderId;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tcontroller');
    }
}
