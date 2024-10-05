<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$title ?? ""}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    @if (request()->is('admin/categories/*'))
                    <li class="breadcrumb-item"><a href="{{route('dashboard.categories.index')}}">categories</a></li>
                    @endif
                    @if (request()->is('admin/products/*'))
                    <li class="breadcrumb-item"><a href="{{route('dashboard.products.index')}}">Products</a></li>
                    @endif
                    @if ($title)
                        <li class="breadcrumb-item active">{{$title ?? ""}}</li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->