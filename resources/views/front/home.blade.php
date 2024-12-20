<x-front.front-layout uses_livewire='true' >
    @if ( session()->has('message'))
        <div class="bg-success text-center text-white">
            {{ session('message') }}
        </div>
    @endif
        <!-- Start Hero Area -->
        <x-front.hero :product="$products->take(3)"/>
        <!-- End Hero Area -->

        <!-- Start Featured Categories Area -->
        <x-front.home-featured-categories :categories="$categories" />
        <!-- End Features Area -->

        <!-- Start Trending Product Area -->
        <section class="trending-product section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Trending Product</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ( $products as $product )
                        @livewire('front.add-to-card', ['product' => $product])
                    @empty
                        <p>Still No Products</p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- End Trending Product Area -->

        <!-- Start Banner Area -->
        <section class="banner section">
            <div class="container">
                <div class="row">
                @foreach ( $products->take(2) as $product)
                    <x-front.home-banner :product="$product" />
                @endforeach
                </div>
            </div>
        </section>
        <!-- End Banner Area -->

        <!-- Start Special Offer -->
        {{-- <section class="special-offer section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Special Offer</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/335x335" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                Add to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Camera</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">WiFi Security Camera</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><span>5.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span>$399.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/335x335" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                Add to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Laptop</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">Apple MacBook Air</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><span>5.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span>$899.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/335x335" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                Add to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Speaker</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">Bluetooth Speaker</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><span>4.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span>$70.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- Start Banner -->
                        <div class="single-banner right"
                            style="background-image:url('https://via.placeholder.com/730x310');margin-top: 30px;">
                            <div class="content">
                                <h2>Samsung Notebook 9 </h2>
                                <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                    incididunt ut labore.</p>
                                <div class="price">
                                    <span>$590.00</span>
                                </div>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Banner -->
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="offer-content">
                            <div class="image">
                                <img src="https://via.placeholder.com/510x600" alt="#">
                                <span class="sale-tag">-50%</span>
                            </div>
                            <div class="text">
                                <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$200.00</span>
                                    <span class="discount-price">$400.00</span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
                                    eiusmod tempor labores.</p>
                            </div>
                            <div class="box-head">
                                <div class="box">
                                    <h1 id="days">000</h1>
                                    <h2 id="daystxt">Days</h2>
                                </div>
                                <div class="box">
                                    <h1 id="hours">00</h1>
                                    <h2 id="hourstxt">Hours</h2>
                                </div>
                                <div class="box">
                                    <h1 id="minutes">00</h1>
                                    <h2 id="minutestxt">Minutes</h2>
                                </div>
                                <div class="box">
                                    <h1 id="seconds">00</h1>
                                    <h2 id="secondstxt">Secondes</h2>
                                </div>
                            </div>
                            <div style="background: rgb(204, 24, 24);" class="alert">
                                <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End Special Offer -->

        <!-- Start Home Product List -->
        {{-- <section class="home-product-list section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                        <h4 class="list-title">Best Sellers</h4>
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">GoPro Hero4 Silver</a>
                                </h3>
                                <span>$287.99</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">Puro Sound Labs BT2200</a>
                                </h3>
                                <span>$95.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">HP OfficeJet Pro 8710</a>
                                </h3>
                                <span>$120.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                        <h4 class="list-title">New Arrivals</h4>
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">iPhone X 256 GB Space Gray</a>
                                </h3>
                                <span>$1150.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
                                </h3>
                                <span>$950.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">Microsoft Xbox One S</a>
                                </h3>
                                <span>$298.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <h4 class="list-title">Top Rated</h4>
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">Samsung Gear 360 VR Camera</a>
                                </h3>
                                <span>$68.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
                                </h3>
                                <span>$840.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="https://via.placeholder.com/100x100"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">Zeus Bluetooth Headphones</a>
                                </h3>
                                <span>$28.00</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End Home Product List -->

        <!-- Start Brands Area -->
        {{-- <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                        <h2 class="title">Popular Brands</h2>
                    </div>
                </div>
                <div class="brands-logo-wrapper">
                    <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                        <div class="brand-logo">
                            <img src="https://via.placeholder.com/220x160" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Brands Area -->

        <!-- Start Blog Section Area -->
        {{-- <section class="blog-section section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Our Latest News</h2>
                            <p>There are many variations of passages of Lorem
                                Ipsum available, but the majority have suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">eCommerce</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">Gaming</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">Electronic</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                                    </a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End Blog Section Area -->

        <!-- Start Shipping Info -->
        <section class="shipping-info">
            <div class="container">
                <ul>
                    <!-- Free Shipping -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-delivery"></i>
                        </div>
                        <div class="media-body">
                            <h5>Free Shipping</h5>
                            <span>On order over $99</span>
                        </div>
                    </li>
                    <!-- Money Return -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-support"></i>
                        </div>
                        <div class="media-body">
                            <h5>24/7 Support.</h5>
                            <span>Live Chat Or Call.</span>
                        </div>
                    </li>
                    <!-- Support 24/7 -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="media-body">
                            <h5>Online Payment.</h5>
                            <span>Secure Payment Services.</span>
                        </div>
                    </li>
                    <!-- Safe Payment -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-reload"></i>
                        </div>
                        <div class="media-body">
                            <h5>Easy Return.</h5>
                            <span>Hassle Free Shopping.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End Shipping Info -->
</x-front.front-layout>
