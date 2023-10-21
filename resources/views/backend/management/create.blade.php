@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới lãnh đạo </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('config-management') }}">Lãnh đạo công ty</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- <form class="form-horizontal"> --}}
                <form action="{{route('save-management')}}" method="post" id="form_default" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-11" style="margin: auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <div class="wrap-count field-news-title has-success">
                                                        <label class="control-label" for="f_name">Tên lãnh đạo <span
                                                                style="color: red">*</span></label>
                                                        @error('name_vi')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="name_vi" value="{{ old('name_vi') }}"
                                                            class="form-control" name="name_vi" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                    <a style="color: #0a90eb;cursor: pointer" id="add__name__en"><i class="fas fa-plus"></i> Thêm bản dịch tên lãnh đạo</a>
                                                    <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__name__en"><i class="fas fa-minus"></i> Ẩn</a>
                                                    <div style="display: none"  class="wrap-count field-news-title has-success" id="en__news__name">
                                                        <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                                        <input type="text" value="{{ old('name_en') }}" class="change-slug count-length form-control" name="name_en" placeholder="tên tiếng anh">
                                                        <div class="help-block"></div>
                                                    </div>
                                                 
                                                    <div class="wrap-count field-news-title has-success mt-3">
                                                        <label class="control-label" for="f_position">Chức vụ  <span
                                                                style="color: red">*</span></label>
                                                        @error('position_vi')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="position" value="{{ old('position_vi') }}"
                                                            class="form-control" name="position_vi" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                    <a style="color: #0a90eb;cursor: pointer" id="adđ__tile__en"><i class="fas fa-plus"></i> Thêm bản dịch chức vụ</a>
                                                    <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__tile__en"><i class="fas fa-minus"></i> Ẩn</a>
                                                    <div style="display: none"  class="wrap-count field-news-title has-success" id="en__news__title">
                                                        <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                                        <input type="text" value="{{ old('position_en') }}" class="change-slug count-length form-control" name="position_en">
                                                        <div class="help-block"></div>
                                                    </div>

                                                    <div class="wrap-count field-news-title has-success mt-3">
                                                        <label class="control-label" for="f_position">Vị trí hiển thị  <span
                                                                style="color: red">*</span></label>
                                                        @error('order_no')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="number" id="order_no" value="{{ old('order_no') }}"
                                                            class="form-control" name="order_no" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="wrap-count field-news-description has-success">
                                                                <label class="d-block control-label" for="content">Ảnh đại diện (250x250) </label>
                                                                @error('avatar')
                                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                                @enderror
                                                                <div class="img__avatar text-center position-relative"  style="width: 250px;margin: auto">
                                                                    <img  id ="avatar-show" src="{{ asset('backend/dist/img/default.jpg') }}" alt="" style="width: 100%">
                                                                    <div class="input__file ">
                                                                        <input class="position-absolute" style="width: 100%;height: 100%;top: 0;left: 0;opacity: 0" type="file" id="avatar" name="avatar"  >
                                                                    </div>
                                                                </div>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="margin-top: -1.25rem;" >
                                    <button type="submit" class="btn btn-primary" id="submit_form">Thêm mới</button>
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
    $('#add__name__en').click(function () {
        $('#en__news__name').show();
        $(this).hide();
        $('#remove__name__en').show()
    });
    $('#remove__name__en').click(function () {
        $(this).hide();
        $('#en__news__name').hide();
        $('#add__name__en').show()
    });
    $('#avatar').change(function () {
        const [file] =(this).files;
        if (file) {
            console.log(URL.createObjectURL(file))
            $('#avatar-show').attr("src", URL.createObjectURL(file));
        }
    })
    $(document).ready(function() {
        $('#submit_form').click(function() {
            $(this).prop('disabled', true);
            $('#form_default').submit();
        })
    });
</script>

@endsection
