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
                    <h4 class="mb-0">Stock Change</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li> --}}
                            <li class="breadcrumb-item active">Stock Change</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12">
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

                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion"
                        wire:ignore.self>
                        <div class="card-body">
                            <form id="form-search" wire:submit.prevent="search" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-daterange input-group" data-provide="datepicker"
                                                data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                                <input required type="text" class="form-control" autocomplete="off"
                                                    placeholder="Start Date" wire:model="startDate" id="s_start_date" />
                                                <input required type="text" class="form-control" autocomplete="off"
                                                    placeholder="End Date" wire:model='endDate' id="s_end_date" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" value="" wire:model="Search" id="search"
                                                placeholder="Search" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <button id="filter_btn" type="submit"
                                            class="btn btn-primary waves-effect waves-light">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>



                    </div>
                </div>
            </div>
            <div class="card" wire:ignore>
                <div class="card-body">

                    {{-- <h4 class="card-title">Stock</h4> --}}

                    <div style="max-width: auto; overflow-x: auto;">

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Form No</th>
                                    <th>Pallet No</th>
                                    <th>Part No</th>
                                    <th>Produc Code</th>
                                    <th>Qty</th>
                                    <th>Cutomer</th>
                                    <th>Created By</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
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
{{-- <script src="{{ asset('assets/js/stock-change.js') }}"></script> --}}
<script>
    $(document).on("livewire:navigated", () => {
        iniTable();
        $('.input-daterange input').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        }).on('changeDate', function() {
            @this.set('startDate', $('#s_start_date').val());
            @this.set('endDate', $('#s_end_date').val());
        });
    
    });


function iniTable() {
    let table = $("#datatable-buttons").DataTable({
        responsive: true,
        autoWidth: true,
        processing: true,
         order: [],
        dom:
            "B" +
            "<'row'<'col-sm-6 mt-2'l><'col-sm-6'f>>" + // baris 1: kiri = show entries, kanan = search
            "<'row'<'col-sm-12'tr>>" + // baris 2: tabel
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: "excel",
                className: "btn btn-success btn-mb",
                text: '<i class="fas fa-file-excel"></i> Export Excel',
                action: () => {
                    @this.call('export')
                }
            },
        ],
        ajax: {
            url: "{{ route('transaksi.stock.change.data') }}",
            data : function (d) {
                d.startDate = @this.get('startDate') ?? null;
                d.endDate = @this.get('endDate') ?? null;
                d.search = @this.get('Search') ?? null;
            }
        },
        columns: [
            {data: 'form_no', orderable: false},
            {data: 'pallet_no', orderable: false},
            {data: 'product_code', orderable: false},
            {data: 'part_no', orderable: false},
            {data: 'qty', orderable: false, render: (data) => {
                return parseInt(data);
            }},
            {data: 'customer', orderable: false},
            {data: 'created_by', orderable: false},
            {data: 'desc', orderable: false},
        ]
    });

    // Pindahkan tombol ke div custom
    table.buttons().container().appendTo("#custom-buttons");
}

Livewire.on("filter", (params) => {
    console.log(params);
    $("#datatable-buttons").DataTable().ajax.reload(null, false);
});

</script>
@endpush