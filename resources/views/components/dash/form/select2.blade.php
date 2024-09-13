@props([
    'label',
    'name',
    'value' => '',
    'hint',
    'placeholder' => 'Select an Options',
    'options',
])

@if(isset($label))
    <label class="{{ $attributes->has('required') ? 'required' : '' }} form-label" for="{{$name}}">
        {{$label}}
    </label>
@endif

<select
    id="{{$name}}"
    name="{{$name}}"
    wire:model="{{$name}}"
{{--    data-control="select2"--}}
    data-placeholder="{{$placeholder}}"
{{--    data-allow-clear="true"--}}
    {{ $attributes->class([
                   'form-select form-select',
                   'is-invalid' => $errors->has($name)
                  ])
    }}
>
    @foreach($options as $option)
        <option value="{{ $option->id }}"
                wire:key="category-{{$option->id}}"
        >
            {{__("$option->name")}}
        </option>
    @endforeach


</select>

@if(isset($hint))
    <div class="text-muted fs-7">{{$hint}}</div>
@endif

@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
