<?php

namespace App\Livewire\Category;

use App\Models\Dashboard\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\NamingUploadedImages;
use Illuminate\Support\Str;

class CategoryForm extends Component
{
    use WithFileUploads ;

    public $name = "";
    public $description = "";
    public $parent_id = null;
    public $status = 'active';
    public $image=null;
    public $meta_keywords = [];
    public $meta_description = "";
    public $meta_title = "";


    public function createCategory(){
        $this->validate(Category::ValidateCategory());
        if($this->image){
            $uploaded_path = $this->image->storeAs('categories',
            NamingUploadedImages::AccordingToModel($this->name ?? "").".".$this->image->getClientOriginalExtension());
        }
        if(($this->meta_keywords === [])){
            $this->meta_keywords = null;
        }else{
            $this->meta_keywords = json_encode($this->meta_keywords);
        }
        // dd($this->meta_keywords);
        $category = Category::create([
            'name'                          =>$this->name,
            'slug'                          =>Str::slug($this->name),
            'description'                   =>$this->description,
            'parent_id'                     =>$this->parent_id,
            'image'                         =>$uploaded_path ?? Null,
            'status'                        =>$this->status,
            'meta_title'                    =>$this->meta_title,
            'meta_description'              =>$this->meta_description,
            'meta_keywords'                 =>$this->meta_keywords ?? null,
        ]);
        $this->reset(['name', 'description', 'parent_id', 'meta_title', 'meta_keywords', 'meta_description', 'status', 'image']);
        session()->flash('key', "$category->name created successfully");
    }

    
    public function render()
    {
        $categories = Category::all('id','name');
        return view('livewire.category.category-form',[
            'categories'                    =>$categories,
        ]);
    }
}
