@extends('frontend.layout.index')
@section('SEO')

<title>{{ConfigSite::getInfoByName('title_seo')}}</title>
<meta name="keywords" content="{{ConfigSite::getInfoByName('key_seo')}}">
<meta name="description" charset="UTF-8" content="{{ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="title" charset="UTF-8" content="{{ConfigSite::getInfoByName('title_seo')}}" />

<meta property="og:title" content="{{ConfigSite::getInfoByName('title_seo')}}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{asset('frontend/images/logo.png')}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:description" content="{{ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="og:keywords" content="{{ConfigSite::getInfoByName('key_seo')}}">

@endsection
@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/video.css?v='.time())}}">
@endsection
@section('content')
<main>
  <div class="title">
    <ul>
      <li><a href=".">
          <p>{{__('hình ảnh')}}</p>
        </a></li>
      <li><a href=".">
          <p>{{__('video')}}</p>
        </a></li>
    </ul>
  </div>
  <div class="box__content">
    @for($i=0; $i<4; $i++) <div class="item__box__video {{$i %2 != 0 ? 'item__box__video__inverse':''}}">
      <div class="container-fix">
        <div class="row">
          <div class="col-md-12">
            <div class="item">
              <div class="video__box">
                <div class="box__item__video">
                  <img src="{{asset('frontend/images/image-video.jpg')}}" alt="">
                  <div class="icon__play">
                    <a href=".">
                      <img src="{{asset('frontend/svg/play-icon-video.svg')}}" alt="">
                    </a>
                  </div>
                </div>
                <p class="title">{{__('Nhà máy điện Đa- Mi')}}</p>
              </div>
              <div class="img__list__video">
                <img src="{{asset('frontend/images/images-video-list.jpg')}}" alt="">
              </div>
            </div>

          </div>
        </div>
      </div>
  </div>
  @endfor
  @include('component.pagination')
  </div>
</main>
@endsection
@section('script')

@endsection