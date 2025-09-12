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
                    <h4 class="mb-0">Data Stock</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                            <li class="breadcrumb-item active">Data Stock</li>
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

                                    <div class="col-lg-4">
                                        <button id="filter_btn" type="submit" form="form-search"
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
                                    <th>Part No</th>
                                    <th>Part Name</th>
                                    <th>Product Code</th>
                                    <th>Beginning stock</th>
                                    <th>Stock In</th>
                                    <th>Stock Out</th>
                                    <th>Ending Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>8982887110</td>
                                    <td>CARRIER; FINAL DRIVE</td>
                                    <td>CARRIER 7110</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td>110</td>
                                    <td class="text-center align-middle"><a class="btn" data-toggle="modal"
                                    data-target="#detail-stock"  wire:click="showDetail('8982887110')"><i
                                     class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top" title="View Detail"></i> </a></td>
                                </tr>
                                <tr>
                                    <td>8982887110</td>
                                    <td>CARRIER; FINAL DRIVE</td>
                                    <td>CARRIER 7110</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td>110</td>
                                     <td class="text-center align-middle"><a class="btn" data-toggle="modal"
                                    data-target="#detail-stock"  wire:click="showDetail('8982887110222')"><i
                                     class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top" title="View Detail"></i> </a></td>
                                </tr>
                                <tr>
                                    <td>8982887110</td>
                                    <td>CARRIER; FINAL DRIVE</td>
                                    <td>CARRIER 7110</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td>110</td>
                                    <td class="text-center align-middle"><a class="btn" ><i
                                     class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top" title="View Detail"></i> </a></td>
                                </tr>
                                <tr>
                                    <td>8982887110</td>
                                    <td>CARRIER; FINAL DRIVE</td>
                                    <td>CARRIER 7110</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td>110</td>
                                    <td class="text-center align-middle"><a class="btn" ><i
                                     class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top" title="View Detail"></i> </a></td>
                                </tr>
                                <tr>
                                    <td>8982887110</td>
                                    <td>CARRIER; FINAL DRIVE</td>
                                    <td>CARRIER 7110</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>0</td>
                                    <td>110</td>
                                    <td class="text-center align-middle"><a class="btn" ><i
                                     class="fas fa-eye text-info" data-toggle="tooltip" data-placement="top" title="View Detail"></i> </a></td>
                                </tr>
                                
                            </tbody>
                             <tfoot>
                                <tr>
                                    <th class="text-right">Total:</th>
                                    <th></th>
                                    <th></th>
                                    <th>500</th>
                                    <th>50</th>
                                    <th>0</th>
                                    <th>550</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
    @livewire('transaksi.stock.detail-stock')
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
    <script src="{{ asset('assets/js/stock.js') }}"></script>
@endpush
