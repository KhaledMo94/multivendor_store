@props([
    'name',
    'label'                     =>$name,
    'data'                      =>[],
    'value'                     =>'',
])  
<label class="form-label">{{ $label }}</label>
@php
    $i=1;
    if(old($name)){
        $checked_value = old($name);
    }elseif ($value) {
        $checked_value = $value;
    }else{
        $checked_value = 'active';
    }
@endphp

@foreach ( $data as $val =>$lab )
    <div class="form-check">
        <input 
        class="form-check-input" 
        type="radio" 
        name="{{ $name }}"
        @checked($val === $checked_value)
        id="{{ "option".$i }}" 
        value="{{ $val }}" 
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