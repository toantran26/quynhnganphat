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
    <link rel="stylesheet" href="{{asset('frontend/css/partner.css?v='.time())}}">
@endsection
@section('content')
    <nav>
        <div class="background__opacity"></div>
        <div class="container-fix">
            <div class="row">
                <div class="col-md-4 col-1"></div>
                <div class="col-md-8 col-11 images__nav">
                    <img src="{{asset('frontend/images/image-partner-nav.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="content__box__nav">
            <p class="label">{{__('CÔNG TY TNHH MTV XÂY LẮP ĐIỆN 1 - MIỀN NAM')}}</p>
            <p class="title">{{__('Hơn 10 năm xây dựng và phát triển')}}</p>
            <p class="content">{{__('Trải qua hơn 10 năm xây dựng và phát triển,
                PC1MN đã chứng tỏ được năng lực của mình trong lĩnh vực xây lắp các công trình
                truyền tải điện Quốc gia, trở thành đơn vị hàng đầu trong hệ thống Tập đoàn PC1
                và trong khu vực miền Nam.')}}</p>
        </div>
        <div class="circle__electric__box">
            <div class="circle__electric">
                <div class="electric__item"></div>
                <div class="electric__item"></div>
            </div>
            <div class="circle__electric">
                <div class="electric__item"></div>
                <div class="electric__item"></div>
            </div>
            <div class="circle__electric">
                <div class="electric__item"></div>
                <div class="electric__item"></div>
            </div>
        </div>
    </nav>
    <main>
        <div class="feed__back__customer">
            <p class="title">{{__('Khách hàng nói về chúng tôi')}}</p>
            <div class="feedback__partner__box">
                <div class="background__feedback__opacity"></div>
                <div class="container-fix">
                    <div class="owl-carousel owl-theme feedback__list__carousel">
                        <div class="item">
                            <img src="{{asset('frontend/images/feedback-logo-1.png')}}" alt="">
                            <p class="feedback__content">
                                {{__('“Các dự án Bất động sản nhà ở và công nghiệp của PC1 sẽ liên
                                    tục đầu tư và cung cấp cho khách hàng đồng bộ các dịch vụ logistics
                                    thông minh, các dịch vụ công nghệ nằm trong hệ sinh thái số của PC1
                                    và thân thiện môi trường nhằm gia tăng lợi ích khách hàng, nhà đầu
                                    tư trong kỷ nguyên số.”')}}
                            </p>
                            <p class="source__feedback">Theo <a href=".">{{__('stockbiz.vn')}}</a></p>
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend/images/feedback-logo-1.png')}}" alt="">
                            <p class="feedback__content">
                                {{__('“Mảng kinh doanh năm lượng của Xây lắp điện 1 mang về 928 tỷ đồng
                                    doanh thu nhưng đóng góp đến 528 tỷ đồng lợi nhuận gộp. Trong quý doanh
                                    thu tài chính đạt hơn 16 tỷ đồng, tăng gần 7 tỷ đồng so với cùng kỳ chủ
                                    yếu nhờ thu lãi tiền gửi.”')}}
                            </p>
                            <p class="source__feedback">Theo <a href=".">{{__('cafef.vn')}}</a></p>
                        </div>
                        <div class="item">
                            <img src="{{asset('frontend/images/feedback-logo-2.png')}}" alt="">
                            <p class="feedback__content">
                                {{__('“Các dự án Bất động sản nhà ở và công nghiệp của PC1 sẽ liên
                                    tục đầu tư và cung cấp cho khách hàng đồng bộ các dịch vụ logistics
                                    thông minh, các dịch vụ công nghệ nằm trong hệ sinh thái số của PC1
                                    và thân thiện môi trường nhằm gia tăng lợi ích khách hàng, nhà đầu
                                    tư trong kỷ nguyên số.”')}}
                            </p>
                            <p class="source__feedback">Theo <a href=".">{{__('stockbiz.vn')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="logo__list__partner">
            <p class="title">{{__('Các Đối tác - Khách hàng - Nhà cung cấp')}}</p>
            <div class="container-fix list__logo">
                <div class="row">
                    @foreach ($listPartner as $item)
                    <div class="col-md-3 col-6 item">
                        <a href="{{$item->link ?? 'javascript:void(0)'}}">
                            <img src="{{asset($item->avatar)}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href="{{$item->link ?? 'javascript:void(0)'}}">{{$item->name_vi}}</a>
                        </p>
                    </div>
                    @endforeach
                    
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-3.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng Quân Đội')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-2.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng CP Thương Mại Công Thương Việt Nam')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-4.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Công ty tài chính CP Điện Lực')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-1.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng Đầu tư và Phát triển Việt Nam')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-3.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng Quân Đội')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-2.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng CP Thương Mại Công Thương Việt Nam')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-4.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Công ty tài chính CP Điện Lực')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-1.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng Đầu tư và Phát triển Việt Nam')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-3.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng Quân Đội')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-2.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Ngân hàng CP Thương Mại Công Thương Việt Nam')}}</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-6 item">
                        <a href=".">
                            <img src="{{asset('frontend/images/logo-partner-4.png')}}" alt="">
                        </a>
                        <p class="name__partner">
                            <a href=".">{{__('Công ty tài chính CP Điện Lực')}}</a>
                        </p>
                    </div>
                </div>
                @include('component.pagination', $object = $listPartner)
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js?v=12')}}"></script>
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
