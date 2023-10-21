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
                <a href="{{route('create-post')}}" class="btn btn-success m-3"><i class="fas fa-plus"></i> Thêm mới</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            @switch($status)
                                @case(config('constant.post_approved'))
                                    {{__('Danh sách bài đã đăng')}}
                                    @break
                                @case(config('constant.post_reject'))
                                    {{__('Danh sách bài bị từ chối')}}
                                    @break
                                @case(config('constant.post_delete'))
                                    {{__('Danh sách bài đã xóa')}}
                                    @break
                                @case(config('constant.post_draft'))
                                    {{__('Danh sách bài đang viết')}}
                                    @break
                                @case(config('constant.post_waiting'))
                                    {{__('Danh sách bài chờ duyệt')}}
                                    @break
                                @case(config('constant.post_remove'))
                                    {{__('Danh sách bài đã gỡ')}}
                                    @break
                            @endswitch
                        </h3>
                        <form class="card-tools" action="">
                            <div class="input-group input-group-sm">
                                {{-- @csrf --}}
                                <div class="pr-2" >
                                    <input type="text" name="keyword" value="{{old('keyword')}}" class="form-control float-right"
                                       placeholder="Tiêu đề bài viết">
                                </div>
                                <div class="pr-2" >
                                    <select name="category_id" class="form-control float-right">
                                        <option value="">--- Chuyên mục  ---</option>
                                        
                                        @foreach($listCategory as $index => $parent)
                                                <option value="{{$parent->id}}">{{$parent->title_vi}}</option>
                                                @foreach($parent['children'] as $index => $child)
                                                    <option value="{{$child->id }}">|-- {{$child->title_vi}}</option>
                                                    @foreach ($child['children2'] as $index2 => $child2)
                                                    <option value="{{$child2->id }}">|--|-- {{$child2->title_vi}}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                    
                                    </select>
                                </div>
                                <div class="pr-2" >
                                    <select name="author_id" class="form-control float-right">
                                        <option value="">--- Người tạo   ---</option>
                                        @foreach($listUser as $index => $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>     
                                </div>      
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-block btn-secondary btn-sm">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        @foreach($listPost as $key => $value)
                        <div class="d-flex" style="margin: auto;padding: 10px;border-bottom: 1px solid #ddd">
                            <div class="col-2">
                                <img src="{{$value->avatar}}" alt="">
                            </div>
                            <div class="ml-3 mr-3" style="width: 100%;">
                                <div class="detail" style="border-bottom: 1px dotted #ddd">
                                    <p ><a style="color: #0d638f;font-size: 15px;font-weight: 600;" href="{{route('edit-post',['slug' => $value->slug,'id'=>$value->id])}}">{{$value->title_vi}}</a></p>
                                    <p style="font-size: 14px;">{{$value->description_vi}}</p>
                                </div>
                                <div style="padding-top: 10px;font-size: 12px">
                                    <span class="font-weight-bold mr-2">{{$value->category->title_vi}}</span> |
                                    <span class="mr-2 pl-2"><i class="fas fa-user mr-1"></i>{{$value->admins->name}}</span> |
                                    <span class="mr-2 pl-2"> <i class="far fa-clock mr-1"></i> {{$value->public_date}}</span>
                                    <?php if($status == 2){ ?>
                                    | <span class="font-weight-bold mr-2 pl-2">
                                        <a style="color: #212529" href="{{route('detail-post',['slug' => $value->slug,'id'=>$value->id])}}" target="_blank">Xem nhanh</a>
                                    </span>
                                    <?php }?>
                                </div>
                            </div>
                            <div class=" text-center">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                    <span class="fas fa-cog"></span>
                                </a>
                                <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                                    <li>
                                        <a href="{{route('edit-post',['slug' => $value->slug,'id'=>$value->id])}}">
                                            <i class="fas fa-edit"></i>
                                            Chỉnh sửa
                                        </a>
                                    </li>
                                    <li class="remove-button">
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')" href="{{route('delete-post',['id'=>$value->id])}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i> Xóa bài
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
                            @include('component.pagination-admin', $object = $listPost)
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
