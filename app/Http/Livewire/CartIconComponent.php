<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartIconComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];
    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
