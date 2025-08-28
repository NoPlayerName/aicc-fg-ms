<!-- Select2 -->
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Datepicker -->
<link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
<!-- Google Font Nunito Offline -->
<link rel="stylesheet" href="{{ asset('assets/css/gfont-nunito.css') }}">
{{-- <input type="text" value="{{ base_url() }}" id="base_url" hidden=""> --}}
<style type="text/css">
    .swal-modal .swal-text {
        text-align: center;
    }

    .datepicker {
        border: 1px solid #f8f9fa;
        padding: 8px;
        z-index: 9999 !important
    }
</style>



@livewireStyles
