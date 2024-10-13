<?php

namespace App\Models\Dashboard;

use App\Models\Scopes\ByStoreScope;
use App\Models\Scopes\LatestScope;
use App\Models\Scopes\StoreScope;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','description',
        'meta_title','meta_description','meta_keywords',
        'options','featured_image','product_images','sale_price',
        'price','stock','sku','store_id'
    ];

    protected static function booted()
    {
        static::addGlobalScopes([
            // ByStoreScope::class,
            LatestScope::class,
        ]);

        static::creating(function(Product $product) {
            if (!$product->sku) {
                $product->sku = 'PROD-' . strtoupper(Str::random(8));
            }
        });
    }

    //---------------------------   Relations   --------------------

    public function categories(){
        return $this->belongsToMany(Category::class , 'category_product');
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //-----------------------------  Validations  --------------------

    public static function validateProducts($id = null){
        return [
            'name'              =>['required','min:3','max:255','string',"unique:products,name,$id"],
            'description'       =>['nullable','min:3','string'],
            'meta_title'        =>['nullable','max:255','string'],
            'meta_description'  =>['nullable','min:3','string'],
            'meta_keywords'     =>['nullable','array'],
            'options'           =>['sometimes','present','nullable','json'],
            'featured_image'    =>['nullable','max:2048','image'],
            'product_images'    =>['sometimes','nullable','array'],
            'product_images.*'  =>['nullable','max:2048','image'],
            'price'             =>['nullable','numeric','gte:sale_price'],
            'sale_price'        =>['required','numeric'],
            'store_id'          =>['nullable','integer',Rule::exists('stores','id')],
        ];
    }

}
