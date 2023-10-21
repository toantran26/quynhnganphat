@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa chuyên mục  </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('cate-list') }}">chuyên mục</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                {{-- <form class="form-horizontal"> --}}
                <form action="{{route('post-edit-cate',['id'=>$data['category']->id])}}" method="post" id="submitForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['category']->id}}">
                    <div class="row">
                        <div class="col-md-12" style="margin: auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-title has-success">
                                                                <label class="control-label" for="title_vi">Tên chuyên mục <span
                                                                        style="color: red">*</span></label>
                                                                @error('title_vi')
                                                                    <span style="color: red; font-size: 14px">{{ $message }}
                                                                    </span>
                                                                @enderror
                                                                <input type="text" id="title_vi" value="{{ old('title_vi',$data['category']->title_vi) }}"
                                                                    class="form-control" name="title_vi" aria-invalid="false">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-description has-success">
                                                                <label class="d-block control-label" for="cate_id">Chuyên mục cha</label>
                                                                @error('cate_id')
                                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                                @enderror
                                                                <select class="form-control" id="exampleFormControlSelect1" name="cate_id">
                                                                    <option value="" {{$data['category']->parent_id == 0 ?'selected':''}} >Chuyên mục gốc</option>
                                                                    @foreach($data['allCategory'] as $index => $parent)
                                                                        <option value="{{$parent->id}}" {{$parent->id == $data['category']->parent_id ?'selected':''}}>{{$parent->title_vi}}</option>
                                                                        @foreach($parent['children'] as $index => $child)
                                                                            <option value="{{$child->id }}" {{$child->id == $data['category']->parent_id ?'selected':''}}>|-- {{$child->title_vi}}</option>
                                                                            @foreach ($child['children2'] as $index2 => $child2)
                                                                            <option value="{{$child2->id }}" {{$child2->id == $data['category']->parent_id ?'selected':''}}> &nbsp; |--- {{$child2->title_vi}}</option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <div class="wrap-count field-news-title has-success">
                                                                <label class="control-label" for="title_en">Tên chuyên mục tiếng anh (nếu có)</label>
                                                                @error('title_en')
                                                                    <span style="color: red; font-size: 14px">{{ $message }}
                                                                    </span>
                                                                @enderror
                                                                <input type="text" id="title_vi" value="{{ old('title_en',$data['category']->title_en) }}"
                                                                    class="form-control" name="title_en" aria-invalid="false">
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <div class="wrap-count field-news-title has-success">
                                                              <label class="control-label" for="en_category_name">Hiển thị trang chủ</label>
                                                              <div class="custom-control custom-switch">
                                                                <input type="checkbox" name="status" {{$data['category']->status == 0 ?'checked':''}}
                                                                class="custom-control-input"
                                                                id="customSwitch">
                                                                <label class="custom-control-label" for="customSwitch"></label>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="form-group col-sm-3">
                                                            <div class="wrap-count field-news-title has-success position-menu {{$data['category']->status == 0 ?'show':'hide'}}">
                                                                <label class="control-label" for="en_category_name">Vị trí trang chủ</label>
                                                             
                                                                <select class="form-control" id="exampleFormControlSelect1" name="top_cate">
                                                                <option value="" selected disabled hidden>Chọn vị trí
                                                                </option>
                                                                @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}" {{$i==$data['category']->top_cate
                                                                  ?'selected':''}}>{{ $i }}</option>
                                                                  @endfor
                                                              </select>
                                                            </div>
                                                          </div>
                                                        <div class="col-sm-12">
                                                            <div class="card card-primary">
                                                                <div class="card-header p-2">
                                                                    <h3 class="card-title"><i class="fas fa-cog pr-2"></i>Cài đặt SEO</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleCheck1">Slug</label>
                                                                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['category']->slug}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleCheck1">Key SEO</label>
                                                                        <input type="text" name="key_seo" class="form-control" id="exampleCheck1" value="{{$data['category']->key_seo}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleCheck1">Title SEO</label>
                                                                        <input type="text" name="title_seo" class="form-control" id="exampleCheck1" value="{{$data['category']->title_seo}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleCheck1">Desc SEO</label>
                                                                        <input type="text" name="desc_seo" class="form-control" id="exampleCheck1" value="{{$data['category']->desc_seo}}">
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
                                                                @if($data['category']->is_trash == 0)
                                                                <a href="{{route('delete-cate',['id'=>$data['category']->id])}}" onclick="return confirm('Bạn có chắc chắn muốn gỡ chuyên mục này?')" class="btn_trash">Bỏ vào thùng rác</a>
                                                                @else
                                                                <button type="submit" class="btn bg-primary"  name="is_trash" value="0"><i class="fas fa-undo-alt mr-2"></i>Phục hồi </button>
                                                                @endif
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
