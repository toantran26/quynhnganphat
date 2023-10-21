@extends('frontend.layout.index')
@section('SEO')
<title>{{$category->getTranslate('title')}}</title>
<meta name="keywords" content="{{($category->key_seo) ? $category->key_seo : ConfigSite::getInfoByName('key_seo')}}">
<meta name="description" charset="UTF-8" content="{{($category->desc_seo) ? $category->desc_seo : ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="title" charset="UTF-8" content="{{($category->title_seo) ? $category->title_seo : $category->getTranslate('title')}}" />
<meta property="og:title" content="{{($category->title_seo) ? $category->title_seo : $category->getTranslate('title')}}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{asset('frontend/images/logo.png')}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:description" content="{{$category->desc_seo ?? ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="og:keywords" content="{{$category->key_seo ?? ConfigSite::getInfoByName('key_seo')}}">
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
      <p class="name__category">{{ $category->getTranslate('title')}}</p>
    </div>
  </div>
</nav>
{{-- <main>
  <div class="container-fix">
    <div class="row">
      @foreach ($listPost as $key => $onePost)
      <div class="col-md-4">
        <div class="post__box">
          <div class="avatar">
            <img src="{{asset($onePost->avatar)}}" alt="">
          </div>
          <div class="info__post">
            <p class="category__name">{{$onePost->category->getTranslate('title')}}</p>
            <p class="title">
              <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                {{$onePost->getTranslate('title')}}
              </a>
            </p>
            <p class="description">
              {{$onePost->getTranslate('description')}}
            </p>
            <div class="view__more">
              <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                <span>{{__('Xem thêm')}}</span>
                <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @include('component.pagination')
  </div>
</main>
</nav> --}}
<main>
  <div class="container-fix">
    <div class="row">
      @foreach ($listPost as $key => $onePost)
      <div class="col-md-4">
        <div class="post__box">
          <div class="avatar">
            <img src="{{asset($onePost->avatar)}}" alt="">
          </div>
          <div class="info__post">
            <p class="category__name">{{$onePost->category->getTranslate('title')}}</p>
            <p class="title">
              <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                {{$onePost->getTranslate('title')}}
              </a>
            </p>
            <p class="description">
              {{$onePost->getTranslate('description')}}
            </p>
            <div class="view__more">
              <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                <span>{{__('Xem thêm')}}</span>
                <img src="{{asset('frontend/svg/arrow-right.svg')}}" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @include('component.pagination', $object = $listPost)
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