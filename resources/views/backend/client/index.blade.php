@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('create-client') }}" class="btn btn-success end-0 m-2" style=""><i
                            class="fas fa-plus"></i> Thêm mới</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách đối tác - liên kết</h3>
                            <form class="card-tools" action="{{ route('client-list') }}">
                                {{-- <div class="card-tools"> --}}
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
                                {{-- </div> --}}
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên đối tác/khách hàng</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($client as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{$value->avatar}}" width="250" height="150" alt=""></td>
                                            <td>{{ $value->name_vi }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>
                                                <div class=" text-center">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                                        <span class="fas fa-cog"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                                                        <li>
                                                            <a href="{{ route('edit-client', ['id' => $value->id]) }}">
                                                                <i class="fas fa-edit"></i>
                                                                Chỉnh sửa
                                                            </a>
                                                        </li>
                                                        <li class="remove-button">
                                                            <a onclick="return confirm('Bạn có chắc chắn muốn xoá đối tác này ?')" href="{{ route('delete-client', ['id' => $value->id]) }}" >
                                                                <i class="fa fa-trash" aria-hidden="true"></i> Xoá 
                                                            </a>
                                                        
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="d-flex justify-content-end mr-5">
                        @include('component.pagination-admin', $object = $client)
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
