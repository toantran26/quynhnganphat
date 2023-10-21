@extends('frontend.layout.index')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/project.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="project_banner">
    <img src="{{ asset('frontend/images/project3.jpg') }}" alt="" width="100%">
    <div class="project_banner_bg"></div>
    <h3>Những dự án nổi bật</h3>
  </div>
  <div class="project_banner_content container-fix">
    <div class="title_banner">
      {{ $category->title_vi }}
    </div>
    <div class="content_banner row">
      @foreach ($listPost as $key => $onePost)
      <div class="col-md-4">
        <div class="content_banner_item">
          <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
            <img src="{{ asset($onePost->avatar) }}" alt="">
          </a>
          <div class="content_banner_info">
            <p>  {{ $onePost->category->title_vi}}</p>
            <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
              <strong>{{$onePost->title_vi}}</strong>
            </a>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-md-4">
        <div class="content_banner_item">
          <img src="{{ asset('frontend/images/project9.jpg') }}" alt="">
          <div class="content_banner_info">
            <p> Thi công xây lắp đường dây</p>
            <strong>Lorem ipsum dolor sit amet consectetur.</strong>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content_banner_item">
          <img src="{{ asset('frontend/images/project4.jpg') }}" alt="">
          <div class="content_banner_info">
            <p> Thi công xây lắp đường dây</p>
            <strong>Lorem ipsum dolor sit amet consectetur.</strong>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content_banner_item">
          <img src="{{ asset('frontend/images/project5.jpg') }}" alt="">
          <div class="content_banner_info">
            <p> Thi công xây lắp đường dây</p>
            <strong>Lorem ipsum dolor sit amet consectetur.</strong>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content_banner_item">
          <img src="{{ asset('frontend/images/project6.jpg') }}" alt="">
          <div class="content_banner_info">
            <p> Thi công xây lắp đường dây</p>
            <strong>Lorem ipsum dolor sit amet consectetur.</strong>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content_banner_item">
          <img src="{{ asset('frontend/images/project7.jpg') }}" alt="">
          <div class="content_banner_info">
            <p> Thi công xây lắp đường dây</p>
            <strong>Lorem ipsum dolor sit amet consectetur.</strong>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="content_banner_item">
          <img src="{{ asset('frontend/images/project8.jpg') }}" alt="">
          <div class="content_banner_info">
            <p> Thi công xây lắp đường dây</p>
            <strong>Lorem ipsum dolor sit amet consectetur.</strong>
          </div>
        </div>
      </div>
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