@extends('frontend.layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/search.css') }}?{{ VERSION }}">
    <link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
    <main>
        <div class="container-fix">
            <div class="page-search">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="search-key" id="key-search" data-search="{{ @$_GET['search'] }}" data-type="search">
                            Kết quả tìm kiếm: {{ @$_GET['search'] }} ( {{ $countKeySeach }} tin)
                        </h3>
                        <div class="search-post">
                            <div class="load-search-post">
                                @foreach ($listSearch as $item)
                                <div class="search-post-item">
                                    <div class="search-post-img">
                                        <img src="{{ asset($item->avatar) }}" alt="" width="100%">
                                        <p>{{ $item->category->getTranslate('title')}}</p>
                                    </div>
                                    <div class="time">
                                        <img src="{{ asset('frontend/svg/time-icon.svg') }}" alt="">
                                        <span>{{date("d-m-Y", strtotime($item->public_date))}}</span>
                                    </div>
                                    <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                                        <h3>{{$item->getTranslate('title')}}</h3>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @if($countKeySeach > 5)
                            <a class="see-more" style="cursor: pointer;">
                                Xem thêm
                                <img src="{{ asset('frontend/svg/arrow-right.svg') }}" alt="">
                            </a>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-4 page-search-right">
                        <div class="cate">
                            <h4 class="search-title">
                                Danh mục
                            </h4>
                            <ul>
                                <li>Xây lắp đường dây <span>(4)</span></li>
                                <li>Kéo dải cáp ngầm(cao, hạ thế) <span>(4)</span></li>
                                <li>Thiết bị thi công <span>(2)</span></li>
                                <li>Pin mặt trời <span>(2)</span></li>
                                <li>Nhà máy điện <span>(2)</span></li>
                                <li>Năng lượng tái tạo <span>(2)</span></li>
                            </ul>
                        </div>
                        <div class="intro">
                            <h4 class="search-title">
                                Giới thiệu
                            </h4>
                            <img src="{{ asset('frontend/images/search-bg.jpg') }}" alt="" width="100%">
                            <p>Công ty TNHH Một thành viên Xây lắp Điện 1 miền Nam (PC1MN) được thành lập vào ngày 01 tháng
                                04 năm 2008
                                theo quyết định số 12/2008/QĐ-PCC1 ngày 29/02/2008 của Hội Đồng Quản Trị Công ty CP Xây lắp
                                Điện I (nay là
                                Công ty Cổ phần Tập đoàn PC1).
                            </p>
                            <a href="{{ route('introduce')}}" class="see-more">
                                Xem thêm
                                <img src="{{ asset('frontend/svg/arrow-right.svg') }}" alt="">
                            </a>
                        </div>
                        <div class="gallery d-none d-sm-block">
                            <h4 class="search-title">
                                Hình ảnh
                            </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/image1.png') }}" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/project8.jpg') }}" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/search-img.jpg') }}" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/worthy-slide-item3.jpg') }}" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/dev2.jpg') }}" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/images/dev3.jpg') }}" alt="">
                                </div>
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
    <script>
        $(document).ready(function(){
            var page_r = 1;
            $('.see-more').on('click',function(){
                var search =  $('#key-search').attr('data-search');
                var type = $('#key-search').attr("data-type");
                $.ajax({
                    headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
                    url: "/load-more",
                    type: 'GET',
                    data: {'page_r': page_r,'search':search,'type':type},
                    datatype: 'html',
                    success: function(data) {
                        $('.load-search-post').append(data);
                        page_r++;
                        if(page_r >=4 || !data){
                            $('.see-more').css('display','none');
                        }
                        
                    }
                });
            });
        });
    </script>
@endsection
