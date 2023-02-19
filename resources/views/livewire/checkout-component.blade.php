<div>
    <!-- Start of Main -->
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                    <li class="active"><a href="{{ route('checkout') }}">Checkout</a></li>
                    <li><a href="{{ route('order') }}">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        @if (Cart::instance('cart')->content()->count() > 0)
        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <form class="form checkout-form" wire:submit.prevent="submitData">
                    @csrf
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Billing Details
                            </h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input type="text" class="form-control form-control-md @error('firstname') is-invalid @enderror" name="firstname" wire:model="firstname">
                                        @error('firstname')
                                            <span style="color: red!important" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name *</label>
                                        <input type="text" class="form-control form-control-md @error('lastname') is-invalid @enderror" name="lastname" wire:model="lastname">
                                        @error('lastname')
                                            <span style="color: red!important" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street address *</label>
                                <input type="text" placeholder="House number and street name" class="form-control form-control-md mb-2 @error('street_address_1') is-invalid @enderror" name="street_address_1" wire:model="street_address_1">
                                @error('street_address_1')
                                    <span style="color: red!important" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)" class="form-control form-control-md @error('street_address_2') is-invalid @enderror" name="street_address_2" wire:model="street_address_2">
                                @error('street_address_2')
                                    <span style="color: red!important" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>District *</label>
                                <select name="country" class="form-control form-control-md @error('country') is-invalid @enderror" wire:model="country">
                                    <option value="default" selected="selected">Yunusobod</option>
                                    <option value="uk">Chilonzor</option>
                                    <option value="us">Yakkasaroy</option>
                                    <option value="fr">Olmazor</option>
                                    <option value="aus">Uchtepa</option>
                                </select>
                                @error('country')
                                    <span style="color: red!important" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="text" class="form-control form-control-md @error('phone') is-invalid @enderror" name="phone" wire:model="phone">
                                @error('phone')
                                    <span style="color: red!important" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                <input type="email" class="form-control form-control-md @error('email') is-invalid @enderror" name="email" wire:model="email">
                                @error('email')
                                    <span style="color: red!important" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30"
                                    rows="4"
                                    placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <b>Product</b>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::instance('cart')->content() as $cart_item)
                                            <tr class="bb-no">
                                                <td class="product-name">{{ $cart_item->name }}<i
                                                        class="fas fa-times"></i> <span
                                                        class="product-quantity">{{ $cart_item->qty }}</span></td>
                                                <td class="product-total">${{ $cart_item->subtotal }}</td>
                                            </tr>
                                            @endforeach

                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>Subtotal</b>
                                                </td>
                                                <td>
                                                    <b>${{ Cart::instance('cart')->subtotal() }}</b>
                                                </td>
                                            </tr>
                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>Total</b>
                                                </td>
                                                <td>
                                                    <b>${{ Cart::instance('cart')->total() }}</b>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="shipping-methods">
                                                <td colspan="2" class="text-left">
                                                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Payment Methods
                                                    </h4>

                                                    <ul id="shipping-method" class="mb-4">
                                                        {{-- <li>
                                                            <div class="custom-radio">
                                                                <input value="humo" type="radio" id="free-shipping" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" wire:model="payment_type">
                                                                <label for="free-shipping" class="custom-control-label color-dark">Humo</label>
                                                                @error('payment_type')
                                                                    <span style="color: red!important" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input value="uzcard" type="radio" id="uzCard" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" wire:model="payment_type">
                                                                <label for="uzCard" class="custom-control-label color-dark">UzCard</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input value="click" type="radio" id="local-pickup" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" wire:model="payment_type">
                                                                <label for="local-pickup" class="custom-control-label color-dark">Click</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input value="payme" type="radio" id="flat-rate" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" wire:model="payment_type">
                                                                <label for="flat-rate" class="custom-control-label color-dark">PayMe</label>
                                                            </div>
                                                        </li> --}}
                                                        <li>
                                                            <div class="custom-radio">
                                                                <input value="cashondelivery" type="radio" id="cash-on-delivery" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type">
                                                                <label for="cash-on-delivery" class="custom-control-label color-dark">Cash In Delivery</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->

        @else
        <h1 class="text-center">Nothing to Checkout</h1>
        <div class="text-center mb-5"><a class="btn btn-cart" href="{{ route('home') }}">Start shopping</a></div>
        @endif
    </main>
    <!-- End of Main -->
</div>
