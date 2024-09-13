
<!--begin::Status-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Status</h2>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
        </div>
        <!--begin::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Select2-->
        <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="status"
                wire:model="status" id="status">
            @foreach( $options as $val => $label)
                <option value="{{$val}}")>{{$label}}</option>
            @endforeach
        </select>
        <!--end::Select2-->
        <!--begin::Description-->
        {{--                    <div class="text-muted fs-7">Set the category status.</div>--}}
        <!--end::Description-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Status-->
