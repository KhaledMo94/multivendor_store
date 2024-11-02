<?php

namespace App\Models;

use App\Models\Dashboard\Product;
use App\Models\Front\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProductPivot extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id','order_id',
        'product_name','product_price',
        'quantity','options',
    ];
    protected $table = 'order_product';

    public $incrementing = true;

    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class)->withDefault([
            'name'              =>$this->product_name,
            'sale_price'        =>$this->product_price,
        ]);
    }

    public function order(){
        $this->belongsTo(Order::class);
    }
}
