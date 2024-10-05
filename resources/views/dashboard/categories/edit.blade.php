<x-dashboard.dashboard-layout optional_styles_and_scripts="tagify">
    <x-slot name='optional_header_styles'>
        <!-- Tagify CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.css" rel="stylesheet">
        <!-- Tagify JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.min.js"></script>
    </x-slot>

    <x-slot name='optional_footer_scripts'>
        <script>
            function fileUpload(e){
                if(e.target.files.length > 0){
                    const file = e.target.files[0]; // Get the uploaded file
                    const reader = new FileReader();
                    reader.onload = function(event){
                        $('#image-update').attr('src',event.target.result);
                        $('#image-update').show();
                        $('#removeButton').show();
                    }
                    reader.readAsDataURL(file);
                }
            }

            $(document).ready(function() {
            var input = document.querySelector('#meta_keywords');
            new Tagify(input);
            });
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
            enctype="multipart/form-data"
            >
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
                :value="$category->description"
                name="description"
                row="3"
                style="resize:none"
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
                <x-form.input 
                name="meta_title"
                :value="$category->meta_title"
                label="Meta Title" 
                id="metaTitle" 
                class="form-control" />
            </div>
            {{-- @dd($category->meta_keywords) --}}
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input 
                    type="text" 
                    id="meta_keywords" 
                    value="{{ $category->meta_keywords }}"
                    name="meta_keywords"
                    class="form-control" 
                    placeholder="Add your keywords"
                />
                @error('meta_keywords') <small class="text-danger">{{ $message }}</small> @enderror
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
    
            <div class="mb-3">
                <x-form.image-input
                label="Category Image"
                type="file"
                name="image"
                id="formFile"
                accept=".png, .jpg, .jpeg"
                onchange="fileUpload(event)"
                />
                @if (!is_null($category->image))
                <img 
                id="image-update" 
                src="{{ asset('storage/'.$category->image) }}" 
                class="rounded w-10 block"     
                class="my-1" 
                style="max-width: 300px;">
                @endif
                <button 
                onclick="$('#image-update').hide(); event.preventDefault() ;$('#formFile').val(''); $(this).hide()" 
                class="btn btn-danger p-2"
                id="removeButton"
                >Remove Image</button>
            </div>
    
            <div class="mb-3">
                <x-form.radio 
                name="status"
                :value="$category->status"
                wire:model='status'
                label="Choose Status:"
                :data="['active'=>'Active','inactive'=>'Inactive']"
                />
            </div>
    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
    
</x-dashboard.dashboard-layout>
