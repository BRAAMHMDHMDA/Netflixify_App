<!--begin:: Avatar -->
<div class="d-flex">
    <div class="symbol symbol-60px symbol-circle overflow-hidden me-3">
        <a href="">
            @if($admin->image_url)
                <div class="symbol-label">
                    <img src="{{ $admin->image_url }}" class="w-100"/>
                </div>
            @else
                <div class="symbol-label fs-3">
                    {{ $admin->name }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->
    <!--begin::User details-->
    <div class="d-flex flex-column" >
        <a href="" class="text-gray-800 text-hover-primary mb-1">
            {{ $admin->name }}
        </a>
        <span style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis;max-width: 350px; font-size: small">{!! $admin->email !!} </span>
    </div>
    <!--begin::User details-->
</div>