<div>
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ route('home') }}l">Home</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li>Fullwidth</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10">
            <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6"
                style="background-image: url(assets/images/shop/banner2.jpg); background-color: #FFC74E;">
                <div class="container banner-content">
                    <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart Watches</h3>
                    <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                        Now<i class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
            <!-- End of Shop Banner -->
            <div class="container-fluid">
                <!-- Start of Shop Content -->
                <div class="shop-content">
                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left"><i class="w-icon-category"></i><span>Categories</span></a>
                            </div>
                        </nav>
                        <div class="product-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                            @foreach ($products as $category)
                            @foreach ($category->products as $product)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                            <img src="{{ asset('storage'.'/'.$product->image) }}" alt="Product" width="300" height="338" />
                                            <img src="{{ asset('storage'.'/'.$product->image) }}" alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})" href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                            <a wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->price}})" href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                            <a wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}', {{$product->price}})" href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            <a href="{{ route('category', ['slug' => $category->slug]) }}">{{ ucfirst($category->name) }}</a>
                                        </div>
                                        <h3 class="product-name">
                                            <a href="{{ route('product', ['slug' => $product->slug]) }}">{{ ucfirst($product->name) }}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">${{ $product->price }}</ins><del
                                                    class="old-price">${{ $product->price }}</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    <!-- End of Shop Main Content -->

                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <div class="filter-actions">
                                <label>Filter :</label>
                                <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                            </div>
                            <!-- Start of Collapsible widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>All Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ ucfirst($category->name) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
</div>
