<x-dash-layout title="movies">
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">movies List</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">movies</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </x-slot:breadcrumb>
    <x-slot:actions>
        @can('movie-create')
            <a href="{{ route('dashboard.movies.create') }}" class="btn btn-sm fw-bold btn-primary">
                <i class="ki-duotone ki-plus fs-2"></i>
                Add movie
            </a>
        @endcan
    </x-slot:actions>

    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search movie" />
                </div>
                <!--end::Search-->

                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Export dropdown-->
                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                    Export movies
                </button>
                <!--begin::Menu-->
                <div id="DT_movies_Export_Menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-export="copy">
                            Copy to clipboard
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-export="excel">
                            Export as Excel
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-export="csv">
                            Export as CSV
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-export="pdf">
                            Export as PDF
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--end::Export dropdown-->

                <!--begin::Hide default export buttons-->
                <div id="DT_movies_Export_Buttons" class="d-none"></div>
                <!--end::Hide default export buttons->-->
            </div>
        </div>

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5  table-hover " id="movie_table">
                <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-35px text-center">#</th>
                    <th class="min-w-250px">Movie</th>
                    <th class="min-w-120px">Category</th>
                    <th class="min-w-120px">Status</th>
                    <th class="min-w-80px">Rating</th>
                    <th class="min-w-100px">Percent</th>
                    <th class="min-w-150px">Created At</th>
                    <th class="min-w-70px">Actions</th>
                </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600 tbody"></tbody>
                <Style>
                    .tbody tr td:first-child{
                        text-align: center;
                    }
                </Style>
            </table>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">

            var table = $('#movie_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.movies.index') }}",
                columns: [
                    {data: 'DT_RowIndex', orderable:false, searchable:false },
                    // {data: 'id', name: 'id' },
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'status', name: 'status'},
                    {data: 'rating', name: 'rating'},
                    {data: 'percent', name: 'percent'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', orderable:false, searchable:false, width:20 }
                ],
                order: [[6, 'desc']],
             });


            // Begin::Search Datatable
            $(document).on('keyup', '[data-kt-filter="search"]', function (e) {
                table.search(e.target.value).draw();
            });
            // End::Search Datatable

            // Begin::Export Buttons
                const documentTitle = 'movies Report';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: documentTitle,

                        },
                        {
                            extend: 'excelHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'csvHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'pdfHtml5',
                            title: documentTitle,
                            exportOptions: {
                                columns: [0, 1, 2,3] // Specify which columns to export
                            }
                        }
                    ]
                }).container().appendTo($('#DT_movies_Export_Buttons'));

                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll('#DT_movies_Export_Menu [data-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();

                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-export');
                        const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                        // Trigger click event on hidden datatable export buttons
                        target.click();
                    });
                });
             // End::Export Buttons

        </script>
    @endpush
</x-dash-layout>
