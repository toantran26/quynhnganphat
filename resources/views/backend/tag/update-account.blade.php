@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa nhân sự </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('account-list') }}">Nhân sự</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- <form class="form-horizontal"> --}}
                <form action="{{route('account-post')}}" method="post" id="submitForm" enctype="multipart/form-data">
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
                                                        <label class="control-label" for="f_name">Họ và Tên <span
                                                                style="color: red">*</span></label>
                                                        @error('name')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="name" value="{{ old('name') }}"
                                                            class="form-control" name="name" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="wrap-count field-news-title has-success">
                                                        <label class="control-label" for="f_username">Tên đăng nhập<span
                                                                style="color: red">*</span></label>
                                                        @error('username')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="text" id="username" value="{{ old('username') }}"
                                                            class="form-control" name="username" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="wrap-count field-news-title has-success">
                                                        <label class="control-label" for="f_password">Password <span
                                                                style="color: red">*</span></label>
                                                        @error('password')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="password" id="password" value=""
                                                            class="form-control" name="password" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="wrap-count field-news-title has-success">
                                                        <label class="control-label" for="f_email">Email <span
                                                                style="color: red">*</span></label>
                                                        @error('email')
                                                            <span style="color: red; font-size: 14px">{{ $message }}
                                                            </span>
                                                        @enderror
                                                        <input type="email" id="email" value="{{ old('email') }}"
                                                            class="form-control" name="email" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header p-2">
                                                            <h3 class="card-title"><i class="fas fa-cog pr-2"></i>Cài đặt
                                                                quyền</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                @foreach ($data['list_role'] as $key => $value)
                                                                    <div class="form-group col-sm-4">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"name="role[]"
                                                                                value="{{ $value->name }}" type="checkbox" id="exampleCheck{{$key}}">
                                                                            <label for="exampleCheck{{$key}}"
                                                                                class="form-check-label">{{ $value->name }}</label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
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
@endsection
