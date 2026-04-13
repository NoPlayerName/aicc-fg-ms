<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title ?? 'FG Management System' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    @include('components.head')
    {{-- Customize styles per page --}}
    @stack('style')
     @livewireStyles
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
    @stack('scripts')
    <script>
        // Custom scripts can be added here
       $(document).on("livewire:navigate", function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                timeOut: 5000, // 5000 ms = 5 detik
                extendedTimeOut: 1000 // tambahan jika hover
            };
            if (window.$ && typeof $.fn.metisMenu === "function") {
                        $("#side-menu").metisMenu();
                        console.log("✅ MetisMenu re-initialized after Livewire navigation");
                    } else {
                        console.warn("⚠️ metisMenu not found, reloading script...");
                        $.getScript("/assets/libs/metismenu/metisMenu.min.js", function() {
                            $("#side-menu").metisMenu();
                            console.log("✅ MetisMenu loaded dynamically & initialized");
                        });
                    }

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
            $("#side-menu").metisMenu()
        });
    </script>

    @livewireScripts
    
    {{-- Customize scripts per page --}}

</body>

</html>