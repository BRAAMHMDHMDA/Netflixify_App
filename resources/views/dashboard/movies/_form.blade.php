<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    @php
        $options = ["active" => "Published", "draft" => "UnPublished"];
    @endphp
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>Basic Info</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="mb-10 row">
                <div class="col">
                    <x-dash.form.input label="Name" name="name" value="{{$movie->name ?? ''}}" placeholder="Enter Movie Name" required/>
                </div>
                <div class="col">
                    <x-dash.form.input type="number" label="Year" name="year" value="{{$movie->year ?? ''}}" placeholder="Enter Movie Year" required/>
                </div>
            </div>
            <div class="mb-10 row">
                <div class="col">
                    <x-dash.form.input type="number" label="Rating" name="rating" value="{{$movie->rating ?? ''}}" placeholder="Enter Movie Rating" required/>
                </div>
                <div class="col">
                    <x-dash.form.input type="number" label="Percent" name="percent" value="{{$movie->percent ?? ''}}" placeholder="Enter Percent" required/>
                </div>
            </div>
            <div class="mb-10">
                <label class="form-label mb-5 required" for="poster">
                    Poster
                </label>
                <div class="text-center pt-0" id="poster">
                    <!--begin::Image input-->
                    <!--begin::Image input placeholder-->
                    <style>
                        .image-input-placeholder { background-image: url({{  asset('assets/media/svg/files/blank-image.svg') }});background-size: contain;background-position: center }
                        [data-bs-theme="dark"] .image-input-placeholder { background-image: url({{ asset('assets/media/svg/files/blank-image-dark.svg') }}); }
                    </style>
                    <!--end::Image input placeholder-->
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3 w-100" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-100 h-250px"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                            <!--end::Icon-->
                            <!--begin::Inputs-->
                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                            {{--                            <input type="hidden" name="avatar_remove" />--}}
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="ki-duotone ki-cross fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    {{--                    <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>--}}
                    <!--end::Description-->
                </div>
            </div>
            <div>
                <x-dash.form.text-quill name="description" value="{{$movie->description ?? ''}}" label="Description" required/>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('dashboard.movies.index') }}" class="btn btn-light me-5">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>
<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 ms-lg-10">
    <x-dash.form.thumbnail value="{{$image?->temporaryUrl() ?? ''}}" title="Image" wire:model="image"/>
    <x-dash.form.select-status :options="$options"/>
</div>
