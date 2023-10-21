@extends('frontend.layout.index')
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
            <p>Hơn 10 năm xây dựng và phát triển</p>
          </div>
        </div>
        <div class="col-md-5 right-introduce-top">
          <h5>CÔNG TY TNHH MTV XÂY LẮP ĐIỆN 1 - MIỀN NAM</h5>
          <h3>Lịch sử hình thành và phát triển</h3>
          <p>
            Công ty TNHH Một thành viên Xây lắp Điện 1 miền Nam (PC1MN) được thành lập vào ngày 01 tháng 04 năm 2008
            theo
            quyết định số 12/2008/QĐ-PCC1 ngày 29/02/2008 của Hội Đồng Quản Trị Công ty CP Xây lắp Điện I (nay là Công
            ty
            Cổ phần Tập đoàn PC1).
          </p>
          <ul>
            <li>
              <img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">Thi công công trình trạm
              biến áp đến 500kV
            </li>
            <li><img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">Thi công lắp đặt cáp
              ngầm
            </li>
            <li><img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">Thực hiện các dự án
              năng
              lượng tái tạo và khu công nghiệp
            </li>
            <li><img src="{{asset('frontend/images/checkbox-circle.svg')}}" alt="checkbox-circle">Thi công đường dây
              truyền
              tải trên không</li>
          </ul>
          <div class="play-video">
            <img src="{{asset('frontend/images/play-icon.svg')}}" alt="">
            <span class="line"></span>
            <p>XEM VIDEO</p>
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
            <h3>Tầm nhìn sứ mệnh và giá trị cốt lõi</h3>
            <ul>
              <li>Trở thành đơn vị hàng đầu trong lĩnh vực xây lắp điện tại khu vực miền Nam.</li>
              <li>Sáng tạo không ngừng nhằm tạo ra các công trình điện thông minh, hiện đại, kết nối với hệ thống điện
                Quốc gia và khu vực.</li>
              <li>Sáng tạo, tốc độ, tin cậy.</li>
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
        <h4>Tầm nhìn</h4>
        <p>Tham gia tổng thầu EPC các công trình lưới điện.</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon1.svg')}}" alt="" />
        <h4>Sứ mệnh</h4>
        <p>Tạo ra nhiều giá trị vượt trội cho Đối tác, Nhà đầu tư, Người lao động và Xã hội..</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon2.svg')}}" alt="" />
        <h4>Giá trị cốt lõi</h4>
        <p>Tư duy hệ thống, hành động tốc độ.
          Tin cậy là sức mạnh tạo nên sự phát triển bền vững</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon.svg')}}" alt="" />
        <h4>Tầm nhìn</h4>
        <p>Tham gia tổng thầu EPC các công trình lưới điện.</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon1.svg')}}" alt="" />
        <h4>Sứ mệnh</h4>
        <p>Tạo ra nhiều giá trị vượt trội cho Đối tác, Nhà đầu tư, Người lao động và Xã hội..</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon2.svg')}}" alt="" />
        <h4>Giá trị cốt lõi</h4>
        <p>Tư duy hệ thống, hành động tốc độ.
          Tin cậy là sức mạnh tạo nên sự phát triển bền vững</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon1.svg')}}" alt="" />
        <h4>Sứ mệnh</h4>
        <p>Tạo ra nhiều giá trị vượt trội cho Đối tác, Nhà đầu tư, Người lao động và Xã hội..</p>
      </div>
      <div class="item">
        <img src="{{asset('/frontend/images/mission-icon2.svg')}}" alt="" />
        <h4>Giá trị cốt lõi</h4>
        <p>Tư duy hệ thống, hành động tốc độ.
          Tin cậy là sức mạnh tạo nên sự phát triển bền vững</p>
      </div>
    </div>
  </div>
  <div class="project">
    <div class="container-fix">
      <h3 class="project-title">
        Các dự án mới nhất
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
          <img src="{{asset('/frontend/images/project.jpg')}}" alt="" />
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
        <h3>Cơ cấu bộ máy Lãnh đạo, Quản lý trong Công Ty</h3>
        <p>Bộ máy quản lý của PC1MN, từ Ban Lãnh đạo và lực lượng quản lý đều được đào tạo bài bản, có trình độ cao, am
          hiểu nghiệp vụ trong lĩnh vực ngành nghề xây lắp điện.
        </p>
      </div>
    </div>
    <div class="leader-manage-content">
      <div class="container-fix">
        <div class="owl-nav d-md-block d-none">
          <a href="javascript:void(0);" class="prev-owl">
            <img src="{{asset('frontend/images/arrow-icon.svg')}}" alt="">
          </a>
          <a href="javascript:void(0);" class="next-owl">
            <img src="{{asset('frontend/images/arrow-icon.svg')}}" alt="">
          </a>
        </div>

        @if($listManagement->toArray())
        <div class="owl-carousel owl-leader-manage">
          @foreach ($listManagement as $oneMana)
          <div class="item">
            <div class="item-img">
              <img src="{{($oneMana->avatar)? asset($oneMana->avatar) : asset('/frontend/images/person.svg')}}"
                alt="" />
            </div>
            <h3>{{ $oneMana->name_vi }}</h3>
            <p>Chức vụ: {{$oneMana->position_vi}}</p>
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
        @endif
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