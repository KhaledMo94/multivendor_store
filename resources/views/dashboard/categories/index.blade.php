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
    </x-slot:optional_header_styles>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
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
            @foreach ($categories as $category)
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
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard.dashboard-layout>
