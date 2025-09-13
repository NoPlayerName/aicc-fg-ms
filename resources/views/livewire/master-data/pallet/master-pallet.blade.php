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
                    <h4 class="mb-0">Pallet</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                            <li class="breadcrumb-item active">Pallet</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12" wire:ignore>
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="card-title">Stock</h4> --}}

                    <div class="mb-3 d-flex justify-content-start">
                        <button class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#form-pallet"><i
                                class="far fa-plus-square"></i> Add
                            Pallet</button>
                        <div id="custom-buttons"></div>
                    </div>
                    <div style="max-width: auto; overflow-x: auto;">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Pallet No</th>
                                    <th>Pallet Name</th>
                                    <th>Type</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0001</td>
                                    <td>PALLET G5</td>
                                    <td>G5</td>
                                    <td>SILVER</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu"
                                                style="min-width: 2rem; font-size: 12px; padding: 4px 8px;">
                                                <a class="dropdown-item" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Deactivate"><i
                                                        class="fas fa-eye-slash text-secondary"></i></a>
                                                <a class="dropdown-item" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i
                                                        class=" fas fa-edit text-secondary"></i></a>
                                                <a class="dropdown-item" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i
                                                        class="fas fa-trash-alt text-secondary"></i></a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0002</td>
                                    <td>PALLET G5</td>
                                    <td>G5</td>
                                    <td>SILVER</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu"
                                                style="min-width: 2rem; font-size: 12px; padding: 4px 8px;">
                                                <a class="dropdown-item" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Deactivate"><i
                                                        class="fas fa-eye-slash text-secondary"></i></a>
                                                <a class="dropdown-item" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i
                                                        class=" fas fa-edit text-secondary"></i></a>
                                                <a class="dropdown-item" href="#" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i
                                                        class="fas fa-trash-alt text-secondary"></i></a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
    @livewire('master-data.pallet.form-pallet')
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
                $('#custModal').modal('show');
            });
        });

        function initTable() {

            let table = $('#datatable-buttons').DataTable({
                // searching: false,
                responsive: true,
                autoWidth: false,
                dom:  "B"+"<'row'<'col-sm-6 mt-2'l><'col-sm-6'f>>" + // baris 1: kiri = show entries, kanan = search
                    "<'row'<'col-sm-12'tr>>" +           // baris 2: tabel
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
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