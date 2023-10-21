@extends('frontend.layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}?{{VERSION}}">
    <link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
    <nav>
        <div class="nav__images cate" style="background-image: url({{ asset('frontend/images/nav_cate.png') }});">
            <div class="navbar__gadient ">
                <div class="w-1176 main-content position-relative ">
                    {{-- <div class="position-absolute content__navbar">
                        <h3 class="tile__navbar">{{ __('the leading market expansion service in Vietnam') }}</h3>
                        <p class="">{{ __('evergreen producer of wind energy') }}</p>
                        <a href="#" class="btn ">Learn more</a>
                    </div> --}}
                </div>

            </div>

        </div>
    </nav>
    <main>
        <div class="w-1176 mt-4 mb-2">
            <div class="_category">
                <div class="row">
                    <div class="col-md-9">
                        <div class="title_post">
                                <h1 class="fs-35 title_detail">{{$post->title}}</h1>
                        </div>
                    </div>
                </div>
                <div class="time_detail">
                    <p class="date__blog__main__top">{{$post->created_at}} </p>
                </div>
            </div>
            <div class="intro_detail">
                <?=$post->description?>
            </div>
            <div class="content_detail">
                <?=$post->content?>
            </div>
            <div class="extension_cf">
                <div class="d-flex justify-content-end">
                    <div class="ml-3 list_icon_detail">
                        <a href="#">
                            <span><i class="far fa-bookmark"></i></span>
                        </a>
                    </div>
                    <div class="ml-3 list_icon_detail">
                        <a href="#">
                            <span><i class="fas fa-print"></i></span>
                        </a>
                    </div>
                    <div class="ml-3 list_icon_detail">
                        <a href="#">
                            <span><i class="far fa-copy"></i></span>
                        </a>
                    </div>
                    <div class="ml-3 list_icon_detail">
                        <a href="#">
                            <span><i class="far fa-comment-alt"></i></span>
                        </a>
                    </div>
                    <div class="ml-3 list_icon_detail">
                        <a href="#">
                            <span><i class="fas fa-link"></i></span>
                        </a>
                    </div>
                    <div class="ml-3 list_icon_detail">
                        <a href="#">
                            <span><i class="fas fa-share-alt"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1176 mt-2 mb-2">
            <div class="_category mb-5">
                <div class="_cate_2_media">
                    <h2 class="title_post_path fs-35">
                        <a href="">
                            Tin liên quan
                        </a>
                    </h2>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-4">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset('frontend/images/media_content.png') }}" alt="">
                                            {{-- <span class="icon-block"><i class="fas fa-camera"></i></span> --}}
                                        </a>
                                    </div>
                                </div>
                                <div class="title_media_r mt-3">
                                    <h3 class="fs-18 title_media_c">
                                        <a href=""> TBA 220kV NMĐ mặt trời và mở rộng ngăn lộ TBA 220kV.</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset('frontend/images/media_content.png') }}" alt="">
                                            {{-- <span class="icon-block"><i class="fas fa-camera"></i></span> --}}
                                        </a>
                                    </div>
                                </div>
                                <div class="title_media_r mt-3">
                                    <h3 class="fs-18 title_media_c">
                                        <a href=""> TBA 220kV NMĐ mặt trời và mở rộng ngăn lộ TBA 220kV.</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset('frontend/images/media_content.png') }}" alt="">
                                            {{-- <span class="icon-block"><i class="fas fa-camera"></i></span> --}}
                                        </a>
                                    </div>
                                </div>
                                <div class="title_media_r mt-3">
                                    <h3 class="fs-18 title_media_c">
                                        <a href=""> TBA 220kV NMĐ mặt trời và mở rộng ngăn lộ TBA 220kV.</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{ asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/home.js') }}?v=1"></script>
@endsection
