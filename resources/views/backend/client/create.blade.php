@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới đối tác </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('client-list') }}">Đối tác</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- <form class="form-horizontal"> --}}
                <form action="{{route('save-create')}}" method="post" id="submitForm" enctype="multipart/form-data">
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
                                                        <label class="control-label" for="f_name">Tên đối tác (tiếng việt)<span
                                                                style="color: red">*</span></label>
                                                        @error('name_vi')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="name_vi" value="{{ old('name_vi') }}"
                                                            class="form-control" name="name_vi" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                    <div class="wrap-count field-news-title has-success mt-3">
                                                        <label class="control-label" for="f_name">Tên đối tác (Tiếng anh nếu có)</label>
                                                        @error('name_en')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="name_en" value="{{ old('name_en') }}"
                                                            class="form-control" name="name_en" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                    <div class="wrap-count field-news-title has-success mt-3">
                                                        <label class="control-label" for="f_name">Link  <span
                                                                style="color: red">*</span></label>
                                                        @error('link')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="link" value="{{ old('link') }}"
                                                            class="form-control" name="link" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="wrap-count field-news-description has-success">
                                                                <label class="d-block control-label" for="content">Ảnh đại diện </label>
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
