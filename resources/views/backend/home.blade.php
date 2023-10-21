@extends('backend.layout.index')
@section('style')

    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/jqvmap/jqvmap.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{request()->getSchemeAndHttpHost()}}/library/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="library/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="library/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="library/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="library/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="library/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="library/plugins/moment/moment.min.js"></script>
    <script src="library/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="library/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="library/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="backend/dist/js/pages/dashboard.js"></script>
@endsection
