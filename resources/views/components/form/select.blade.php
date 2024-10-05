@props([
    'name',
    'value'             =>"",
    'selected'          =>"",
    'id'                =>'id'.rand(0,10000),
    'label'             =>$name,
    'collection'        =>[]
])
<label for="{{ $id }}" class="form-label">{{ $label }}</label>
<select 
    class="form-select" 
    name="{{ $name }}" 
    id="{{ $id }}"
    @if ($errors->has($name))
        {{ $attributes->merge(['class' =>'is-invalid']) }}
    @endif
    {{ $attributes }}
    >
    <option @selected($selected === Null ) value="">{{ $label }}</option>
    @foreach ($collection as $key=>$value)
        <option 
        value="{{$value['id']}}"
        @selected((old($name) == $value['id']) || ($selected == $value['id']))
        >{{$value['name']}}</option>
    @endforeach
</select>