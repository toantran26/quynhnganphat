@extends('backend.layout.index')
@section('style')

@endsection
@section('content')
    <div class="content-wrapper mt-1">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-11 m-auto">
                    <a href="{{route('create-banner')}}" class="btn btn-success end-0 m-2" style=""><i class="fas fa-plus"></i> Thêm mới</a>
                    <div class="card card-outline card-success mt-3 bg-white" style="padding: 15px 20px;">
                        <div class="card-header pl-0">
                           <h3 class="card-title">Danh sách bannner</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-bordered text-center banner">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Tiêu đề</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banner as $key => $value)
                                <tr>
                                    <td>{{$key +1 }}</td>
                                    <td>
                                     <img src="{{asset($value->image) ?? asset('dist/img/default.jpg') }}" alt="" class="img-responsive" width="250" height="120">
                                    </td>
                                    <td>
                                        {{ $value->title_vi}}
                                    </td>
                                    <td style="text-align:center;vertical-align: middle">
                                        @if($value->is_trash == 0)
                                        <span class="btn-sm btn-success ">Hoạt động</span>
                                        @else
                                        <span class="btn-sm btn-danger"> Đang ẩn</span>
                                        @endif
                                    </td>
                                    <td style="text-align:center;vertical-align: middle">
                                    @can('edit users')
                                        <a href="{{route('edit-banner',['id'=>$value->id])}}" class="mr-2 ml-2" title="edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa banner này?');" href="{{route('delete-banner',['id'=>$value->id])}}" class="mr-2 ml-2" title="delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            
                        </div>
                        
                        <!-- /.card-body -->
                    </div>
                    <div class="d-flex justify-content-end mr-5">
                        @include('component.pagination-admin', $object = $banner)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
