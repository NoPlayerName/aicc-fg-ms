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
                    <h4 class="mb-0">Stock
                    </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                            <li class="breadcrumb-item active">Stock
                            </li>
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
                            <form id="form-search" method="GET" wire:submit.prevent="search"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-daterange input-group" data-provide="datepicker"
                                                data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                                <input required type="text" class="form-control" autocomplete="off"
                                                    placeholder="Start Date" id="s_start_date" wire:model='startDate'
                                                    onchange="this.dispatchEvent(new InputEvent('input'))" />
                                                <input required type="text" class="form-control" autocomplete="off"
                                                    placeholder="End Date" id="s_end_date" wire:model='endDate'
                                                    onchange="this.dispatchEvent(new InputEvent('input'))" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" value="" wire:model="searchKey" name="search" id="search"
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
                    <div class="mb-3 d-flex">
                        <div id="custom-buttons-stockout"></div>
                        <div id="custom-buttons-summary"></div>
                    </div>
                    <div style="max-width: auto; overflow-x: auto;">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#stock-out" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-box"></i></span>
                                    <span class="d-none d-sm-block">Stock Out</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#summary" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Summary</span>
                                </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="stock-out" role="tabpanel">
                                <table id="datatable-stockOut"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;"
                                    data-url="{{ route('transaksi.stock.out.data') }}">
                                    <thead>
                                        <tr>
                                            <th>Pallet No</th>
                                            <th>Date</th>
                                            <th>Part No</th>
                                            <th>Part Name</th>
                                            <th>Qty</th>
                                            <th>Customer</th>
                                            <th>Rack No</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tab-pane" id="summary" role="tabpanel">
                                <table id="datatable-summary"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;" data-url="{{
                                    route('transaksi.stock.out.data-summary') }}">
                                    <thead>
                                        <tr>
                                            <th>Part No</th>
                                            <th>Part Name</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
    {{-- Modal reusable --}}
    @livewire('transaksi.stock-out.form-update')
    {{-- End Modal --}}
</div>
@push('scripts')

{{-- form advance --}}
{{-- <script src={{ asset('assets/js/pages/form-advanced.init.js') }}></script> --}}
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

<script src="{{ asset('assets/js/stock-out.js') }}"></script>


{{-- datatable init js --}}
{{-- <script src={{ asset('assets/js/pages/datatables.init.js') }}></script> --}}
{{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}

@endpush