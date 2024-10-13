<div class="col-lg-6 col-md-6 col-12">
    <div class="single-banner" style="background-image:url('{{ Image::imageView($product->featured_image) }}')">
        <div class="content">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <div class="button">
                <a href="product-grids.html" class="btn">View Details</a>
            </div>
        </div>
    </div>
</div>