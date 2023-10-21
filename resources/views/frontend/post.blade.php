@extends('frontend.layout.index')
@section('SEO')

    <title>{{ConfigSite::getInfoByName('title_seo')}}</title>
    <meta name="keywords" content="{{ConfigSite::getInfoByName('key_seo')}}">
    <meta name="description" charset="UTF-8" content="{{ConfigSite::getInfoByName('desc_seo')}}"/>
    <meta name="title" charset="UTF-8" content="{{ConfigSite::getInfoByName('title_seo')}}"/>

    <meta property="og:title" content="{{ConfigSite::getInfoByName('title_seo')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="{{asset('frontend/images/logo.png')}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:description" content="{{ConfigSite::getInfoByName('desc_seo')}}"/>
    <meta name="og:keywords" content="{{ConfigSite::getInfoByName('key_seo')}}">

@endsection
@section('style')
    <link rel="stylesheet"
          href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css?v='.time()) }}">
    <link rel="stylesheet" href="{{asset('frontend/css/post.css?v='.time())}}">
@endsection
@section('content')
    <nav>
        <div class="background__opacity"></div>
        <div class="container-fix">
            <div class="col-12">
                <p class="name__category">{{__('Tin tức')}}</p>
            </div>
        </div>
    </nav>
    <main>
        <div class="container-fix">
            <div class="row">
                <div class="col-md-4">
                    <div class="post__box">
                        <div class="avatar">
                            <img src="{{asset('frontend/images/post-home-1.jpg')}}" alt="">
                        </div>
                        <div class="info__post">
                            <p class="category__name">{{__('Xã hội & Môi trường')}}</p>
                            <p class="title">
                                <a href=".">
                                    {{__('Công ty Cổ phần Xây lắp điện I ủng hộ Quỹ phòng
                                    chống covid 19 tỉnh Tiền Giang 500 triệu đồng')}}
                                </a>
                            </p>
                            <p class="description">
                                {{__('Chiều 12-8, Trung tâm Kiểm soát bệnh tật (CDC) Tiền Giang
                                đã tiếp nhận ủng hộ 100 triệu đồng do Công ty Cổ phần Xây lắp điện
                                I (PCC1) hỗ trợ để cùng chung tay phòng, chống dịch Covid-19. ')}}
                            </p>
                            <div class="view__more">
                                <a href=".">
                                    <span>{{__('Xem thêm')}}</span>
                                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post__box">
                        <div class="avatar">
                            <img src="{{asset('frontend/images/post-home-1.jpg')}}" alt="">
                        </div>
                        <div class="info__post">
                            <p class="category__name">{{__('Xã hội & Môi trường')}}</p>
                            <p class="title">
                                <a href=".">
                                    {{__('Công ty Cổ phần Xây lắp điện I ủng hộ Quỹ phòng
                                    chống covid 19 tỉnh Tiền Giang 500 triệu đồng')}}
                                </a>
                            </p>
                            <p class="description">
                                {{__('Chiều 12-8, Trung tâm Kiểm soát bệnh tật (CDC) Tiền Giang
                                đã tiếp nhận ủng hộ 100 triệu đồng do Công ty Cổ phần Xây lắp điện
                                I (PCC1) hỗ trợ để cùng chung tay phòng, chống dịch Covid-19. ')}}
                            </p>
                            <div class="view__more">
                                <a href=".">
                                    <span>{{__('Xem thêm')}}</span>
                                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post__box">
                        <div class="avatar">
                            <img src="{{asset('frontend/images/post-home-1.jpg')}}" alt="">
                        </div>
                        <div class="info__post">
                            <p class="category__name">{{__('Xã hội & Môi trường')}}</p>
                            <p class="title">
                                <a href=".">
                                    {{__('Công ty Cổ phần Xây lắp điện I ủng hộ Quỹ phòng
                                    chống covid 19 tỉnh Tiền Giang 500 triệu đồng')}}
                                </a>
                            </p>
                            <p class="description">
                                {{__('Chiều 12-8, Trung tâm Kiểm soát bệnh tật (CDC) Tiền Giang
                                đã tiếp nhận ủng hộ 100 triệu đồng do Công ty Cổ phần Xây lắp điện
                                I (PCC1) hỗ trợ để cùng chung tay phòng, chống dịch Covid-19. ')}}
                            </p>
                            <div class="view__more">
                                <a href=".">
                                    <span>{{__('Xem thêm')}}</span>
                                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post__box">
                        <div class="avatar">
                            <img src="{{asset('frontend/images/post-home-1.jpg')}}" alt="">
                        </div>
                        <div class="info__post">
                            <p class="category__name">{{__('Xã hội & Môi trường')}}</p>
                            <p class="title">
                                <a href=".">
                                    {{__('Công ty Cổ phần Xây lắp điện I ủng hộ Quỹ phòng
                                    chống covid 19 tỉnh Tiền Giang 500 triệu đồng')}}
                                </a>
                            </p>
                            <p class="description">
                                {{__('Chiều 12-8, Trung tâm Kiểm soát bệnh tật (CDC) Tiền Giang
                                đã tiếp nhận ủng hộ 100 triệu đồng do Công ty Cổ phần Xây lắp điện
                                I (PCC1) hỗ trợ để cùng chung tay phòng, chống dịch Covid-19. ')}}
                            </p>
                            <div class="view__more">
                                <a href=".">
                                    <span>{{__('Xem thêm')}}</span>
                                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post__box">
                        <div class="avatar">
                            <img src="{{asset('frontend/images/post-home-1.jpg')}}" alt="">
                        </div>
                        <div class="info__post">
                            <p class="category__name">{{__('Xã hội & Môi trường')}}</p>
                            <p class="title">
                                <a href=".">
                                    {{__('Công ty Cổ phần Xây lắp điện I ủng hộ Quỹ phòng
                                    chống covid 19 tỉnh Tiền Giang 500 triệu đồng')}}
                                </a>
                            </p>
                            <p class="description">
                                {{__('Chiều 12-8, Trung tâm Kiểm soát bệnh tật (CDC) Tiền Giang
                                đã tiếp nhận ủng hộ 100 triệu đồng do Công ty Cổ phần Xây lắp điện
                                I (PCC1) hỗ trợ để cùng chung tay phòng, chống dịch Covid-19. ')}}
                            </p>
                            <div class="view__more">
                                <a href=".">
                                    <span>{{__('Xem thêm')}}</span>
                                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post__box">
                        <div class="avatar">
                            <img src="{{asset('frontend/images/post-home-1.jpg')}}" alt="">
                        </div>
                        <div class="info__post">
                            <p class="category__name">{{__('Xã hội & Môi trường')}}</p>
                            <p class="title">
                                <a href=".">
                                    {{__('Công ty Cổ phần Xây lắp điện I ủng hộ Quỹ phòng
                                    chống covid 19 tỉnh Tiền Giang 500 triệu đồng')}}
                                </a>
                            </p>
                            <p class="description">
                                {{__('Chiều 12-8, Trung tâm Kiểm soát bệnh tật (CDC) Tiền Giang
                                đã tiếp nhận ủng hộ 100 triệu đồng do Công ty Cổ phần Xây lắp điện
                                I (PCC1) hỗ trợ để cùng chung tay phòng, chống dịch Covid-19. ')}}
                            </p>
                            <div class="view__more">
                                <a href=".">
                                    <span>{{__('Xem thêm')}}</span>
                                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('component.pagination') --}}
        </div>
    </main>
@endsection
@section('script')
    <script src="{{asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js?v='.time())}}"></script>
    <script>
        $('.feedback__list__carousel').owlCarousel({
            loop: true,
            margin: 62,
            nav: false,
            dots: true,
            touchDrag: true,
            mouseDrag: true,
            autoplay: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
            },
        });
    </script>
@endsection
