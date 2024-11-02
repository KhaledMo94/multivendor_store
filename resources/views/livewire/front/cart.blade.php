<div class="navbar-cart">
    <div class="wishlist">
        <a href="javascript:void(0)">
            <i class="lni lni-heart"></i>
            <span class="total-items">0</span>
        </a>
    </div>
    <div class="cart-items">
        <a href="javascript:void(0)" class="main-btn">
            <i class="lni lni-cart"></i>
            <span class="total-items">{{ $cart->count() }}</span>
        </a>
        <!-- Shopping Item -->
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <span>{{ $cart->count() }} Items</span>
                <a wire:click='emptyCart'">Empty Cart</a>
            </div>
            <ul class="shopping-list">
                @forelse ( $cart as $item )
                <li>
                    <a wire:click="removeProduct({{ $item->product_id }})"
                        href="javascript:void(0)"
                        class="remove"
                        title="Remove this item"><i
                            class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="product-details.html"><img
                                src="{{ Image::imageView($item->product->featured_image) }}" alt="#"></a>
                    </div>
                    <div class="content">
                        <h4><a href="product-details.html">
                                {{ $item->product->name }}</a></h4>
                        <p class="quantity">{{ $item->quantity }}x - <span class="amount">{{ Currency::show($item->product->sale_price) }}</span></p>
                    </div>
                </li>
                @empty
                <p>Empty Cart</p>
                @endforelse
            </ul>
            <div class="bottom">
                <div class="total">
                    <span>Total</span>
                    <span class="total-amount">{{ Currency::show($total) }}</span>
                </div>
                <div class="button">
                    <a href="{{ route('front.checkout') }}" class="btn animate">Checkout</a>
                </div>
            </div>
        </div>
        <!--/ End Shopping Item -->
    </div>
</div>
