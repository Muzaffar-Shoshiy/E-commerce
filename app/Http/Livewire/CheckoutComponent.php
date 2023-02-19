<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\Orderline;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $street_address_1;
    public $street_address_2;
    public $country;
    public $phone;
    public $email;
    // public $payment_type;
    public function submitData()
    {
        $address = new Address();
        $address->user_id = Auth::user()->id;
        $address->firstname = $this->firstname;
        $address->lastname = $this->lastname;
        $address->street_address_1 = $this->street_address_1;
        $address->street_address_2 = $this->street_address_2;
        $address->street_address_2 = $this->street_address_2;
        $address->country = $this->country;
        $address->phone = $this->phone;
        $address->email = $this->email;
        $address->save();
        $address_id = Address::query()
        ->orderBy('id', 'desc')
        ->first();
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_date = date('Y-m-d');
        $order->address = $address_id['id'];
        $order->order_total = Cart::instance('cart')->total();
        // $order->payment_type = $this->payment_type;
        $order->status = 'non-payed';
        $order->save();
        $order_id = Order::query()
        ->orderBy('id', 'desc')
        ->first();
        foreach(Cart::instance('cart')->content() as $product){
            $orderline = new Orderline();
            $orderline->product_id = $product->model->id;
            $orderline->order_id = $order_id['id'];
            $orderline->qty = $product->qty;
            $orderline->price = $product->price;
            $orderline->save();
        }
        Cart::instance('cart')->destroy();
        return redirect()->route('order');
    }
    public function render()
    {
        return view('livewire.checkout-component')->extends('layouts.app');
    }
}
