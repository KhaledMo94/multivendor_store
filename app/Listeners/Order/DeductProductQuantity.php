<?php

namespace App\Listeners\Order;

use App\Events\OrderEvents\OrderCreated;
use App\Events\ProductEvents\ProductStockAlert;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeductProductQuantity
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        foreach ($event->order as $item)
        {
            $availble = $item->product->stock;
            if($item->quantity < $availble){
                $availble -= $item->quantity;
                DB::table('products')->where('id',$item->product->id)
                ->update(['stock'=>$availble]);
            }
            if($availble < env('PRODUCT_ALERT')){
                event(new ProductStockAlert($item->product));
            }
        }
    }
}
