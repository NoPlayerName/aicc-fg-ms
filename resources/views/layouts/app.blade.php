<!doctype html>
<html lang="en">

<head>
    <title>{{ $title ?? 'FG Management System' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    @include('components.head')

    {{-- Customize styles per page --}}
    @stack('style')
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @livewire('components.topbar')

        <!-- ========== Left Sidebar Start ========== -->
        @livewire('components.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <!-- main content -->
        <div class="main-content">

            {{ $slot }}

            @include('components.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('components.rightbar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('components.scripts')

    <script>
        // Custom scripts can be added here
        document.addEventListener("DOMContentLoaded", function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                timeOut: 5000, // 5000 ms = 5 detik
                extendedTimeOut: 1000 // tambahan jika hover
            };
            // Your custom JavaScript code here
            @if (session()->has('message'))
                toastr.success("{{ session('message') }}");
            @endif

            @if (session()->has('no_permission'))
                toastr.error("{{ session('no_permission') }}");
            @endif

            Livewire.on('no_permission', (e) => {
                toastr.error(e.message);
            })
            Livewire.on('success', (e) => {
                toastr.success(e.message);
            })
            Livewire.on('error', (e) => {
                toastr.error(e.message);
            })
             //hook untuk session expired Livewire
            Livewire.hook('request', ({ fail }) => { 
                fail(({ status, preventDefault }) => {
                    if (status === 419 || status === 401) {
                        preventDefault()
            
                        // confirm('Sesi anda habis, silahkan login kembali') && window.location.reload()
                            swal({
                            title: "Session Expired!",
                            text: "Please log in again.",
                            icon: "warning",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(() => {
                            window.location.href = "{{ route('login') }}";
                        });
                    }
                })
             })
          
        });
       
       
    </script>

    {{-- Customize scripts per page --}}
    @stack('scripts')
</body>

</html>