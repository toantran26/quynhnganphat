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
<link rel="stylesheet"
  href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css?v='.time()) }}">
<link rel="stylesheet" href="{{asset('frontend/css/images.css?v='.time())}}">
<link rel="stylesheet" href="{{asset('frontend/css/video.css?v='.time())}}">

@endsection
@section('content')
<main>
  <div class="title">
    <ul>
      <li class="library_image {{(!$keyLast || $keyLast =='image') ? 'active' : '' }}"><a href="#">
          <p>{{__('hình ảnh')}}</p>
        </a></li>
      <li class="library_video {{($keyLast =='video') ? 'active' : '' }}"><a href="#">
          <p>{{__('video')}}</p>
        </a></li>
    </ul>
  </div>
  <div id="library_image" class="box__content {{(!$keyLast || $keyLast =='image') ? 'show' : '' }}">
    @foreach ($listlibrary['listImage'] as $key=> $item)
    <div class="item__box__image {{$key %2 != 0 ? 'item__box__image__inverse':''}}">
      <div class="container-fix">
        <div class="row">
          <div class="col-md-8 item__image__box">
            <div class="image__list__item">
              <img src="{{asset('frontend/images/image-item1.jpg')}}" alt="">
            </div>
            <div class="image__list__item">
              <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}" class="image__list__item__img">
                <img src="{{ asset($item->avatar) }}" alt="">
              </a>
              <div class="view__more">
                <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                  <img src="{{asset('frontend/svg/plus-image-icon.svg')}}" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 title__item__post">
            <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
              <p>{{$item->getTranslate('title')}}</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @include('component.pagination',$object = $listlibrary['listImage'])
  </div>

  <div id="library_video" class="box__content {{($keyLast =='video') ? 'show' : '' }}">
    @foreach ($listlibrary['listVideo'] as $key=> $item)
    <div class="item__box__video {{$key %2 != 0 ? 'item__box__video__inverse':''}}">
      <div class="container-fix">
        <div class="row">
          <div class="col-md-12">
            <div class="item">
              <div class="video__box">
                <div class="box__item__video">
                  <img src="{{ asset($item->avatar) }}" alt="">
                  <div class="icon__play">
                    <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                      <img src="{{asset('frontend/svg/play-icon-video.svg')}}" alt="">
                    </a>
                  </div>
                </div>
                <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                  <p class="title">
                    {{$item->getTranslate('title')}}
                  </p>
                </a>
              </div>
              <div class="img__list__video">
                <img src="{{asset('frontend/images/images-video-list.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    {{-- @endfor --}}
    @include('component.pagination',$object = $listlibrary['listVideo'])
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
<script>
  $(document).ready(function() {
            // $('.library_image').

            $('.library_image').click(function(){
                $('#library_image').addClass('show');
                $(this).addClass('active');
                $('.library_video').removeClass('active');
                $('#library_video').removeClass('show');
                return false;
            });
            $('.library_video').click(function(){
                $('#library_video').addClass('show');
                $(this).addClass('active');
                $('.library_image').removeClass('active');
                $('#library_image').removeClass('show');

                return false;
            });
        })
</script>
@endsection