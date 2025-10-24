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
                    <h4 class="mb-0">Master Customer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                            <li class="breadcrumb-item active">Master Customer</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
    <div class="row">
        <div class="col-12" wire:ignore>
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="card-title">Stock</h4> --}}

                    <div class="mb-3 d-flex justify-content-start">
                        {{-- <button class="btn btn-primary btn-md mr-2" wire:click="openModal"><i
                                class="far fa-plus-square"></i> Add
                            Customer</button> --}}
                        <div id="custom-buttons"></div>
                    </div>
                    <div style="max-width: auto; overflow-x: auto;">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Initial</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- container-fluid -->
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
                dom: "B"+"<'row'<'col-sm-6 mt-2'l><'col-sm-6'f>>" + // baris 1: kiri = show entries, kanan = search
                    "<'row'<'col-sm-12'tr>>" +           // baris 2: tabel
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                        extend: 'excel',
                        className: 'btn btn-success',
                        text: '<i class="fas fa-file-excel"></i> Export Excel'
                    },

                ],
                ajax: {
                    url: "{{ route('master.customer.data') }}",
                },
                columns:[
                    {data: 'customer_name',
                        render: (data) => {
                            return data ?? '-';
                        } 
                    },
                    {
                        data: 'initial',
                        render: (data) => {
                            return data ?? '-';
                        }
                    }
                ],
                 createdRow: (row, data, dataIndex) => {
                    if(!data.is_active){
                        $(row).addClass('table-danger'); // Bootstrap class merah
                    }
                },
            });

            // Pindahkan tombol ke div custom
            table.buttons().container().appendTo('#custom-buttons');
        }
</script>
@endpush