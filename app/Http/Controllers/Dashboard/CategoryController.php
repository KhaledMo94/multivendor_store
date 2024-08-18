<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dashboard\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\NamingUploadedImages;
use Illuminate\Support\Facades\Request as FacadesRequest;
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
        $categories = Category::get();
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
        Category::create([
            'name'                          =>$request->name,
            'slug'                          =>Str::slug($request->name),
            'description'                   =>$request->description,
            'parent_id'                     =>$request->parent_id,
            'image'                         =>$uploaded_path,
            'status'                        =>$request->status,
            'meta_title'                    =>$request->meta_title,
            'meta_description'              =>$request->meta_description,
            'meta_keywords'                 =>stripslashes($request->meta_keywords),
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
