@extends('backend.layout.index')
@section('style')
<style>
    img{
        max-width: 100%;
    }

    nav svg{
        width: 16px;}
    p{
        margin-bottom: 5px;
    }
</style>
@endsection
@section('content')
    <div class="content-wrapper">
    <div class="container-fluid news">
        <div class="row">
            <div class="col-12">
                <a href="{{route('create-jobs')}}" class="btn btn-success m-3"><i class="fas fa-plus"></i> Thêm mới</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Danh sách bài tuyển dụng
                        </h3>
                        <form class="card-tools" action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                {{-- @csrf --}}
                                <input type="text" name="keyword" value="{{old('keyword')}}" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        @foreach($listJobs as $key => $value)
                        <div class="d-flex" style="margin: auto;padding: 10px;border-bottom: 1px solid #ddd">
                            <div class="col-2">
                                <img src="{{$value->avatar}}" alt="">
                            </div>
                            <div class="ml-3 mr-3" style="width: 100%;">
                                <div class="detail" style="border-bottom: 1px dotted #ddd">
                                    <p ><a style="color: #0a001f;font-size: 15px;font-weight: 700" href="{{route('edit-jobs',['slug' => $value->slug,'id'=>$value->id])}}">{{$value->title_vi}}</a></p>
                                    <p style="font-size: 14px;">{{$value->position_vi}}</p>
                                </div>
                                <div style="padding-top: 10px;font-size: 12px;">
                                    <span class="mr-2 pl-2"><i class="fas fa-user mr-1"></i>{{$value->admins->name}}</span> |
                                    <span class="mr-2 pl-2"><i class="far fa-clock mr-1"></i> {{$value->created_at}}</span>
                                </div>
                            </div>
                            <div class=" text-center">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                    <span class="fas fa-cog"></span>
                                </a>
                                <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                                    <li>
                                        <a href="{{route('edit-jobs',['slug' => $value->slug,'id'=>$value->id])}}">
                                            <i class="fas fa-edit"></i>
                                            Chỉnh sửa
                                        </a>
                                    </li>
                                    <li class="remove-button">
                                        <a onclick="return confirm('Bạn có chắc chắn muốn gỡ bài tuyển dụng này?')" href="{{route('delete-jobs',['id'=>$value->id])}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i> Gỡ bài 
                                        </a>
                                    
                                    </li>
                                    {{-- <li>
                                        <a href="" target="_blank">
                                            <i class="fa  fa-eye" aria-hidden="true"></i>
                                            Gỡ bài
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        <div>
                            @include('component.pagination-admin', $object = $listJobs)
                        </div>
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
