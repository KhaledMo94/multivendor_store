<?php

namespace App\Models;

use App\Models\Dashboard\Product;
use App\Models\Front\Order;
use App\Models\Scopes\ActiveScope;
use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name','slug','description','logo',
        'user_id','banner','address','phone',
        'email','website','status','meta_keywords',
        'meta_description','country','city','postal_code',
    ];

    protected static function booted()
    {
        static::addGlobalScopes([
            ActiveScope::class,
            // StoreScope::class
        ]);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
