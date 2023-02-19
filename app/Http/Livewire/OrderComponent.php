<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderComponent extends Component
{
    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->latest()->first();
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.order-component', compact('orders', 'order'))->extends('layouts.app');
    }
}
