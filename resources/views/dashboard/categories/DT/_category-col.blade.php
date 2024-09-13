<!--begin:: Avatar -->
<div class="d-flex">
    <div class="symbol symbol-50px overflow-hidden me-3">
        <a href="">
            @if($category->image_url)
                <div class="symbol-label">
                    <img src="{{ $category->image_url }}" class="w-100"/>
                </div>
            @else
                <div class="symbol-label fs-3">
                    {{ $category->name }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->
    <!--begin::User details-->
    <div class="d-flex flex-column" >
        <a href="" class="text-gray-800 text-hover-primary mb-1">
            {{ $category->name }}
        </a>
        <span style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis;max-width: 350px; font-size: small">{!! $category->description !!} </span>
    </div>
    <!--begin::User details-->
</div>