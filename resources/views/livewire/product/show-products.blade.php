<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Meta Title</th>
                <th scope="col">Meta Description</th>
                <th scope="col">Categories</th>
                <th scope="col">Keywords</th>
                <th scope="col">Price</th>
                <th scope="col">SKU</th>
                <th scope="col">Availble</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <th scope="row">{{ $product->name }}</th>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if (!is_null($product->featured_image))
                            <img src="{{ asset('storage/' . $product->featured_image) }}" width="50">
                        @else
                            {{ 'No Image' }}
                        @endif
                    </td>
                    <td>{{ $product->meta_title }}</td>
                    <td>{{ $product->meta_description }}</td>
                    <td>
                        <ul>
                            @foreach ( $product->categories as $category )
                            <li>
                                {{ $category->name}}
                            </li>
                            @endforeach 
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (!is_null($product->meta_keywords))
                                @foreach ( json_decode($product->meta_keywords , true) as $keyword )
                                <li>{{ $keyword }}</li>
                                @endforeach 
                            @else
                                <p>No Keyword</p>
                            @endif
                        </ul>
                    </td>
                    <td>
                        <span style="text-decoration: line-through; color: red;">{{ $product->price }}</span>
                        <span class="mx-1">{{ $product->sale_price }}</span>
                    </td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->stock }}</td>
                    <th scope="col">
                        <a type="button" href="{{ route('dashboard.products.edit', $product->id) }}"
                            class="btn btn-outline-info">Edit</a>
                    </th>
                    <th scope="col">
                        <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-outline-danger" onclick="return confirmDeletion()">Delete</button>
                    </th>
                </tr>
            @empty
            <p class="font-weight-bolder">
                No products for your store
            </p>
            @endforelse
        </tbody>
    </table>
    @if($products->hasPages())
    <div class="row d-flex">
        {{ $products->links() }}
    </div>
    @endif
</div>

