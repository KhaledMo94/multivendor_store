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
            action="{{route('dashboard.categories.store')}}" 
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <x-form.input name="name" label="Category Name" id="exampleInputEmail1" class="form-control" />
            </div>

            <div class="mb-3">
                <x-form.textarea 
                id="exampleFormControlTextarea1" 
                label="Description" 
                name="description"
                row="3"
                style="resize:none"
                />
            </div>   
            <div class="mb-3">
                <x-form.select 
                label="Select Parent"
                name="parent_id"
                id="select-parent"
                :collection="$categories"
                />
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Category image</label>
                <input class="form-control" name="image" type="file" id="formFile" accept="image/*" onchange="previewImage(event)">
                <img id="imagePreview" class="my-1" style="max-width: 300px;">
            </div>

            <div class="mb-3">
                <label class="form-label">Choose Status:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="option1" value="active" checked>
                    <label class="form-check-label" for="option1">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="option2" value="inactive">
                    <label class="form-check-label" for="option2">
                        Inactive
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" id="meta_title" >
            </div>

            <div class="mb-3">
                <label for="metaKeywords" class="form-label">Meta Keywords</label>
                <input name="meta_keywords" id="metaKeywords" class="form-control" placeholder="Add keywords">
            </div>

            <div class="mb-3">
                <label for="MetaDescription" class="form-label">Meta Description</label>
                <textarea class="form-control" id="MetaDescription" name="meta_description" rows="3"></textarea>
            </div> 

            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
    </div>
    
</x-dashboard.dashboard-layout>
