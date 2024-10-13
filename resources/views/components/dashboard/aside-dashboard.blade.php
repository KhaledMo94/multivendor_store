<li class="nav-item menu-open">
    <a href="{{ route('dashboard')}}" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @foreach ($array as $key =>$value)
        <li class="nav-item">
            <a href="{{ $value['route_url'] }}" 
            @php
                $is_active = (request()->segment(2)==$key)
            @endphp
            @class(['active' => $is_active , 'nav-link'])>
                <i class="far fa-circle nav-icon"></i>
                <p>{{ $value['name'] }}</p>
            </a>
        </li>
        @endforeach
        {{-- <li class="nav-item">
            <a href="{{ route('dashboard.categories.index') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>
            </a>
        </li> --}}
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
        </p>
    </a>
</li>