<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories','store:id'])
        ->orderBy('products.created_at')
        ->limit(8)->get();

        $categories = Category::with('products:id,name')
        ->withoutGlobalScope('latest')
        ->limit(6)
        ->get();

        return view('front.home' , [
            'products'                  =>$products,
            'categories'                =>$categories,
        ]);
    }
}
