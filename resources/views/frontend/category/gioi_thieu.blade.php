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
<link rel="stylesheet" href="{{ asset('frontend/css/introduce.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="introduce-top">
    <div class="container-fix">
      <div class="row">
        <div class="col-md-7 left-introduce-top">
          <img src="{{asset('frontend/images/introduce.jpg')}}" alt="" width="100%">
          <div class="title-intro">
            <img src="{{asset('frontend/images/intro-around.svg')}}" alt="" class="around">
            <h3>10</h3>
            <p>{{ __('More than 10 years of construction and development')}}</p>
          </div>
        </div>
        <div class="col-md-5 right-introduce-top">
          <h5>{{ __('ELECTRICAL INSTALLATION COMPANY LIMITED 1 - SOUTH')}}</h5>
          <h3>{{ __('History of formation and development')}}</h3>
          <p>
            {{ __('description introduct top')}}
          </p>
          <ul>
            <li>
              <img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">
              {{ __('Construction of substations up to 500kV')}}
            </li>
            <li><img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">
              {{ __('Construction and installation of underground cables')}}
            </li>
            <li><img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">
              {{ __('Implementation of renewable energy projects and industrial parks')}}
            </li>
            <li><img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">
              {{ __('Construction of overhead transmission lines')}}
            </li>
          </ul>
          <div class="play-video">
            <img src="{{asset('frontend/images/play-icon.svg')}}" alt="">
            <span class="line"></span>
            <p>{{ __('WATCH VIDEO')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mission">
    <div class="container-fix">
      <div class="row">
        <div class="col-md-6">
          <div class="mission-left">
            <h3>{{ __('Mission vision and core values')}}</h3>
            <ul>
              <li>{{ __('To become the leading unit in the field of electrical construction and installation in the South region.')}}</li>
              <li>{{ __('Continuous innovation to create smart, modern electrical works, connected to the power system')}}</li>
              <li>{{ __('Creativity, speed, reliability.')}}</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 mission-right">
          <img src="{{asset('frontend/images/mission-bg.jpg')}}" alt="">
        </div>
      </div>
    </div>
    <div class="owl-carousel owl-mission">
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon.svg')}}" alt="" />
        <h4>{{ __('Vision')}}</h4>
        <p>{{ __('Participating in EPC general contractor for power grid works.')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon1.svg')}}" alt="" />
        <h4>{{ __('Mission')}}</h4>
        <p>{{ __('Creating outstanding values​ for Partners, Investors, Employees and Society..')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon2.svg')}}" alt="" />
        <h4>{{ __('Core values')}}</h4>
        <p>{{ __('Systems thinking, speed action. Trust is the power to create sustainable development')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon.svg')}}" alt="" />
        <h4>{{ __('Vision')}}</h4>
        <p>{{ __('Participating in EPC general contractor for power grid works.')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon1.svg')}}" alt="" />
        <h4>{{ __('Mission')}}</h4>
        <p>{{ __('Creating outstanding values​ for Partners, Investors, Employees and Society..')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon2.svg')}}" alt="" />
        <h4>{{ __('Core values')}}</h4>
        <p>{{ __('Systems thinking, speed action. Trust is the power to create sustainable development')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon1.svg')}}" alt="" />
        <h4>{{ __('Mission')}}</h4>
        <p>{{ __('Creating outstanding values​ for Partners, Investors, Employees and Society..')}}</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon2.svg')}}" alt="" />
        <h4>{{ __('Core values')}}</h4>
        <p>{{ __('Systems thinking, speed action. Trust is the power to create sustainable development')}}</p>
      </div>
    </div>
  </div>
  <div class="project">
    <div class="container-fix">
      <h3 class="project-title">
        {{ __('Latest projects')}}
      </h3>
      <div class="owl-nav d-md-block d-none">
        <a href="javascript:void(0);" class="prev-slider">
          <img src="{{asset('frontend/images/arrow-left.svg')}}" alt="">
        </a>
        <a href="javascript:void(0);" class="next-slider" style="padding-left: 20px">
          <img src="{{asset('frontend/images/arrow-right.svg')}}" alt="">
        </a>
      </div>
    </div>
    <div class="owl-carousel owl-project">
      @foreach ($listProject as $oneProject)
      <div class="item">
        <a href="{{route('detail-post',['slug' => $oneProject->slug,'id'=>$oneProject->id])}}">
          <img src="{{asset($oneProject->avatar)}}" alt="" />
        </a>
      </div>
      @endforeach

      {{-- <div class="item">
        <img src="{{asset('/frontend/images/project2.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project2.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project2.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project2.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project.jpg')}}" alt="" />
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/project2.jpg')}}" alt="" />
      </div> --}}
    </div>
  </div>
  <div class="leader-manage">
    <div class="container-fix">
      <div class="leader-manage-title">
        <h3>{{ __('Structure of the Leadership and Management apparatus in the Company')}}</h3>
        <p>
          {{ __('PC1MN  management apparatus, from the Board of Directors and management force, are all well-trained, highly qualified, professionally knowledgeable in the field of electrical construction and installation.')}}
        </p>
      </div>
    </div>
    <div class="leader-manage-content">
      <div class="container-fix">
        <div class="owl-nav d-lg-block d-none">
          <a href="javascript:void(0);" class="prev-owl">
            <img src="{{asset('frontend/images/arrow-icon.svg')}}" alt="">
          </a>
          <a href="javascript:void(0);" class="next-owl">
            <img src="{{asset('frontend/images/arrow-icon.svg')}}" alt="">
          </a>
        </div>
        <div class="owl-carousel owl-leader-manage">
          @foreach ($listManagement as $oneMana)
          <div class="item">
            <div class="item-img">
              <img src="{{($oneMana->avatar)? asset($oneMana->avatar) : asset('/frontend/images/person.svg')}}"
                alt="" />
            </div>
            <h3>{{ $oneMana->getTranslate('name') }}</h3>
            <p>{{ __('Position')}}: {{$oneMana->getTranslate('position')}}</p>
          </div>
          @endforeach
        </div>
        {{-- @if($listManagement->toArray())
        <div class="owl-carousel owl-leader-manage">
          @foreach ($listManagement as $oneMana)
          <div class="item">
            <div class="item-img">
              <img src="{{($oneMana->avatar)? asset($oneMana->avatar) : asset('/frontend/images/person.svg')}}"
                alt="" />
            </div>
            <h3>Ông: {{ $oneMana->getTranslate('name') }}</h3>
            <p>Chức vụ: {{$oneMana->getTranslate('position')}}</p>
          </div>
          @endforeach
        </div>
        @else
        <div class="owl-carousel owl-leader-manage">
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: LÊ MINH ĐOAN</h3>
            <p>Chức vụ: Giám Đốc</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: NGUYỄN ĐỨC LAM</h3>
            <p>Chức vụ: Phó Giám Đốc</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: LÊ VĂN TÂN</h3>
            <p>Chức vụ: Phó Giám Đốc</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: NGUYỄN KHÁNH LONG</h3>
            <p>Chức vụ: Kế Toán Trưởng</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: NGUYỄN VĂN THỊNH</h3>
            <p>Chức vụ: TP Tổ Chức Nhân Sự</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: LÊ MINH ĐOAN</h3>
            <p>Chức vụ: Giám Đốc</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: NGUYỄN ĐỨC LAM</h3>
            <p>Chức vụ: Phó Giám Đốc</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: LÊ VĂN TÂN</h3>
            <p>Chức vụ: Phó Giám Đốc</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: NGUYỄN KHÁNH LONG</h3>
            <p>Chức vụ: Kế Toán Trưởng</p>
          </div>
          <div class="item">
            <div class="item-img">
              <img src="{{asset('/frontend/images/person.svg')}}" alt="" />
            </div>
            <h3>Ông: NGUYỄN VĂN THỊNH</h3>
            <p>Chức vụ: TP Tổ Chức Nhân Sự</p>
          </div>

        </div>
        @endif --}}
      </div>
      <button class="diagram_manage-btn">
        <img src="{{asset('frontend/images/person-icon.svg')}}" alt="">
        <span>Sơ Đồ Tổ Chức</span>
        <img src="{{asset('frontend/images/chevron.down.svg')}}" alt="" class="chevron">
      </button>
    </div>
  </div>
  <div class="diagram_manage">
    <div class="container-fix">
      <h3>SƠ ĐỒ TỔ CHỨC BỘ MÁY QUẢN LÝ PC1 MN <br>
        GIAI ĐOẠN 2022-2025</h3>
      <img src="{{asset('frontend/images/diagram_manage.svg')}}" alt="" width="100%" class="d-sm-block d-none">
      <img src="{{asset('frontend/images/diagram_manage-mb.svg.svg')}}" alt="" width="100%" class="d-sm-none d-block">
    </div>
  </div>
</main>
@endsection
@section('script')
<script>
  $(document).ready(function() {
        $(".diagram_manage-btn").click(function() {
          $(".diagram_manage-btn").toggleClass("open");
          $(".diagram_manage").toggleClass("open");
        });

        $(".next-slider").click(function () {
          $(".owl-project").trigger('next.owl.carousel');
        });

        $(".prev-slider").click(function () {
          $(".owl-project").trigger('prev.owl.carousel');
        });

        $(".next-owl").click(function () {
          $(".owl-leader-manage").trigger('next.owl.carousel');
        });

        $(".prev-owl").click(function () {
          $(".owl-leader-manage").trigger('prev.owl.carousel');
        });
    });
</script>

<script src="{{ asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}?v={{VERSION}}"></script>
@endsection