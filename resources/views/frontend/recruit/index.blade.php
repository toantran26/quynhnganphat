@extends('frontend.layout.index')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/recruit.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>

  <div class="recruit_banner">
    <div class="container-fix">
      <h3>Tuyển Dụng & Nhân Sự</h3>
    </div>
  </div>
  <div class="recruit_content container-fix">
    <h3 class="recruit_title">
      Cơ hội việc làm
    </h3>
    <div class="row">
      @foreach ($listJobs as $oneJobs)
      <div class="col-md-4">
        <div class="recruit_content_item">
          <div class="recruit_content_bg">
            <img src="{{asset($oneJobs->avatar)}}" alt="recruit_bg">
          </div>
          <div class="recruit_box">
            <div class="recruit_content_img">
              <img src="{{($oneJobs->icon_avatar) ?asset($oneJobs->icon_avatar): asset('frontend/svg/recruit2.svg') }}"
                alt="">
            </div>
            <h5>{{$oneJobs->title_vi}}</h5>
            <div class="recruit_content_info">
              <p>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 2.5C6.75329 2.5 2.5 6.75329 2.5 12C2.5 17.2467 6.75329 21.5 12 21.5C17.2467 21.5 21.5 17.2467 21.5 12C21.5 6.75329 17.2467 2.5 12 2.5ZM1.5 12C1.5 6.20101 6.20101 1.5 12 1.5C17.799 1.5 22.5 6.20101 22.5 12C22.5 17.799 17.799 22.5 12 22.5C6.20101 22.5 1.5 17.799 1.5 12ZM10.6667 13.5C9.47005 13.5 8.5 14.47 8.5 15.6667C8.5 16.1269 8.8731 16.5 9.33333 16.5H14.6667C15.1269 16.5 15.5 16.1269 15.5 15.6667C15.5 14.47 14.53 13.5 13.3333 13.5H10.6667ZM7.5 15.6667C7.5 13.9178 8.91777 12.5 10.6667 12.5H13.3333C15.0822 12.5 16.5 13.9178 16.5 15.6667C16.5 16.6792 15.6792 17.5 14.6667 17.5H9.33333C8.32081 17.5 7.5 16.6792 7.5 15.6667ZM10.5 8C10.5 7.17157 11.1716 6.5 12 6.5C12.8284 6.5 13.5 7.17157 13.5 8C13.5 8.82843 12.8284 9.5 12 9.5C11.1716 9.5 10.5 8.82843 10.5 8ZM12 5.5C10.6193 5.5 9.5 6.61929 9.5 8C9.5 9.38071 10.6193 10.5 12 10.5C13.3807 10.5 14.5 9.38071 14.5 8C14.5 6.61929 13.3807 5.5 12 5.5Z"
                    fill="" />
                </svg>Số lượng: {{$oneJobs->amount}} người
              </p>
              <p>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 2.5C6.75329 2.5 2.5 6.75329 2.5 12C2.5 17.2467 6.75329 21.5 12 21.5C17.2467 21.5 21.5 17.2467 21.5 12C21.5 6.75329 17.2467 2.5 12 2.5ZM1.5 12C1.5 6.20101 6.20101 1.5 12 1.5C17.799 1.5 22.5 6.20101 22.5 12C22.5 17.799 17.799 22.5 12 22.5C6.20101 22.5 1.5 17.799 1.5 12ZM8.49988 9.74342C8.49988 8.50441 9.50429 7.5 10.7433 7.5H11.4999V6.5C11.4999 6.22386 11.7237 6 11.9999 6C12.276 6 12.4999 6.22386 12.4999 6.5V7.5H12.9999C14.3806 7.5 15.4999 8.61929 15.4999 10C15.4999 10.2761 15.276 10.5 14.9999 10.5C14.7237 10.5 14.4999 10.2761 14.4999 10C14.4999 9.17157 13.8283 8.5 12.9999 8.5H12.4999V11.6396L13.9659 12.1283C14.882 12.4337 15.4999 13.2909 15.4999 14.2566C15.4999 15.4956 14.4955 16.5 13.2565 16.5H12.4999V17.5C12.4999 17.7761 12.276 18 11.9999 18C11.7237 18 11.4999 17.7761 11.4999 17.5V16.5H10.9999C9.61917 16.5 8.49988 15.3807 8.49988 14C8.49988 13.7239 8.72374 13.5 8.99988 13.5C9.27602 13.5 9.49988 13.7239 9.49988 14C9.49988 14.8284 10.1715 15.5 10.9999 15.5H11.4999V12.3604L10.0339 11.8717C9.11778 11.5663 8.49988 10.7091 8.49988 9.74342ZM11.4999 11.3063V8.5H10.7433C10.0566 8.5 9.49988 9.0567 9.49988 9.74342C9.49988 10.2786 9.84235 10.7538 10.3501 10.923L11.4999 11.3063ZM12.4999 12.6937V15.5H13.2565C13.9432 15.5 14.4999 14.9433 14.4999 14.2566C14.4999 13.7214 14.1574 13.2462 13.6497 13.077L12.4999 12.6937Z"
                    fill="" />
                </svg>Mức lương: {{$oneJobs->offer}}
              </p>
            </div>
            <a href="{{ route('detail-jobs',['slug' => $oneJobs->slug,'id'=>$oneJobs->id])}}" class="see-detail">
              Xem chi tiết
              <svg width="27" height="14" viewBox="0 0 27 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M19.5908 0L25.5908 6L26.1211 6.53033L25.5908 7.06066L19.5908 13.0607L18.5301 12L23.2498 7.28033H0.0604343V5.78033H23.2498L18.5301 1.06066L19.5908 0Z"
                  fill="#"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @endforeach
      <div class="d-sm-none col-12">
        <a href="#" class="see-more">
          <span>Xem thêm</span>
          <svg width="27" height="14" viewBox="0 0 27 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M19.5908 0L25.5908 6L26.1211 6.53033L25.5908 7.06066L19.5908 13.0607L18.5301 12L23.2498 7.28033H0.0604343V5.78033H23.2498L18.5301 1.06066L19.5908 0Z"
              fill="#"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>
  <div class="develop container-fix">
    <h3 class="recruit_title">
      Phát triển cùng PC1 Group
    </h3>
    <div class="row develop-content">
      <div class="col-md-4">
        <a href="#">
          <img src="{{asset('/frontend/images/dev1.jpg')}}" alt="" width="100%">
        </a>
      </div>
      <div class="col-md-4">
        <a href="#">
          <img src="{{asset('/frontend/images/dev2.jpg')}}" alt="" width="100%">
        </a>
      </div>
      <div class="col-md-4">
        <a href="#">
          <img src="{{asset('/frontend/images/dev3.jpg')}}" alt="" width="100%">
        </a>
      </div>
      <div class="col-md-6">
        <a href="#">
          <img src="{{asset('/frontend/images/dev4.jpg')}}" alt="" width="100%">
        </a>
      </div>
      <div class="col-md-6">
        <a href="#">
          <img src="{{asset('/frontend/images/dev5.jpg')}}" alt="" width="100%">
        </a>
      </div>
    </div>
  </div>

</main>
@endsection
@section('script')
<script src="{{ asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}?v=1"></script>
@endsection