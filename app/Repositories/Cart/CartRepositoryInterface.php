<?php

namespace App\Repositories\Cart;

use App\Models\Cart as CartModel;
use App\Models\Dashboard\Product;
use Illuminate\Support\Collection;

interface CartRepositoryInterface
{
    public function get();

    public function add($id) ;

    public function update($id , $quantity) ;

    public function removeProduct($id) ;

    public function empty() ;

    public function total();
}
