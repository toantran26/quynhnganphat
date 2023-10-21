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
<link rel="stylesheet" href="{{ asset('frontend/css/document.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="document_banner">
    <div class="container-fix">
      <h3>{{$category->getTranslate('title')}}</h3>
    </div>
  </div>
  <div class="document_content container-fix">
    <div class="row">
        @foreach ($listDocument as $item)
        <div class="col-md-4 col-12">
            <div class="document_item">
              <div class="document_img">
                <img src="{{ asset($item->avatar) }}" alt="">
              </div>
              <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                <h3>{{ $item->getTranslate('title')}}</h3>
              </a>
              <p>{{ $item->getTranslate('description')}}</p>
            </div>
          </div>
        @endforeach
        
      {{-- <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum dolor sit</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur. Urna diam ut non dolor id eget.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum dolor sit amet consectetur.</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur. Urna diam ut non dolor id eget. Bibendum leo quisque nam ac
            dignissim ullamcorper risus enim enim.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum dolor sit</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur. Urna diam ut non dolor id eget.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum dolor sit amet consectetur.</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur. Urna diam ut non dolor id eget. Bibendum leo quisque nam ac
            dignissim ullamcorper risus enim enim.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum dolor sit</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur. Urna diam ut non dolor id eget.</p>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="document_item">
          <div class="document_img">
            <img src="{{ asset('frontend/images/background-feedback.jpg') }}" alt="">
          </div>
          <a href="#">
            <h3>Lorem ipsum</h3>
          </a>
          <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
      </div> --}}
    </div>
    @include('component.pagination', $object = $listDocument)
  </div>
</main>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@endsection