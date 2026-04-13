
<!-- JAVASCRIPT -->


<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Sweet alert init js-->
<script src="{{ asset('assets/js/sweet.min.js') }}"></script>
<script src="{{ asset('assets/js/general.js') }}"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>


<script src="{{asset('assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

{{-- form element --}}
<script src="{{ asset('assets/js/pages/form-element.init.js') }}"></script>

<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>

 <script>
        // Custom scripts can be added here
       $(document).on("livewire:navigate", function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                timeOut: 5000, // 5000 ms = 5 detik
                extendedTimeOut: 1000 // tambahan jika hover
            };

             if (typeof $.fn.metisMenu === "function") {
                    $("#side-menu").metisMenu();
                    console.log("✅ MetisMenu re-init after navigation");
                } else {
                    console.warn("⚠️ MetisMenu not available after navigation");
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

