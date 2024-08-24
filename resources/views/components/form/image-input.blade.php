@props([
    'name',
    'label'             =>$name,
    'type'              =>'file',
    'id'                =>'id'.rand(0,10000),
    'accept'            =>'image/*',
    'value'             =>'',
])

<label for="{{ $id }}" class="form-label">{{ $label }}</label>
<input 
    class="form-control" 
    name="{{ $name }}" 
    type="{{ $type }}" 
    id="{{ $id }}" 
    accept="{{ $accept }}"
    @if($errors->has($name))
        {{ $attributes->merge([ 'class' =>'is-invalid' ])}}
    @endif
    {{$attributes}} 
    >
<img 
    id="imagePreview"
    @empty($value)
    @else
    src="{{ asset('storage/'.$value) }}"
    @endempty
    class="my-1" 
    style="max-width: 300px;"
    >

    @if ($errors->has($name))
        @foreach ( $errors->get($name) as $error)
            <p class="text-danger">{{$error}}</p>
        @endforeach
    @endif
