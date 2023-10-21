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
<div class="content-wrapper mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11">
                @include('backend.box.box-menu-setting')
                <div class="card-body card-secondary card-outline">
                    <div class="card-header " style="text-align: end">
                        <h3 class="card-title"><i class="fas fa-info-circle"></i> Thêm trang tĩnh</h3>
                    </div>
                    <form action="{{route('page-store')}}"  method="post" id="submitForm" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-11">
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
                                                <textarea id="content" name="content_vi" class="content count-length form-control"  rows="40" ><?= old('content_vi') ?></textarea>
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

                                        <div class="card card-outline card-info">
                                            <div class="card-body">
                                                <div class="wrap-count field-news-description has-success">
                                                    <div class="form-group">
                                                        <label class="d-block control-label" for="content"><i class="fas fa-cog"></i> Tùy chỉnh SEO</label>
                                                        <div class="wrap-count field-news-description has-success">
                                                            <label class="d-block control-label" for="content">Từ khóa Seo</label>
                                                            <input type="text" class="change-slug count-length form-control  " name="key_seo" value="" >
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
                                        <div class="form-group text-center">
                                            <button class="btn btn-success" name="status" value="{{config('constant.post_approved')}}"> Thêm mới</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            height: 600,
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
