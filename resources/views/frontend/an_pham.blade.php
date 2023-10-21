@extends('frontend.layout.index')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/document.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="document_banner">
    <div class="container-fix">
      <h3>Ấn Phẩm</h3>
    </div>
  </div>
  <div class="document_content container-fix">
    <div class="row">
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
    </div>
    {{-- @include('component.pagination') --}}
  </div>
</main>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@endsection