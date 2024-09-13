@props([
    'name' => 'image',
    'old' => '',
])

 <!--begin::Image input-->
<!--begin::Image input placeholder-->
<style>
    .image-input-placeholder { background-image: url({{ asset('assets/media/svg/files/blank-image.svg') }}); }
    [data-bs-theme="dark"] .image-input-placeholder { background-image: url({{ asset('assets/media/svg/files/blank-image-dark.svg') }}); }
</style>
<!--end::Image input placeholder-->
<!--begin::Image input-->
<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" id="{{$name}}">
    <!--begin::Preview existing avatar-->
    <div class="image-input-wrapper w-150px h-150px" @if($old !== '') style="background-image: url({{$old}})" @endif ></div>
    <!--end::Preview existing avatar-->
    <!--begin::Label-->
    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
        <!--begin::Icon-->
        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
        <!--end::Icon-->
        <!--begin::Inputs-->
        <input type="file" name="{{$name}}" id="{{$name}}" accept=".png, .jpg, .jpeg" />
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