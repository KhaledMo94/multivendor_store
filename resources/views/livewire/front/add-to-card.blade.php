<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-image">
            @if (! is_null($product->featured_image))
            <img src="
                {{ Image::imageView($product->featured_image, 'storage') }}" alt="#">
            @else
            <p>No Image</p>
            @endif
            <span class="new-tag">New</span>
            <span class="sale-tag">-25%</span>
            <div class="button">
                <a wire:click="addProduct({{ $product->id }})" class="btn"><i class="lni lni-cart"></i> Add to
                    Cart</a>
            </div>
        </div>
        <div class="product-info">
            <span class="category">{{ $product->categories[0]->name ?? $product->name }}</span>
            <h4 class="title">
                <a href="product-grids.html">{{ $product->name }}</a>
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
                <span>{{ Currency::show($product->sale_price , 'USD') }}</span>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
