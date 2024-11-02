<?php

namespace App\Models\Front;

use App\Models\Dashboard\Product;
use App\Models\Order_Adress;
use App\Models\OrderProductPivot;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id','user_id','number','status','street_address',
        'payment_method','payment_status',
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $date = now()->format('Y-m-d');
            $orderCountForToday = Order::whereDate('created_at', now()->toDateString())->count() + 1;
            $order->number = $date . '-' . str_pad($orderCountForToday, 7, '0', STR_PAD_LEFT);
        });
    }

    //------------------  Relations  -----------------

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)
            ->withDefault([
                'name'                  =>'guest',
            ]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class , 'order_product')
        ->using(OrderProductPivot::class)
        ->as('order_product_pivot')
        ->withPivot([
            'product_name','product_price','options','quantity'
        ]);
    }

    public function addresses()
    {
        return $this->hasMany(Order_Adress::class);
    }
}
