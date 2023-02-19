<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class HomeComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];
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
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emit('refreshComponent');
                return;
            }
        }
    }
    public function addToCompare($product_id, $product_name, $product_price)
    {
        Cart::instance('compare')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
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
        // Cart::instance('cart')->destroy();
        $products = Product::all();
        $catpro = Category::all();
        return view('livewire.home-component', compact('products','catpro'))->extends('layouts.app1');
    }
}
