<x-dashboard.dashboard-layout>
    <x-slot:optional_header_styles>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('message'))
                    var sessionMessageModal = new bootstrap.Modal(document.getElementById('sessionMessageModal'));
                    sessionMessageModal.show();
                @endif
            });
        </script>
        <script>
            function confirmDeletion() {
                return confirm('Are you sure you want to remove this image?');
            }
        </script>
        <style>
            .image-container {
                position: relative;
                display: inline-block;
            }
            .category-image {
                display: block;
                max-width: 200px;
                height: auto;
            }
            .remove-image-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: red;
                color: white;
                border: none;
                padding: 5px 10px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 50%;
                opacity: 0.7;
            }
            .remove-image-btn:hover {
                opacity: 1;
            }
        </style>
    </x-slot:optional_header_styles>
    <x-dashboard.dashboard-breadcrumb title="{{'Categories'}}" />
    @include('components.dashboard.session-show')
    <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary my-2">Add New Category</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Slug</th>
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
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->Parent->name ?? 'None' }}</td>
                    <td>{{ !is_null($category->children) ? $category->children->count() : '0' }}</td>
                    <td>{{ $category->description ?? '' }}</td>
                    <td>
                        @if (!is_null($category->image))
                            <img src="{{ asset('storage/' . $category->image) }}" width="50">
                        @else
                            {{ 'No Image' }}
                        @endif
                    </td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->meta_title }}</td>
                    <td>{{ $category->meta_description }}</td>
                    <td>
                        @if (is_null($category->meta_values))
                            {{ 'No Keywords' }}
                        @else
                            @foreach ($category->meta_values as $value)
                                {{ $value }}<br>
                            @endforeach
                        @endif
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
        <div class="row">
            <div class="col-md-6">
                {{ $categories->links() }}
            </div>
            <div class="col-md-6">
                <P>Showing {{ $categories->lastItem() }} of {{ $categories->total() }}</P>
            </div>
        </div>
    @endif
</x-dashboard.dashboard-layout>
