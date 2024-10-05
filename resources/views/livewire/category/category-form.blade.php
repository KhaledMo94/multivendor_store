<div class="container">
    @if (session()->has('key'))
    <div class="container bg-success text-center p-3">
        {{ session('key') }}
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
        class="my-2" 
        action="{{route('dashboard.categories.store')}}" 
        enctype="multipart/form-data"
        wire:submit.prevent='createCategory'
        >
        @csrf
        <div class="mb-3">
            <x-form.input wire:model='name' name="name" label="Category Name" id="exampleInputEmail1" class="form-control" />
        </div>

        <div class="mb-3">
            <x-form.textarea 
            id="exampleFormControlTextarea1" 
            label="Description" 
            wire:model='description'
            name="description"
            row="3"
            style="resize:none"
            />
        </div>   
        <div class="mb-3">
            <x-form.select 
            label="Select Parent"
            wire:model='parent_id'
            name="parent_id"
            id="select-parent"
            :collection="$categories"
            />
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
            <input 
                type="text" id="meta_keywords" wire:model="meta_keywords" class="form-control" placeholder="Add your keywords"
                x-data=""
                x-init="
                    new Tagify($refs.input, {
                        whitelist: [],
                        enforceWhitelist: false,
                        dropdown: {
                            enabled: 0
                        }
                    }).on('change', function(e) {
                        let tags = e.detail.tagify.value.map(tag => tag.value); // Extract only the 'value'
                        $dispatch('input', tags);  // Dispatch the array of values to Livewire
                    })
                "
                x-ref="input"
                tabindex="-1"
            />
            @error('meta_keywords') <small class="text-danger">{{ $message }}</small> @enderror
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
            <x-form.image-input
            label="Category Image"
            type="file"
            wire:model='image'
            name="image"
            id="formFile"
            accept=".png, .jpg, .jpeg"
            />
            @if ($image)
            <img src="{{ $image->temporaryUrl() }}" 
            class="rounded w-10 block"     
            class="my-1" 
            style="max-width: 300px;">
            @endif
        </div>

        <div class="mb-3">
            <x-form.radio 
            name="status"
            wire:model='status'
            label="Choose Status:"
            :data="['active'=>'Active','inactive'=>'Inactive']"
            />
        </div>

        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </form>
</div>
