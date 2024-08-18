<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name','slug','description','parent_id',
        'image','status','meta_title','meta_description',
        'meta_keywords',
    ];

    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public static function ValidateCategory($request){
        return $request->validate([
            'name'                      =>"required|string|max:255|min:3|unique:categories,name",
            'description'               =>"nullable|string|min:3",
            'parent_id'                 =>"nullable|int|exists:categories,id",
            'image'                     =>['nullable','mimes:jpg,bmp,png','max:200'],
            'status'                    =>['required',Rule::in('active','inactive')],
            'meta_title'                =>['nullable','string','max:255'],
            'meta_description'          =>['nullable','string'],
            'meta_keywords'             =>['nullable','json']
        ]);
    }
}