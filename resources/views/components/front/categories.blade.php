<ul class="sub-category">
    @php
        $parents = $categories->filter(function($categories){
            return $categories->parent_id == null;
        });
    @endphp
    @forelse ($parents as $category )
    <li><a href="product-grids.html">{{ $category->name }} 
        @if ($category->children->count()>0)
        <i class="lni lni-chevron-right"></i></a>
        <ul class="inner-sub-category">
            @foreach ($category->children as $child)
            <li><a href="product-grids.html">{{ $child->name }}</a></li>
            @endforeach
        </ul>
        @else
        </a>
        @endif
    </li>
    @empty
        <p>No Categories</p>
    @endforelse
</ul>