<div>
    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2 text-white">
        <div class="cart-overlay"></div>
        <a href="#" class="cart-toggle label-down link">
            <i style="color: black!important" class="w-icon-cart">
                @if (Cart::instance('cart')->content()->count() > 0)
                    <span class="cart-count text-white">{{ Cart::instance('cart')->content()->count() }}</span>
                @endif
            </i>
            <span style="color: black!important" class="cart-label">Cart</span>
        </a>
        <div class="dropdown-box">
            <div class="cart-header">
                <span>Shopping Cart</span>
                <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
            </div>
            @if (Cart::instance('cart')->content()->count() != 0)
            <div class="products">
                @foreach (Cart::content() as $product)
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="{{ route('product', ['slug' => $product->model->slug]) }}" class="product-name">{{ $product->name }}</a>
                                <div class="price-box">
                                    <span class="product-quantity">{{ $product->qty }}</span>
                                    <span class="product-price">${{ $product->price }}</span>
                                </div>
                            </div>
                        <figure class="product-media">
                            <a href="{{ route('product',['slug' => $product->model->slug]) }}">
                                <img src="{{ asset('storage'.'/'.$product->model->image) }}" alt="product" height="84" width="94">
                            </a>
                        </figure>
                        <button wire:click.prevent="destroy('{{ $product->rowId }}')" class="btn btn-link btn-close" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="cart-total" style="margin-top: 300px">
                <label>Subtotal:</label>
                <span class="price">${{ Cart::subtotal() }}</span>
            </div>

            <div class="cart-action">
                <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
            </div>
            @else
            <h6 class="text-center">Nothing in Cart</h6>
            @endif
        </div>
        <!-- End of Dropdown Box -->
    </div>
</div>
