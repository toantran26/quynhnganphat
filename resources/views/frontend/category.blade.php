@extends('frontend.layout.index')
@section('SEO')
<title>{{$category->title_vi}}</title>
<meta name="keywords" content="{{$category->key_seo ?? ConfigSite::getInfoByName('key_seo')}}">
<meta name="description" charset="UTF-8" content="{{$category->desc_seo ?? ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="title" charset="UTF-8" content="{{$category->title_seo ?? $category->title_vi}}" />
<meta property="og:title" content="{{$category->title_seo ?? $category->title_vi}}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{asset('frontend/images/logo.svg')}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:description" content="{{$category->desc_seo ?? ConfigSite::getInfoByName('desc_seo')}}" />
<meta name="og:keywords" content="{{$category->key_seo ?? ConfigSite::getInfoByName('key_seo')}}">
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="box-title">
    <h2>{{(App::currentLocale() == 'vn')?$category->title_vi : $category->title_en}}</h2>
  </div>
  <section class="main_banner_cate">
    <div class="nav__images cate" style="background-image: url({{ asset('frontend/images/nav_cate.png') }});">
      <div class="navbar__gadient ">
        <div class="w-1176 main-content position-relative ">
          <div class="position-absolute ">
            <div class="content__navbar">
              @if (@$category->parent)
              <div class="category_parent">
                <a href="{{route('detail-cate', $category->parent->slug)}}" class="">{{(App::currentLocale() ==
                  'vn')?$category->parent->title_vi : $category->parent->title_en}}</a>
              </div>
              @endif
              <h1 class="tile__navbar fs-32">
                <a id="category_id" data-id="{{ $category->id}}" href="{{route('detail-cate', $category->slug)}}"
                  class="">{{(App::currentLocale() == 'vn')?$category->title_vi : $category->title_en}}</a>
              </h1>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <div class="w-1176 mt-md-4 mt-3 mb-2">
    <div class="_category mb-5">
      <div class="d-md-flex justify-content-between">
        <div class="_main-left">
          <div>
            @foreach ($post as $item => $onePost)
            <div class="main-left">
              <div class="left-main-cate">
                <div class="">
                  <div class="box__detail__blog">
                    <div class="img__blog__detail__main">
                      <div class="thumb-img">
                        <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                          <img src="{{ asset('/resize/950x595'.$onePost->avatar) }}" alt="">
                        </a>
                      </div>
                      {{-- <div class="cate_blog">
                        <p class="cate_blog_tex">Tin tức</p>
                      </div> --}}
                    </div>
                    <div class="detail__blog__main__box">
                      <p class="date__blog__main__top">{{date("d/m/Y", strtotime($onePost->created_at))}}</p>
                      <h2 class="title__blog__main__top">
                        <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                          {{(App::currentLocale() == 'vn')?$onePost->title : $onePost->title_en}}
                        </a>
                      </h2>
                      <p class="intro__blog__main__top">{{(App::currentLocale() == 'vn')?$onePost->description :
                        $onePost->description_en}}</p>
                    </div>
                    <div class="button__more__blog__detail">
                      <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}"
                        class="btn">{{__('see_details')}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="page d-md-block d-none">
            @include('component.pagination', $object = $post)
          </div>
        </div>
        <div class="_main-right">
          <div class="right-top">
            <div class="cate_top_right_">
              @foreach ($listPostRight as $key => $onePost)
              <div class="top_small_list">
                <div class="row">
                  <div class="col-6 pr-0">
                    <div class="img-small-right position-relative">
                      <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                        <img src="{{ asset('/resize/476x264'.$onePost->avatar) }}" alt="{{$onePost->title}}">
                      </a>
                    </div>
                  </div>
                  <div class="col-6">
                    <div>
                      <div class="title-lbth">
                        <h5>
                          <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}"
                            class="smaill-line-r fix-text3" title="{{$onePost->title}}">
                            {{(App::currentLocale() == 'vn')?$onePost->title : $onePost->title_en}}
                          </a>
                        </h5>
                      </div>
                      <div class="time-top_smaill">
                        <p class="date__blog__main__top mb-0">{{date("d/m/Y", strtotime($onePost->created_at))}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @if($listPostRight->lastPage() > 1)
            <div class="see_more_rt d-md-block d-none" data-type="1">
              <p class="see_more_rt_b">{{__('see_more')}}</p>
            </div>
            @endif
            <div class="see_more_rt d-md-none d-block" data-type="2">
              <p class="see_more_rt_b">{{__('see_more')}}</p>
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
<script type="text/javascript">
  $(document).ready(function(){
            var page_r = 1;
            $('.see_more_rt').on('click',function(){
                var category_id =  $('#category_id').attr("data-id");
                var type =  $(this).attr("data-type");
                $.ajax({
                    headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
                    url: "/load-more-right",
                    type: 'GET',
                    data: {'page_r': page_r,'category_id':category_id,'type':type},
                    datatype: 'html',
                    success: function(data) {
                        $('.cate_top_right_').append(data);
                        page_r++;
                        if(type == 1){
                          if(page_r >=3){
                              $('.see_more_rt').css('display','none');
                          }
                        }
                    }
                });
            });
        });
</script>
@endsection