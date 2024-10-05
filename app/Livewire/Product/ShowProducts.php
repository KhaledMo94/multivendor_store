<?php

namespace App\Livewire\Product;

use App\Models\Dashboard\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if($product->featured_image){
            Storage::delete($product->featured_image);
        }
        if($product->product_images){
            foreach (json_decode($product->product_images) as $img){
                Storage::delete($img);
            }
        }
        $product->delete();
        session()->flash('danger',"$product->name deleted successfully");
    }


    public function render()
    {
        return view('livewire.product.show-products',[
            'products'                      =>Product::with(['categories','store'])->paginate(5)
        ]);
    }
}
