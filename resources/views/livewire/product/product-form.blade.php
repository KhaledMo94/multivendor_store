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
    <form wire:submit.prevent='createProduct' class="my-2" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <x-form.select 
            wire:model='store_id' 
            name="store_name" 
            label="Store Name" 
            :collection="$stores" />
        </div>

        <div class="mb-3">
            <x-form.input 
            wire:model='name' 
            name="name" 
            label="Product Name" 
            id="exampleInputEmail1"
            class="form-control" />
        </div>

        <div class="mb-3">
            <x-form.textarea 
            id="exampleFormControlTextarea1" 
            label="Description" 
            wire:model='description'
            name="description" 
            row="3" 
            style="resize:none" />
        </div>

        <div class="mb-3">
            <x-form.input 
            name="meta_title" 
            wire:model='meta_title' 
            label="Meta Title" 
            id="metaTitle"
            class="form-control" />
        </div>

        <div wire:ignore class="mb-3">
            <label for="meta_keywords" class="form-label">Meta Keywords</label>
            <input type="text" id="meta_keywords" wire:model="meta_keywords" class="form-control"
                placeholder="Add your keywords" x-data="" x-init="new Tagify($refs.input, {
                    whitelist: [],
                    enforceWhitelist: false,
                    dropdown: {
                        enabled: 0
                    }
                }).on('change', function(e) {
                    let tags = e.detail.tagify.value.map(tag => tag.value);
                    $dispatch('input', tags);
                })" x-ref="input"
                tabindex="-1" />
            @error('meta_keywords')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <x-form.textarea 
            id="MetaDescription" 
            label="Meta Description" 
            name="meta_description"
            wire:model='meta_description' 
            row="3" 
            style="resize:none" />
        </div>

        <div class="mb-3">
            <x-form.select 
                wire:model.defer='categories_ids'
                name="categories[]"
                label="Select Category"
                :collection="$categories"
                multiple
                class="form-select size 3"
                size="3"
                aria-label="multiple select example"
                />
        </div>

        <div class="mb-3">
            <x-form.image-input label="Product Image" type="file" wire:model='featured_image' name="featured_image"
                id="formFile" accept=".png, .jpg, .jpeg" />
            @if ($featured_image)
                <img src="{{ $featured_image->temporaryUrl() }}" class="rounded w-10 block" class="my-1"
                    style="max-width: 300px;">
            @endif
        </div>

        <div class="mb-3">
            <x-form.image-input label="Another Images" type="file" wire:model='product_images' multiple
                name="product_images" id="formFile" accept=".png, .jpg, .jpeg" />
            @if ($product_images)
                @foreach ($product_images as $image)
                    <img src="{{ $image->temporaryUrl() }}" class="rounded w-10 block m-1" style="max-width: 300px;">
                @endforeach
            @endif
        </div>

        <div class="row my-3">
            <div class="col-sm-6">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="typeNumber1">Price</label>
                    <input type="number" wire:model='price' id="typeNumber1" class="form-control" />
                </div>
            </div>
            <div class="col-sm-6">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="typeNumber2">After Discount</label>
                    <input type="number" wire:model='sale_price' id="typeNumber2" class="form-control" />
                </div>
            </div>
        </div>

        <input type="hidden" name="options">

        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </form>
</div>
