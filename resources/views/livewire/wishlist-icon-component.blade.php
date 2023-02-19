<div>
    <div class="dropdown cart-dropdown mr-0 mr-lg-2 text-white">
        <div class="cart-overlay"></div>
        <a href="{{ route('wishlist') }}" class="cart-toggle label-down link d-xs-show ls-normal"> {{-- remove "cart-toggle" from this class list --}}
            <i style="color: black!important" class="w-icon-heart">
                @if (Cart::instance('wishlist')->content()->count() > 0)
                <span class="cart-count text-white">{{ Cart::instance('wishlist')->content()->count() }}</span>
                @endif
            </i>
            <span style="color: black!important" class="wishlist-label">Wishlist</span>
        </a>
    </div>
</div>
