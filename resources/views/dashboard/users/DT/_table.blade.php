<div>
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search User" />
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
                Export Users
            </button>
            <!--begin::Menu-->
            <div id="DT_Categories_Export_Menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
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
            <div id="DT_Categories_Export_Buttons" class="d-none"></div>
            <!--end::Hide default export buttons->-->
        </div>
        <!--begin::Card toolbar-->

        <!--end::Card toolbar-->
    </div>

    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5  table-hover " id="user_table">
            <thead>
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                <th class="w-35px text-center">#</th>
                <th class="min-w-250px">User</th>
                <th class="min-w-150px">Username</th>
                <th class="min-w-150px">Phone</th>
                <th class="min-w-80px">Status</th>
                <th class="min-w-150px">Created At</th>
                <th class="text-end min-w-70px">Actions</th>
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

@php
if (!isset($DT_route)){
    $DT_route = route('dashboard.users.index');
}
@endphp
@push('scripts')
    <script type="text/javascript">

        var table = $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ $DT_route }}",
            columns: [
                {data: 'DT_RowIndex', orderable:false, searchable:false },
                // {data: 'id', name: 'id' },
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name: 'actions', orderable:false, searchable:false, width:20 }
            ],
            order: [[5, 'desc']],
        });


        // Begin::Search Datatable
        $(document).on('keyup', '[data-kt-filter="search"]', function (e) {
            table.search(e.target.value).draw();
        });
        // End::Search Datatable

        // Begin::Export Buttons
        const documentTitle = 'Users Report';
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
        }).container().appendTo($('#DT_Categories_Export_Buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#DT_Categories_Export_Menu [data-export]');
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
