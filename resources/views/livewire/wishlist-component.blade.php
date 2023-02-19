<div>
    <!-- Start of Main -->
    <main class="main wishlist-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Wishlist</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                @if (Cart::instance('wishlist')->content()->count() > 0)
                <h3 class="wishlist-title">My wishlist</h3>
                <table class="shop-table wishlist-table">
                    <thead>
                        <tr>
                            <th class="product-price"><span>Product</span></th>
                            <th class="product-price"><span>Nomination</span></th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="wishlist-action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('wishlist')->content() as $content)
                        <tr>
                            <td class="product-thumbnail">
                                <div class="p-relative">
                                    <a href="{{ route('product', ['slug' => $content->model->slug]) }}">
                                        <figure>
                                            <img src="{{ asset('storage'.'/'.$content->model->image) }}" alt="product" width="200" height="228">
                                        </figure>
                                    </a>
                                    <button wire:click.prevent="removeFromWishlist({{ $content->model->id }})" type="button" class="btn btn-close"><i class="fas fa-times"></i></button>
                                </div>
                            </td>
                            <td class="product-name">
                                <a href="{{ route('product', ['slug' => $content->model->slug]) }}">
                                    {{ $content->name }}
                                </a>
                            </td>
                            <td class="product-price">
                                <ins class="new-price">${{ $content->price }}</ins>
                            </td>
                            <td class="wishlist-action">
                                <div class="d-lg-flex">
                                    <a wire:click.prevent="store({{$content->id}},'{{$content->name}}',{{$content->price}})" href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Add to cart</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h1 class="text-center">Nothing in Wishlist</h1>
                <div class="text-center mb-5"><a class="btn btn-cart" href="{{ route('home') }}">Start shopping</a></div>
                @endif
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
</div>
