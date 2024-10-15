<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Dashboard\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartDatabase implements CartRepositoryInterface
{
    protected $cookieId;

    public function __construct()
    {
        $this->cookieId = Cookie::get('cart_id');
        if(! $this->cookieId){
            Cookie::queue('cart_id',Str::uuid(),30*24*60);
        }
    }
    public function get()
    {
        $cart = Cart::with('product')->where('cookies_id',$this->cookieId)->get() ;
        return $cart;
    }

    public function add($id , $quantity = 1 , $options = null)
    {
        foreach($this->get() as $item){
            if($item->product_id == $id){
                return;
            }
        }
        return Cart::create([
            'cookies_id'                    =>$this->cookieId,
            'user_id'                       =>Auth::id() ?? null,
            'product_id'                    =>$id,
            'quantity'                      =>$quantity,
            'options'                       =>$options,
        ]);
    }

    public function update($id, $quantity)
    {
        Cart::where('cookies_id',$this->cookieId)
        ->where('product_id',$id)
        ->update([
            'quantity'                      =>$quantity,
        ]);
    }

    public function removeProduct($id)
    {
        Cart::where('cookies_id',$this->cookieId)
        ->where('product_id',$id)->delete();
    }

    public function empty()
    {
        Cart::where('cookies_id',$this->cookieId)->delete();
    }

    public function total()
    {
        $cart = $this->get();
        return $cart->sum(function($cart){
            return $cart->quantity * $cart->product->sale_price;
        });
    }
}
