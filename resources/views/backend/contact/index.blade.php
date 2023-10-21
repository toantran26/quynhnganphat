@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách email liên hệ </h3>
                            <form class="card-tools" action="">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    @csrf
                                    <input type="text" name="keyword" value="{{ old('keyword', '') }}"
                                        class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($contact) <= 0)
                                        <tr>
                                            <td>
                                                <p>(Không có dữ liệu)</p>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($contact as $key => $value)
                                        <tr class="contact_id_{{$value->id}}">
                                            <td>{{ $key + 1 }}</td>
                                            <td class="contact_name">{{ ($value->fullname)?$value->fullname:'Khách hàng' }}</td>
                                            <td class="contact_email">{{ $value->email }}</td>
                                            <td class="contact_time">{{ $value->created_at }}</td>
                                            <td class="d-none contact_content">{{ $value->content }}</td>
                                            <td class="d-none contact_phone">{{ $value->phone }}</td>
                                            <td class="d-none contact_addres">{{ $value->address}}</td>
                                            <td class="d-none contact_advise">{{ $value->advise}}</td>
                                            <td >
                                                <a href="javascript:void(0)" class="see_click" data-id="{{$value->id}}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                
                                            </td>
                                            {{-- <td>
                                                <div class=" text-center">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                                        <span class="fas fa-cog"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                                                        <li>
                                                            <a href="{{route('edit-cate',['id'=>$value->id])}}">
                                                                <i class="fas fa-edit"></i>
                                                                Xem chi tiết
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- /.card-body -->
                    </div>
                    <div class="d-flex justify-content-end mr-5">
                        @include('component.pagination-admin', $object = $contact)
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin email đăng ký liên hệ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 0;margin-right: 0;font-size: 30px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="title">Họ và tên : </label>
                        <span id="contact_name"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Số điện thoại : </label>
                        <span id="contact_phone"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Email : </label>
                        <span id="contact_email"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Địa chỉ : </label>
                        <span id="contact_addres"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Lĩnh vực cần tư vấn :</label>
                        <span id="contact_advise"></span>
                    </div>
                    
                    {{-- <div class="form-group mb-2">
                        <label for="exampleCheck1">Tiêu đề :</label>
                        <span id="contact_title"> Tiêu đề</span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleCheck1">Nội dung :</label>
                        <p id="contact_content" class="ml-2"> Nội dung</p>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.see_click').click(function() { 
                var id = $(this).attr('data-id');
                var name = $(this).parents('.contact_id_'+id+'').children('.contact_name')[0].innerText;
                var email = $(this).parents('.contact_id_'+id+'').children('.contact_email')[0].innerText;
                var phone = $(this).parents('.contact_id_'+id+'').children('.contact_phone')[0].innerText;
                var addres = $(this).parents('.contact_id_'+id+'').children('.contact_addres')[0].innerText;
                var advise = $(this).parents('.contact_id_'+id+'').children('.contact_advise')[0].innerText;

                // var title = $(this).parents('.contact_id_'+id+'').children('.contact_title')[0].innerText;
                // var content = $(this).parents('.contact_id_'+id+'').children('.contact_content')[0].innerText;
                var time = $(this).parents('.contact_id_'+id+'').children('.contact_time')[0].innerText;

                $('#contact_name').html(name);
                $('#contact_email').html(email);
                $('#contact_phone').html(phone);
                $('#contact_addres').html(addres);
                $('#contact_advise').html(advise);

                // $('#contact_title').html(title);
                // $('#contact_content').html(content);
                $('#contact_time').html(time);
                console.log(name);
                $('#create_model').modal('show');
            })
            
           
            $('#submit_category').click(function() { 
                $(this).prop('disabled', true);
                $('#form_category').submit(); 
            })

        });
    </script>
@endsection
