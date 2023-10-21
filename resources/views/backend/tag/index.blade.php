@extends('backend.layout.index')
@section('style')

@endsection
@section('content')
    <div class="content-wrapper mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('tag-add')}}" class="btn btn-success end-0 m-2" style=""><i class="fas fa-plus"></i> Thêm mới</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách từ khoá </h3>
                            <form class="card-tools" action="{{route('tag-list')}}">
{{--                            <div class="card-tools">--}}
                                <div class="input-group input-group-sm" style="width: 150px;">
                                        @csrf
                                    <input type="text" name="keyword" value="{{old('keyword', '')}}" class="form-control float-right"
                                           placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                </div>
{{--                            </div>--}}
                        </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>link</th>
                                    <th>Thao tác</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_tag as $key => $value)
                                <tr>
                                    <td>{{$key +1 }}</td>
                                    <td>{{$value->title_vi}}</td>
                                    <td>
                                        <a target="_blank" style="color:red" href="{{env('WEB_DOMAIN').'/'.$value->slug.'-tag'.$value->id.'/'}}">{{env('WEB_DOMAIN').'/'.$value->slug.'-tag'.$value->id.'/'}}</a>
                                    </td>
                                    
                                    <td>
                                        <div class="dropdown">
                                            <a type="button" id="dropdownMenu2" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="fas fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-primary">

                                                <a href="#"
                                                    class="dropdown-item" title="edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>


                                                <a class="dropdown-item" title="delete"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                <a class="dropdown-item" title="permission"><i
                                                        class="fas fa-user-lock"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
