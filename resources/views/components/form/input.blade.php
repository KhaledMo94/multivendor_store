@props([
    'type'              =>'text',
    'name',
    'label'             =>$name,
    'value'             =>"",
    'id'                =>'id'.rand(0,10000)
    ])

<label for="{{$id}}" class="form-label">{{$label}}</label>
<input type="{{$type}}" 
    name="{{$name}}"
    value="{{(old($name) ?? $value) ?? ''}}"
    @if ($errors->has($name))
    {{$attributes->merge(['class' => 'is-invalid'])}}
    @endif
    {{$attributes}} />
@if ($errors->has($name))
    @foreach ( $errors->get($name) as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
