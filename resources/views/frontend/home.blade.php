@extends('frontend.layout.index')
@section('SEO')

<title>{{ConfigSite::getInfoByName('title_seo')}}</title>
<meta name="keywords" content="{{ConfigSite::getInfoByName('key_seo')}}">
<meta name="description" charset="UTF-8" content="{{ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="title" charset="UTF-8" content="{{ConfigSite::getInfoByName('title_seo')}}" />

<meta property="og:title" content="{{ConfigSite::getInfoByName('title_seo')}}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{asset('frontend/images/logo.svg')}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:description" content="{{ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="og:keywords" content="{{ConfigSite::getInfoByName('key_seo')}}">

@endsection
@section('style')
<link rel="stylesheet"
  href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css?v='.time()) }}">
<link rel="stylesheet" href="{{asset('frontend/css/home.css?v='.time())}}">
@endsection
@section('content')
<nav class="slider__bar__home">
  <div class="owl-carousel owl-theme hero-carousel">
    @foreach ($banners as $item)
    <div class="item">
      <div class="slider__bar__box">
        <div class="background__slider" style="background-image: url('{{asset($item->image)}}')">
          <div class="opacity__background"></div>
        </div>
        <div class="container__slider">
          <div class="row">
            <div class="col-md-7 content__slider__left">
              <p class="title d-none d-sm-block">{{__('Công ty phát triển mạng lưới điện hàng đầu tại Việt Nam')}}</p>
              <p class="content">{{__('Nhà sản xuất hàng đầu năng lượng điện')}}</p>
              <p class="title_mb d-block d-sm-none">{{__('Công ty phát triển mạng lưới điện hàng đầu tại Việt Nam')}}
              </p>
              <div class="read__more">
                <ul class="list__icon">
                  <li><img src="{{asset('frontend/svg/banner-1-icon.svg')}}" alt=""></li>
                  <li><img src="{{asset('frontend/svg/banner-2-icon.svg')}}" alt=""></li>
                  <li><img src="{{asset('frontend/svg/banner-3-icon.svg')}}" alt=""></li>
                  <li><img src="{{asset('frontend/svg/banner-4-icon.svg')}}" alt=""></li>
                </ul>
                <a href="{{$item->link ?? '#'}}">
                  <span>{{__('Xem thêm')}}</span>
                  <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-5 card__slider__box">
              <div class="card__item__slider">
                <img src="{{asset($item->image_mobi ?? 'frontend/svg/service-1-icon.svg')}}" alt="">
                <p class="title">{{$item->getTranslate('title')}}</p>
                <p class="content">{{$item->getTranslate('description')}}</p>
                <a href="{{$item->link ?? '#'}}">
                  <img src="{{asset('frontend/svg/arrow-right-circle.svg')}}" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="next__slider__box ">
    <a href="javascript:void(0)" class="next-slider"><img src="{{asset('frontend/svg/arrow-banner-right-icon.svg')}}"
        alt="">
    </a>
  </div>
  <div class="prev__slider__box">
    <a href="javascript:void(0)" class="prev-slider"><img src="{{asset('frontend/svg/arrow-banner-left-icon.svg')}}"
        alt="">
    </a>
  </div>
