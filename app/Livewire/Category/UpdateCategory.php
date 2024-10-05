<?php

namespace App\Livewire\Category;

use App\Models\Dashboard\Category;
use App\Traits\NamingUploadedImages;
use Illuminate\Http\Request as HttpRequest;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateCategory extends Component
{
    use WithFileUploads, NamingUploadedImages;
    public $name , $description , $image , $parent_id , $meta_title , 
            $meta_description , $meta_keywords , $status;
    
    public function updateCategories( HttpRequest $request , $id){
        $category = Category::findOrFail($id);
        $this->validate(Category::validateCategory($category->id));
        $old_path = $category->image;
        if(!$this->image){
            $new_path = $old_path ?? null;
        }else{
            $uploaded_img = $request->file('image');
            $new_path = $uploaded_img->storeAs('categories',
            NamingUploadedImages::AccordingToModel(
                $request->name ?? ""
                ). "." .$uploaded_img->getClientOriginalExtension());
        }
        
        if(isset($old_path) && $old_path !== $new_path){
            Storage::delete($old_path);
        }
        if(isset($request->remove_image)){
            $new_path = null;
        }
        Category::where('id',$category->id)->update([
            'name'                          =>$request->name,
            'slug'                          =>Str::slug($request->name),
            'description'                   =>$request->description,
            'parent_id'                     =>$request->parent_id,
            'image'                         =>$new_path,
            'status'                        =>$request->status,
            'meta_title'                    =>$request->meta_title,
            'meta_description'              =>$request->meta_description,
            'meta_keywords'                 =>$request->meta_keywords,
        ]);
        session()->flash('key',"$this->name updated successfully");
    }

    public function render(HttpRequest $request)
    {
        $category = Category::findOrFail($request->category);
        $this->name = $category->name;
        $this->description = $category->description;
        $this->image = $category->image;
        $this->parent_id = $category->parent_id;
        $this->meta_title = $category->meta_title;
        $this->meta_description = $category->meta_description;
        $this->meta_keywords = $category->meta_keywords;
        $this->status = $category->status;
        $categories = Category::all('id','name');
        return view('livewire.category.update-category',compact('category','categories'));
    }

}
