@extends('frontend.layout.index')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<style>
  .input-contact {
    margin-bottom: 25px
  }

  .w-600 {
    max-width: 600px;
    margin: auto;
  }

  .lh-20 {
    line-height: 20px;
  }

  .btn-contact {
    background: #02B3AC;
    padding: 10px 75px;
    font-size: 16px;
    line-height: 24px;
    color: #ffffff;
    border-radius: unset;
  }

  .effect-9:focus-visible {
    border: 1px solid #02b3ad;
    box-shadow: unset;
  }

  .effect-9:focus {
    border: 1px solid #02b3ad;
    box-shadow: unset;
  }

  .text-intro-form {
    font-weight: 400;
    font-size: 16px;
    line-height: 20px;
    text-align: center;
    color: #666666;
    padding-top: 25px;
  }

  @media only screen and (max-width: 768px) {
    .text-intro-form {
      font-size: 12px;
      line-height: 15px;
      color: #27343A;
    }

    .form-mb {
      padding: 0 15px 30px 15px
    }
  }
</style>
<main>
  <div class="box-title">
    <h2>Liên hệ</h2>
  </div>
  <section class="main_banner_cate">
    <div class="nav__images cate" style="background-image: url({{ asset('frontend/images/banner-contact.png') }});">
      <div class="navbar__gadient ">
        <div class="w-1176 main-content position-relative ">
          <div class="position-absolute ">
            <div class="content__navbar">
              <h1 class="tile__navbar fs-32">
                <a href="{{route('fontend-jobs')}}" class="">{{ __('contact us') }}</a>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </section>
  <section class="mt-md-4 mt-0">
    <div class="frame-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2742842178404!2d105.86218411408232!3d20.981639586023928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac22b56b6b77%3A0xf388e1190b42a71f!2zNDcxIMSQLiBUYW0gVHJpbmgsIEhvw6BuZyBWxINuIFRo4bulLCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1662783703004!5m2!1svi!2s"
        width="800" height="600" style="border:0;" allowfullscreen="true" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>
  <div class="w-1176 mt-4 mb-2">
    <div class="_category mb-5">
      <div class="mt-3" style="background: #F8F9FA;">
        <div class="row">
          <div class="col-md-4 d-md-block d-none">
            <div class="thuthumb-img">
              <img src="{{asset('frontend/images/contact-letf-form.png')}}">
            </div>
          </div>
          <div class="col-md-8">
            <div class="w-600 form-mb">
              <form action="{{route('send-contact')}}" method="POST" class="custom-form">
                @csrf
                <h3 class="text-intro-form">{{(App::currentLocale() == 'vn')?'Vui lòng nhập thông tin vào form dưới đây để gửi yêu cầu':'Please enter your information in the form below to submit your request'}} </br>
                  {{(App::currentLocale() == 'vn')?'Xin cảm ơn!':'Thank you!'}} </h3>
                <div class="row mt-3 pt-1">
                  <div class="col-md-6 input-contact">

                    <div class="form-outline">
                      <input type="text" value="{{old('fullname')}}" class="form-control effect-9" name="fullname"
                        placeholder="{{(App::currentLocale() == 'vn')? 'Họ tên':'Full name'}} (*)" />
                      @error('fullname')
                      <p style="color: red; font-size: 12px;margin-bottom: 0;margin-top: 5px;">* {{$message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 input-contact">

                    <div class="form-outline">
                      <input type="text" value="{{old('phone')}}" class="form-control effect-9" name="phone"
                        placeholder="{{(App::currentLocale() == 'vn')? 'Số điện thoại':'Telephone'}} (*)" />
                      @error('phone')
                      <p style="color: red; font-size: 12px;margin-bottom: 0;margin-top: 5px;">* {{$message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 input-contact">

                    <div class="form-outline">
                      <input type="text" value="{{old('email')}}" class="form-control effect-9" name="email"
                        placeholder="Email (*)" />
                      @error('email')
                      <p style="color: red; font-size: 12px;margin-bottom: 0;margin-top: 5px;">* {{$message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 input-contact">

                    <div class="form-outline">
                      <input type="text" value="{{old('address')}}" class="form-control effect-9" name="address"
                        placeholder="{{(App::currentLocale() == 'vn')? 'Địa chỉ':'Addres'}}" />
                      @error('address')
                      <p style="color: red; font-size: 12px;margin-bottom: 0;margin-top: 5px;">* {{$message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12 input-contact">

                    <div class="form-outline">
                      <input type="text" value="{{old('title')}}" class="form-control effect-9" name="title"
                        placeholder="{{(App::currentLocale() == 'vn')? 'Tiêu đề ':'Title'}} (*)" />
                      @error('title')
                      <p style="color: red; font-size: 12px;margin-bottom: 0;margin-top: 5px;">* {{$message}}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12 input-contact">
                    <div class="form-outline">
                      <textarea rows="5" class="form-control effect-9" name="content"
                        placeholder="{{(App::currentLocale() == 'vn')? 'Nội dung':'Content'}}"><?php echo (old('content'));?></textarea>
                    </div>
                  </div>
                </div>

                <div class="submit">
                  <button class="btn btn-contact w-100">{{(App::currentLocale() == 'vn')? 'Gửi':'Submit'}}</button>
                </div>

              </form>
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
@endsection
