<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistIconComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.wishlist-icon-component');
    }
}
