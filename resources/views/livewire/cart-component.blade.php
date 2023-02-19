<div>
    <!-- Start of Main -->
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                    {{-- @if (Cart::instance('cart')->content()->count() > 0) --}}
                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                    {{-- @endif --}}
                    <li><a href="{{ route('checkout') }}">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    @if (Cart::instance('cart')->content()->count() > 0)
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-price"><span>Product</span></th>
                                    <th class="product-price">Nomination</th>
                                    <th class="product-price"><span>Price</span></th>
                                    <th class="product-quantity"><span>Quantity</span></th>
                                    <th class="product-subtotal"><span>Subtotal</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('cart')->content() as $products)
                                <tr>
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="{{ route('product', ['slug' => $products->model->slug]) }}">
                                                <figure>
                                                    <img src="{{ asset('storage'.'/'.$products->model->image) }}" alt="product" width="200" height="228">
                                                </figure>
                                            </a>
                                            <button wire:click.prevent="destroy('{{ $products->rowId }}')" type="button" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">
                                            {{ $products->name }}
                                        </a>
                                    </td>
                                    <td class="product-price"><span class="amount">${{ $products->price }}</span></td>
                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <input class="form-control" style="width: 70px!important" type="number" value="{{ $products->qty }}">
                                            <button wire:click.prevent="increaseQuantity('{{ $products->rowId }}')" type="button" class="quantity-plus w-icon-plus"></button>
                                            <button wire:click.prevent="decreaseQuantity('{{ $products->rowId }}')" type="button" class="quantity-minus w-icon-minus"></button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">${{ $products->subtotal }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="cart-action mb-6">
                            <a href="{{ route('home') }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                            <button wire:click.prevent="clearAll()" type="button" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>
                        </div>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <h4>Subtotal</h4>
                                    <span>${{ Cart::subtotal() }}</span>
                                </div>

                                <hr class="divider">

                                <hr class="divider mb-6">
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <h3>Total</h3>
                                    <span class="ls-50">${{ Cart::total() }}</span>
                                </div>
                                <a href="{{ route('checkout') }}" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @else
                    <h1 class="text-center">Nothing in Cart</h1>
                    <div class="text-center mb-5"><a class="btn btn-cart" href="{{ route('shop') }}">Start shopping</a></div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
</div>
