<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\NamingUploadedImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use NamingUploadedImages;
    public function index()
    {
        $categories = Category::paginate(3);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all('name', 'id');
        $optional_styles_and_scripts = 'tagify';
        return view('dashboard.categories.create',compact('categories','optional_styles_and_scripts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::ValidateCategory($request);
        if($request->hasFile('image')){
            $uploaded_img = $request->file('image');
            $uploaded_path = $uploaded_img->storeAs('categories',
            NamingUploadedImages::AccordingToModel($request->name ?? "").".".$uploaded_img->getClientOriginalExtension());
        }
        $category = Category::create([
            'name'                          =>$request->name,
            'slug'                          =>Str::slug($request->name),
            'description'                   =>$request->description,
            'parent_id'                     =>$request->parent_id,
            'image'                         =>$uploaded_path ?? Null,
            'status'                        =>$request->status,
            'meta_title'                    =>$request->meta_title,
            'meta_description'              =>$request->meta_description,
            'meta_keywords'                 =>$request->meta_keywords,
        ]);
        
        return redirect()->route('dashboard.categories.index')
                ->with('success',"$category->name Category Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('dashboard.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        Category::ValidateCategory($request,$category->id);
        $old_path = $category->image;
        if(!$request->hasFile('image')){
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
        return redirect()->route('dashboard.categories.index')
        ->with('success',$request->name." category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $old_path = $category->image;
        $category->delete();
        !is_null($old_path) ? Storage::delete($old_path) : null ;
        return redirect()->route('dashboard.categories.index')
        ->with('danger',"$category->name deleted successfully");
    }
}
