@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
<div class="content-wrapper mt-2 category_container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="font-size: 24px">Quản lý chuyên mục </h3>
            <div class="float-right">
              @if (@$_GET['is_trash'] == 1)
              <a href="{{ route('cate-list')}}" class="btn bg-gradient-info"><i class="fas fa-list mr-2"></i> Danh
                sách</a>
              @else
              <a href="{{ route('cate-list')}}?is_trash=1" class="btn bg-gradient-secondary btn-sm"><i
                  class="fas fa-trash mr-2"></i> Đã gỡ</a>
              @endif
              <a href="#" role="button" data-toggle="modal" data-target="#create_model" class="btn btn-success"><i
                  class="fas fa-plus"></i> Thêm mới</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Tên chuyên mục</th>
                  <th>Chuyên mục cha</th>
                  <th>Slug</th>
                  {{-- <th>Vị trí trang chủ</th> --}}
                  {{-- <th>Trạng thái</th> --}}
                  <th>Ngày tạo</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @if (count($categories) <= 0) <tr>
                  <td>
                    <p>(Không có dữ liệu)</p>
                  </td>
                  </tr>
                  @endif
                  @foreach ($categories as $key => $value)
                  <tr>
                    <td>{{ $value->title_vi }}</td>
                    <td>{{ __('Gốc') }}</td>
                    <td>{{ $value->slug }}</td>
                    {{-- <td><span class="badge badge-warning">{{ $value->top_cate ?? '' }}</span></td> --}}
                    {{-- <td><span class="badge badge-info">{{ __('Hoạt động') }}</span></td> --}}
                    <td>{{ $value->created_at }}</td>
                    <td>
                      {{-- <div class=" text-center">
                        <a href="javascript:void(0)" data-toggle="dropdown"
                          class="btn btn-default btn-xs dropdown-toggle">
                          <span class="fas fa-cog"></span>
                        </a>
                        <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                          <li>
                            <a href="{{route('edit-cate',['id'=>$value->id])}}">
                              <i class="fas fa-edit"></i>
                              Chỉnh sửa
                            </a>
                          </li>
                          <li class="remove-button">
                            <a onclick="return confirm('Bạn có chắc chắn muốn gỡ chuyên mục này?')"
                              href="{{route('delete-cate',['id'=>$value->id])}}">
                              <i class="fa fa-trash" aria-hidden="true"></i> gỡ
                            </a>
                          </li>
                        </ul>
                      </div> --}}
                      {{-- <a href="{{route('edit-cate',['id'=>$value->id])}}" class=" " title="edit"><i
                          class="fas fa-edit"></i></a>
                      <a class=" " title="delete"><i class="fas fa-trash-alt"></i></a> --}}
                    </td>
                  </tr>
                  @foreach ($value['children'] as $index => $child)
                  <tr>
                    <td>|--- {{ $child->title_vi }}</td>
                    <td>{{ $value->title_vi }}</td>
                    <td>{{ $child->slug }}</td>
                    {{-- <td><span class="badge badge-warning">{{ $value->top_cate ?? '' }}</span></td> --}}
                    {{-- <td><span class="badge badge-info">{{ __('Hoạt động') }}</span></td> --}}
                    <td>{{ $child->created_at }}</td>
                    <td>
                      <div class=" text-center">
                        <a href="javascript:void(0)" data-toggle="dropdown"
                          class="btn btn-default btn-xs dropdown-toggle">
                          <span class="fas fa-cog"></span>
                        </a>
                        <ul class="dropdown-menu" id="dropdown{{$child->id}}">
                          <li>
                            <a href="{{route('edit-cate',['id'=>$child->id])}}">
                              <i class="fas fa-edit"></i>
                              Chỉnh sửa
                            </a>
                          </li>
                          <li class="remove-button">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa chuyên mục này?')"
                              href="{{route('delete-cate',['id'=>$child->id])}}">
                              <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                            </a>

                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  @foreach ($child['children2'] as $index2 => $child2)
                  <tr>
                    <td>|-- |-- {{ $child2->title_vi }}</td>
                    <td>{{ $child->title_vi }}</td>
                    <td>{{ $child2->slug }}</td>
                    {{-- <td><span class="badge badge-warning">{{ $value->top_cate ?? '' }}</span></td> --}}
                    {{-- <td><span class="badge badge-info">{{ __('Hoạt động') }}</span></td> --}}
                    <td>{{ $child2->created_at }}</td>
                    <td>
                      <div class=" text-center">
                        <a href="javascript:void(0)" data-toggle="dropdown"
                          class="btn btn-default btn-xs dropdown-toggle">
                          <span class="fas fa-cog"></span>
                        </a>
                        <ul class="dropdown-menu" id="dropdown{{$child2->id}}">
                          <li>
                            <a href="{{route('edit-cate',['id'=>$child2->id])}}">
                              <i class="fas fa-edit"></i>
                              Chỉnh sửa
                            </a>
                          </li>
                          <li class="remove-button">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa chuyên mục này?')"
                              href="{{route('delete-cate',['id'=>$child2->id])}}">
                              <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                            </a>

                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  @endforeach
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
<div class="modal fade" id="create_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('cate-create') }}" method="post" id="form_category">
        @method('post')
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm chuyên mục</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Tên Chuyên mục</label>
            @error('title_vi')
            <p style="color: red; font-size: 14px">* {{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="title_vi" id="title_vi" aria-describedby="emailHelp"
              placeholder="">
          </div>
          <div class="form-group">
            <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
            <input type="text" name="title_en" class="form-control" id="emailHelp">
          </div>
          <div class="form-group">
            <label for="slug">Slug</label>
            @error('slug')
            <p style="color: red; font-size: 14px">* {{ $message }}</p>
            @enderror
            <input type="text" name="slug" class="form-control" id="slug">
          </div>
          <div class="form-group">
            <label for="exampleCheck1">Chuyên mục cha</label>
            <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
              <option value="">không chọn</option>
              @foreach ($categories as $index => $parent)
              <option value="{{ $parent->id }}">{{ $parent->title_vi }}</option>
              @foreach ($parent['children'] as $index => $child)

              <option value="{{ $child->id }}">|--{{ $child->title_vi }}</option>

              @endforeach
              @endforeach
            </select>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <div class="wrap-count field-news-title has-success">
                <label class="control-label" for="en_category_name">Hiển thị trang chủ</label>
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="status" checked class="custom-control-input" id="customSwitch">
                  <label class="custom-control-label" for="customSwitch"></label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="exampleCheck1">Vị trí trang chủ</label>
              <select class="form-control" id="exampleFormControlSelect1" name="top_cate">
                <option value="" selected disabled hidden>Chọn vị trí</option>
                @for ($i = 1; $i < 6; $i++) <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleCheck1">Key SEO</label>
            <input type="text" name="key_seo" class="form-control" id="exampleCheck1">
          </div>
          <div class="form-group">
            <label for="exampleCheck1">Title SEO</label>
            <input type="text" name="title_seo" class="form-control" id="exampleCheck1">
          </div>
          <div class="form-group">
            <label for="exampleCheck1">Desc SEO</label>
            <input type="text" name="desc_seo" class="form-control" id="exampleCheck1">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit" id="submit_category">Lưu lại</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  @if ($errors->any())
            $('#create_model').modal('show');
        @endif
        $(document).ready(function () {
            $('#submit_category').click(function() { 
                $(this).prop('disabled', true);
                $('#form_category').submit(); 
            })
        });
</script>
@endsection