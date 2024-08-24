<x-dashboard.dashboard-layout optional_styles_and_scripts="tagify">
    <x-slot name='optional_header_styles'>
        <!-- Tagify CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.css" rel="stylesheet">
        <!-- Tagify JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.min.js"></script>
    </x-slot>
    <x-slot name='optional_footer_scripts'>
        <script>
            var input = document.querySelector('input[name=meta_keywords]');
            var tagify = new Tagify(input);

            function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    </x-slot>

    <x-dashboard.dashboard-breadcrumb :title="'Create New Category'" />

    <div class="container">
        @if ($errors->any())
            <p class="text-danger">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </p>
        @endif
        <form method="POST" 
            class="my-2" 
            action="{{route('dashboard.categories.update',$category->id)}}" 
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <x-form.input 
                name="name" 
                :value="$category->name" 
                label="Category Name" 
                id="exampleInputEmail1" 
                class="form-control" />
            </div>

            <div class="mb-3">
                <x-form.textarea 
                id="exampleFormControlTextarea1" 
                label="Description" 
                name="description"
                row="3"
                style="resize:none"
                :value="$category->description"
                />
            </div>   
            <div class="mb-3">
                <x-form.select 
                label="Select Parent"
                name="parent_id"
                :selected="$category->parent_id"
                id="select-parent"
                :collection="$categories"
                />
            </div>

            <div class="mb-3">
                <x-form.image-input
                label="Category Image"
                type="file"
                name="image"
                id="formFile"
                accept=".png, .jpg, .jpeg"
                onchange="previewImage(event)"
                :value="$category->image"
                />
            </div>

            <div class="mb-3">
                <x-form.radio 
                name="status"
                :value="$category->status"
                label="Choose Status:"
                :data="['active'=>'Active','inactive'=>'Inactive']"
                />
            </div>

            <div class="mb-3">
                <x-form.input 
                name="meta_title" 
                label="Meta Title" 
                id="metaTitle"
                :value="$category->meta_title"
                class="form-control" />
            </div>

            <div class="mb-3">
                <x-form.input 
                name="meta_keywords" 
                label="Meta Keywords"
                :value="$category->meta_keywords"
                id="metaKeywords" 
                class="form-control"
                placeholder="Add Keywords"/>
            </div>

            <div class="mb-3">
                <x-form.textarea 
                id="MetaDescription" 
                label="Meta Description" 
                name="meta_description"
                row="3"
                :value="$category->meta_description"
                style="resize:none" />
            </div> 

            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
    
</x-dashboard.dashboard-layout>
