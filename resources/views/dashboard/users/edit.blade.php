<x-dash-layout title="Create User">
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Edit User
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Edit {{$user->name}} User</li>
            </ul>
        </div>
    </x-slot:breadcrumb>

     <form id="admin_form" class="form d-flex flex-column flex-lg-row"
          action="{{route('dashboard.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('dashboard.users._form')
    </form>

</x-dash-layout>
