<x-dash-layout title="Home Page">
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Home</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </x-slot:breadcrumb>

    {{-- Start Latest Published Movies --}}
    <div class="row my-3">
        <h1>Latest Published Movies</h1>
        <div class="row gy-2 gx-5 gx-xl-6 mb-5 mb-xl-10">

        @foreach($latest_movies as $movie)
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Engage widget 6-->
                <div class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                     style="background-color:#020202;background-image:url('{{$movie->image_url}}');">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column ps-xl-10">
                        <!--begin::Heading-->
                        <div class="mb-6 pt-xl-2">
                            <!--begin::Title-->
                            <h3 class="fw-bold text-white fs-3x mb-5 ms-n1">{{$movie->name}}</h3>
                            <!--end::Title-->

                            <!--begin::Description-->
                            <span class="fw-bold text-white fs-4 mb-8 d-block lh-0">{{$movie->category->name}}</span>
                            <!--end::Description-->

                            <!--begin::Items-->
                            <div class="d-flex align-items-center">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center me-6">
                                    <!--begin::Icon-->
                                    <a href="#" class="me-2">
                                        <i class="bi bi-play-fill text-primary fs-2"></i>
                                    </a>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <span class="fw-semibold text-white fs-5">{{$movie->views}} plays</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <a href="#" class="me-2">
                                        <i class="bi bi-heart text-primary fs-2 text-danger"></i>
                                    </a>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <span class="fw-semibold text-white fs-5">{{$movie->users()->count()}}</span>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Action-->
                        <div class="mb-3">
                            <a href="{{route('movies.show', $movie->slug)}}"
                               class="btn btn-sm btn-primary fw-semibold me-2"
                               target="_blank"
                            >
                                Show Now
                            </a>

{{--                            <a href="/metronic8/demo1/apps/support-center/overview.html" class="btn btn-sm btn-color-white bg-transparent btn-outline fw-semibold" style="border: 1px solid rgba(255, 255, 255, 0.3)">--}}
{{--                                Save for Later--}}
{{--                            </a>--}}
                        </div>
                        <!--begin::Action-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 6-->

            </div>
            <!--end::Col-->
        @endforeach

    </div>
    </div>
    {{-- End Latest Published Movies --}}


    {{-- Start Most Fav Movies --}}
    <div class="row mb-5">
        <h1>Top Favorite Movies</h1>
        <div class="row gy-2 mb-5 mb-xl-10">

            @foreach($topFav_Movies as $movie)
                <!--begin::Col-->
                <div class="col-xl-3">
                    <!--begin::Engage widget 6-->
                    <div class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100 position-relative overflow-hidden">
                        <div style="
                        background-color:#020202;background-image:url('{{$movie->image_url}}');
                        filter: blur(3px);
                        background-size: contain;
                        background-position: center;
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        "></div>
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between flex-column ps-xl-10 position-relative">
                            <!--begin::Heading-->
                            <div class="mb-5 pt-xl-3">
                                <!--begin::Title-->
                                <h3 class="fw-bold text-white fs-3x mb-5 ms-n1">{{$movie->name}}</h3>
                                <!--end::Title-->

                                <!--begin::Description-->
                                <span class="fw-bold text-white fs-4 mb-8 d-block lh-0">{{$movie->category->name}}</span>
                                <!--end::Description-->

                                <!--begin::Items-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center me-6">
                                        <!--begin::Icon-->
                                        <a href="#" class="me-2">
                                            <i class="bi bi-play-fill text-primary fs-2"></i>
                                        </a>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <span class="fw-semibold text-white fs-4">{{$movie->views}} plays</span>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <a href="#" class="me-2">
                                            <i class="bi bi-heart text-primary fs-2 text-danger"></i>
                                        </a>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <span class="fw-semibold text-white fs-4">{{$movie->users()->count()}}</span>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Action-->
                            <div class="mb-3 w-100">
                                <a href="{{route('movies.show', $movie->slug)}}"
                                   class="btn btn-sm btn-secondary fw-semibold"
                                   target="_blank"
                                >
                                    Show Now
                                </a>

                            </div>
                            <!--begin::Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 6-->

                </div>
                <!--end::Col-->
            @endforeach

        </div>
    </div>
    {{-- End Most Fav Movies --}}

    {{-- Start Most Plays Movies --}}
    <div class="row mb-5">
        <h1>Top Plays Movies</h1>
        <div class="row gy-2 mb-5 mb-xl-10">

            @foreach($topPlays_Movies as $movie)
                <!--begin::Col-->
                <div class="col-xl-3">
                    <!--begin::Engage widget 6-->
                    <div class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100 position-relative overflow-hidden">
                        <div style="
                        background-color:#020202;background-image:url('{{$movie->image_url}}');
                        filter: blur(3px);
                        background-size: contain;
                        background-position: center;
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        "></div>
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between flex-column ps-xl-10 position-relative">
                            <!--begin::Heading-->
                            <div class="mb-5 pt-xl-3">
                                <!--begin::Title-->
                                <h3 class="fw-bold text-white fs-3x mb-5 ms-n1">{{$movie->name}}</h3>
                                <!--end::Title-->

                                <!--begin::Description-->
                                <span class="fw-bold text-white fs-4 mb-8 d-block lh-0">{{$movie->category->name}}</span>
                                <!--end::Description-->

                                <!--begin::Items-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center me-6">
                                        <!--begin::Icon-->
                                        <a href="#" class="me-2">
                                            <i class="bi bi-play-fill text-primary fs-2"></i>
                                        </a>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <span class="fw-semibold text-white fs-4">{{$movie->views}} plays</span>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <a href="#" class="me-2">
                                            <i class="bi bi-heart text-primary fs-2 text-danger"></i>
                                        </a>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <span class="fw-semibold text-white fs-4">{{$movie->users()->count()}}</span>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Action-->
                            <div class="mb-3 w-100">
                                <a href="{{route('movies.show', $movie->slug)}}"
                                   class="btn btn-sm btn-secondary fw-semibold"
                                   target="_blank"
                                >
                                    Show Now
                                </a>

                            </div>
                            <!--begin::Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 6-->

                </div>
                <!--end::Col-->
            @endforeach

        </div>
    </div>
    {{-- End Most Plays Movies --}}

</x-dash-layout>
