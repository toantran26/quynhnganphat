@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa chuyên menu  </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="">Menu </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- <form class="form-horizontal"> --}}
                <form action="{{route('post-edit-menu',['id'=>$oneMenu->id])}}" method="post" id="submitForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$oneMenu->id}}">
                    <div class="row">
                        <div class="col-md-11" style="margin: auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-title has-success">
                                                                <label class="control-label" for="menu_name">Tên menu<span
                                                                        style="color: red">*</span></label>
                                                                @error('menu_name')
                                                                    <span style="color: red; font-size: 14px">{{ $message }}
                                                                    </span>
                                                                @enderror
                                                                <input type="text" id="title" value="{{ old('name',$oneMenu->name) }}"
                                                                    class="form-control" name="menu_name" aria-invalid="false">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-description has-success">
                                                                <label class="d-block control-label" for="parent_id">Menu cha ( nếu có )</label>
                                                                @error('parent_id')
                                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                                @enderror
                                                                <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                                                                    <option value="" {{$oneMenu->parent_id ==0 ?'selected':''}} >--- menu gốc ---</option>
                                                                    @foreach($menu as $index => $parent)
                                                                        <option value="{{$parent->id}}" {{$parent->id == $oneMenu->parent_id ?'selected':''}}>{{$parent->name}}</option>
                                                                        @foreach($parent['children'] as $index => $child)
                                                                            <option value="{{$child->id }}" {{$child->id == $oneMenu->parent_id ?'selected':''}}>|-- {{$child->name}}</option>
                                                                            @foreach ($child['children2'] as $index2 => $child2)
                                                                            <option value="{{$child2->id }}" {{$child2->id == $oneMenu->parent_id ?'selected':''}}> &nbsp; |--- {{$child2->name}}</option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                    {{-- @foreach($menu as $index => $parent)
                                                                        <option value="{{$parent->id}}" {{$parent->id == $oneMenu->parent_id ?'selected':''}}>{{$parent->name}}</option>
                                                                        @foreach($parent->children as $index => $child)
                                                                            <option value="{{$child->id }}" >|-- {{$child->name}}</option>
                                                                            @foreach ($child->children2 as $index2 => $child2)
                                                                                <option value="{{$child2->id }}" > &nbsp; |--- {{$child2->name}}</option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach --}}
                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-title has-success">
                                                                <label class="control-label" for="name_en">Tên menu tiếng anh (nếu có)</label>
                                                                @error('name_en')
                                                                    <span style="color: red; font-size: 14px">{{ $message }}
                                                                    </span>
                                                                @enderror
                                                                <input type="text" id="name" value="{{ old('name_en',$oneMenu->name_en) }}"
                                                                    class="form-control" name="name_en" aria-invalid="false">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-title has-success">
                                                                <label class="control-label" for="position">Vị trí menu</label>
                                                                @error('position')
                                                                    <span style="color: red; font-size: 14px">{{ $message }}
                                                                    </span>
                                                                @enderror
                                                                <input type="number" name="position" value="{{ old('position',$oneMenu->position) }}" class="form-control" id="position">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="card card-primary">
                                                                <div class="card-header p-2">
                                                                    <h3 class="card-title"><i class="fas fa-cog pr-2"></i>Cài đặt </h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleCheck1">Slug</label>
                                                                        <input type="text" name="slug" class="form-control" id="slug" value="{{$oneMenu->slug}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleCheck1">Link</label>
                                                                        <input type="text" name="link" class="form-control" id="exampleCheck1" value="{{$oneMenu->link}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card card-primary mt-4">
                                                        <div class="card-header p-2">
                                                            <span class=""><i class="fas fa-globe-americas pr-2"></i>Push Layouts</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div>
                                                                <a href="#" title="" class="btn_trash">Bỏ vào thùng rác</a>
                                                                <button type="submit" class="btn bg-success float-right">Cập nhật</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script>
    $('#avatar').change(function () {
            const [file] =(this).files;
            if (file) {
                console.log(URL.createObjectURL(file))
                $('#avatar-show').attr("src", URL.createObjectURL(file));
            }
        })
</script>
@endsection
