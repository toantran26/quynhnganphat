@extends('backend.layout.index')
@section('style')
    <link rel="stylesheet" href="{{asset('library/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href=" {{asset('library/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <style>
        .bootstrap-tagsinput{
            width: 100%;
            padding: 6px;
        }
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #646466;
            padding: 1px 3px 1px 3px;
            font-size: 100%;
            font-weight: 700;
            vertical-align: baseline;
            border-radius: .25em;
        }
    </style>
@endsection
@section('content')

    <div class="content-wrapper mt-2" >
        
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h1>Thêm mới bài viết</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                        </div>
                    </div>
                    {{-- <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="card  card-outline card-info">
                                <div class="card-header">
                                    <div class="box box-success">
                                        <div class="box-header with-border form-button-news">
                                            <button type="submit" name="status" value="-1" class="btn  btn-success pull-left"> <i class="fas fa-save"></i>&nbsp;&nbsp; Lưu lại</button>
                                            <a class="btn btn-danger pull-left" href="/news/delete?id=25039" data-confirm="Bạn có chắc chắn muốn xóa?" data-method="post"><i class="fa fa-trash"></i>&nbsp;&nbsp; xóa</a>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <form action="{{route('add-post')}}"  method="post" id="submitForm" enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-8">
                                <div class="card  card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-info-circle"></i> Thông tin bài viết</h3>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="wrap-count field-news-title has-success mb-2">
                                                <label class="control-label" for="news-title">Tiêu đề <span style="color: red">*</span></label>
                                                @error('title_vi')
                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                @enderror
                                                <input type="text" id="title_vi" value="{{ old('title_vi') }}" class="change-slug count-length form-control" name="title_vi" maxlength="255" data-target="news-slug" data-name="news-title" data-length="70" aria-invalid="false">
                                                <div class="help-block"></div>
                                            </div>
                                            <a style="color: #0a90eb;cursor: pointer" id="adđ__tile__en"><i class="fas fa-plus"></i> Thêm bản dịch tiêu đề</a>
                                            <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__tile__en"><i class="fas fa-minus"></i> Ẩn</a>
                                            <div style="display: none"  class="wrap-count field-news-title has-success" id="en__news__title">
                                                <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                                <input type="text" value="{{ old('title_en') }}" class="change-slug count-length form-control" name="title_en" maxlength="255" data-target="news-slug" data-name="news-title" data-length="70" aria-invalid="false">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="wrap-count field-news-description has-success mb-2">
                                                <label class="control-label" for="news-description">Mô tả</label>
                                                @error('description_vi')
                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                @enderror
                                                <textarea id="news-description" class="count-length form-control" name="description_vi" maxlength="500" rows="3" data-name="news-description" data-length="165" aria-invalid="false"><?php echo old('description_vi') ?></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                            <a style="color: #0a90eb;cursor: pointer" id="add__desc__en"><i class="fas fa-plus"></i> Thêm bản dịch mô tả</a>
                                            <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__desc__en"><i class="fas fa-minus"></i> Ẩn</a>
                                            <div style="display: none"  class="wrap-count field-news-title has-success" id="en__desc">
                                                <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                                <textarea id="news-description" class="count-length form-control" name="description_en" maxlength="500" rows="3" data-name="news-description" data-length="165" aria-invalid="false"><?= old('description_en') ?></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="wrap-count field-news-description has-success mb-2">
                                                <label class="control-label" for="content">Nội dung <span style="color: red">*</span></label>
                                                @error('content_vi')
                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                @enderror
                                                <textarea id="content" name="content_vi" class="content count-length form-control"  rows="40" >{{ old('content_vi')}}</textarea>
                                                <div class="help-block"></div>
                                            </div>
                                            <a style="color: #0a90eb;cursor: pointer" id="add__content__en"><i class="fas fa-plus"></i> Thêm bản dịch nội dung</a>
                                            <a style="display: none;color: #0a90eb;cursor: pointer" id="remove__content__en"><i class="fas fa-minus"></i> Ẩn</a>
                                            <div style="display: none" id="en__content" class=" wrap-count field-news-description has-success">
                                                <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                                                <textarea id="content" name="content_en" class="count-length form-control content"  rows="40" >{{ old('content_en')}}</textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="row form-group" >
                                            <div class="col-md-8">
                                                <label class="control-label" for="source">Nguồn</label>
                                                <input type="text" id="source" class="change-slug count-length form-control"
                                                    name="source" value="{{ old('source')}}" maxlength="255" data-target="news-slug"
                                                    data-name="news-title" data-length="70" aria-invalid="false" >
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="pseudonym">Bút danh</label>
                                                <input type="text" id="pseudonym" class="change-slug count-length form-control"
                                                    name="pseudonym" maxlength="255" data-target="news-slug"
                                                    data-name="news-title" data-length="70" aria-invalid="false" {{ old('pseudonym')}}>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="col-md-3 d-none">
                                                <label class="control-label" for="exampleFormControlSelect1">Tác giả</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                                    <option selected hidden disabled >Chọn tác giả</option>
                                                    @foreach($data['user'] as $index => $user)
                                                        <option {{Auth::user()->id == $user->id?'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach

                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="wrap-count field-news-description has-success">
                                                <label class="d-block control-label" for="content">Tags</label>
                                                <input type="text" id="tag" class="change-slug count-length form-control tagsinput " name="tag" value="" data-role="tagsinput" >
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group" hidden>
                                            <div class="wrap-count field-news-title has-success">
                                                <label class="control-label" for="news-title">Slug <span style="color: red">*</span></label>
                                                @error('slug')
                                                <p style="color: red; font-size: 14px">* {{$message}}</p>
                                                @enderror
                                                <input type="text" id="slug" value="{{ old('slug') }}" class="change-slug count-length form-control" name="slug" maxlength="255" data-target="news-slug" data-name="news-title" data-length="70" aria-invalid="false">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card  card-outline card-info">
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <label class="d-block control-label" for="content">Ảnh đại diện </label>
                                            @error('avatar')
                                            <p style="color: red; font-size: 14px">* {{$message}}</p>
                                            @enderror
                                            <div class="img__avatar text-center position-relative"  style="width: 250px;margin: auto">
                                                <img  id ="avatar-show" src="{{asset('backend/dist/img/default.jpg')}}" alt="" style="width: 100%">
                                                <div class="input__file ">
                                                    <input class="position-absolute" style="width: 100%;height: 100%;top: 0;left: 0;opacity: 0" type="file" id="avatar" name="avatar"  >
                                                </div>
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card  card-outline card-info">
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <label class="d-block control-label" for="cate_id">Chuyên mục <span style="color: red">*</span></label>
                                            @error('cate_id')
                                            <p style="color: red; font-size: 14px">* {{$message}}</p>
                                            @enderror
                                            <select class="form-control" id="exampleFormControlSelect1" name="cate_id">
                                                <option value="" selected hidden disabled>Chọn danh mục</option>
                                                @foreach($data['cate_list'] as $index => $parent)
                                                    <option value="{{$parent->id}}" {{$parent->id == old('cate_id') ?'selected':''}}>{{$parent->title_vi}}</option>
                                                    @foreach($parent['children'] as $index => $child)
                                                        <option value="{{$child->id }}" {{$child->id == old('cate_id') ?'selected':''}}>|--- {{$child->title_vi}}</option>
                                                        @foreach ($child['children2'] as $index2 => $child2)
                                                        <option value="{{$child2->id }}" {{$child2->id == old('cate_id') ?'selected':''}}>|--- {{$child2->title_vi}}</option>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card  card-outline card-info">
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <label class="d-block control-label" for="content"></i> Định dạng nội dung</label>
                                            <small id="emailHelp" class="form-text text-muted">(Không bắt buộc)</small>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch mb-3">
                                                    <input type="radio" name="type_blog" value="{{config('constant.post_video')}}" class="type__blog custom-control-input" id="type_blog1">
                                                    <label class="custom-control-label" for="type_blog1">Video</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="radio" name="type_blog" value="{{config('constant.post_image')}}" class="type__blog custom-control-input" id="type_blog2">
                                                    <label class="custom-control-label" for="type_blog2">Ảnh</label>
                                                </div>
                                                <div class="custom-control custom-switch  mt-3 p-0">
                                                    <a href="#" class="btn btn-success btn-sm reset__check__box__type__blog">Reset</a>
                                                </div>
                                            </div>

                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card  card-outline card-info">
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <label class="d-block control-label" for="content"><i class="fas fa-cog"></i> Tùy chỉnh</label>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch mb-3">
                                                    <input type="checkbox" name="top_news" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">Tin top đầu trang chủ</label>
                                                </div>
                                                <div class="custom-control custom-switch" hidden>
                                                    <input type="checkbox" name="hot_news" class="custom-control-input" id="customSwitch2">
                                                    <label class="custom-control-label"  for="customSwitch2">Tin tiêu điểm danh mục</label>
                                                </div>
                                                <div class="custom-control custom-switch mb-3">
                                                    <input type="checkbox" name="is_emagazine" class="custom-control-input" id="customSwitch3">
                                                    <label class="custom-control-label"  for="customSwitch3">Tin bài Emagazine</label>
                                                </div>
                                            </div>

                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <div class="form-group">
                                                <label class="d-block control-label" for="content"><i class="fas fa-cog"></i> Tùy chỉnh SEO</label>
                                                <div class="wrap-count field-news-description has-success">
                                                    <label class="d-block control-label" for="content">Từ khóa Seo</label>
                                                    <input type="text" class="change-slug count-length form-control  " name="key_word" value="" >
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="wrap-count field-news-description has-success">
                                                    <label class="d-block control-label" for="content">Thẻ description</label>
                                                    <input type="text" class="change-slug count-length form-control" name="desc_seo" value="" >
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="wrap-count field-news-description has-success">
                                                    <label class="d-block control-label" for="content">Thẻ title</label>
                                                    <input type="text" class="change-slug count-length form-control  " name="title_seo" value="" >
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <label class="d-block control-label" for="content"><i class="fas fa-cog"></i> Công cụ đăng</label>
                                            <div class="wrap-count field-news-description has-success">
                                                <div class="form-group">
                                                    <label>Lên lịch đăng: <span id="emailHelp" class="text-muted">(Không bắt buộc)</span></label>
                                                    
                                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                        <input type="text" name="public_date" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary" name="status" value="{{config('constant.post_draft')}}"><i class="fas fa-save"></i> Lưu nháp</button>
                                            <button class="btn btn-success" name="status" value="{{config('constant.post_approved')}}"><i class="fa fa-globe"></i> Xuất bản</button>
                                        </div>
                                    </div>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        
    </div>
@endsection
@section('script')
    <script src="{{asset('library/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('library/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('library/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset('library/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('library/editor/js/custom.js')}}"></script>

    <script type="text/javascript">

        tinymce.init({
            selector: '.content',
            plugins: 'autosave,wordcount,code,fullscreen,table,noneditable,link,media,pdf,attack,image,paste,searchreplace,textcolor,editimage,lists,views,quote,quote_box,info,box_tho,live',
            toolbar: 'forecolor,backcolor,alignleft,aligncenter,alignjustify,alignright,searchreplace,bold,italic,underline,link,unlink,image,media,pdf,attack,block,numlist,bullist,formatselect,code,quizz,block,fullscreen,preview,fontsizeselect',
            toolbar_mode: 'floating',

            skin:'lightgray',
            content_css: '/library/editor/css/tinycustomcss.css?v=12345',
            noneditable_editable_class: "expEdit",
            noneditable_noneditable_class: "expNoEdit",
            height: 500,
            setup : function(ed) {
                ed.on('DblClick', function(e) {
                    if (e.target.nodeName=='IMG') {
                        ed.windowManager.open({
                            title: 'Sửa hình ảnh',
                            url: '{{route('editimage')}}',
                            width: 600,
                            height: 560
                        });
                    }
                });
            },

            style_formats: [
                { title: 'Size 16', inline: 'span', styles: { 'font-size': '16px' } },
                { title: 'Size 18', inline: 'span', styles: { 'font-size': '18px' } },
                { title: 'Size 20', inline: 'span', styles: { 'font-size': '20px' } },
                { title: 'Size 22', inline: 'span', styles: { 'font-size': '22px' } },
                { title: 'Size 24', inline: 'span', styles: { 'font-size': '24px' } },
                { title: 'Subtitle', block: 'h2' }
            ],

            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            entity_encoding: "raw",
            paste_as_text: true,
            relative_urls : false,
            remove_script_host : false,
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

        $('#add__content__en').click(function () {
            $('#en__content').show();
            $(this).hide();
            $('#remove__content__en').show()
        });

        $('#remove__content__en').click(function () {
            $(this).hide();
            $('#en__content').hide();
            $('#add__content__en').show()
        });

        $('#avatar').change(function () {
            const [file] =(this).files;
            if (file) {
                console.log(URL.createObjectURL(file))
                $('#avatar-show').attr("src", URL.createObjectURL(file));
            }
        })

        $(function () {
            $('#reservationdatetime').datetimepicker({ 
              icons: { time: 'far fa-clock' }, 
               format: 'YYYY-MM-DD H:mm'
            });
        })

        $('.reset__check__box__type__blog').click(function () {
            $('.type__blog').prop("checked", false);
        })

    </script>
    <script>
        const state = {
            keydown:"",
            setKeydown:function (key) {
                this.keydown=key;
            }
        }
        $('#submitForm').submit(function (evt) {
            if (state.keydown==='Enter') {
                state.setKeydown('')
                return false
            }
        })

        $(document).keydown(function (e) {
            state.setKeydown(e.key)
        })
    </script>
@endsection
