<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CompareIconComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.compare-icon-component');
    }
}
