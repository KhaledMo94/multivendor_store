<?php

namespace App\Http\Controllers\Payment;

use App\Events\OrderPaymentSuccess;
use App\Http\Controllers\Controller;
use App\Models\Front\Order;
use App\Models\OrderProductPivot;
use App\Services\Paypal\Authenticate;
use Illuminate\Http\Request;
use App\Services\Paypal\ProductsRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{
    public $token;
    public function __construct()
    {
        $instant = new Authenticate();
        $this->token = $instant->getAccessToken();
    }

    public function cancel(Request $request)
    {
        Event::dispatch(new OrderPaymentSuccess());
        return view('front.payment-canceled');
    }

    public function success(Request $request)
    {
        $orders_ids = session('orders_ids');
        $orders_ids = explode('-',$orders_ids);
        Session::forget('order_ids');
        $items = OrderProductPivot::whereIn('order_id',$orders_ids)->get();
        return view('front.payment-success',['items'=>$items]);
    }


    public function orderPayment($creating_response)
    {
        $uri = '';
        foreach ( $creating_response['links'] as $link){
            if($link['rel'] == "payer-action"){
                $uri = $link['href'];
            }
        }
        return $uri;
    }

    public function getPurchaseUrl($orders_ids ,$total )
    {
        $instant_create_order = new ProductsRequest();
        $creating_response = $instant_create_order->sendPurchaseRequest(
            $orders_ids,
            $total
        );
        foreach(explode('-',$orders_ids) as $id){
            Order::where('id',$id)->update([
                'reference_id'              =>$creating_response->json()['id'],
            ]);
        }
        session([
            'orders_ids'                =>$orders_ids,
        ]);
        $purchase_url  = $this->OrderPayment($creating_response);
        return $purchase_url;
    }
}
