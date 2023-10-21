@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1>Thêm Banner</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('banner-list',config('constant.banner_home'))}}">List
                banner</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content box-banner">
    <div class="container-fluid">
      {{-- <form class="form-horizontal"> --}}
        <form action="{{route('add-banner')}}" method="post" id="submitForm" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-11 col-11" style="margin: auto">
              <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Thêm mới banner</h3>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active">
                      <div class="row">
                        <div class="m-auto" style="max-width: 900px;">
                          <div class="row">
                            <div class="col-8">
                              <div class="wrap-count field-news-title has-success">
                                <label class="control-label" for="f_name">Ảnh banner pc<span
                                    style="color: red">*</span></label>
                                <div class="img__avatar text-center position-relative">
                                  <img id="avatar-show" src="{{asset('backend/dist/img/default.jpg')}}" alt=""
                                    style="width: 100%;height: 300px;">
                                  <div class="input__file ">
                                    <input class="position-absolute"
                                      style="width: 100%;height: 300px;top: 0;left: 0;opacity: 0" type="file" id="image"
                                      name="image">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-4">
                              <div class="wrap-count field-news-title has-success" style="padding-left: 20px">
                                <label class="control-label" for="f_name">Ảnh Icon<span
                                    style="color: red">*</span></label>
                                <div class="img__avatar text-center position-relative">
                                  <img id="avatar-show-mobi" src="{{asset('backend/dist/img/default.jpg')}}" alt=""
                                    style="max-width: 100px;max-height: 100px;">
                                  <div class="input__file ">
                                    <input class="position-absolute"
                                      style="width: 100%;height: 100px;top: 0;left: 0;opacity: 0" type="file"
                                      id="image_mobi" name="image_mobi">
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="row pt-4 m-auto" style="max-width: 900px">
                            <div class="col-sm-9">
                              <div class="form-group">
                                <div class="wrap-count field-news-title has-success mb-2">
                                  <label class="control-label" for="news-title">Tiêu đề <span
                                      style="color: red">*</span></label>
                                  @error('title_vi')
                                  <p style="color: red; font-size: 14px">* {{$message}}</p>
                                  @enderror
                                  <input type="text" id="title_vi" value="{{ old('title_vi') }}"
                                    class="change-slug count-length form-control" name="title_vi" maxlength="255"
                                    data-target="news-slug" data-name="news-title" data-length="70"
                                    aria-invalid="false">
                                  <div class="help-block"></div>
                                </div>
                                <a style="color: #0a90eb;cursor: pointer" id="adđ__tile__en"><i class="fas fa-plus"></i>
                                  Thêm bản dịch tiêu đề</a>
                                <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__tile__en"><i
                                    class="fas fa-minus"></i> Ẩn</a>
                                <div style="display: none" class="wrap-count field-news-title has-success"
                                  id="en__news__title">
                                  <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                  <input type="text" value="{{ old('title_en') }}"
                                    class="change-slug count-length form-control" name="title_en" maxlength="255"
                                    data-target="news-slug" data-name="news-title" data-length="70"
                                    aria-invalid="false">
                                  <div class="help-block"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="wrap-count field-news-description has-success mb-2">
                                  <label class="control-label" for="news-description">Mô tả</label>
                                  @error('description_vi')
                                  <p style="color: red; font-size: 14px">* {{$message}}</p>
                                  @enderror
                                  <textarea id="news-description" class="count-length form-control"
                                    name="description_vi" maxlength="500" rows="3" data-name="news-description"
                                    data-length="165"
                                    aria-invalid="false"><?php echo old('description_vi') ?></textarea>
                                  <div class="help-block"></div>
                                </div>
                                <a style="color: #0a90eb;cursor: pointer" id="add__desc__en"><i class="fas fa-plus"></i>
                                  Thêm bản dịch mô tả</a>
                                <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__desc__en"><i
                                    class="fas fa-minus"></i> Ẩn</a>
                                <div style="display: none" class="wrap-count field-news-title has-success"
                                  id="en__desc">
                                  <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                  <textarea id="news-description" class="count-length form-control"
                                    name="description_en" maxlength="500" rows="3" data-name="news-description"
                                    data-length="165" aria-invalid="false"><?= old('description_en') ?></textarea>
                                  <div class="help-block"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="wrap-count field-news-title has-success">
                                  <label class="control-label" for="link">link banner (nếu có)</label>
                                  @error('link')
                                  <span style="color: red; font-size: 14px">{{ $message }}
                                  </span>
                                  @enderror
                                  <input type="text" id="link" value="{{ old('link') }}" class="form-control"
                                    name="link" aria-invalid="false">
                                  <div class="help-block"></div>
                                </div>
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group wrap-count field-news-title has-success">
                                <label class="control-label" for="order_no">Vị trí</label>
                                @error('order_no')
                                <span style="color: red; font-size: 14px">{{ $message }}
                                </span>
                                @enderror
                                <input type="number" id="order_no" value="{{ old('order_no') }}" class="form-control"
                                  name="order_no" aria-invalid="false">
                                <div class="help-block"></div>
                              </div>
                              <div class="form-group wrap-count field-news-title has-success">
                                <label class="control-label" for="is_trash">Ẩn/Hiện</label>
                                @error('is_trash')
                                <span style="color: red; font-size: 14px">{{ $message }}
                                </span>
                                @enderror
                                <div class="custom-control custom-switch ">
                                  <input type="checkbox" name="is_trash" checked class="custom-control-input"
                                    id="customSwitch1">
                                  <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-9">

                            </div>
                          </div>
                          <div class=" mt-3">
                            <button type="submit" class="ml-0 btn btn-success">Thêm mới</button>
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
  $('#image').change(function () {
        const [file] =(this).files;
        if (file) {
            console.log(URL.createObjectURL(file))
            $('#avatar-show').attr("src", URL.createObjectURL(file));
        }
    });
    $('#image_mobi').change(function () {
        const [file] =(this).files;
        if (file) {
            console.log(URL.createObjectURL(file))
            $('#avatar-show-mobi').attr("src", URL.createObjectURL(file));
        }
    });
    $('#adđ__tile__en').click(function () {
        $('#en__news__title').show();
        $(this).hide();
        $('#remove__tile__en').show()
    });
    $('#remove__tile__en').click(function () {
        $(this).hide();
        $('#en__news__title').hide();
        $('#adđ__tile__en').show()
    });

    $('#add__desc__en').click(function () {
        $('#en__desc').show();
        $(this).hide();
        $('#remove__desc__en').show()
    });

    $('#remove__desc__en').click(function () {
        $(this).hide();
        $('#en__desc').hide();
        $('#add__desc__en').show()
    });
</script>
{{-- <script>
  $("[name='is_trash']").bootstrapSwitch();
</script> --}}

@endsection