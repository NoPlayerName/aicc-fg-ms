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
    <style>
        .dt-button-collection {
            top: 100% !important;
            left: -100% !important;
            transform: none !important;
        }
    </style>
@endpush

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Stock Out</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                            <li class="breadcrumb-item active">Stock Out</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12" wire:ignore>

            <div id="accordion" class="custom-accordion">

                <div class="card mb-1">
                    <a href="#collapseTwo" class="text-dark " data-toggle="collapse" aria-expanded="false"
                        aria-controls="collapseTwo">
                        <div class="card-header" id="headingTwo">
                            <h6 class="m-0">
                                <i class="ri-filter-fill"></i> Filter Data
                                <i class="mdi mdi-minus float-right accor-plus-icon"></i>
                            </h6>
                        </div>
                    </a>

                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <form id="form-search" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-daterange input-group" data-provide="datepicker"
                                                data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                                <input required type="text" class="form-control" autocomplete="off"
                                                    placeholder="Start Date" id="s_start_date" />
                                                <input required type="text" class="form-control" autocomplete="off"
                                                    placeholder="End Date" id="s_end_date" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" value="" name="search" id="search"
                                                placeholder="Search" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button id="filter_btn" type="submit" form="form-search"
                                            class="btn btn-primary btn-sm waves-effect waves-light">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                        {{-- <button type="button"
                                            onclick="if (window.location.href.indexOf('?') > -1) {
                                                                            window.location.href = window.location.pathname;
                                                                                } else {
                                                                                window.location.reload();
                                                                                }"
                                            class="btn btn-outline-primary btn-sm waves-effect waves-light">
                                            Refresh <i class="ri-refresh-line align-middle ml-2"></i>
                                        </button>
                                        <a href="javascript:void(0);" onclick="export_excel();"
                                            class="btn btn-sm btn-success waves-effect waves-light">
                                            Export Excel <i class="fas fa-file-excel align-middle ml-2"></i>
                                        </a> --}}

                                    </div>
                                </div>

                            </form>

                        </div>
                        <div id="custom-buttons" class="m-2" wire:ignore></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 d-flex">
                        <button class="btn btn-primary btn-md" wire:click="openModal">Form Scrabing</button>
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
                        </table>
                    </div>
                </div>

            </div> <!-- container-fluid -->
            <x-modals.modal id="stockOutModal" title="Form Scrabing">
                {{-- isi modal bebas, bisa form Livewire atau biasa --}}
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label>No Pallet</label>
                        <input type="text" wire:model="no_pallet" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Part No</label>
                        <input type="text" wire:model="part_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Part Name</label>
                        <input type="text" wire:model="part_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" wire:model="qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Customer</label>
                        <input type="text" wire:model="customer" class="form-control">
                    </div>

                    <x-slot name="footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </x-slot>
                </form>
            </x-modals.modal>
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
                $(document).on("livewire:init", () => {
                    initTable();

                    Livewire.on('open-modal', () => {
                        $('#stockOutModal').modal('show');

                        if ($.fn.DataTable.isDataTable('#datatable-buttons')) {
                            $('#datatable-buttons').DataTable().clear().destroy();
                        }

                        initTable();

                    });
                });

                function initTable() {


                    let table = $('#datatable-buttons').DataTable({
                        // searching: false,
                        responsive: true,
                        lengthChange: false,
                        autoWidth: false,
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excel',
                                className: 'btn btn-success',
                                text: '<i class="fas fa-file-excel"></i> Export Excel'
                            },

                        ]
                    });

                    // Pindahkan tombol ke div custom
                    table.buttons().container().appendTo('#custom-buttons');
                }
            </script>
        @endpush
