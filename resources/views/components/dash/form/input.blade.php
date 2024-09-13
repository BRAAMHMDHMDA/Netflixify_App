@props([
    'label',
    'name' => '',
    'value' => '',
    'hint',
    'type' => 'text',
])

@if(isset($label))
<label class="{{ $attributes->has('required') ? 'required' : '' }} form-label" for="{{$name}}">
    {{$label}}
</label>
@endif

<input type="{{ $type }}"
       id="{{$name}}"
       name="{{$name}}"
       value="{{ old($name, $value) }}"
        {{ $attributes->class([
                       'form-control mb-2',
                       'is-invalid' => $errors->has($name)
                      ])
        }}
/>

@if(isset($hint))
    <div class="text-muted fs-7">{{$hint}}</div>
@endif

@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
