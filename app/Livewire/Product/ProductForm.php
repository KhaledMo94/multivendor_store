<?php

namespace App\Livewire\Product;

use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Traits\NamingUploadedImages;
use Illuminate\Support\Facades\DB;

class ProductForm extends Component
{
    use WithFileUploads , NamingUploadedImages;
    public $name = '';
    public $description='';
    public $meta_title  ='';
    public $meta_description  ='';
    public $meta_keywords;
    public $featured_image ;
    public $product_images =[];
    public $sale_price =0;
    public $price =0;
    public $categories_ids = [];
    public $options = null;
    public $store_id = null ;
    
    public function createProduct(){
        $this->validate(Product::validateProducts());
        if($this->meta_keywords ==! null){
            $this->meta_keywords = json_encode($this->meta_keywords);
        }

        if($this->featured_image){
            $uploaded_path = $this->featured_image->storeAs('products',
            NamingUploadedImages::AccordingToModel($this->name ?? "")
            .".".$this->featured_image->getClientOriginalExtension());
        }

        
        if($this->product_images == []){
            $this->product_images = null;
        }else{
            $res = [];
            foreach($this->product_images as $image){
                $res[] = $image->storeAs('products',
                NamingUploadedImages::AccordingToModel($this->name ?? "")
                .".".$image->getClientOriginalExtension());
            }
            $this->product_images = $res;
        }

        try {
            DB::beginTransaction();
            $product = Product::create([
                'name'                      =>$this->name,
                'store_id'                  =>$this->store_id,
                'slug'                      =>Str::slug($this->name),
                'description'               =>$this->description,
                'meta_title'                =>$this->meta_title,
                'meta_description'          =>$this->meta_description,
                'meta_keywords'             =>$this->meta_keywords,
                'featured_image'            =>$uploaded_path ?? null,
                'product_images'            =>$this->product_images ? json_encode($this->product_images) : null,
                'price'                     =>$this->price,
                'sale_price'                =>$this->sale_price,
            ]); 

            if($product){
                $product->categories()->attach($this->categories_ids);
            }

            DB::commit();
            session()->flash('success',"$this->name created successfully");
            $this->reset();

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    public function render()
    {
        $categories = Category::active()->select('id','name')->get();
        $stores = Store::where('user_id',Auth::id())->get();
        return view('livewire.product.product-form',compact('stores','categories'));
    }
}
