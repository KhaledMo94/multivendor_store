<?php

namespace App\Models;

use App\Models\Dashboard\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =[
        'cookies_id' , 'user_id', 'product_id' , 'quantity' , 'options'
    ];

    protected $keyType = 'string';

    public $incrementing = false ;

    protected static function booted()
    {
        Static::creating(function(Cart $cart){
            $cart->id = Str::uuid();
        });
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name'                  =>'anymous',
        ]);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
