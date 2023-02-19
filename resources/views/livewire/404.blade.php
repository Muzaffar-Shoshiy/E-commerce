<div>
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Error 404</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content error-404 mt-4 pt-2 mb-4 pb-2">
            <div class="container mt-4 pt-2 mb-4 pb-2">
                <div class="banner mt-4 pt-2 mb-4 pb-2">
                    <div class="banner-content text-center mt-4 pt-2 mb-4 pb-">
                        <h2><span class="text-secondary">404</span> Not Found</h2>
                        <h2 class="banner-title">
                            <span class="text-secondary">Oops!!!</span> Something Went Wrong Here
                        </h2>
                        <p class="text-light">There may be a misspelling in the URL entered, or the page you are looking for may no longer exist</p>
                        <a href="{{ route('shop') }}" class="btn btn-dark btn-rounded btn-icon-right">Go Back Home<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
</div>
