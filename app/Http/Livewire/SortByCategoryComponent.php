<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
// use Jantinnerezo\LivewireAlert\LivewireAlert;

class SortByCategoryComponent extends Component
{
    use WithPagination;
    // use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
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
        $categories = Category::all();
        $products = Category::where('slug', $this->slug)->with('products')->get();
        if($products->count() > 0){
            return view('livewire.sort-by-category-component', compact('products', 'categories'))->extends('layouts.app1');
        }else{
            return view('livewire.404')->extends('layouts.app1');
        }
    }
}
