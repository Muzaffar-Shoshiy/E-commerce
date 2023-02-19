<div>
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Compare</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-2">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Compare</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        @if (Cart::instance('compare')->content()->count() > 0)
            <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="compare-table">
                    <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-products">
                        <div class="compare-col compare-field">Product</div>
                        @foreach (Cart::instance('compare')->content() as $content)
                            <div class="compare-col compare-product">
                                <a wire:click.prevent="removeItemFromCompare({{ $content->model->id }})" href="#" class="btn remove-product"><i class="w-icon-times-solid"></i></a>
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('storage'.'/'.$content->model->image) }}" alt="Product" width="228"
                                                height="257" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a wire:click.prevent="store({{$content->id}},'{{$content->name}}',{{$content->price}})" href="#" class="btn-product-icon btn-cart w-icon-cart"></a>
                                            <a wire:click.prevent="addToWishlist({{$content->id}}, '{{$content->name}}', {{$content->price}})" href="#" class="btn-product-icon btn-wishlist w-icon-heart"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name"><a href="{{ route('product', ['slug' => $content->model->slug]) }}">{{ $content->model->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End of Compare Products -->
                    <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-price">
                        <div class="compare-col compare-field">Price</div>
                        @foreach (Cart::instance('compare')->content() as $content)
                        <div class="compare-col compare-value">
                            <div class="product-price">
                                <span class="new-price">${{ $content->model->price }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End of Compare Price -->
                    <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-description">
                        <div class="compare-col compare-field">Description</div>
                        @foreach (Cart::instance('compare')->content() as $content)
                        <div class="compare-col compare-value">
                            <ul class="list-style-none list-type-check">
                                <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <!-- End of Compare Description -->
                    <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-reviews">
                        <div class="compare-col compare-field">Ratings &amp; Reviews</div>
                        @foreach (Cart::instance('compare')->content() as $content)
                        <div class="compare-col compare-rating">
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">(3 Reviews)</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End of Compare Reviews -->
                    <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-category">
                        <div class="compare-col compare-field">Category</div>
                        @foreach (Cart::instance('compare')->content() as $content)
                        <div class="compare-col compare-value">{{ ucfirst($content->model->category->name) }}</div>
                        @endforeach
                    </div>
                    <!-- End of Compare Category -->
                    <div class="compare-row cols-xl-5 cols-lg-4 cols-md-3 cols-2 compare-meta">
                        <div class="compare-col compare-field">SKU</div>
                        @foreach (Cart::instance('compare')->content() as $content)
                            <div class="compare-col compare-value">MS46891344</div>
                        @endforeach
                    </div>
                    <!-- End of Compare Meta -->
                </div>
            </div>
            <!-- End of Compare Table -->
        </div>
        <!-- End of Page Content -->
        @else
            <h1 class="text-center">Nothing to Compare</h1>
            <div class="text-center mb-5"><a class="btn btn-cart" href="{{ route('home') }}">Start shopping</a></div>
        @endif
    </main>
    <!-- End of Main -->
</div>
