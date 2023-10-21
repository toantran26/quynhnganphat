<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS PC1-MN -  </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/backend/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('library/plugins/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{asset('backend/css/admin.css')}}?v={{VERSION}}">
    <script src="{{asset('library/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('library/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: Arial;">
<div class="wrapper">

@include('backend.layout.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('backend.layout.sidebar-admin')

<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->
    @include('backend.layout.footer')
</div>
<!-- ./wrapper -->
<!-- jQuery -->

</body>

<script src="{{asset('library/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('library/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<script src="{{asset('backend/js/admin.js')}}"></script>
<script src="{{asset('library/plugins/toastr/toastr.min.js') }}"></script>
<script>
    toastr.options = {
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000
    };

    @if(\Session::has('error'))
    toastr.error('{{ \Session::get('error') }}');
    @endif
        @if(\Session::has('success'))
        toastr["success"]('{{ \Session::get('success') }}');
    @endif
</script>
@yield('script')
</html>
