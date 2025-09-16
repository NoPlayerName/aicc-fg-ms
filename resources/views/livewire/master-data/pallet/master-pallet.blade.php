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

                    <div class="mb-3 d-flex justify-content-start">
                        <button class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#form-pallet"><i
                                class="far fa-plus-square"></i> Add
                            Pallet</button>
                        <div id="custom-buttons"></div>
                    </div>
                    <div style="max-width: auto; overflow-x: auto;">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;"
                            wire:loading.class="muted">
                            <thead>
                                <tr>
                                    <th>Pallet No</th>
                                    <th>Pallet Name</th>
                                    <th>Type</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
    @livewire(' master-data.pallet.form-pallet') @livewire('master-data.pallet.form-edit-pallet')
</div>
@push('scripts')
<!-- Required datatable js -->
<script src={{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}></script>

<!-- Buttons examples -->
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('assets/libs/jszip/jszip.min.js') }}">
</script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}">
</script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}">
</script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}">
</script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}">
</script>

<script>
    $(document).on("livewire:init", () => {
            initTable();

            Livewire.on('delete-confirm', ({id}) => {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                buttons: ["Cancel", "Delete!"],
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    @this.call('delete', id)
                    swal({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                        button: "Close",
                    }).then((result) => {
                        if (result) {
                            $('#datatable-buttons').DataTable().ajax.reload(null, false);
                        }
                    })
                }
            })
        })

        Livewire.on('saved', () => {
            $('#form-pallet').modal('hide');
            $('#form-edit-pallet').modal('hide');
            $('#datatable-buttons').DataTable().ajax.reload(null, false);
            toastr.success('Data has been saved!');
        });
        Livewire.on('modalEdit', () => {
            $('#form-edit-pallet').modal('show');
        });
            
    });

        function initTable() {

            let table = $('#datatable-buttons').DataTable({
                
                responsive: true,
                autoWidth: false,
                processing:true,
                serverSide:true,
                dom:  "B"+"<'row'<'col-sm-6 mt-2'l><'col-sm-6'f>>" + 
                    "<'row'<'col-sm-12'tr>>" +           
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                        extend: 'excel',
                        className: 'btn btn-success',
                        text: '<i class="fas fa-file-excel"></i> Export Excel',
                         exportOptions: {
                            // Meminta semua data, bukan hanya halaman
                            modifier: {
                                search: 'applied',  // hanya data yang sesuai filter
                                order: 'applied',   // urutan saat ini
                                page: 'all'         // semua halaman
                            }
                        }
                        
                    },
                ],
                ajax:{
                    url: "{{ route('master.master-pallet.data') }}",
                     
                },
                columns: [
                    {data: 'pallet_no'},
                    {data: 'name'},
                    {data: 'pallet_type'},
                    {data: 'color'},
                    {data: 'id',  orderable: false, searchable: false},
                ],
                columnDefs: [
                    {targets: 4, 
                        className: 'text-center align-middle',
                        render: (data, type, row, meta) => {
                        return `<div class="btn-group">
                                     <button type="button"
                                       class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-chevron-down"></i>
                                     </button>
                                         <div class="dropdown-menu"
                                           style="min-width: 2rem; font-size: 12px; padding: 4px 8px;">
                                            <a class="dropdown-item btn"   wire:click='edit("${data}")'><i class=" fas fa-edit text-info"
                                                   data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            <a class="dropdown-item btn" data-toggle="tooltip" data-placement="top"
                                                title="Delete" wire:click='deleteConfirm("${data}")'><i
                                                class="fas fa-trash-alt text-danger"></i></a>
                                            </div>
                                        </div>
                                    `;
                    }},
                ],
                 createdRow: (row, data, dataIndex) => {
                    if(!data.is_active){
                        $(row).addClass('table-danger'); // Bootstrap class merah
                    }
                },
                 drawCallback: function(settings) {
                    $('[data-toggle="tooltip"]').tooltip(); 
                }
            });

            // Pindahkan tombol ke div custom
            table.buttons().container().appendTo('#custom-buttons');
        }
        

  
</script>
@endpush