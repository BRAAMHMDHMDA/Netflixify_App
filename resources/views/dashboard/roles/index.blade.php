<x-dash-layout>
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Roles List</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Roles</li>
            </ul>
        </div>
    </x-slot:breadcrumb>
    <x-slot:actions>
        @can('role-create')
            <a href="{{ route('dashboard.roles.create') }}" class="btn btn-sm fw-bold btn-primary">
                <i class="ki-duotone ki-plus fs-2"></i>
                Add New Role
            </a>
        @endcan
    </x-slot:actions>
    <!--begin::Content container-->
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
           @foreach($roles as $role)
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title d-flex justify-content-between w-100">
                                <h2>{{$role->name}}</h2>
                                @can('role-delete')
                                    <button class="btn btn-icon btn-active-light-danger w-30px h-30px" onclick="deleteConfirm({{'del'.$role->id}})">
                                            <i class="ki-duotone ki-trash-square fs-2x">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                    <form action="{{ route('dashboard.roles.destroy', $role->id) }}" method="post" id="{{'del'.$role->id}}" hidden>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-1">
                            <!--begin::Users-->
                            <div class="fw-bold text-gray-600 mb-5">Total users with this role: {{$role->users_count}}</div>
                            <!--end::Users-->
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                @php
                                    $permissions = $role->permissions;
                                    if ($permissions->count() > 5) {
                                        $firstFivePermissions = $permissions->take(5);
                                        $remainingPermissionsCount = $permissions->count() - 5;
                                    } else {
                                        $firstFivePermissions = $permissions;
                                        $remainingPermissionsCount = 0;
                                    }
                                @endphp
                                @foreach($firstFivePermissions as $permission)
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{__("$permission->name")}}</div>
                                @endforeach
                                @if($remainingPermissionsCount != 0)
                                    <div class='d-flex align-items-center py-2'>
                                        <span class='bullet bg-primary me-3'></span>
                                        <em>and {{$remainingPermissionsCount}} more...</em>
                                    </div>
                                @endif
                            </div>
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            @can('role-show')
                                <a href="{{ route('dashboard.roles.show', $role->id) }}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                            @endcan
                            @can('role-edit')
                                <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-light btn-active-light-primary my-1">Edit Role</a>
                            @endcan
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
           @endforeach
        </div>
        <div class="m-8">
            {{$roles->links()}}
        </div>
    <!--end::Row-->
     <!--end::Content container-->
</x-dash-layout>