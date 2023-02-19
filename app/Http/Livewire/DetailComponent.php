<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Livewire\Component;

class DetailComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
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
    public function addToCompare($product_id, $product_name, $product_price)
    {
        Cart::instance('compare')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        if($product){
            $r_products = Product::where('category_id', $product->category_id)->limit(10)->get();
            return view('livewire.detail-component', compact('product','r_products'))->extends('layouts.app1');
        }else{
            return view('livewire.404')->extends('layouts.app1');
        }
    }
}
