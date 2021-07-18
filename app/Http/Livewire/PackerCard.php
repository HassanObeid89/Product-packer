<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers;

class PackerCard extends Component
{
    public $itemName;
    public $width;
    public $height;
    public $depth;
    public $boxSize;
    public $articleNumber;

    public function render()
    {
        return view('livewire.packer-card');
    }
}
