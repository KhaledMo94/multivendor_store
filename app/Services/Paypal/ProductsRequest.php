<?php


namespace App\Services\Paypal;

use Illuminate\Support\Facades\Http;

class ProductsRequest
{
    public $token;
    protected $url;
    public function __construct()
    {
        $instant = new Authenticate();
        $this->token = $instant->getAccessToken();
        if(config('services.paypal.mode') == 'sandbox'){
            $this->url = config('services.paypal.sandbox.uri');
        }else{
            $this->url = config('services.paypal.live.uri');
        }
    }

    public function sendPurchaseRequest($order_id, $total, $currency = 'EUR')
    {
        $data =[
                "intent"    => "CAPTURE",
                "purchase_units"    => [
                  [
                    "reference_id"  => $order_id,
                    "amount"    => [
                      "currency_code"   => $currency,
                      "value"   => $total
                    ]
                  ]
                ],
                "payment_source"    => [
                  "paypal"  => [
                    "experience_context"    => [
                      "payment_method_preference"   => "IMMEDIATE_PAYMENT_REQUIRED",
                      "brand_name"  => config('app.name', 'Ajyal Store'),
                      "locale"  => "en-US",
                      "return_url"  =>url(route('paypal.success')),
                      "cancel_url"  => url(route('paypal.cancel'))
                    ]
                  ]
                ]
            ];
        $response = Http::withToken($this->token)
            ->post($this->url . '/v2/checkout/orders', $data);

        return $response;
    }

}
