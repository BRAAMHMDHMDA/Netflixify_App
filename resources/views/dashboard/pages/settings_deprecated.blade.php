<x-dash-layout title="index">
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$page_title}}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Settings</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </x-slot:breadcrumb>
    <x-slot:actions>
{{--        <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>--}}
{{--        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a>--}}
    </x-slot:actions>

    <div class="row g-4">
        <!-- Navigation -->
        <div class="col-12 col-lg-4">
            <div class="d-flex justify-content-between flex-column mb-3 mb-md-0">
                <ul class="nav nav-align-left nav-pills flex-column">
                    @foreach($menu as $nameOfGroup => $dataMenu)
                        <li class="nav-item mb-1">
                            <a class="nav-link py-2 @if($group == $nameOfGroup) active @endif" href="{{ route('dashboard.settings.index', ['group' => $nameOfGroup])}}">
                                {!! $dataMenu['icon'] !!}
                                <span class="align-middle">{{$dataMenu['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /Navigation -->

        <!-- Options -->
        <div class="col-12 col-lg-8 pt-4 pt-lg-0">
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="store_details" role="tabpanel">
                    <form action="{{ route('dashboard.settings.update',['group' => $group] ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title m-0">{{$page_title}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3 g-3">
                                    @foreach($settings as $name => $setting)
                                        @if($setting['type'] == 'select')
                                            <div class="mb-3">
                                                <label for="{{$name}}" class="form-label">{{ $setting['label'] }}</label>
                                                <select id="{{$name}}" class="select2 form-select" name="{{$name}}">
                                                    @foreach($setting['options'] as $key => $value)
                                                        <option value="{{$key}}" @if( config($name)==$key) selected @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @elseif($setting['type'] == 'textarea')
                                            <div>
                                                <label for="{{$name}}" class="form-label">{{ $setting['label'] }}</label>
                                                <textarea class="form-control" id="{{$name}}" rows="4" name="{{$name}}">{{config($name)}}</textarea>
                                            </div>
                                        @elseif($setting['type'] == 'image')
                                            <div class="mb-3">
                                                <label for="{{$name}}" class="form-label">{{ $setting['label'] }}</label>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <input class="form-control" type="file" id="{{$name}}" name="{{$name}}"  alt="{{$name}}"/>
                                                    </div>
                                                    <div class="col-4">
                                                        @if(config($name))
                                                            <img src="{{ config($name) }}" alt="{{config($name)}}" width="100px" height="80px" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <label class="form-label mb-0" for="{{$name}}">{{ $setting['label'] }}</label>
                                                <input type="{{$setting['type']}}" class="form-control"
                                                       id="{{$name}}" placeholder="{{ $setting['label'] }}"
                                                       name="{{$name}}" value="{{config($name)}}"
                                                >
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <button type="reset" class="btn btn-label-secondary waves-effect">Discard</button>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Options-->
    </div>

</x-dash-layout>

