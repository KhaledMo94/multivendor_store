<?php

namespace App\Http\Controllers;

use App\Events\OrderEvents\OrderCreated;
use App\Models\Front\Order;
use App\Models\OrderProductPivot;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(Request $request, CartRepositoryInterface $cart)
    {
        $addr = $request->validate([
            'addr.billing.first_name'              =>['required','string','min:3','max:255'],
            'addr.billing.last_name'               =>['required','string','min:3','max:255'],
            'addr.billing.mail'                    =>['required','email','min:3','max:255'],
            'addr.billing.phone'                   =>['nullable','string','min:3','max:15'],
            'addr.billing.street_address'          =>['required','string','min:5'],
            'addr.billing.city'                    =>['required','string'],
            'addr.billing.country'                 =>['required','string',],
            'addr.billing.state'                   =>['nullable','string',],
            'addr.billing.postal_code'             =>['nullable','string',],
            'addr.shipping.first_name'              =>['required','string','min:3','max:255'],
            'addr.shipping.last_name'               =>['required','string','min:3','max:255'],
            'addr.shipping.mail'                    =>['required','email','min:3','max:255'],
            'addr.shipping.phone'                   =>['nullable','string','min:3','max:15'],
            'addr.shipping.street_address'          =>['required','string','min:5'],
            'addr.shipping.city'                    =>['required','string'],
            'addr.shipping.country'                 =>['required','string',],
            'addr.shipping.state'                   =>['nullable','string',],
            'addr.shipping.postal_code'             =>['nullable','string',],
        ]);

        $items = $cart->get();
        $items_grouped_by_store = $items->groupBy(function($items){
            return $items->product->store_id;
        });

        DB::beginTransaction();
        try {
            foreach($items_grouped_by_store as $store_id=>$order){
                $created_order = Order::create([
                    'store_id'                  =>$order[0]->product->store_id,
                    'user_id'                   =>Auth::id(),
                    'status'                    =>'pending',
                    'payment_status'            =>'pending',
                    'payment_method'            =>'paypal',
                ]);

                foreach ( $order as $item ) {
                    OrderProductPivot::create([
                        'order_id'                      =>$created_order->id,
                        'product_id'                    =>$item->product->id,
                        'store_id'                      =>$item->product->store_id,
                        'product_name'                  =>$item->product->name,
                        'product_price'                 =>$item->product->sale_price,
                        'quantity'                      =>$item->quantity,
                        'options'                       =>$item->options,
                    ]);
                }

                foreach ($request->post('addr') as $type => $address){
                    $address['type'] = $type;
                    $created_order->addresses()->create($address);
                };
                DB::commit();
                event(new OrderCreated($order, $store_id, $addr ));
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
        return redirect()->route('home')
                        ->with('message','Your Order Has Been Created');
    }
}
