<x-front.front-layout>
    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Register</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li>Payment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

    <div class="container py-3 my-3">
        <div class="row my-2 d-flex justify-content-center">
            <div class="col col-md-10 d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('assets/images/payment/success.png') }}" style="my-4" alt="" srcset="">
                <h3 style="text-primary text-center">
                    Your Payment Successfully determined by the third-party payment gateway,
                    we`ll notify you when payment confirmed
                </h3>
            </div>
        </div>
        <div class="row">
            <h5 class="text-center">
                You successfully payed for :-
            </h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->product_price, 2) }}</td>
                            <td>{{ number_format($item->product_price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-front.front-layout>
