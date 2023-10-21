@extends('frontend.layout.index')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
<style>
  .w-773 {
    max-width: 773px;
    margin: auto
  }

  .left-main-cate.box-seach {
    margin-bottom: 25px;
    border-bottom: 1px solid #DADADA;
    padding-bottom: 20px;
  }

  .left-main-cate.box-seach:last-child {
    margin-bottom: 0;
  }

  .left-main-cate.box-seach .date__blog__main__top {
    font-weight: 400;
    font-size: 15px;
    line-height: 24px;
    color: #929292;
    margin-bottom: 0;
  }

  .key-seach {
    justify-content: space-between;
    align-items: center;
    margin-bottom: 45px;
    padding-top: 6px;
  }

  .key-seach .keyword {
    font-weight: 700;
    font-size: 32px;
    line-height: 55px;
    color: #27343A;
  }

  .detail__blog__main__box {
    display: grid;
    align-content: space-between;
  }

  ._seach .detail__blog__main__box .title__blog__main__top {
    font-weight: 700;
    font-size: 18px;
    line-height: 28px;
    color: #27343A;
  }

  ._seach .detail__blog__main__box .intro__blog__main__top {
    font-weight: 400;
    font-size: 16px;
    line-height: 26px;
    text-align: justify;
    color: #27343A;
  }

  .page {
    display: flex;
    justify-content: center;
  }

  @media only screen and (max-width: 768px) {
    ._seach .detail__blog__main__box .title__blog__main__top {
      font-weight: 700;
      font-size: 14px;
      line-height: 20px;
      color: #27343A;
    }

    .key-seach {
      margin-bottom: 25px;
    }

    ._seach .box__detail__blog .key-seach .keyword {
      font-weight: 500;
      font-size: 15px;
      line-height: 24px;
      color: #27343A;
    }

    .img__blog__detail__main {
      padding-right: 0px !important
    }

    .key-seach .keyword {
      font-weight: 500;
      font-size: 15px;
      line-height: 24px;
      color: #27343A;
    }

    .search__header__input {
      outline: none;
      border: none;
      border: 0.5px solid #ebebeb;
      width: 100%;
      padding: 10px;
      position: relative;
    }

    .search__header__input::placeholder {
      color: #27343a;
    }

    .search__header__input:focus {
      border: 1px solid #02B3AC;
    }

    .box-search {
      margin: 15px;
      margin-top: 80px;
    }

    .box-search img {
      position: absolute;
      top: 11px;
      right: 15px;
      width: 24px;
      height: 24px;
    }
  }
</style>
@endsection
@section('content')
<main>
  {{-- <section class="main_banner_cate">
    <div class="nav__images cate" style="background-image: url({{ asset('frontend/images/nav_cate.png') }});">
      <div class="navbar__gadient ">
        <div class="w-1176 main-content position-relative ">
          <div class="position-absolute ">
            <div class="content__navbar">
              <h1 class="tile__navbar fs-32">
                <a href="#" class="">{{ __('search') }}</a>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <div class="w-1176 mt-md-4 mt-3 mb-2">
    <div class="_seach mb-5">
      <div class=" justify-content-between">
        <div class="w-773">
          <div class="key-seach d-flex">
            <div class="_keyword">
              <h1 class="keyword">{{(App::currentLocale() == 'vn') ? "Từ khoá" : "Tags"}} : {{$oneTag->title_vi}}</h1>
            </div>
            {{-- <div class="_count">
              <span class="count-news">{{$countSeach}} tin</span>
            </div> --}}

          </div>
          @foreach ($post as $item => $onePost)
          <div class="left-main-cate box-seach">
            <div class="">
              <div class="box__detail__blog row ">
                <div class="img__blog__detail__main col-5">
                  <div class="thumb-img">
                    <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                      <img src="{{ asset('/resize/310x200'.$onePost->avatar) }}" alt="">
                    </a>
                  </div>
                </div>
                <div class="detail__blog__main__box col-7">
                  <div class="">
                    <h2 class="title__blog__main__top">
                      <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                        {{(App::currentLocale() == 'vn') ? $onePost->title : $onePost->title_en}}
                      </a>
                    </h2>
                    <p class="intro__blog__main__top d-none d-md-block">{{(App::currentLocale() == 'vn') ?
                      $onePost->description : $onePost->description_en}}</p>
                  </div>
                  <p class="date__blog__main__top">{{date("d/m/Y", strtotime($onePost->created_at))}}</p>
                </div>
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
