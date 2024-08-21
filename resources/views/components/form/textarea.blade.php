@props([
    'name',
    'value'                 =>"",
    'id'                =>'id'.rand(0,10000),
    'label'             =>$name
])

<label for="{{$id}}" class="form-label">{{$label}}</label>
<textarea
    class="form-control"
    name="{{$name}}"
    id="{{$id}}"
    @if ($errors->has($name))
        {{$attributes->merge(['class'   =>'is-invalid'])}}
    @endif
    {{$attributes}}
    >{{old($name) ?? $value}}
</textarea>
@forelse ( $errors->get($name) as $error)
    <p class="text-danger">{{ $error }}</p>
@empty
@endforelse