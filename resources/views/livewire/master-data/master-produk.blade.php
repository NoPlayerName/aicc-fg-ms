@push('style')
    <!-- DataTables -->
    <link href={{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }} rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href={{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }} rel="stylesheet"
        type="text/css" />
@endpush

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Master Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                            <li class="breadcrumb-item active">Master Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="card-title">Stock</h4> --}}

                    <div class="mb-3 d-flex justify-content-end">
                        {{-- <form class=" form-inline mr-2 group">
                            <div class="form-group mr-2 row">
                                <input type="date" class="form-control form-control-sm" placeholder="Date From">
                            </div>
                            To
                            <div class="form-group ml-2">
                                <input type="date" class="form-control form-control-sm" placeholder="Date To">
                            </div>
                            <div class="form-group ml-2">
                                <input type="text" class="form-control form-control-sm" placeholder="Search">
                            </div>
                            <button class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" data-placement="top"
                                title="Search">
                                <i class="ri-search-line"></i>
                            </button>
                        </form> --}}
                        {{-- <button class="btn btn-success ml-2">Export Excell</button> --}}
                        {{-- <button class="btn btn-primary ml-2">Add Stock</button> --}}
                        <div id="custom-buttons"></div>
                    </div>
                    <div style="max-width: auto; overflow-x: auto;">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@push('scripts')
    <!-- Required datatable js -->
    <script src={{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}></script>

    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>


    {{-- datatable init js --}}
    {{-- <script src={{ asset('assets/js/pages/datatables.init.js') }}></script> --}}
    {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}

    <script>
        document.addEventListener("livewire:navigated", () => {
            let table = $('#datatable-buttons').DataTable({
                // searching: false,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                dom: 'Bfrtip',
                buttons: [{

                        className: 'btn btn-primary btn-sm mr-2',
                        text: '<i class="far fa-plus-square"></i> Add Product',

                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-success btn-sm',
                        text: '<i class="fas fa-file-excel"></i> Export Excel'
                    },

                ]
            });

            // Pindahkan tombol ke div custom
            table.buttons().container().appendTo('#custom-buttons');
        });
    </script>
@endpush
