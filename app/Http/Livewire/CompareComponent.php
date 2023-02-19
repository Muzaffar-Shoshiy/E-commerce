<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CompareComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emit('refreshComponent');
    }
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emit('refreshComponent');
    }
    public function removeItemFromCompare($product_id)
    {
        foreach(Cart::instance('compare')->content() as $citem){
            if($citem->id == $product_id)
            {
                Cart::instance('compare')->remove($citem->rowId);
                $this->emit('refreshComponent');
                return;
            }
        }
    }
    public function render()
    {
        return view('livewire.compare-component')->extends('layouts.app');
    }
}
