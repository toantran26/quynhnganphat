@extends('backend.layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('library/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <style>
        .bootstrap-tagsinput {
            width: 100%;
            padding: 6px;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #969696;
            padding: 1px 3px 1px 3px;
            font-size: 100%;
            vertical-align: baseline;
        }

        .list_content_item {
            margin-bottom: 30px;
        }

        .list_content_item .header_cont {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            background: #f0f8ff;
            padding: 5px;
            border-radius: 6px;
        }

        .list_content_item .header_cont .info_user img {
            max-width: 30px;
            max-height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .list_content_item .header_cont .btn_action span {
            margin: 0 5px;
        }
    </style>


    <style type="text/css">
        .poin_check_seo {
            font-size: 16px;
            padding-top: 1px;
        }

        .poin_check_seo span {
            padding: 0px 5px;
        }

        #open_checkSeo {
            background-color: #fff;
            padding: 10px;
        }

        .title_seo_box .tit_seo {
            font-size: 15px;
            font-weight: bold;
            background: #285e81;
            padding: 5px;
            color: #fff;
            margin-bottom: 10px;
        }

        .btn_close_hide_seo,
        #btn_open_hide_seo {
            color: white;
        }

        .close_box_seo {
            background: #136bc8;
            padding: 8px 12px;
            color: #fff;
        }

        .close_box_seo .caption {
            float: left;
            font-size: 16px;
            padding-top: 1px;
        }

        .poin_check_seo span i {
            color: #00ff29;
            font-weight: bold;
        }

        a.coppytags {
            color: #fff;
            background: #d81a3a;
            padding: 6px 10px;
            text-decoration: none;
        }

        .btn_checkSeo {
            border: 1px solid #d84a38;
            color: #fff;
            background: #d84a38;
            padding: 5px 6px;
        }

        .Seo_show_search_demo {
            font-size: 20px;
            color: #1a0dab;
            margin-bottom: 7px;
        }

        .sapo_seo {
            margin-top: 7px;
        }

        .hiden_total_seo {
            visibility: hidden;
        }

        .disabled_btn_seo {
            color: #fff;
            background: #4b8df8;
            padding: 8px 14px;
            font-size: 15px;
        }

        .disabled_btn_seo:hover {
            color: #fff;
            text-decoration: none;
            background: #0362fd;
        }

        .cnt p:after {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            background: #d81a3a;
            top: 4px;
            left: 0;
            border-radius: 50%;
        }

        .cnt.successs p:after {
            background: #00ff29;
        }

        .cnt p {
            position: relative;
            padding-left: 15px;
        }

        b.red {
            color: #d81a3a;
        }

        b.bluec {
            color: #0058e6;
        }

        #img_preview {
            max-width: 100% !important;
            max-height: 100% !important;
            width: auto !important;
            height: auto !important;
            position: absolute !important;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto !important;
        }

        .option_avatar {
            margin-top: 15px;
        }

        .well .btn.btn-primary {
            margin: 5px 0;
        }

        .well {
            padding: 8px 0;
            border-left: 0;
            border-right: 0;
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển đổi */
        }

        .fixed-well {
            position: fixed;
            top: 0;
            left: 260px;
            right: 0;
            z-index: 999;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper mt-1" style="">
        {{-- <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section> --}}
        <div class="container-fluid">
            <div class="">
                {{-- <div class="card-header border-0 mt-2 mb-2">
                <h3 class="card-title"><i class="fas fa-info-circle"></i> Thông tin bài viết</h3>
            </div> --}}
                @if (@$editing)
                    <div class="alert alert-block alert-error fade in">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <h4 class="alert-heading" style="margin-bottom: 8px;">Cảnh báo!</h4>
                        <p id="has_user_editing">Tin này đang được sửa bởi <b> {{ $editing->user->name }} </b> . Bạn sẽ tự
                            động
                            thoát ra
                            trong <b id="lbl_countdown_dupl">60</b> giây nữa</p>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                var i = 60;
                                setInterval(function() {
                                    i--;
                                    if (i >= 0) $('#lbl_countdown_dupl').text(i);
                                    if (i == 0) window.history.back();
                                }, 1000);
                                var html =
                                    '<div style="position: absolute;left: 0;top: 0;background: #FFF;width: 100%;height: 100%;opacity: 0.5;z-index: 999;"></div>';
                                $('#submitForm').css('position', 'relative').append(html);
                            });
                        </script>
                    </div>
                @endif
            </div>
            <form action="{{ route('update-post') }}" method="post" id="submitForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data['post']->id }}" id="post_id">
                <div class="row">
                    <div class="col-12">
                        <div class="well" style="padding: 8px 0;border-left: 0;border-right: 0">
                            <div class="ml-3">
                                @include('backend.post.byStatusPost', [
                                    'status' => $data['post']->status,
                                ])

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="card  card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-info-circle"></i> Thông tin bài viết</h3>
                                <p class="float-right"><a style="color: " target="_blank"
                                        href="{{ route('list-history', ['id' => $data['post']->id]) }}">Lịch sử chỉnh sửa
                                        bài</a>
                                </p>
                            </div>
                            <div class="card-body">
                                {{-- <div class="well" style="padding: 8px 0;border-left: 0;border-right: 0">
                                    <div class="">
                                        @include('backend.post.byStatusPost', [
                                            'status' => $data['post']->status,
                                        ])

                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="wrap-count field-news-title has-success mb-2 ">
                                        <label class="control-label" for="news-title">Tiêu đề <span
                                                style="color: red">*</span></label>
                                        @error('title')
                                            <p style="color: red; font-size: 14px">*
                                                {{ Str::replace('title vi', 'title', $message) }}
                                            </p>
                                        @enderror
                                        <input type="text" id="title" maxchar="24" value="{!! old('title', $data['post']->title) !!}"
                                            class="maxchar change-slug count-length form-control" name="title"
                                            maxlength="255" data-target="news-slug" data-name="news-title" data-length="70"
                                            aria-invalid="false">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-count field-news-description has-success mb-2">
                                        <label class="control-label" for="news-description">Mô tả</label>
                                        @error('description')
                                            <p style="color: red; font-size: 14px">* {{ $message }}</p>
                                        @enderror
                                        <textarea id="news-description" maxchar="65" class="maxchar count-length form-control" name="description"
                                            maxlength="500" rows="3" data-name="news-description" data-length="165" aria-invalid="false"><?php echo old('description', $data['post']->description ?? ''); ?></textarea>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-count field-news-description has-success mb-2">
                                        <label class="control-label" for="content">Nội dung <span
                                                style="color: red">*</span></label>
                                        @error('content')
                                            <p style="color: red; font-size: 14px">* Nội dung không được để trống</p>
                                        @enderror
                                        {{-- 2023-07-04 16:24:47 --}}
                                        <textarea id="content" name="content" class="content count-length form-control" rows="40">{!! old('content', $data['post']->content ?? '') !!}</textarea>
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="control-label" for="source">Nguồn</label>
                                        <input type="text" id="source" class="change-slug count-length form-control"
                                            name="source" value="<?php echo $data['post']->source ?? null; ?>" maxlength="255"
                                            data-target="news-slug" data-name="news-title" data-length="70"
                                            aria-invalid="false">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-count field-news-description has-success">
                                        <label class="d-block control-label" for="content">Tags</label>
                                        <input type="text" id="tag" value="{{ $data['post']->listTag ?? '' }}"
                                            class="change-slug count-length form-control tagsinput " name="tag"
                                            value="" data-role="tagsinput">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-count has-success mb-2">
                                        <label class="control-label" for="note">Ghi chú </label>
                                        <textarea id="note" class="count-length form-control" name="note" maxlength="500" rows="2"
                                            data-name="note" data-length="165" aria-invalid="false"><?php echo old('note', $data['post']->note ?? ''); ?></textarea>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="caption"><i class="fas fa-globe-americas mr-2"></i> Tùy chỉnh
                                                SEO
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="wrap-count field-news-description has-success">
                                            <div class="form-group">
                                                <div class="wrap-count field-news-title has-success">
                                                    <label class="d-block control-label" for="news-title">Slug
                                                        <input type="text" id="slug"
                                                            value="{{ $data['post']->slug ?? '' }}"
                                                            class="change-slug count-length form-control" name="slug"
                                                            maxlength="255" data-target="news-slug"
                                                            data-name="news-title" data-length="70" aria-invalid="false">
                                                        <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="wrap-count field-news-description has-success">
                                                    <label class="d-block control-label" for="content">Từ khóa
                                                        Seo</label>
                                                    <input type="text" class="change-slug count-length form-control"
                                                        name="key_seo" value="{{ $data['post']->key_seo ?? null }}">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="wrap-count field-news-description has-success">
                                                    <label class="d-block control-label" for="content">Thẻ
                                                        description</label>
                                                    <input type="text" class="change-slug count-length form-control"
                                                        name="desc_seo" value="{{ $data['post']->desc_seo ?? null }}">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="wrap-count field-news-description has-success">
                                                    <label class="d-block control-label" for="content">Thẻ title</label>
                                                    <input type="text" class="change-slug count-length form-control  "
                                                        name="title_seo" value="{{ $data['post']->title_seo ?? null }}">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                {{-- seo --}}
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="caption"><i class="fas fa-globe-americas mr-2"></i>Google xem
                                                trước
                                            </div>
                                            <div class="poin_check_seo">
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="xem_truoc"> Xem trước :</div>
                                        <div class="">
                                            <div class="pt-2 pb-2">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item"><a class="nav-link seo-link active"
                                                            href="#show_mobi_seo" data-toggle="tab">Kết quả trên di
                                                            động</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link seo-link" href="#show_pc_seo"
                                                            data-toggle="tab">Kết quả trên máy
                                                            tính</a></li>
                                                </ul>
                                            </div>
                                            <div class="p-2">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="show_mobi_seo">
                                                        <div class="_seo-mobi">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="url-seo">
                                                                        <i class="fas fa-globe-americas mr-1"
                                                                            style="color: #9c9c9c;"></i>
                                                                        <span
                                                                            class="domain">{{ $_SERVER['HTTP_HOST'] }}</span>
                                                                        <span> > {!! Str::limit($data['post']->slug, 25, $end = '...') !!} </span>
                                                                    </div>
                                                                    <div class="title-seo">
                                                                        {!! $data['post']->title_seo ? $data['post']->title_seo : $data['post']->title !!}
                                                                    </div>
                                                                    <div class="row pt-3">
                                                                        <div class="col-8">
                                                                            <div class="time-intro-seo">
                                                                                <span class="time_seo">Th
                                                                                    {{ date(
                                                                                        'm d,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Y',
                                                                                        strtotime($data['post']->public_date),
                                                                                    ) }}
                                                                                    - </span>
                                                                                <span>{!! Str::limit($data['post']->desc_seo ? $data['post']->desc_seo : $data['post']->description, 150) !!} </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 p-0">
                                                                            <div class="d-flex">
                                                                                <img class="img-mb-seo"
                                                                                    src="{{ asset($data['post']->avatar) ?? asset('backend/dist/img/default.jpg') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="show_pc_seo">
                                                        <div class="card-body">
                                                            <div class="url-seo pc">
                                                                <i class="fas fa-globe-americas mr-1"
                                                                    style="color: #9c9c9c;"></i>
                                                                {{-- {{route('post-detail',['slug' =>
                                                            $data['post']->slug,'id'=>$data['post']->id])}} --}}
                                                                <span class="domain">{{ $_SERVER['HTTP_HOST'] }}</span>
                                                                <span>
                                                                    > {!! Str::limit($data['post']->slug, 50, $end = '...') !!} </span>
                                                            </div>
                                                            <div class="title-seo">
                                                                {!! $data['post']->title_seo ? $data['post']->title_seo : $data['post']->title !!}
                                                            </div>
                                                            <div class="row pt-1">
                                                                <div class="col-12">
                                                                    <div class="time-intro-seo">
                                                                        <span class="time_seo">Th
                                                                            {{ date('m d, Y', strtotime($data['post']->public_date)) }}
                                                                            -
                                                                        </span>
                                                                        <span>{!! Str::limit($data['post']->desc_seo ? $data['post']->desc_seo : $data['post']->description, 150) !!} </span>
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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div class="caption"><i class="fas fa-globe-americas mr-2"></i>Kiểm tra bài
                                                viết
                                                chuẩn SEO
                                            </div>
                                            <div class="poin_check_seo">
                                                <span>- Đã đạt: <i>
                                                        <?= $assign_list['total_checkSEO'] ?>
                                                    </i> /
                                                    <?= $assign_list['total_SEO'] ?>
                                                </span> |
                                                <span><a href="javascript:void(0)" class="btn_open_hide_seo">Xem chi
                                                        tiết</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="open_checkSeo" style="display: none">
                                        <!-- title -->
                                        <div class="title_seo_box">
                                            <div class="tit_seo">
                                                Các vấn đề
                                            </div>
                                            <div class="seo_content">
                                                <div class="cnt">
                                                    <?php if($assign_list["count_key_tag"]<3){?>
                                                    <p>
                                                        Độ dài của từ khoá (từ khoá không ít hơn 3 chữ): Từ khóa này
                                                        có <b class="red">
                                                            <?= $assign_list['count_key_tag'] ?>
                                                        </b> chữ. Hãy chọn từ
                                                        có nghĩa cụ thể hơn. <b class="red">(-5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["url"]==0){?>
                                                    <p>
                                                        URL bài viết: url không chứa từ khoá seo. Sửa lại url để
                                                        chuẩn SEO. <b class="red">(-5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["url"]==0){?>
                                                    <p>
                                                        Từ khoá trong tiêu đề: Từ khoá không xuất hiện trên tiêu đề.
                                                        Hãy kiểm tra lại. <b class="red">(-10)</b>
                                                    </p>
                                                    <?php }?>

                                                    <?php if($assign_list["title_err"]==1){?>
                                                    <p>
                                                        Độ dài tiêu đề:
                                                        <?php if ($assign_list['len_title'] < 40) {
                                                            echo "Tiêu đề SEO quá ngắn (<b class='red'>" . $assign_list['len_title'] . ' ký tự < 40 ký tự</b>).';
                                                        } ?>
                                                        <?php if ($assign_list['len_title'] > 65) {
                                                            echo "Tiêu đề SEO quá dài (<b class='red'>" . $assign_list['len_title'] . ' ký tự > 65 ký tự</b>).';
                                                        } ?>
                                                        Hãy tối ưu tiêu đề seo chuẩn hơn. <b class="red">(-10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_lftitle"]==1){?>
                                                    <p>
                                                        Vị trí từ khoá trong tiêu đề: Vị trí từ khoá SEO nên để phía
                                                        bên trái. (Nằm đầu tiên của tiêu đề ). <b class="red">(-5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_intro"]==1){?>
                                                    <p>
                                                        Từ khoá trong mô tả: Từ khoá SEO không xuất hiện ở phần mô
                                                        tả. Thêm từ khoá vào mô tả SEO. <b class="red">(-10)</b>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($assign_list["meta_des_err"]==1){?>
                                                    <p>
                                                        Độ dài mô tả:
                                                        <?php if ($assign_list['len_meta_description'] > 165) {
                                                            echo 'Độ dài mô tả quá dài - <b class="red">' . $assign_list['len_meta_description'] . ' (>165)</b>';
                                                        } ?>
                                                        <?php if ($assign_list['len_meta_description'] < 120) {
                                                            echo 'Độ dài mô tả quá ngắn - <b class="red">' . $assign_list['len_meta_description'] . ' (<120)</b>';
                                                        } ?>.
                                                        Nên sửa lại. <b class="red">(-10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_lfintro"]==1){?>
                                                    <p>
                                                        Vị trí từ khoá trong mô tả: Từ khoá nên xuât hiện đoạn đầu
                                                        văn bản. Nên chỉnh sửa lại. <b class="red">(-5)</b>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($assign_list["count_key_tag_in_content"]<3){?>
                                                    <p>
                                                        Mật độ từ khoá trong nội dung: Từ khoá trong bài - (<b
                                                            class="red">
                                                            <?= $assign_list['count_key_tag_in_content'] ?> lần
                                                        </b>),
                                                        hãy thêm từ khóa chính vào trong bài. (không ít hơn 3 từ
                                                        khoá). <b class="red">(-10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_link"]==1){?>
                                                    <p>
                                                        Các đường dẫn nội bộ: Trong bài viết nên có link nội bộ.
                                                        Chèn link nội bộ. <b class="red">(-10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_tit_sub"]!=-1){?>
                                                    <p>
                                                        Cụm từ khóa trong tiêu đề phụ: Từ khoá nên xuất hiện trong
                                                        tiêu đề phụ. (tiêu đề phụ nằm trong thẻ H3 trong bài viết.)
                                                        <b class="red">(-5)</b>
                                                    </p>
                                                    <?php }?>

                                                    <?php if($assign_list["alt_seo"]==0){?>
                                                    <p>
                                                        Những thuộc tính alt trong hình ảnh: Nên thêm thuộc tính alt
                                                        cho ảnh thứ <b class="red">
                                                            <?= @$assign_list['alt_img_err'] + 1 ?>
                                                        </b>. <b class="red">(-5)</b>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($assign_list["err_heading"]==1){?>
                                                    <p>
                                                        Thẻ H trong nội dung: Đoạn văn không có thẻ <b class="red">
                                                            <?= $assign_list['count_h2'] <= 0 ? 'H2, ' : '' ?>
                                                            <?= $assign_list['count_h3'] <= 0 ? 'H3' : '' ?>
                                                        </b>.
                                                        Hãy dùng các thẻ H2, H3 và ít nhất một trong các thẻ từ H4
                                                        đến H6.. <b class="red">(-10)</b>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title_seo_box">
                                            <div class="tit_seo">
                                                Kết quả tốt
                                            </div>
                                            <div class="seo_content">
                                                <div class="cnt successs">
                                                    <?php if($assign_list["count_key_tag"]>=3){?>
                                                    <p>
                                                        Độ dài của từ khoá (từ khoá >3 chữ): Từ khoá thoả mãn tiêu
                                                        chí SEO. <b class="bluec">(+5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["url"]==1){?>
                                                    <p>
                                                        URL bài viết: Từ khoá có trong url. Tuyệt vời. <b
                                                            class="bluec">(+5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["url"]==1){?>
                                                    <p>
                                                        Từ khoá trong tiêu đề: Từ khoá xuất hiện trong tiêu đề. Rất
                                                        tốt! <b class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["title_err"]==0){?>
                                                    <p>
                                                        Độ dài tiêu đề: Đủ độ dài tiêu đề (<b class="red">40</b>
                                                        <<b class="bluec">
                                                            <?= $assign_list['len_title'] ?></b>
                                                            <<b class="red">65</b> ký tự). Rất tốt! <b
                                                                    class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_lftitle"]==0){?>
                                                    <p>
                                                        Vị trí từ khoá trong tiêu đề: Cụm từ khóa hoặc từ đồng nghĩa
                                                        xuất hiện trong tiêu đề. Rất tốt! <b class="bluec">(+5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_intro"]==0){?>
                                                    <p>
                                                        Từ khoá trong mô tả: Cụm từ khóa hoặc từ đồng nghĩa xuất
                                                        hiện trong mô tả meta. Rất tốt! <b class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["meta_des_err"]==0){?>
                                                    <p>
                                                        Độ dài mô tả: Độ dài mô tả đạt chuẩn - (<b class="red">120</b>
                                                        <<?= '<b class="bluec">
                                                                                                                                                                                                                                                                                                '
                                                        .
                                                        $assign_list['len_meta_description'] .
                                                        '</b>' ?><<b class="red">
                                                            165</b>). Rất tốt. <b class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_lfintro"]==0){?>
                                                    <p>
                                                        Vị trí từ khoá trong mô tả: Từ khoá có vị trí tốt trong mô
                                                        tả. Tuyệt với! <b class="bluec">(+5)</b>
                                                    </p>
                                                    <?php }?>

                                                    <?php if($assign_list["count_key_tag_in_content"]>=3){?>
                                                    <p>
                                                        Mật độ từ khoá trong nội dung: Cụm từ khóa chính xuất hiện
                                                        <b class="bluec">
                                                            <?= $assign_list['count_key_tag_in_content'] ?>
                                                        </b> lần.
                                                        Rất tốt! <b class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_link"]==0){?>
                                                    <p>
                                                        Các đường dẫn nội bộ: Bạn có <b class="bluec">
                                                            <?= $assign_list['h'] ?>
                                                        </b>
                                                        đường dẫn nội bộ. Rất tốt! <b class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_tit_sub"]==-1){?>
                                                    <p>
                                                        Cụm từ khóa trong tiêu đề phụ: Có từ khóa trong tiêu đề phụ
                                                        mô tả chủ đề của bài viết. Rất tốt! <b class="bluec">(+5)</b>
                                                    </p>
                                                    <?php } ?>
                                                    <?php if($assign_list["alt_seo"]==1){?>
                                                    <p>
                                                        Những thuộc tính alt trong hình ảnh: alt đã có thuộc tính.
                                                        Tuyệt vời! <b class="bluec">(+5)</b>
                                                    </p>
                                                    <?php } ?>

                                                    <?php if($assign_list["err_heading"]==0){?>
                                                    <p>
                                                        Thẻ H trong nội dung: Nội dung đầy dủ thẻ H1,H2,H3. <b
                                                            class="bluec">(+10)</b>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- thông tin từ khóa chính -->
                                        <div class="title_seo_box">
                                            <div class="tit_seo">
                                                Thông tin từ khóa chính:
                                            </div>
                                            <div class="seo_content">
                                                <?php if($assign_list["keyword_seo"]){?>
                                                <?php if($assign_list["count_key_tag_in_content"]){?>
                                                <p>Thông tin của từ khóa chính
                                                    <?= '<b>' . $assign_list['keyword_seo'] . '</b>' ?> của
                                                    bài viết xuất hiện:
                                                </p>
                                                <?php }else {?>
                                                <p>Từ khóa chính
                                                    <?= '<b>' . $assign_list['keyword_seo'] . '</b>' ?> không xuất
                                                    hiện
                                                    trong bài viết!
                                                </p>
                                                <?php } ?>
                                                <?php }else{?>
                                                <p>Bài viết không có từ khóa chính!</p>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="close_box_seo">
                                            <div class="caption"><i class="fas fa-globe-americas mr-2"></i> Kiểm tra bài
                                                viết chuẩn
                                                SEO</div>
                                            <div class="poin_check_seo">
                                                <span>- Đã đạt:<i>
                                                        <?= $assign_list['total_checkSEO'] ?>
                                                    </i> /
                                                    <?= $assign_list['total_SEO'] ?>
                                                </span> |
                                                <span><a href="javascript:void(0)" class="btn_close_hide_seo">Đóng
                                                        xem chi tiết</a></span>
                                            </div>
                                        </div>
                                        <div class="hiden_total_seo">
                                            <?= $assign_list['total_checkSEO'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-primary" hidden>
                            <div class="card-header">
                                <div class="caption"><i class="fas fa-bookmark mr-2"></i>Thông tin chung</div>
                            </div>
                            <div class="card-body" style="overflow: hidden ;">
                                <div class="alert alert-info post-history">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <p class="m-0 pt-1 pb-1"><i class="icon fas fa-check"></i> <a target="_blank"
                                            href="{{ route('list-history', ['id' => $data['post']->id]) }}">Lịch sử chỉnh
                                            sửa
                                            bài</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="caption"><i class="fas fa-folder-open mr-2"></i>Chuyên mục</div>
                                @error('category_path')
                                    <p style="color: red; font-size: 14px">* Chuyên mục không được để trống</p>
                                @enderror
                            </div>
                            <div class="card-body" style="max-height: 450px;overflow: auto;">
                                <div id="wrap_cate_path" class="form-group">
                                    @foreach ($data['cate_list'] as $key => $oneCategory)
                                        @php
                                            $title = $oneCategory->getTranslate('title');
                                            $checked = in_array($oneCategory->id, $data['postListCategory']) ? 'checked="checked"' : '';
                                            $allChild = $oneCategory['children'];
                                        @endphp

                                        <label><input {!! $checked !!} type="checkbox" name="category_path[]"
                                                value="{!! $oneCategory->id !!}"
                                                {{ $allChild->toArray() ? 'disabled' : '' }} />
                                            {!! $title !!} </label>
                                        @if ($allChild)
                                            @foreach ($allChild as $child)
                                                @php
                                                    $title = $child->getTranslate('title');
                                                    $checked = in_array($child->id, $data['postListCategory']) ? 'checked="checked"' : '';
                                                @endphp

                                                <label class="lv2  parent_{!! $oneCategory->id !!}"><input
                                                        {!! $checked !!} type="checkbox" name="category_path[]"
                                                        value="{!! $child->id !!}" /> {!! $title !!}
                                                </label>
                                                @php
                                                    $allChild2 = $child['children'];
                                                @endphp

                                                @if ($allChild2)
                                                    @foreach ($allChild2 as $child2)
                                                        @php
                                                            $title = $child2->getTranslate('title');
                                                            $checked = in_array($child2->id, $data['postListCategory']) ? 'checked="checked"' : '';
                                                        @endphp

                                                        <label class="lv3  parent_{!! $child->id !!}"><input
                                                                {!! $checked !!} type="checkbox"
                                                                name="category_path[]" value="{!! $child2->id !!}" />
                                                            {!! $title !!} </label>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card  card-outline card-info mt-3">
                            <div class="card-body">
                                <div class="wrap-count field-news-description has-success">
                                    <label class="d-block control-label" for="content">Ảnh đại diện </label>
                                    @error('avatar')
                                        <p style="color: red; font-size: 14px">* {{ $message }}</p>
                                    @enderror
                                    <div class="img__avatar text-center position-relative"
                                        style="width: 250px;margin: auto">
                                        <img id="avatar-show"
                                            src="{{ $data['post']->avatar ?? asset('backend/dist/img/default.jpg') }}"
                                            alt="" style="width: 100%">
                                        <div class="input__file ">
                                            <input class="position-absolute"
                                                style="width: 100%;height: 100%;top: 0;left: 0;opacity: 0" type="file"
                                                id="avatar" name="avatar">
                                            <input id="avatar_hiden" name="avatar_hiden" class="hiden"
                                                value="{{ $data['post']->avatar ?? '' }}" hidden>
                                        </div>
                                    </div>
                                    <div style="display: none">
                                        <button id="btn_crop_image" type="button" class="btn btn-info btn-lg"
                                            data-toggle="modal" data-target="#myModal">Crop</button>
                                    </div>
                                    <div class="option_avatar text-center">
                                        <a id="btn_get_image_library" data-toggle="modal" data-target="#image_library"
                                            href="#" class="btn btn-success">Chọn ảnh<span></span></a>
                                    </div>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card  card-outline card-info">
                            <div class="card-body">
                                <div class="wrap-count field-news-description has-success">
                                    <label class="d-block control-label" for="content"><i class="fas fa-cog"></i> Tùy
                                        chỉnh</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch mb-3">
                                            <input type="checkbox" name="type" class="custom-control-input"
                                                {{ $data['post']->type == 1 ? 'checked' : '' }} id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3">Bài tường
                                                thuật</label>
                                        </div>
                                        <div class="wrap-count field-news-description has-success">
                                            <div class="form-group">
                                                <label>Lên lịch đăng:
                                                    <span id="emailHelp" class="text-muted">(Không bắt buộc)</span>
                                                </label>
                                                <div class="input-group date" id="reservationdatetime"
                                                    data-target-input="nearest">
                                                    <input type="text" name="public_date"
                                                        class="form-control datetimepicker-input" id="public_date"
                                                        data-target="#reservationdatetime"
                                                        value="{{ $data['post']->public_date ?? null }}" />
                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="help-block"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    {{-- <div id="modal_royalty" class="modal fade royalty-post" data-backdropz="static" data-width="800"></div> --}}
    <div id="image_library" class="modal fade royalty-post" data-backdropz="static" data-width="800"></div>
    <div id="modal_royalty" class="modal fade media_modal_" data-backdropz="static" data-width="900"></div>
@endsection

@section('script')
    <script src="{{ asset('library/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('library/editor/js/custom.js') }}?v={{ VERSION }}"></script>

    <script>
        $(document).ready(function() {
            // $('#avatar').change(function () {
            //     const [file] =(this).files;
            //     if (file) {
            //         console.log(URL.createObjectURL(file))
            //         $('#avatar-show').attr("src", URL.createObjectURL(file));
            //     }
            // })
            $('#avatar').click(function() {
                var $image_library = $('#image_library');
                $image_library.load('/admin/media/library-post', function() {
                    $image_library.modal().show();
                    $('body').addClass('modal-open');
                    $image_library.modal().on("hidden", function() {
                        $image_library.empty();
                    });
                });
                return false;
            })
            $('#btn_get_image_library').click(function() {
                var $image_library = $('#image_library');
                $image_library.load('/admin/media/library-post', function() {
                    $image_library.modal().show();
                    $('body').addClass('modal-open');
                    $image_library.modal().on("hidden", function() {
                        $image_library.empty();
                    });
                });
                return false;
            });
            $(document).on('click', 'a.page-link', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                url = url.replace("http://", "https://");
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function(response) {
                        $('#image_library').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            function debounce(func, timeout = 300) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        func.apply(this, args);
                    }, timeout);
                };
            }
            $(document).on('keyup', '#search-image', debounce(function() {
                var search = $('#search-image').val().trim();
                $.ajax({
                    url: '/admin/media/library-post',
                    type: 'GET',
                    dataType: 'html',
                    data: {
                        search: search
                    },
                    success: function(response) {
                        $('#image_library').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }, 1500));
        })
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.content',
            plugins: 'autosave,wordcount,code,fullscreen,table,noneditable,link,media,pdf,attack,image,paste,searchreplace,textcolor,editimage,lists,views,quote,quote_box,info,box_tho,vote',
            toolbar: 'forecolor,backcolor,alignleft,aligncenter,alignjustify,alignright,searchreplace,bold,italic,underline,link,unlink,image,media,pdf,attack,block,numlist,bullist,formatselect,code,quizz,fullscreen,preview,fontsizeselect',
            toolbar_mode: 'floating',

            skin: 'lightgray',
            content_css: '/library/editor/css/tinycustomcss.css?v=5',
            noneditable_editable_class: "expEdit",
            noneditable_noneditable_class: "expNoEdit",
            height: 500,
            setup: function(ed) {
                ed.on('DblClick', function(e) {
                    if (e.target.nodeName == 'IMG') {
                        ed.windowManager.open({
                            title: 'Sửa hình ảnh',
                            url: '/admin/editor/editimage',
                            width: 600,
                            height: 560
                        });
                    }
                });

            },
            fontsize_formats: '12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 24px 26px 28px 30px 36px',
            paste_preprocess: function(plugin, args) {
                args.content = args.content.replace(/<div/gi, "<p");
                args.content = args.content.replace(/<\/div>/gi, "</p>");
                args.content = args.content.replace(/<strong/gi, "<b");
                args.content = args.content.replace(/<\/strong>/gi, "</b>");
                args.content = args.content.replace(/<em/gi, "<i");
                args.content = args.content.replace(/<\/em>/gi, "</i>");
                args.content = strip_tags(args.content,
                    '<h1><h2><h3><h4><p><b><u><i><img><table><tr><td><th><tbody><thead><ul><li><figure><figcaption>'
                );
                args.content = args.content.replace(/<(p)[^>]+>/ig, '<$1>');
                var $contentz = $('<div/>').html(args.content);
                var url = '';
                $contentz.find('p').each(function() {
                    $(this).attr('style', 'text-align: left;');
                    if ($(this).html().length <= 1) $(this).remove();
                });
                args.content = $contentz.html();
            },
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            entity_encoding: "raw",
            paste_as_text: true,
            relative_urls: false,
            remove_script_host: false,
        });

        function strip_tags(b, k) {
            var e = "",
                f = !1,
                g = [],
                h = [],
                d = "",
                a = 0,
                l = "",
                c = "";
            k && (h = k.match(/([a-zA-Z0-9]+)/gi));
            b += "";
            g = b.match(/(<\/?[\S][^>]*>)/gi);
            for (e in g)
                if (!isNaN(e)) {
                    c = g[e].toString();
                    f = !1;
                    for (l in h)
                        if (d = h[l], a = -1, 0 != a && (a = c.toLowerCase().indexOf("<" + d + ">")), 0 != a && (a = c
                                .toLowerCase().indexOf("<" + d + " ")), 0 != a && (a = c.toLowerCase().indexOf("</" + d)),
                            0 == a) {
                            f = !0;
                            break
                        } f || (b = b.split(c).join(""))
                } return b
        };

        $('#adđ__tile__en').click(function() {
            $('#en__news__title').show();
            $(this).hide();
            $('#remove__tile__en').show()
        });
        $('#remove__tile__en').click(function() {
            $(this).hide();
            $('#en__news__title').hide();
            $('#adđ__tile__en').show()
        });

        $('#add__desc__en').click(function() {
            $('#en__desc').show();
            $(this).hide();
            $('#remove__desc__en').show()
        });

        $('#remove__desc__en').click(function() {
            $(this).hide();
            $('#en__desc').hide();
            $('#add__desc__en').show()
        });

        $('#add__content__en').click(function() {
            $('#en__content').show();
            $(this).hide();
            $('#remove__content__en').show()
        });

        $('#remove__content__en').click(function() {
            $(this).hide();
            $('#en__content').hide();
            $('#add__content__en').show()
        });



        $(function() {
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'YYYY-MM-DD H:mm'
            });
        })
        // $('#public_date').change(function () {
        //     $('#date-daily').val();
        // });
        // $('#reservationdatetime').val('0000-00-00');
        $('.reset__check__box__type__blog').click(function() {
            $('.type__blog').prop("checked", false);
        })
    </script>
    <script>
        const state = {
            keydown: "",
            setKeydown: function(key) {
                this.keydown = key;
            }
        }
        $('#submitForm').submit(function(evt) {
            if (state.keydown === 'Enter') {
                state.setKeydown('')
                return false
            }
        })

        $(document).keydown(function(e) {
            state.setKeydown(e.key)
        })
        @if (!@$editing)
            $(function() {
                function updateTime() {
                    var post_id = '<?= $data['post']->id ?>';
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        type: "POST",
                        url: "{{ route('update-post-edit') }}",
                        data: {
                            post_id: post_id
                        },
                        async: false,
                        success: function(result) {
                            console.log(result);
                            // window.localStorage.setItem("product-cart",1);
                        }
                    })
                }
                setInterval(updateTime, 10000);
            });
        @endif
    </script>

    <script>
        $(document).ready(function() {
            $('#edit_slug').click(function() {
                $('#f_slug').removeAttr('disabled');
                return false;
            });
            // JS_SEO
            $('.btn_open_hide_seo').click(function() {
                $('#open_checkSeo').show();
            });
            $('.btn_close_hide_seo').click(function() {
                $('#open_checkSeo').hide();
            });

            $(".coppytags").click(function() {
                var ele_example = $(".tags_for_seo");
                var htmlmarkup = ele_example.val();
                var string = htmlmarkup.split(',', 1);
                var string_tag = htmlmarkup.split(',');
                var txt_tag = string_tag.splice(1);
                if (htmlmarkup) {
                    $(".tags_for_seo_copy").attr('value', txt_tag);
                    $("#f_key_tag").attr('value', string);
                } else {
                    alert('Bài viết chưa nhập từ khóa. Hãy nhập từ khóa!');
                    document.getElementById("f_tags_tag").focus();
                    $("#f_tags_tagsinput").css("border", "1px solid #35aa47");
                }
            });

            $(".disabled_btn_seo").click(function(event) {
                event.preventDefault();
                alert("Điểm SEO chưa đạt điểm 80! Bài chưa thể xuất bản.");
            });
            // end SEO
        });
    </script>
    <script>
        $('#wrap_cate_path input[type=checkbox]').change(function() {
            var value = $(this).val();
            var text = $(this).parents('label').text();
            if ($(this).is(':checked')) {
                $(this).parents('label').find('input[type=text]').show().val(1);
                $('#wrap_cate_path .parent_' + value).removeClass('hide_cate');
                $('input[name=category_id]').val(value);
                $('input[name=category_id]').parent().find('.expltr').text(text);
            } else {
                $(this).parents('label').find('input[type=text]').hide();
                if ($('#wrap_cate_path .parent_' + value).find('input:checked').length == 0) $(
                    '#wrap_cate_path .parent_' + value).addClass('hide');

                var e = $('#wrap_cate_path span.checked:nth(0) input[type=checkbox]');
                value = e.val();
                text = e.parents('label').text();
                $('input[name=category_id]').val(value);
                $('input[name=category_id]').parent().find('.expltr').text(text);
            }
        });
        $('#wrap_cate_path input[checked=checked]').each(function() {
            $(this).parents('label').find('input[type=text]').show();
            $(this).parents('label').removeClass('hide_cate');

            if (!$(this).parents('li').hasClass('lv2')) {
                var value = $(this).val();
                $('#wrap_cate_path .parent_' + value).removeClass('hide_cate');
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            var well = $(".well");
            var offset = well.offset().top; // Vị trí ban đầu của "well"

            $(window).scroll(function() {
                if ($(window).scrollTop() > offset) {
                    well.addClass("fixed-well"); // Khi cuộn xuống đủ xa, thêm class "fixed-well"
                } else {
                    well.removeClass("fixed-well"); // Khi cuộn lên trên, xóa class "fixed-well"
                }
            });
        });
    </script>
@endsection
