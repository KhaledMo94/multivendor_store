<x-front.front-layout>
    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">checkout</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="index.html">Shop</a></li>
                            <li>checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

        <!--====== Checkout Form Steps Part Start ======-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="checkout-wrapper section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <form action="{{ route('create.order') }}" method="post">
                                    @csrf
                                    <li>
                                        <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                        <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>User Name</label>
                                                        <div class="row">
                                                            <div class="col-md-6 form-input form">
                                                                <x-form.input type="text" label="" name="addr[billing][first_name]" placeholder="First Name"/>
                                                            </div>
                                                            <div class="col-md-6 form-input form">
                                                                <x-form.input type="text" label="" name="addr[billing][last_name]]" placeholder="Last Name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Email Address</label>
                                                        <div class="form-input form">
                                                            <x-form.input type="text" name="addr[billing][mail]" label="" placeholder="Email Address"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Phone Number</label>
                                                        <div class="form-input form">
                                                            <x-form.input type="text" name="addr[billing][phone]" label="" placeholder="Phone Number"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>Street Address</label>
                                                        <div class="form-input form">
                                                            <x-form.input type="text" name="addr[billing][street_address]" label="" placeholder="Street Address"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>City</label>
                                                        <div class="form-input form">
                                                            <x-form.input type="text" name="addr[billing][city]" label="" placeholder="City"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Post Code</label>
                                                        <div class="form-input form">
                                                            <x-form.input type="text" name="addr[billing][postal_code]" label="" placeholder="Post Code"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Country</label>
                                                        <div class="form-input form">
                                                            <x-form.input type="text" name="addr[billing][country]" label="" placeholder="Country"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Region/State</label>
                                                        <div class="select-items">
                                                            <x-form.select name="addr[billing[state]"
                                                            label=""
                                                            :collection="collect(['0'=>'option 0','1'=>'option 1'])"
                                                            class="form-control"/>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="single-checkbox checkbox-style-3">
                                                        <input type="checkbox" id="checkbox-3">
                                                        <label for="checkbox-3"><span></span></label>
                                                        <p>My delivery and mailing addresses are the same.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-form button">
                                                        <button class="btn" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseFour" aria-expanded="false"
                                                            aria-controls="collapseFour"
                                                            onclick="event.preventDefault();">next
                                                            step</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </li>
                                    <li>
                                        <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                        <section class="checkout-steps-form-content collapse" id="collapseFour"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>User Name</label>
                                                        <div class="row">
                                                            <div class="col-md-6 form-input form">
                                                                <x-form.input label="" type="text" name="addr[shipping][first_name]" placeholder="First Name"/>
                                                            </div>
                                                            <div class="col-md-6 form-input form">
                                                                <x-form.input label="" type="text" name="addr[shipping][last_name]" placeholder="Last Name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Email Address</label>
                                                        <div class="form-input form">
                                                            <x-form.input label="" type="text" name="addr[shipping][mail]" placeholder="Email Address"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Phone Number</label>
                                                        <div class="form-input form">
                                                            <x-form.input label="" type="text" name="addr[shipping][phone]" placeholder="Phone Number"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>Street Address</label>
                                                        <div class="form-input form">
                                                            <x-form.input label="" type="text" name="addr[shipping][street_address]" placeholder="Street Address"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>City</label>
                                                        <div class="form-input form">
                                                            <x-form.input label="" type="text" name="addr[shipping][city]" placeholder="City"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Post Code</label>
                                                        <div class="form-input form">
                                                            <x-form.input label="" type="text" name="addr[shipping][postal_code]" placeholder="Post Code"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Country</label>
                                                        <div class="form-input form">
                                                            <x-form.input label="" type="text" name="addr[shipping][country]" placeholder="Country"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Region/State</label>
                                                        <div class="select-items">
                                                            <x-form.select
                                                            label=""
                                                            :collection="collect(['0'=>'option 0','1'=>'option 1'])"
                                                            class="form-control"/>
                                                            </select>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-md-12">
                                                    <div class="checkout-payment-option">
                                                        <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                            Option</h6>
                                                        <div class="payment-option-wrapper">
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" checked id="shipping-1">
                                                                <label for="shipping-1">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-2">
                                                                <label for="shipping-2">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-3">
                                                                <label for="shipping-3">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-4">
                                                                <label for="shipping-4">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="steps-form-btn button">
                                                        <button class="btn" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">previous</button>
                                                        <button href="javascript:void(0)" type="submit"  class="btn btn-alt">Proceed To Checkout</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </li>
                                    {{-- <li>
                                        <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                            aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                        <section class="checkout-steps-form-content collapse" id="collapsefive"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="checkout-payment-form">
                                                        <div class="single-form form-default">
                                                            <label>Cardholder Name</label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="Cardholder Name">
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>Card Number</label>
                                                            <div class="form-input form">
                                                                <input id="credit-input" type="text"
                                                                    placeholder="0000 0000 0000 0000">
                                                                <img src="assets/images/payment/card.png" alt="card">
                                                            </div>
                                                        </div>
                                                        <div class="payment-card-info">
                                                            <div class="single-form form-default mm-yy">
                                                                <label>Expiration</label>
                                                                <div class="expiration d-flex">
                                                                    <div class="form-input form">
                                                                        <input type="text" placeholder="MM">
                                                                    </div>
                                                                    <div class="form-input form">
                                                                        <input type="text" placeholder="YYYY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-form form-default">
                                                                <label>CVC/CVV <span><i
                                                                            class="mdi mdi-alert-circle"></i></span></label>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="***">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default button">
                                                            <button class="btn">pay now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </li> --}}
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-sidebar">
                            <div class="checkout-sidebar-coupon">
                                <p>Appy Coupon to get discount!</p>
                                <form action="#">
                                    <div class="single-form form-default">
                                        <div class="form-input form">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="button">
                                            <button class="btn">apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="checkout-sidebar-price-table mt-30">
                                <h5 class="title">Pricing Table</h5>

                                <div class="sub-total-price">
                                    @forelse ( $items as $item )
                                    <div class="total-price">
                                        <p class="value">{{ $item->product->name }}:</p>
                                        <p class="price">{{ Currency::show($item->product->sale_price * $item->quantity) }}</p>
                                    </div>
                                    @empty
                                    <p>No Products Selected</p>
                                    @endforelse
                                </div>

                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Subotal Price:</p>
                                        <p class="price">{{ Currency::show($total) }}</p>
                                    </div>
                                </div>
                                <div class="price-table-btn button">
                                    <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Checkout Form Steps Part Ends ======-->
</x-front.front-layout>

