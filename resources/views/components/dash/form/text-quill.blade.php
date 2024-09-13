@props([
    'label',
    'name' => '',
    'value' => '',
    'hint',
])

@if(isset($label))
    <label class="form-label {{ $attributes->has('required') ? 'required' : '' }}" for="{{ $name }}">{{$label}}</label>
@endif

<div id="{{ $name }}" class="min-h-200px mb-2 is-invalid">{!! old($name, htmlspecialchars_decode($value)) !!}</div>
<input type="hidden" name="{{ $name }}" id="editorContent{{ $name }}">

@if(isset($hint))
    <div class="text-muted fs-7">{{$hint}}</div>
@endif

@error($name)
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

@push('scripts')
    <script>
        var editorContent = document.querySelector('#editorContent{{ $name }}');

        var quill = new Quill('#{{ $name }}', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    // ['image', 'code-block']
                ]
            },
            placeholder: 'Type Your Text here...',
            theme: 'snow' // or 'bubble'
        });
        editorContent.value = quill.root.innerHTML;
        quill.on('text-change', function() {
            editorContent.value = quill.root.innerHTML;
        });

    </script>
@endpush
