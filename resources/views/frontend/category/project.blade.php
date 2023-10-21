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
<link rel="stylesheet" href="{{ asset('frontend/css/project.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="project_banner">
    <img src="{{ asset('frontend/images/project3.jpg') }}" alt="" width="100%">
    <div class="project_banner_bg"></div>
    <h3>{{ __('Featured projects')}}</h3>
  </div>
  <div class="project_banner_content container-fix">
    <div class="title_banner">
      {{ $category->getTranslate('title') }}
    </div>
    <div class="content_banner row">
      @foreach ($listPost as $key => $onePost)
      <div class="col-md-4">
        <div class="content_banner_item">
          <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
            <img src="{{ asset($onePost->avatar) }}" alt="">
          </a>
          <div class="content_banner_info">
            <p>  {{ $onePost->category->getTranslate('title')}}</p>
            <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
              <strong>{{$onePost->getTranslate('title')}}</strong>
            </a>
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
<script>
  $(document).ready(function() {
      
  });
</script>

<script src="{{ asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}?v={{VERSION}}"></script>
@endsection