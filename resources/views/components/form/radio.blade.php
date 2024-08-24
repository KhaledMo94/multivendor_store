@props([
    'name',
    'label'                     =>$name,
    'data'                      =>[],
    'value'                     =>''
])  
<label class="form-label">{{ $label }}</label>
@php
    $i=1;
@endphp
@foreach ( $data as $val =>$lab )
    <div class="form-check">
        <input 
        class="form-check-input" 
        type="radio" 
        name="{{ $name }}" 
        id="{{ "option".$i }}" 
        value="{{ $val }}" 
        @checked(old($name)==$val || $val == $value )
        @if ($errors->has($name))
            {{ $attributes->merge(['class'  =>'is-invalid']) }}
        @endif>
        <label class="form-check-label" for="{{ "option".$i }}">
            {{ $lab }}
        </label>
    </div>
    @php
        $i++;
    @endphp
@endforeach
@if ($errors->has($name))
    @foreach ( $errors->get($name) as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif