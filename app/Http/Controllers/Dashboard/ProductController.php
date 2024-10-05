<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\NamingUploadedImages;
use App\Traits\TagifyParsing;
use App\Traits\UsingTagify;

class ProductController extends Controller
{
    use NamingUploadedImages, TagifyParsing, UsingTagify;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::active()->select('name','id')->get();
        $stores = Store::where('user_id',Auth::id())->select('name','id')->get()
        ->map(function($stores){
            return [
                'id'                    =>$stores->id,
                'name'                  =>$stores->name,
            ];
        });
        return view('dashboard.products.edit',compact('product','categories','stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::validateProducts($request,$product->id);
        $old_path = $product->featured_image;
        if($request->hasFile('featured_image')){
            if($old_path){
                Storage::delete($old_path);
            }
            $new_path = $request->file('featured_image')
            ->storeAs('products',NamingUploadedImages::AccordingToModel('product'));
        }else{
            $new_path=$old_path;
        }
        if($request->input('remove-img')){
            $new_path = null;
        }
        if($req_images = $request->product_images){
            if($product->product_images){
                foreach($product->product_images as $image){
                    Storage::delete($image);
                }
            }
            $data = [];
            foreach($req_images as $image){
                $data[]=$image->storeAs('products',NamingUploadedImages::AccordingToModel('product'));
            }
        }else{
            $data = $product->product_images;
        }

        $meta_keywords = !is_null($request->meta_keywords) ? 
        UsingTagify::acceptTagifyToArray($request->meta_keywords) : null ;

        $product_updated = $product->update([
            'name'                      =>$request->name,
            'description'               =>$request->description,
            'meta_title'                =>$request->meta_title,
            'meta_description'          =>$request->meta_description,
            'meta_keywords'             =>$meta_keywords,
            'featured_image'            =>$new_path,
            'product_images'            =>$data,
            'price'                     =>$request->price ?? null,
            'sale_price'                =>$request->sale_price,
            'store_id'                  =>$request->store_id,
        ]);
        if($product_updated){
            $product->categories()->sync($request->categories);
        }
        return redirect()->route('dashboard.products.index')
        ->with('success',"$request->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
