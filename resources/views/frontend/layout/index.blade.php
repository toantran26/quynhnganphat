<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="{{substr(Request::root(), 7)}}" />
  <meta name="copyright" content="{{substr(Request::root(), 7)}}" />
  @yield('SEO')
  <link rel="stylesheet" href="{{asset('library/plugins/fontawesome-free/css/all.min.css')}}?v={{time()}}">
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}?v={{time()}}">
  <link rel="stylesheet" href="{{asset('frontend/css/header.css')}}?v={{time()}}">
  <link rel="stylesheet" href="{{asset('frontend/css/footer.css')}}?v={{time()}}">
  <link rel="stylesheet" href="{{ asset('library/plugins/toastr/toastr.css') }}?v={{time()}}">
  <link href="{{asset('frontend/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />
  @yield('style')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @include('frontend.layout.header')
  @yield('content')
  @include('frontend.layout.footer')
  <div class="arrow-top">
    <img src="{{ asset('frontend/svg/arrow-top.svg') }}" alt="" />
  </div>
</body>
<script src="{{asset('library/plugins/jquery/jquery.min.js')}}?v=12"></script>
<script src="{{asset('library//plugins/jquery-ui/jquery-ui.min.js')}}?v=12"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('library/plugins/bootstrap/js/bootstrap.bundle.min.js')}}?v=12"></script>
<script src="{{ asset('library/plugins/toastr/toastr.min.js') }}?v=12"></script>
<script src="{{ asset('frontend/js/home.js') }}?v={{VERSION}}"></script>
{{-- <script src="{{ asset('frontend/js/lazyload.min.js') }}?v=12"></script> --}}

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

    @if(Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
    @endif
        @if(Session::has('success'))
        toastr["success"]('{{ Session::get('success') }}');
    @endif

    $(".dropdown-list").click(function() {
      // console.log("abc");
        $(this).siblings().removeClass("open");
        $(this).toggleClass("open");
    });
    $(".btn-search").click(function () {
      console.log("abc");
        $(".search__form").addClass("show");
    });
    $(".close-search").click(function () {
        $(".search__form").removeClass("show");
    });
</script>
@yield('script')

</html>