</nav>
<main>
  <div class="customer__home__box">
    <div class="container-fix">
      <div class="row">
        <div class="col-md-5 image__customer__box">
          <div class="images__customer__item">
            <img src="{{asset('frontend/images/service-image-home.jpg')}}" alt="">
          </div>
          <div class="info__images__customer__item">
            <img src="{{asset('frontend/images/intro-around.svg')}}" alt="">
            <p class="total__customer">{{__('1457')}}</p>
            <p class="title__customer">{{__('Đối tác khách hàng')}}</p>
          </div>
        </div>
        <div class="col-md-7 commit__customer__box">
          <p class="label__company">{{__('CÔNG TY TNHH MTV XÂY LẮP ĐIỆN 1 - MIỀN NAM')}}</p>
          <p class="title__commit__customer">
            {{__('Tạo ra sản phẩm tuyệt vời cho khách hàng khắp Việt Nam')}}
          </p>
          <div class="row">
            <div class="col-md-7 mission__customer__box">
              <p class="title__mission">
                {{__('Với tầm nhìn và sứ mệnh của mình, chúng tôi luôn luôn đặt lợi ích
                và sự tin tưởng của Khách hàng và đối tác lên hàng đầu')}}
              </p>
              <p class="content__mission">{{__('Khẳng định vị thế số 1 Việt Nam,TOP 5 Đông Nam
                Á trong lĩnh vực tổng thầu EPC các công trình năng lượng tái tạo. Nhà đầu tư năng
                lượng tái tạo chuyên nghiệp. Khẳng định vị thế số 1 Việt Nam,TOP 5 Đông Nam Á trong
                lĩnh vực tổng thầu EPC các công trình năng lượng tái tạo.
                Nhà đầu tư năng lượng tái tạo chuyên nghiệp...')}}</p>
              <div class="view__more">
                <a href="/gioi-thieu.html">
                  <span>{{__('Xem thêm')}}</span>
                  <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-5 service__box">
              <ul class="list__service__box">
                <li class="item__list__service">
                  <img src="{{asset('frontend/svg/checkbox-circle.svg')}}" alt="">
                  <span>{{__('Thi công xây lắp đường dây')}}</span>
                </li>
                <li class="item__list__service">
                  <img src="{{asset('frontend/svg/checkbox-circle.svg')}}" alt="">
                  <span>{{__('Thi công trạm biến áp')}}</span>
                </li>
                <li class="item__list__service">
                  <img src="{{asset('frontend/svg/checkbox-circle.svg')}}" alt="">
                  <span>{{__('Kéo rải cáp ngầm ')}}</span>
                </li>
                <li class="item__list__service">
                  <img src="{{asset('frontend/svg/checkbox-circle.svg')}}" alt="">
                  <span>{{__('Kéo dây vượt biển')}}</span>
                </li>
                <li class="item__list__service">
                  <img src="{{asset('frontend/svg/checkbox-circle.svg')}}" alt="">
                  <span>{{__('Lĩnh vực kinh doanh khác')}}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="introduce__about__company__box">
    <div class="introduce__about__company">
      <div class="background__opacity">
        <div class="container-fix">
          <div class="benefit__of__customer__box">
            <div class="row">
              <div class="col-md-7 content__benefit">
                <p class="title">{{__('CHÚNG TÔI MANG ĐẾN CHO KHÁCH HÀNG NHỮNG GÌ?')}}</p>
                <p class="content">
                  {{__('PC1 Miền Nam - Cung cấp giá trị cho khách hàng
                  thông qua sản phẩm & đổi mới đang thực hiện.')}}
                </p>
              </div>
              <div class="col-md-5 image__benefit d-md-block d-none">
                <img src="{{asset('frontend/images/image-home-benefit.png')}}" alt="" width="100%">
              </div>
            </div>
          </div>
          <div class="commit__introduce owl-carousel">
            <div class="item">
              <div class="item__box">
                <img class="icon" src="{{asset('frontend/svg/benefit1.svg')}}" alt="">
                <p class="title">{{__('Mạng lưới')}}</p>
                <p class="content">
                  {{__('Tạo ra những giá trị vượt trội cho đối tác, khách hàng,
                  nhà đầu tư, toàn dân và xã hội.')}}
                </p>
                <a href="">
                  <img src="{{asset('frontend/svg/arrow-right-circle.svg')}}" alt="">
                </a>
              </div>

            </div>
            <div class="item">
              <div class="item__box">
                <img class="icon" src="{{asset('frontend/svg/benefit2.svg')}}" alt="">
                <p class="title">{{__('Kết nối')}}</p>
                <p class="content">{{__('Sáng tạo không ngừng cho ra đời những công trình thông minh, hiện đại kết nối
                  với hệ thống điện quốc gia và khu vực.')}}</p>
                <a href="">
                  <img src="{{asset('frontend/svg/arrow-right-circle.svg')}}" alt="">
                </a>
              </div>
            </div>
            <div class="item">
              <div class="item__box">
                <img class="icon" src="{{asset('frontend/svg/benefit3.svg')}}" alt="">
                <p class="title">{{__('Năng lượng tái tạo')}}</p>
                <p class="content">
                  {{__('Khẳng định vị thế số 1 Việt Nam,
                  TOP 5 Đông Nam Á trong lĩnh vực tổng thầu EPC các công trình năng lượng tái tạo.')}}
                </p>
                <a href="">
                  <img src="{{asset('frontend/svg/arrow-right-circle.svg')}}" alt="">
                </a>
              </div>
            </div>
            <div class="item">
              <div class="item__box">
                <img class="icon" src="{{asset('frontend/svg/benefit4.svg')}}" alt="">
                <p class="title">{{__('Sản phẩm')}}</p>
                <p class="content">{{__('Dịch vụ phát triển toàn diện với đầy đủ các sản phẩm tốt nhất trong cùng ngành,
                  sản phẩm')}}</p>
                <a href="">
                  <img src="{{asset('frontend/svg/arrow-right-circle.svg')}}" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="we__worthy">
            <div class="we__worthy__item__left">
              <div class="title">
                <img src="{{asset('frontend/svg/we-worthy-icon.svg')}}" alt="">
                <p>{{__('Bạn chọn vì chúng tôi xứng đáng')}}</p>
              </div>
              <p class="content">
                {{__('Công ty nhiều năm liên tục nằm trong TOP 500 doanh nghiệp
                lớn nhất Việt Nam, TOP 500 doanh nghiệp lợi nhuận tốt nhất Việt Nam,
                TOP 50 doanh nghiệp Việt Nam xuất sắc, TOP 50 doanh nghiệp niêm yết
                tốt nhất Việt Nam với quy mô hơn 20 đơn vị thành viên và doanh thu hơn
                6.000 tỷ đồng.')}}
              </p>
            </div>
          </div>
        </div>
        <div class="we__worthy__item__right">
          <div class="slide__worthy__box">
            <div class="owl-carousel owl-theme we__worthy__slide">
              <div class="item">
                <div class="item__slide__worthy">
                  <img src="{{asset('frontend/images/worthy-slide-item-1.jpg')}}" alt="">
                  <div class="detail">
                    <div class="detail__box">
                      <p class="number">{{__('03')}}</p>
                      <p class="content">
                        {{__('3 năm liên tiếp lọt Top 50 Doanh nghiệp tốt nhất Việt Nam')}}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item__slide__worthy">
                  <img src="{{asset('frontend/images/worthy-slide-item2.jpg')}}" alt="">
                  <div class="detail">
                    <div class="detail__box">
                      <p class="number">{{__('50')}}</p>
                      <p class="content">
                        {{__('TOP 50 công ty niêm yết tốt nhất trường Việt Nam')}}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item__slide__worthy">
                  <img src="{{asset('frontend/images/worthy-slide-item3.jpg')}}" alt="">
                  <div class="detail">
                    <div class="detail__box">
                      <p class="number">{{__('150')}}</p>
                      <p class="content">{{__('Thực hiện hơn 150 dự án chất lượng cao')}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="item__slide__worthy">
                  <img src="{{asset('frontend/images/worthy-slide-item4.jpg')}}" alt="">
                  <div class="detail">
                    <div class="detail__box">
                      <p class="number">{{__('6000')}}</p>
                      <p class="content">{{__('Doanh thu hơn 6.000 tỷ đồng')}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="next__slider__box ">
              <a href="javascript:void(0)" class="next-we-worthy-slider">
                <img src="{{asset('frontend/svg/arrow-banner-right-icon.svg')}}" alt="">

              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="service__home__page">
    <div class="container-fix">
      <div class="title__box">
        <p class="label">{{__('PC1 Miền nam Group - Nhà sản xuất hàng đầu năng lượng điện')}}</p>
        <p class="title">{{__('Dịch vụ phát triển toàn diện')}}</p>
      </div>
      <div class="owl-carousel owl-theme service__box__home">
        <div class="item">
          <div class="header__box__service">
            <p class="title">{{__('Thi công trạm biến áp')}}</p>
            <img class="logo__box__service" src="{{asset('frontend/svg/service-home-1.svg')}}" alt="">
          </div>
          <p class="content">{{__('Với hơn 57 năm kinh nghiệm, công ty đang dẫn đầu cả nước trong lĩnh vực xây lắp điện
            với kinh nghiệm thực hiện nhiều dự án truyền tải điện quốc gia.')}}</p>
          <ul class="list__service">
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Lắp đặt và xây dựng trạm biến áp')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Tải điện trên địa bàn')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Nâng cao độ an toàn')}}
              </p>
            </li>
          </ul>
          <a href="/du-an/thi-cong-tram-bien-ap.html" class="view__more">
            <span>{{__('Xem thêm')}}</span>
            <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
          </a>
        </div>
        <div class="item">
          <div class="header__box__service">
            <p class="title">{{__('Kéo rải cáp ngầm(cao, hạ thế)')}}</p>
            <img class="logo__box__service" src="{{asset('frontend/svg/service-home-2.svg')}}" alt="">
          </div>
          <p class="content">{{__('Thực hiện tổng thầu các nhà máy điện năng lượng tái tạo, đặc biệt là các công trình
            có yêu cầu kỹ thuật công nghệ cao – các nhà máy điện gió, điện mặt trời.')}}</p>
          <ul class="list__service">
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Nhà máy điện năng lượng tái tạo')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Kỹ thuật công nghệ cao')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Nhà máy điện gió, điện mặt trời')}}
              </p>
            </li>
          </ul>
          <a href="/du-an/keo-dai-cap-ngam-caoha-the.html" class="view__more">
            <span>{{__('Xem thêm')}}</span>
            <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
          </a>
        </div>
        <div class="item">
          <div class="header__box__service">
            <p class="title">{{__('Kéo dây vượt biển')}}</p>
            <img class="logo__box__service" src="{{asset('frontend/svg/service-home-3.svg')}}" alt="">
          </div>
          <p class="content">{{__('Navifly sử dụng thiết bị bay UAV kéo rải dây mồi trên không giúp việc thi công kéo
            dây công trình truyền tải điện cao áp ở những nơi có địa hình hiểm trở một cách dễ dàng thuận tiện, tiết
            kiệm thời gian và sức lực')}}</p>
          <ul class="list__service">
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Thiết bị bay UAV độc quyền')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Truyền tải điện cao áp')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Địa hình hiểm trở nên thuận tiện')}}
              </p>
            </li>
          </ul>
          <a href="/du-an/keo-day-vuot-bien.html" class="view__more">
            <span>{{__('Xem thêm')}}</span>
            <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
          </a>
        </div>
        <div class="item">
          <div class="header__box__service">
            <p class="title">{{__('Thi công Xây lắp đường dây')}}</p>
            <img class="logo__box__service" src="{{asset('frontend/svg/service-home-4.svg')}}" alt="">
          </div>
          <p class="content">{{__('Các dự án tổng thầu EPC, PC tới cấp điện áp 500 KV và các dự án có tính đặc thù cao
            (trạm Gis, dự án cấp điện ra đảo, dự án cáp ngầm…).')}}</p>
          <ul class="list__service">
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Cấp điện áp 500 KV')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Công nghệ Navifly - thiết bị hiện đại')}}
              </p>
            </li>
            <li class="item__service">
              <img src="{{asset('frontend/svg/checkbox-circle-service.svg')}}" alt="">
              <p class="title__service__item">
                {{__('Đội ngũ trình độ chuyên môn kỹ thuật cao')}}
              </p>
            </li>
          </ul>
          <a href="/du-an/thi-cong-xay-lap-duong-day.html" class="view__more">
            <span>{{__('Xem thêm')}}</span>
            <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="feedback__home__page">
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
          <p class="source__feedback">{{__('by')}} <a href=".">stockbiz.vn</a></p>
        </div>
        <div class="item">
          <img src="{{asset('frontend/images/feedback-logo-1.png')}}" alt="">
          <p class="feedback__content">
            {{__('“Mảng kinh doanh năm lượng của Xây lắp điện 1 mang về 928 tỷ đồng
            doanh thu nhưng đóng góp đến 528 tỷ đồng lợi nhuận gộp. Trong quý doanh
            thu tài chính đạt hơn 16 tỷ đồng, tăng gần 7 tỷ đồng so với cùng kỳ chủ
            yếu nhờ thu lãi tiền gửi.”')}}
          </p>
          <p class="source__feedback">{{__('by')}} <a href=".">cafef.vn</a></p>
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
          <p class="source__feedback">{{__('by')}} <a href=".">stockbiz.vn</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="post__new__home__page">
    <div class="container-fix">
      <div class="list__category__new">
        <ul class="list__box">
          <li class="item">
            <a href="javascript:void(0)">{{__('blog')}}</a>
          </li>
          <li class="item">
            <a href="javascript:void(0)">{{__('publications')}}</a>
          </li>
          <li class="item">
            <a href="javascript:void(0)">{{__('photos_videos')}}</a>
          </li>
        </ul>
      </div>
      <div class="list__post__home">
        <div class="row">
          @foreach ($listPostBlog as $item)
          <div class="col-md-4">
            <div class="post__box">
              <div class="avatar">
                <img src="{{asset($item->avatar)}}" alt="">
              </div>
              <div class="info__post">
                <p class="category__name">{{$item->category->getTranslate('title')}}</p>
                <p class="title">
                  <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                    {{$item->getTranslate('title')}}
                  </a>
                </p>
                <p class="description">
                  {{$item->getTranslate('description')}}
                </p>
                <div class="view__more">
                  <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                    <span>{{__('see_more')}}</span>
                    <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="partner__home__page">
    <div class="container-fix">
      <p class="title">{{__('parners')}}</p>
      <div class="owl-carousel owl-theme list__logo__partner">
        @foreach ($listPartner as $item)
        <div class="item">
          <a href="{{ $item->link ?? 'javascript:void(0);' }}" target="_blank">
            <img src="{{asset($item->avatar)}}" alt="{{$item->getTranslate('name')}}">
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="form__register__home">
    <div class="container-fix">
      <div class="row">
        <div class="col-md-6">
          <p class="title__desc">
            {{__('register_commit')}}
          </p>
        </div>
        <div class="col-md-6">
          <form action="" method="">
            @csrf
            <div class="title__form">
              <p class="title">{{__('register_info')}}</p>
              <img src="{{asset('frontend/svg/logo-form.svg')}}" alt="">
            </div>
            <hr>
            <div class="form__content">
              <div class="form__item">
                <input type="text" class="item form-control" id="full_name" name="full_name"
                  placeholder="{{__('register_name')}}">
              </div>
              <div class="form__item">
                <input type="email" class="item form-control" id="email" name="email" placeholder="{{__('Email')}}">
              </div>
              <div class="form__item">
                <input type="text" class="item form-control" id="phone" name="phone"
                  placeholder="{{__('register_phone')}}">
              </div>
              <div class="form__item">
                <input type="text" class="item form-control" id="address" name="address"
                  placeholder="{{__('register_address')}}">
              </div>
              <div class="form__item">
                <select type="select" class="item form-control" id="advise" name="advise">
                  <option value="" selected hidden>{{__('register_consult')}}</option>
                  <option value>{{__('register_consult')}}</option>
                  <option value="Nhà máy điện">{{__('register_option1')}}</option>
                  <option value="Năng lượng tái tạo">{{__('register_option2')}}</option>
                  <option value="Kéo dây vượt biển">{{__('register_option3')}}</option>
                </select>
              </div>
            </div>
            <div class="form__submit">
              <button class="btn btn__form__custom" type="button">
                <span>{{__('register')}}</span>
                <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
              </button>
            </div>
          </form>
          <p class="notified__content">
            <img src="{{asset('frontend/svg/bell-check-icon.svg')}}" alt="">
            <span>
              {{__('take info')}}
            </span>
          </p>
        </div>
      </div>
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

  </div>
</main>
<!-- Modal -->
<div class="modal fade" id="modalAccept" tabindex="-1" role="dialog" aria-labelledby="modalAcceptTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-accept" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{ asset('frontend/svg/x.svg') }}" alt="">
      </button>
      <h3>Đăng kí thành công</h3>
      <div id="icon-accept"></div>
      <p>Cảm ơn bạn đã đăng ký nhận thông tin. Chúng tôi sẽ liên hệ ngay với bạn sớm nhất!</p>
    </div>
  </div>
</div>

@endsection
@section('script')
<script src="{{asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js?v=12')}}"></script>
<script>
  $('.hero-carousel').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            touchDrag: false,
            mouseDrag: false,
            autoplay: true,
            responsiveClass: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            items:1,
            // responsive: {
            //     0: {
            //         items: 1,
            //     },
            //     600: {
            //         items: 1,
            //     },
            //     1000: {
            //         items: 1,
            //     },
            // },
        });
        $(".hero-carousel").on("changed.owl.carousel", function () {
            $(".background__slider").css("animation", "none");
            window.requestAnimationFrame(function () {
                $(".background__slider").css("animation", "");
            });
        });

        var Lowl = $(".hero-carousel");
        $(".next-slider").click(function () {
            Lowl.trigger('next.owl.carousel');
        });

        $(".prev-slider").click(function () {
            Lowl.trigger('prev.owl.carousel');
        });


        $('.we__worthy__slide').owlCarousel({
            loop: true,
            margin: 35,
            nav: false,
            dots: true,
            touchDrag: true,
            mouseDrag: true,
            autoplay: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.2,
                    margin: 16,
                },
                600: {
                    items: 1.3,
                },
                1000: {
                    items: 1.3,
                },
            },
        });

        var Lowls = $(".we__worthy__slide");
        $(".next-we-worthy-slider").click(function () {
            Lowls.trigger('next.owl.carousel');
        });


        $('.service__box__home').owlCarousel({
            loop: true,
            margin: 26,
            nav: false,
            dots: true,
            touchDrag: true,
            mouseDrag: true,
            autoplay: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });

        $('.feedback__list__carousel').owlCarousel({
            loop: false,
            margin: 60,
            nav: false,
            dots: true,
            touchDrag: true,
            mouseDrag: true,
            autoplay: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
            },
        });

        $('.list__logo__partner').owlCarousel({
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
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
            },
        });

        $(".commit__introduce").owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            mouseDrag:false,
            touchDrag: false,
            items: 4,
            responsive: {
            0: {
                items: 1,
            },
            576: {
              items: 2,
              margin: 15,
            },
            768: {
                items: 3,
                margin: 10,
                loop: true,
                dots: true,
                mouseDrag:true,
                touchDrag: true,
            },
            992: {
                items: 4,
                
            },
          },
        });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
<script>
  // subscribe-information
  $('.btn__form__custom').on("click", function(event) {
    event.preventDefault();
    var fullname =  $('#full_name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var advise = $('#advise').val();
    var address = $('#address').val();
    var form_data = new FormData();
    form_data.append('fullname', fullname);
    form_data.append('phone', phone);
    form_data.append('email', email);
    form_data.append('address', address);
    form_data.append('advise', advise);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        url: "/subscribe-information",
        data: form_data,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (result) {
            if(result.success){
              $('#modalAccept').modal('show');
              loadSub();
              setTimeout(() => {
                $('#modalAccept').modal('hide');
                location.reload();
              }, "3000");
              $(this).off(event);
            }else{
              $.each(result.error, function( key, value ) {
                  toastr["error"](value);
              });
            }
        },
        error: function (error) {
            alert('Vui lòng thử lại !!!');
        }
    });
    
  });

 function loadSub(){
  var animation = bodymovin.loadAnimation({
    // animationData: { /* ... */ },
    container: document.getElementById('icon-accept'), // required
    path:'/frontend/accept.json', // required
    renderer: 'svg', // required
    loop: false, // optional
    // loopComplete:true,
    autoplay: true, // optional
    name: "Icon Animation",
     // optional
  });
};
</script>
@endsection