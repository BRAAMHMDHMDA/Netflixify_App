<x-dash-layout title="Create Category">
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit
                Category</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Edit {{$category->name}} Category</li>
            </ul>
        </div>
    </x-slot:breadcrumb>


    <form id="category_form" class="form d-flex flex-column flex-lg-row"
          action="{{route('dashboard.categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('dashboard.categories._form')
    </form>

</x-dash-layout>