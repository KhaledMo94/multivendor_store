<x-dashboard.dashboard-layout>
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
            @foreach ( $categories as $category )
            <tr>
                <th scope="row">{{$category->name}}</th>
                <td>{{$category->slug}}</td>
                <td>{{$category->Parent->name ?? 'None'}}</td>
                <td>{{!is_null($category->children) ? $category->children->count() : 'n'}}</td>
                <td>{{$category->description ?? ''}}</td>
                <td>{{$category->image ?? "No Image"}}</td>
                <td>{{$category->status}}</td>
                <td>{{$category->meta_title}}</td>
                <td>{{$category->meta_description}}</td>
                <td>{{$category->meta_keywords}}</td>
                <th scope="col">
                    <button type="button" class="btn btn-outline-info">Edit</button>
                </th>
                <th scope="col">
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard.dashboard-layout>
