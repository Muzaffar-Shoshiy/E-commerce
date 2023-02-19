
<div>
    <div class="dropdown cart-dropdown mr-5 mr-lg-5 text-white">
        <div class="cart-overlay"></div>
        <a href="{{ route('compare') }}" class="cart-toggle label-down link d-xs-show ls-normal">
            <i style="color: black!important" class="w-icon-compare">
                @if (Cart::instance('compare')->content()->count() > 0)
                    <span class="cart-count text-white">{{ Cart::instance('compare')->content()->count() }}</span>
                @endif
            </i>
            <span style="color: black!important" class="wishlist-label">Compare</span>
        </a>
    </div>
</div>
