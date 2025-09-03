@push('style')
    {{-- custom style can be add here --}}
@endpush

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Dashboard</h4>


                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Packing palet</a></li> --}}
                            <li class="breadcrumb-item active">Dashboard</li>

                        </ol>
                    </div>

                </div>
                <h4>Welcome, {{ $user->nama }}</h4>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- container-fluid -->
</div>
@push('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        // Custom scripts can be added here
    </script>
@endpush
