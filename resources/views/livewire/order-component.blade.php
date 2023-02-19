@extends('layouts.app1')
@section('content')
    <!-- Start of Main -->
    <main class="main order">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                    <li class="passed"><a href="{{ route('checkout') }}">Checkout</a></li>
                    <li class="active"><a href="{{ route('order') }}">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        @if ($orders->count() > 0)
        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <h2 class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Thank you. Your order has been received.
                </h2>
                <!-- End of Order Success -->

                <ul class="order-view list-style-none">
                    <li>
                        <label>Order number</label>
                        <strong>{{ $orders[0]['id'] }}</strong>
                    </li>
                    <li>
                        <label>Status</label>
                        <strong>{{ $orders[0]['status'] }}</strong>
                    </li>
                    <li>
                        <label>Date</label>
                        <strong>{{ $orders[0]['order_date'] }}</strong>
                    </li>
                    <li>
                        <label>Total</label>
                        <strong>${{ $orders[0]['order_total'] }}</strong>
                    </li>
                    <li>
                        <label>Payment method</label>
                        <strong>Pay On Deliver</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <div class="order-details-wrapper mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">Latest Order Details</h4>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th class="text-dark">Product</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($order->orderline as $orderline)
                                    <td>
                                        <a href="{{ route('product', ['slug' => $orderline->product->slug]) }}">{{ $orderline->product->name }}</a>&nbsp;<strong>x 1</strong>
                                    </td>
                                    <td>${{ $orderline->product->price }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Payment method:</th>
                                <td>Pay on Delivery</td>
                            </tr>
                            <tr class="total">
                                <th class="border-no">Total:</th>
                                <td class="border-no">${{ $order->order_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->

                <div class="sub-orders mb-10">
                    <h4 class="title mb-5 font-weight-bold ls-25">Sub Orders</h4>
                    <div class="alert alert-icon alert-inline mb-5">
                        <i class="w-icon-exclamation-triangle"></i>
                        <strong>Note: </strong>This order has products from multiple vendors. So we divided this order into multiple vendor orders.
                        Each order will be handled by their respective vendor independently.
                    </div>
                    <table class="order-subtable">
                        <thead>
                            <tr>
                                <th class="order">Order</th>
                                <th class="date">Date</th>
                                <th class="status">Status</th>
                                <th class="total">Total</th>
                                <th class="action"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)

                                <tr>
                                    <td class="order">{{ $order->id }}</td>
                                    <td class="date">{{ $order->order_date }}1</td>
                                    <td class="status">{{ $order->status }}</td>
                                    <td class="total">${{ $order->order_total }} for {{ $order->orderline->count() }} items</td>
                                    <td class="action"><a href="" class="btn btn-rounded">View</a></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End of Sub Orders-->

                <div id="account-addresses">
                    <div class="row">
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address billing-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Billing & Shipping Address</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>{{ $order->addressess->firstname }} {{ $order->addressess->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $order->addressess->country }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $order->addressess->street_address_1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $order->addressess->street_address_2 }}</td>
                                            </tr>
                                            <tr class="email">
                                                <td>{{ $order->addressess->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $order->addressess->phone }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Account Address -->

                <a href="{{ route('shop') }}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
            </div>
        </div>
        <!-- End of PageContent -->
        @else
        <h2>You have not ordered anything!</h2>
        <a href="{{ route('shop') }}" class="btn btn-dark btn-rounded btn-icon-right">Go Back Home<i class="w-icon-long-arrow-right"></i></a>
        @endif
    </main>
    <!-- End of Main -->
@endsection
