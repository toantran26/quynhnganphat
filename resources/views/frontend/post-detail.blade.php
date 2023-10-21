@extends('frontend.layout.index')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/post_detail.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="container-fix">
    <div class="post-detail">
      <h1>Thực hiện các dự án Năng lượng tái tạo và khu công nghiệp</h1>
      <div class="post-detail-info">
        <div class="time">
          <img src="{{ asset('frontend/svg/time-icon.svg') }}" alt="">
          <span>18:00 10-1-2023</span>
        </div>
        <ul class="social d-sm-flex d-none">
          <li><a href="#"><img src="{{ asset('frontend/svg/fb-icon-foot.svg') }}" alt=""></a></li>
          <li><a href="#"><img src="{{ asset('frontend/svg/instagram-icon-foot.svg') }}" alt=""></a></li>
          <li><a href="#"><img src="{{ asset('frontend/svg/zalo-icon-foot.svg') }}" alt=""></a></li>
          <li><a href="#"><img src="{{ asset('frontend/svg/linkded-icon-foot.svg') }}" alt=""></a></li>
        </ul>
      </div>
      <i class="description">Cùng với việc thi công xây dựng đường dây truyền tải và trạm biến áp, PC1MN đã đầu tư công
        nghệ và làm chủ kỹ
        thuật thi công cáp ngầm đến cấp điện áp 220kV. PC1MN đã tham gia xây dựng một số tuyến cáp ngầm trong nội đô
        Thành
        phố Hồ Chí Minh và các tỉnh thành khác, đảm bảo yêu cầu cao về chất lượng, tiến độ, an toàn tuyệt đối, mang lại
        độ
        tin cậy tuyệt đối với khách hàng...
      </i>
      <div class="post-detail-content">
        <figure class="expNoEdit "><img class="" src="{{ asset('frontend/images/detail-post.jpg') }}"
            alt="GS-TS Nguyễn Quang khám tư vấn về sức khỏe nam giới. Chuyên gia nam học đánh giá, chế độ ăn uống và sinh hoạt tác động đến sức khỏe tình dục"
            width="2048" height="1365">
          <figcaption class="expEdit">ĐZ 220kV Vĩnh Châu - Sóc Trăng
          </figcaption>
        </figure>
        <p>
          Trong số các dự án điện gió đang triển khai trên địa bàn tỉnh Gia Lai, Nhà máy điện gió Ia Pết – Đăk Đoa 1 và
          Ia
          Pết - Đăk Đoa 2 tại huyện Đăk Đoa là hai trong những công trình có tiến độ thực hiện nhanh nhất hiện nay. Điều
          đó
          đã ghi nhận nỗ lực vượt bậc của Tổng thầu Công ty Cổ phần Xây lắp Điện I.</p>
        <br>
        <p>
          Vượt qua tất cả mọi khó khăn, thử thách về điều kiện thời tiết cũng như dịch bệnh. Công ty đã tích cực hoàn
          thiện
          thi công lắp đặt thành công TBA 500kV – Đăk Đoa và ĐZ 200kV. PCC1 Hoàng Mai và chủ đầu tư luôn phối hợp chặt
          chẽ
          trong các khâu thỏa thuận thiết kế kỹ thuật, phương án thi công và điều kiện đóng điện điểm đấu nối. Luôn đề
          cao
          chất lượng sản phẩm để đảm bảo an toàn cho lưới điện truyền tải khi dự án điện gió vận hành trong tương lai.
        </p>
        <br>
        <p>
          Nhờ sự linh hoạt và sáng tạo không ngừng trong công việc, ngày 11/9, TBA 500KV Pleiku 3 đóng điện thành công
          sau
          8
          tháng thi công. Tiếp đó ngày 16/9, ĐZ 220KV Ia Pết – Pleiku 3 và Trạm 220KV IA Pết cũng đóng điện thành công,
          trước sự hài lòng của chủ đầu tư. Đây cũng là hai điểm nhấn, nút thắt
        </p>
        <figure class="expNoEdit "><img class="" src="{{ asset('frontend/images/detail-post2.jpg') }}"
            alt="GS-TS Nguyễn Quang khám tư vấn về sức khỏe nam giới. Chuyên gia nam học đánh giá, chế độ ăn uống và sinh hoạt tác động đến sức khỏe tình dục"
            width="2048" height="1365">
          <figcaption class="expEdit">ĐZ 220kV Vĩnh Châu - Sóc Trăng
          </figcaption>
        </figure>
        <p>Trong số các dự án điện gió đang triển khai trên địa bàn tỉnh Gia Lai, Nhà máy điện gió Ia Pết – Đăk Đoa 1 và
          Ia Pết - Đăk Đoa 2 tại huyện Đăk Đoa là hai trong những công trình có tiến độ thực hiện nhanh nhất hiện nay.
          Điều đó đã ghi nhận nỗ lực vượt bậc của Tổng thầu Công ty Cổ phần Xây lắp Điện I.
        </p>
      </div>
      <div class="pseudonym">
        <img src="{{ asset('frontend/svg/edit-2.svg') }}" alt="">
        <span>PC1 Miền Nam</span>
      </div>
      <ul class="tag">
        <li>
          <img src="{{ asset('frontend/svg/tag-2.svg') }}" alt="">
        </li>
        <li><a href="#">Hoàng Mai Group</a></li>
        <li><a href="#">Chính phủ Việt Nam</a></li>
        <li><a href="#">An ninh mạng</a></li>
        <li><a href="#">VNPT Vinaphone</a></li>
      </ul>
    </div>
    <div class="post-related">
      <h2 class="post-related-title">Bài viết liên quan</h2>
      <div class="post-related-content row">
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <img src="{{ asset('frontend/images/tin1.jpg') }}" alt="" width="100%">
              <p>Đường dây</p>
            </div>
            <p class="date d-sm-block d-none">20/08/2020</p>
            <a href="#">
              <h3>
                TBA 220kV NMĐ mặt trời và mở rộng ngăn lộ TBA 220kV.
              </h3>
            </a>
            <p class="date d-block d-sm-none">20/08/2020</p>
          </div>
        </div>
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <img src="{{ asset('frontend/images/tin2.jpg') }}" alt="" width="100%">
              <p>TRẠM BIẾN ÁP</p>
            </div>
            <p class="date d-sm-block d-none">20/08/2020</p>
            <a href="#">
              <h3>
                Trạm biến áp 500kV Chơn Thành
              </h3>
            </a>
            <p class="date d-block d-sm-none">20/08/2020</p>
          </div>
        </div>
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <img src="{{ asset('frontend/images/tin3.jpg') }}" alt="" width="100%">
              <p>KỸ SƯ ĐIỆN</p>
            </div>
            <p class="date d-sm-block d-none">20/08/2020</p>
            <a href="#">
              <h3>
                Trạm biến áp 220kV Cần Đước
              </h3>
            </a>
            <p class="date d-block d-sm-none">20/08/2020</p>
          </div>
        </div>
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <img src="{{ asset('frontend/images/tin4.jpg') }}" alt="" width="100%">
              <p>PIN MẶT TRỜI</p>
            </div>
            <p class="date d-sm-block d-none">20/08/2020</p>
            <a href="#">
              <h3>
                TBA 220kV NMĐ mặt trời và mở rộng ngăn lộ TBA 220kV.
              </h3>
            </a>
            <p class="date d-block d-sm-none">20/08/2020</p>
          </div>
        </div>
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <img src="{{ asset('frontend/images/tin5.jpg') }}" alt="" width="100%">
              <p>CÁP NGẦM</p>
            </div>
            <p class="date d-sm-block d-none">20/08/2020</p>
            <a href="#">
              <h3>
                Trạm biến áp 500kV Chơn Thành
              </h3>
            </a>
            <p class="date d-block d-sm-none">20/08/2020</p>
          </div>
        </div>
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <img src="{{ asset('frontend/images/tin6.jpg') }}" alt="" width="100%">
              <p>THI CÔNG</p>
            </div>
            <p class="date d-sm-block d-none">20/08/2020</p>
            <a href="#">
              <h3>
                Trạm biến áp 220kV Cần Đước
              </h3>
            </a>
            <p class="date d-block d-sm-none">20/08/2020</p>
          </div>
        </div>
      </div>
    </div>
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