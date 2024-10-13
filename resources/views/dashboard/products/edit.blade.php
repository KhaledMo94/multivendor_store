<x-dashboard.dashboard-layout optional_styles_and_scripts="tagify">
    <x-slot name='optional_header_styles'>
        <!-- Tagify CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.css" rel="stylesheet">
        <!-- Tagify JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.min.js"></script>
    </x-slot>
    <x-slot name='optional_footer_scripts'>
        <script>
            $(document).ready(function() {
                var input = document.querySelector('#meta_keywords');
                new Tagify(input);
                });
        </script>
    </x-slot>

    <x-dashboard.dashboard-breadcrumb title="Edit {{ $product->name }} Product" />

        <div class="container">
            @if (session()->has('success'))
                <div class="container bg-success text-center p-3">
                    {{ session('success') }}
                </div>
            @endif
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
                action="{{ route('dashboard.products.update' , $product->id) }}" 
                class="my-2" 
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <x-form.input 
                    name="name" 
                    :value="$product->name"
                    label="Product Name" 
                    id="exampleInputEmail1"
                    class="form-control" />
                </div>
                
                <div class="mb-3">
                    <x-form.select 
                    name="store_id"
                    selected={{ $product->store_id }}
                    collection="{{ $stores }}"
                    label="Select A Store"
                    />
                </div>
                
                <div class="mb-3">
                    <x-form.select 
                        name="store_id"
                        label="Select A Store"
                        :collection="$stores"
                        :selected="$product->store_id"
                        />
                </div>

                <div class="mb-3">
                    <x-form.textarea 
                    id="exampleFormControlTextarea1" 
                    label="Description" 
                    :value="$product->description"
                    name="description" 
                    row="3" 
                    style="resize:none" />
                </div>
        
                <div class="mb-3">
                    <x-form.input 
                    name="meta_title" 
                    :value="$product->meta_title"
                    label="Meta Title" 
                    id="metaTitle"
                    class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input 
                    type="text" 
                    id="meta_keywords" 
                    value="{{ $product->meta_keywords }}"
                    name="meta_keywords"
                    class="form-control" 
                    placeholder="Add your keywords"
                />
                    @error('meta_keywords') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
                
                <div class="mb-3">
                    <x-form.textarea 
                    id="MetaDescription" 
                    label="Meta Description" 
                    :value="$product->meta_description"
                    name="meta_description"
                    row="3" 
                    style="resize:none" />
                </div>
        
                <div class="mb-3">
                    <label for="product-keywords" class="form-label">Select Categories</label>
                    <select 
                        class="form-select" 
                        name="categories[]" 
                        id="product-keywords"                            
                        class="form-select size 3"
                        size="3"
                        aria-label="multiple select example"
                        multiple >
                        <option value="">Select Categories</option>
                        @foreach ($categories as $category)
                            <option 
                            value="{{ $category->id }}"
                            @selected($product->categories->contains($category->id))
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>

                <div class="mb-3">
                    <x-form.image-input label="Product Image" type="file" name="featured_image"
                        id="formFile" accept=".png, .jpg, .jpeg" onchange="fileUpload(event)" />
                    @if ($product->featured_image)
                    <img 
                    id="image-update" 
                    src="{{ asset('storage/'.$product->featured_image) }}" 
                    class="rounded w-10 block"     
                    class="my-1" 
                    style="max-width: 300px;">
                    @endif
                    <button 
                    onclick="$('#image-update').hide(); event.preventDefault(); $(this).hide(); 
                    $('<input>').attr({type: 'hidden', name: 'remove', value: '1'}).insertAfter($(this));"
                    class="btn btn-danger p-2"
                    id="removeButton"
                    >Remove Image
                </button>
                
                </div>
        
                <div class="mb-3">
                    <x-form.image-input label="Another Images" type="file" multiple
                        name="product_images" id="formFile" accept=".png, .jpg, .jpeg" />
                    @if ($product->product_images)
                        @foreach (json_decode($product->product_images) as $image)
                            <img src="{{ asset('storage/'.$image) }}" class="rounded w-10 block m-1" style="max-width: 300px;">
                        @endforeach
                    @endif
                </div>
        
                <div class="row my-3">
                    <div class="col-sm-6">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="typeNumber1">Price</label>
                            <input 
                            type="number" 
                            step="0.01"
                            name="price"
                            value="{{ old($product->price) ?? $product->price }}" 
                            id="typeNumber1" 
                            class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="typeNumber2">After Discount</label>
                            <input 
                            type="number" 
                            step="0.01"
                            value="{{ old($product->sale_price) ?? $product->sale_price }}" 
                            id="typeNumber2" 
                            name="sale_price"
                            class="form-control" />
                        </div>
                    </div>
                </div>
        
                <input type="hidden" name="options">
        
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </form>
        </div>

</x-dashboard.dashboard-layout>