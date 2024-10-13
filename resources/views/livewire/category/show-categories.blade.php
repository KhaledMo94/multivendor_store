@use('App\Helpers\ImagesHelpers')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Parent</th>
                <th scope="col">children count</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Meta Title</th>
                <th scope="col">Meta Description</th>
                <th scope="col">Keywords</th>
                <th scope="col">
                    Edit
                </th>
                <th scope="col">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->name }}</th>
                    <td>{{ $category->parent->name ?? 'None' }}</td>
                    <td>{{ !is_null($category->children) ? $category->children->count() : '0' }}</td>
                    <td>{{ $category->description ?? '' }}</td>
                    <td>
                        @if(!is_null($category->image))
                            <img width="50" src="{{ ImagesHelpers::imageView($category->image,'storage') }}">
                        @else
                            <p>No Image</p>
                        @endif
                    </td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->meta_title }}</td>
                    <td>{{ $category->meta_description }}</td>
                    <td>
                        <ul>
                            @if (! is_null($category->meta_keywords))
                            @forelse ( json_decode($category->meta_keywords , true) as $keyword)
                                <li>{{ $keyword }}</li>
                            @empty
                                <p>No Keywords</p>
                            @endforelse
                            @else
                            <p>No keywords</p>
                            @endif
                        </ul>
                    </td>
                    <th scope="col">
                        <a type="button" href="{{ route('dashboard.categories.edit', $category->id) }}"
                            class="btn btn-outline-info">Edit</a>
                    </th>
                    <th scope="col">
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirmDeletion()">Delete</button>
                        </form>
                    </th>
                </tr>
            @empty
            <p class="font-weight-bolder">
                Still No Categories Created
                <a href="{{ route('dashboard.categories.create') }}">Create Now</a>
            </p>
            @endforelse
        </tbody>
    </table>
    @if ($categories->hasPages())
        <div class="row d-flex justify-content-space-between">
            {{ $categories->links() }}
        </div>
    @endif
</div>
