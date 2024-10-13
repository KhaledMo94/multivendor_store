<?php

namespace App\Models\Dashboard;

use App\Models\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Traits\TagifyParsing;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory , SoftDeletes , TagifyParsing;

    protected $fillable = [
        'name','slug','description','parent_id',
        'image','status','meta_title','meta_description',
        'meta_keywords',
    ];

    protected static function booted()
    {
        static::addGlobalScopes([

        ]);
    }

    //---------------------------   Relations   --------------------

    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function products(){
        return $this->belongsToMany(Category::class,'category_product');
    }

    public function getMetaValuesAttribute()
    {
        return TagifyParsing::convertTagifyOutputToArray($this->meta_keywords);
    }

    public static function validateCategory($id = Null){
        return [
            'name'                      =>[
                'required','string','max:255','min:3',Rule::unique('categories','name')->ignore($id)
            ],
            'description'               =>"nullable|string|min:3",
            'parent_id'                 =>"nullable|int|exists:categories,id",
            'image'                     =>['nullable','mimes:jpg,bmp,png','max:2048'],
            'status'                    =>['required',Rule::in('active','inactive')],
            'meta_title'                =>['nullable','string','max:255'],
            'meta_description'          =>['nullable','string'],
            'meta_keywords'             =>['nullable','array'],
        ];
    }
    public function scopeActive(Builder $builder)
    {
        return $builder->where('status','active');
    }

}
