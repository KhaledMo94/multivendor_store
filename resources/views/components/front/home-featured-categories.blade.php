<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Featured Categories</h2>
                    <p>There are many variations of passages of Categories available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ( $categories as $category)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">{{ $category->name }}</h3>
                    <ul>
                        @forelse ($category->products as $product)
                        <li><a href="product-grids.html">{{ $product->name }}</a></li>
                        @empty
                        <p>Still No Products in that category</p>
                        @endforelse
                    </ul>
                    <div class="images">
                        <img src="{{ App\Helpers\ImagesHelpers::imageView($category->image , 'storage') }}" width="100" alt="#">
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            @empty
                <P>still no categories availble</P>
            @endforelse
        </div>
    </div>
</section>