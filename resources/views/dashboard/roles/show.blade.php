<x-dash-layout>
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">"{{$role->name}}" Role</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Roles</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Role Details</li>
            </ul>
        </div>
    </x-slot:breadcrumb>
    <x-slot:actions>
        @can('role-edit')
            <button type="button" class="btn btn-light btn-primary">Edit Role</button>
        @endcan
    </x-slot:actions>
    <!--begin::Content container-->
    <div>
        <!--begin::Layout-->
        <div class="">
            <!--begin::Sidebar-->
            <div class="flex-row flex-lg-row-auto  mb-10">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header mt-2">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h1 class="mb-0">{{$role->name}}</h1>
                            @if($role->name == config('permission.super_role_admin'))
                                <sup class="badge badge-success m-2 fs-9 fw-bold">Full Control</sup>
                            @endif
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Permissions-->
                        <div class="d-flex flex-column h-150px text-gray-600 flex-wrap">

                            @foreach($role->permissions as $permission)
                                <div class="d-flex align-items-center py-2 me-8">
                                    <span class="bullet bg-primary me-3"></span>
                                    {{__("$permission->name")}}
                                </div>
                            @endforeach

                            <div class="d-flex align-items-center py-2 d-none">
                                <span class='bullet bg-primary me-3'></span>
                                <em>and 3 more...</em>
                            </div>
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer pt-0">
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="">
                <!--begin::Card-->
                <div class="card card-flush">
                    <div class="card-header mt-2">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h4 class="mb-0">
                                Admins Assigned
                                <span class="text-gray-600 fs-6 ms-1">({{$role->users_count}})</span>
                            </h4>
                        </div>
                    </div>
                    @if($role->users_count != 0)
                        @include('dashboard.admins.DT._table', ['DT_route' => route('dashboard.roles.show',$role->id)])
                    @endif
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Content container-->
</x-dash-layout>