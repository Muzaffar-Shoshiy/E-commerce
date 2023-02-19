<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $listeners = ['refreshComponent' => '$refresh'];
    public $page_size = 12;
    public $orderBy = 'Default Sorting';
    public $min_value = 0;
    public $max_value = 1000;
    public $category_id;
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emit('refreshComponent');
    }
    public function changePageSize($size)
    {
        $this->page_size = $size;
    }
    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
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
        if($this->orderBy === 'Price: Low to High')
        {
            $categories = Category::orderBy('name', 'ASC')->get();
            if($this->category_id != ""){
                $products = Product::where('category_id', $this->category_id)->whereBetween('price', [$this->min_value,$this->max_value])->orderBy('price', 'ASC')->paginate($this->page_size);
            }else{
                $products = Product::whereBetween('price', [$this->min_value,$this->max_value])->orderBy('price', 'ASC')->paginate($this->page_size);
            }
        }else if($this->orderBy === 'Price: High to Low')
        {
            $categories = Category::orderBy('name', 'ASC')->get();
            if($this->category_id != ""){
                $products = Product::where('category_id', $this->category_id)->whereBetween('price', [$this->min_value,$this->max_value])->orderBy('price', 'DESC')->paginate($this->page_size);
            }else{
                $products = Product::whereBetween('price', [$this->min_value,$this->max_value])->orderBy('price', 'DESC')->paginate($this->page_size);
            }
        }else if($this->orderBy === 'Sort By Latest')
        {
            $categories = Category::orderBy('name', 'ASC')->get();
            if($this->category_id != ""){
                $products = Product::where('category_id', $this->category_id)->whereBetween('price', [$this->min_value,$this->max_value])->orderBy('created_at', 'DESC')->paginate($this->page_size);
            }else{
                $products = Product::whereBetween('price', [$this->min_value,$this->max_value])->orderBy('created_at', 'DESC')->paginate($this->page_size);
            }
        }else
        {
            $categories = Category::orderBy('name', 'ASC')->get();
            if($this->category_id != ""){
                $products = Product::where('category_id', $this->category_id)->whereBetween('price', [$this->min_value,$this->max_value])->paginate($this->page_size);
            }else{
                $products = Product::whereBetween('price', [$this->min_value,$this->max_value])->paginate($this->page_size);
            }
        }
        return view('livewire.shop-component', compact('products','categories'))->extends('layouts.app1');
    }
}
