@extends('frontend.layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/media.css') }}?{{VERSION}}">
    <link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
    <style>
        .document-title{
            top: 50%;
            margin-left: auto;
            margin-right: auto;
            right: 0;
            text-align: center;
            transform: translateY(-50%);
            left: 0;
        }
        .document-title .title{
            font-weight: 700;
            font-size: 15px;
            line-height: 44px;
            color: #FFFFFF;
        }
        .hover-div{
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 9;
            background: rgba(0, 0, 0, 0.6);
            transform: scale(0);
            transition: 0.3s;
        }
        .img-small-right:hover .hover-div{
            transform: scale(1);
        }
        @media screen and (max-width: 768px) {
            .content-row-4 {
                grid-template-columns: 1fr 1fr;
                grid-gap: 12px;
            }
            .document-title .title{
                line-height: unset;
            }
        }
        </style>
@endsection
@section('content')

    <main>
        <div class="box-title">
            {{-- <h2>{{(App::currentLocale() =='vn')?$category->title_vi : $category->title_en}}</h2> --}}
            <h2>Thư viện</h2>
        </div>
        <section class="banner-media d-md-block d-none">
            <div class="nav__images cate" style="background-image: url({{ asset('frontend/images/banner-media.png') }});">
                <div class="navbar__gadient ">
                    <div class="w-1176 main-content position-relative ">
                        <div class="position-absolute ">
                            {{-- <div class="content__navbar">
                                @if (@$category->parent)
                                    <div class="category_parent">
                                        <a href="{{route('detail-cate', $category->parent->slug)}}" class="">{{$category->parent->title_vi}}</a>
                                    </div>
                                @endif
                                <h1 class="tile__navbar fs-32">
                                    <a href="{{route('detail-cate', $category->slug)}}" class="">{{$category->title_vi}}</a>
                                </h1>
                            </div> --}}
                            <div class="content__navbar">
                                    <div class="category_parent">
                                        <a href="#" class="">Blog</a>
                                    </div>
                                <h1 class="tile__navbar fs-32">
                                    <a href="#" class="">{{(App::currentLocale() == 'vn') ? "Thư viện" : "Library"}}</a>
                                </h1>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="w-1176 media-top d-md-block d-none">
                <div class="d-flex">
                    <div class="top-left">
                        <div class="thumb-img">
                            <a href="#" class="">
                                <img src="{{ asset('frontend/images/top-left-media.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="top-right">
                        <div class="top-right-list">
                            <div class="bg-2E58A6">
                                <div class="top-text">
                                    <p class="">{{(App::currentLocale() == 'vn') ? "Hình ảnh" : "Image"}}</p>
                                    <p class="thumb-img">
                                        <img src="{{ asset('frontend/svg/icon-image.svg') }}" alt="">
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div class="thumb-img">
                                    <a href="#" class="">
                                        <img src="{{ asset('frontend/images/top-right-media-1.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="top-right-list">
                            <div>
                                <div class="thumb-img">
                                    <a href="#" class="">
                                        <img src="{{ asset('frontend/images/top-right-media-2.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="bg-02B3AC">
                                <div class="top-text">
                                    <p class="">Video</p>
                                    <p class="thumb-img">
                                        <img src="{{ asset('frontend/svg/icon-video.svg') }}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="w-1176 media-content">
            <div class="_category mb-5">
                <div class="_cate_2_media">
                    <h2 class="_title_cate_2">
                        <a href="#">
                            {{(App::currentLocale() == 'vn') ? "Hình ảnh" : "Image"}}
                        </a>
                    </h2>
                </div>
                <div class="">
                    {{-- @foreach ($media['listImage'] as $key =>$oneVideo) --}}
                    <div class="content-row-image">
                        @foreach ($media['listImage'] as $key =>$oneImage)
                        <div class="list-content-video">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="hover-div">
                                        <div class="position-absolute document-title">
                                            <a href="{{route('detail-post',['slug' => $oneImage->slug,'id'=>$oneImage->id])}}" class="title">{{(App::currentLocale() =='vn')?$oneImage->title : $oneImage->title_en}}</a>
                                        </div>
                                    </div>
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset($oneImage->avatar) }}" alt="{{$oneImage->title}}">
                                            <span class="icon-block"><i class="fas fa-camera"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="list-content-video">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset('frontend/images/media_content.png') }}" alt="">
                                            <span class="icon-block"><i class="fas fa-camera"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-content-video">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset('frontend/images/media_content.png') }}" alt="">
                                            <span class="icon-block"><i class="fas fa-camera"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1176 mt-4 mb-2">
            <div class="_category mb-5">
                <div class="_cate_2_media">
                    <h2 class="_title_cate_2">
                        <a href="">
                            Video
                        </a>
                    </h2>
                </div>
                <div class="">
                    <div class="content-row-4">
                        @foreach ($media['listVideo'] as $key =>$oneVideo)
                        <div class="list-content-video">
                            <div class="top_meida_r">
                                <div class="img-small-right position-relative">
                                    <div class="thumb-img">
                                        <a href="#" class="">
                                            <img src="{{ asset($oneVideo->avatar) }}" alt="">
                                            <span class="icon-block"><i class="fas fa-play-circle"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="title_media_r mt-3">
                                    <h3 class="fs-18 title_media_c">
                                        <a href="">{{(App::currentLocale() == 'vn') ? $oneVideo->title : $oneVideo->title_en}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        @endforeach
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
