<div>
    <!-- Start of Main -->
    <main class="main bg-white">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Shop</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb-nav -->

        <div class="page-content pb-3">
            <div class="container">
                <!-- Start of Shop Banner -->
                <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-sm"
                    style="background-image: url(assets/images/demos/demo11/banner/shop-banner.jpg); background-color: #E1E5E8;">
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle text-uppercase font-weight-normal">
                            Save Up to <strong class="text-secondary ls-25">75% Off</strong>
                        </h5>
                        <h3 class="banner-title text-capitalize ls-25 mb-4">
                            Electronic Sale
                        </h3>
                        <a href="#" class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                            Discount Now<i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <!-- End of Shop Banner -->
                <!-- Start of Shop Content -->
                <div class="shop-content toolbox-horizontal">
                    <!-- Start of Toolbox -->
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <aside class="sidebar sidebar-fixed shop-sidebar">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <div class="sidebar-content toolbox-left">
                                <!-- Start of Collapsible widget -->
                                <div class="toolbox-left mr-0">
                                    <div class="toolbox-item toolbox-sort select-menu">
                                        <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none mb-0"><i class="w-icon-category"></i><span>Filters</span></a>
                                        <select wire:model="category_id" class="form-control">
                                            <option value="">All Categories</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="toolbox-left mr-0">
                                    <div class="toolbox-item toolbox-sort select-menu">
                                        <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none mb-0"><i class="w-icon-category"></i><span>Filters</span></a>
                                        <select wire:model="max_value" class="form-control">
                                            <option value="10000000000" selected>Price</option>
                                            <option value="510">$510</option>
                                            <option value="520">$520</option>
                                            <option value="550">$550</option>
                                            <option value="570">$570</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <div class="toolbox-left mr-0">
                            <div class="toolbox-item toolbox-sort select-menu">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none mb-0"><i class="w-icon-category"></i><span>Filters</span></a>
                                <select wire:model="orderBy" name="orderby" class="form-control">
                                    <option value="Default Sorting">Default Sorting</option>
                                    <option value="Sort By Latest">Sort by latest</option>
                                    <option value="Price: Low to High">Sort by pric: low to high</option>
                                    <option value="Price: High to Low">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box mr-0">
                                <select wire:model="page_size">
                                    <option value="12">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                        </div>
                    </nav>
                    <!-- End of Toolbox -->

                    <!-- Start of Selected Items -->
                    <div class="selected-items mb-3">
                        <a href="#" class="filter-clean text-primary">Clean All</a>
                    </div>
                    <!-- End of Selected Items -->

                    <!-- Start of Product Wrapper -->
                    @if ($products->count() > 0)
                    <div class="product-wrapper row cols-xl-6 cols-lg-4 cols-sm-3 cols-2 mb-4">
                        @foreach ($products as $product)
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ route('product',['slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage'.'/'.$product->image) }}" alt="Product"
                                            width="300" height="338">
                                        <img src="{{ asset('storage'.'/'.$product->image) }}" alt="Product"
                                            width="300" height="338">
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})" href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                        <a wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->price}})" href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                                        <a wire:click.prevent="addToCompare({{$product->id}}, '{{$product->name}}', {{$product->price}})" href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="{{ route('product',['slug' => $product->slug]) }}">{{ ucfirst($product->name) }}</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ route('product',['slug' => $product->slug]) }}" class="rating-reviews">(8 Reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">${{ $product->price }}</ins><del class="old-price">${{ $product->price }}</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <h1 class="text-center">No any Product Found</h1>
                    <div class="text-center">
                        <a class="btn btn-dark btn-rounded btn-icon-right" href="{{ route('shop') }}">Go Shopping</a>
                    </div>
                    <!-- End of Product Wrapper -->
                    @endif
                    <!-- Start of Pagination -->
                    <div class="toolbox toolbox-pagination justify-content-between">
                        {{ $products->withQueryString()->links() }}
                    </div>
                    <!-- End of Pagination -->
                </div>
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
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Babies</a></li>
                                <li><a href="#">Beauty</a></li>
                                <li><a href="#">Decoration</a></li>
                                <li><a href="#">Electronics</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Furniture</a></li>
                                <li><a href="#">Kitchen</a></li>
                                <li><a href="#">Medical</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Watches</a></li>
                            </ul>
                        </div>
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Price</span></h3>
                            <div class="widget-body">
                                <ul class="filter-items search-ul">
                                    <li><a href="#">$0.00 - $100.00</a></li>
                                    <li><a href="#">$100.00 - $200.00</a></li>
                                    <li><a href="#">$200.00 - $300.00</a></li>
                                    <li><a href="#">$300.00 - $500.00</a></li>
                                    <li><a href="#">$500.00+</a></li>
                                </ul>
                                <form class="price-range">
                                    <input type="number" name="min_price" class="min_price text-center"
                                        placeholder="$min"><span class="delimiter">-</span><input type="number"
                                        name="max_price" class="max_price text-center" placeholder="$max"><a
                                        href="#" class="btn btn-primary btn-rounded">Go</a>
                                </form>
                            </div>
                        </div>
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Size</span></h3>
                            <ul class="widget-body filter-items item-check mt-1">
                                <li><a href="#">Extra Large</a></li>
                                <li><a href="#">Large</a></li>
                                <li><a href="#">Medium</a></li>
                                <li><a href="#">Small</a></li>
                            </ul>
                        </div>
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Brand</span></h3>
                            <ul class="widget-body filter-items item-check mt-1">
                                <li><a href="#">Elegant Auto Group</a></li>
                                <li><a href="#">Green Grass</a></li>
                                <li><a href="#">Node Js</a></li>
                                <li><a href="#">NS8</a></li>
                                <li><a href="#">Red</a></li>
                                <li><a href="#">Skysuite Tech</a></li>
                                <li><a href="#">Sterling</a></li>
                            </ul>
                        </div>
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Color</span></h3>
                            <ul class="widget-body filter-items item-check">
                                <li><a href="#">Black</a></li>
                                <li><a href="#">Blue</a></li>
                                <li><a href="#">Brown</a></li>
                                <li><a href="#">Green</a></li>
                                <li><a href="#">Grey</a></li>
                                <li><a href="#">Orange</a></li>
                                <li><a href="#">Yellow</a></li>
                            </ul>
                        </div>
                        <!-- End of Collapsible Widget -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->
                <!-- End of Shop Content -->
            </div>
        </div>
    </main>
    <!-- End of Main -->
</div>
