@php
    $options = ["active" => "Published", "draft" => "UnPublished"];
@endphp
<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <x-dash.form.thumbnail value="{{$category->image_url ?? ''}}"/>
    <x-dash.form.select-status value="{{$category->status ?? ''}}" :options="$options"/>
</div>
<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Basic Info</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="mb-10 fv-row">
                <x-dash.form.input label="Name" name="name" value="{{$category->name ?? ''}}" placeholder="Enter Category Name" required/>
            </div>
            <div>
                <x-dash.form.text-quill name="description" value="{{$category->description ?? ''}}" label="Description" required/>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-light me-5">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>