@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
<div class="content-wrapper mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('backend.box.box-menu-setting')
                <form action="" method="post" id="form_default">
                    @method('post')
                    @csrf
                    <div class="card">
                        <div class="card-header " style="text-align: end">
                            <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i>Dánh sách bộ máy lãnh đạo </h3>
                            <a href="{{ route('create-management') }}" class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Chức vụ</th>
                                        <th>Vị trí hiển thị</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($management as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img class="img_100x100" src="{{($value->avatar) ? $value->avatar : asset('/backend/dist/img/person.svg')}}" alt=""></td>
                                            <td>{{ $value->name_vi }}</td>
                                            <td>{{ $value->position_vi }}</td>
                                            <td>
                                                <input name="order_no[{{$value->id}}]" type="text" class="text number" value="{{$value->order_no}}" maxlength="2" style="width: 25px; text-align: center; margin: 0; padding: 0;" autocomplete="OFF" />
                                            </td>
                                            <td>
                                                <div class=" text-center">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                                        <span class="fas fa-cog"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                                                        <li>
                                                            <a href="{{ route('edit-management', ['id' => $value->id]) }}">
                                                                <i class="fas fa-edit"></i> Chỉnh sửa
                                                            </a>
                                                        </li>
                                                        <li class="remove-button">
                                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa lãnh đạo này không ?');" href="{{route('delete-management',['id'=>$value->id])}}" class="" title="delete"><i class="fas fa-trash-alt"></i> Xóa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center"> <button type="submit" class="btn btn-success">Cập nhật</button></div>
                        </div>
                        
                    </div>
                </form>
                <div class="d-flex justify-content-end mr-4">
                    @include('component.pagination-admin', $object = $management)
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')


@endsection
