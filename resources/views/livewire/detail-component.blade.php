<div>
    <!-- Start of Main -->
    <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li>Products</li>
            </ul>
            <ul class="product-nav list-style-none">
                <li class="product-nav-prev">
                    <a href="#">
                        <i class="w-icon-angle-left"></i>
                    </a>
                    <span class="product-nav-popup">
                        <img src="assets/images/products/product-nav-prev.jpg" alt="Product" width="110"
                            height="110" />
                        <span class="product-name">Soft Sound Maker</span>
                    </span>
                </li>
                <li class="product-nav-next">
                    <a href="#">
                        <i class="w-icon-angle-right"></i>
                    </a>
                    <span class="product-nav-popup">
                        <img src="assets/images/products/product-nav-next.jpg" alt="Product" width="110"
                            height="110" />
                        <span class="product-name">Fabulous Sound Speaker</span>
                    </span>
                </li>
            </ul>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                        'navigation': {
                                            'nextEl': '.swiper-button-next',
                                            'prevEl': '.swiper-button-prev'
                                            }
                                            }">
                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                            @if ($product->images == null)
                                                {{-- @foreach ($product->images as $image) --}}
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                        data-zoom-image="{{ asset('storage'.'/'.$product->image) }}"
                                                        alt="Electronics Black Wrist Watch" width="800" height="900">
                                                    </figure>
                                                </div>
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                        data-zoom-image="{{ asset('storage'.'/'.$product->image) }}"
                                                        alt="Electronics Black Wrist Watch" width="800" height="900">
                                                    </figure>
                                                </div>
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                        data-zoom-image="{{ asset('storage'.'/'.$product->image) }}"
                                                        alt="Electronics Black Wrist Watch" width="800" height="900">
                                                    </figure>
                                                </div>
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                        data-zoom-image="{{ asset('storage'.'/'.$product->image) }}"
                                                        alt="Electronics Black Wrist Watch" width="800" height="900">
                                                    </figure>
                                                </div>
                                                {{-- @endforeach --}}
                                            @endif
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                        <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                    </div>
                                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                        'navigation': {
                                            'nextEl': '.swiper-button-next',
                                            'prevEl': '.swiper-button-prev'
                                        }
                                        }">
                                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb swiper-slide">
                                                <img src="{{ asset('storage'.'/'.$product->image) }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{ $product->name }}</h1>
                                    <div class="product-bm-wrapper">
                                        <figure class="brand">
                                            <img src="{{ asset('storage'.'/'.$product->category->image) }}" alt="Brand" width="102" height="48" />
                                        </figure>
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
                                                <span class="product-category"><a href="#">{{ ucfirst($product->category->name) }}</a></span>
                                            </div>
                                            <div class="product-sku">
                                                SKU: <span>MS46891340</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-price"><ins class="new-price">${{ $product->price }}</ins></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                            Reviews)</a>
                                    </div>

                                    <div class="product-short-desc">
                                        <ul class="list-type-check list-style-none">
                                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                        </ul>
                                    </div>
                                    <hr class="product-divider">
                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <button type="button" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})" class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->price}})" href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            <a wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}', {{$product->price}})" href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Related Products</h4>
                                <a href="{{ route('category', ['slug' => $product->category->slug]) }}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                    @foreach ($r_products as $r_product)
                                    <div class="swiper-slide product">
                                        <figure class="product-media">
                                            <a href="{{ route('product', ['slug' => $r_product->slug]) }}">
                                                <img src="{{ asset('storage'.'/'.$r_product->image) }}" alt="Product" width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a wire:click="store({{$r_product->id}},'{{$r_product->name}}',{{$r_product->price}})" href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                                <a wire:click="addToWishlist({{$r_product->id}}, '{{$r_product->name}}', {{$r_product->price}})" href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                <a wire:click="addToCompare({{$r_product->id}}, '{{$r_product->name}}', {{$r_product->price}})" href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{ route('product', ['slug' => $r_product->slug]) }}">{{ $r_product->name }}</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ route('product', ['slug' => $r_product->slug]) }}" class="rating-reviews">(3 reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">${{ $r_product->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-truck"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over $99</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-bag"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-money"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <div class="widget widget-banner mb-9">
                                    <div class="banner banner-fixed br-sm">
                                        <figure>
                                            <img src="assets/images/shop/banner3.jpg" alt="Banner" width="266" height="220" style="background-color: #1D2D44;" />
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">40<sup class="font-weight-bold">%</sup><sub class="font-weight-bold text-uppercase ls-25">Off</sub>
                                            </div>
                                            <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0"> Ultimate Sale</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Banner -->
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
</div>
