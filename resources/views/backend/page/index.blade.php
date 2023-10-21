@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
<div class="content-wrapper mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('backend.box.box-menu-setting')
                <div class="card card-secondary card-outline">
                    <div class="card-header " style="text-align: end">
                        <h3 class="card-title"><i class="fas fa-info-circle"></i> Danh sách trang tĩnh</h3>
                        <a href="{{ route('page-add')}}" class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th style="width: 60%">Tiêu đề</th>
                                    <th>Sửa lần cuối</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            @if (count($listPage) <= 0)
                                <tr>
                                    <td colspan="3">
                                        <p>(Không có dữ liệu)</p>
                                    </td>
                                </tr>
                            @else
                                <tbody>
                                    @foreach ($listPage as $key => $value)
                                        <tr>
                                            <td>
                                                <a href="{{route('edit-page',['id'=>$value->id])}}" >
                                                    {{$value->title_vi}}
                                                </a>
                                            </td>
                                            <td>
                                                {{$value->admins->name}} vào lúc  {{ $value->created_at }}
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                                        <span class="fas fa-cog"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" id="dropdown{{$value->id}}">
                                                        <li>
                                                            <a href="{{route('edit-page',['id'=>$value->id])}}">
                                                                <i class="fas fa-edit"></i>
                                                                Chỉnh sửa
                                                            </a>
                                                        </li>
                                                        <li class="remove-button">
                                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa page này?')" href="{{route('delete-page',['id'=>$value->id])}}" >
                                                                <i class="fa fa-trash" aria-hidden="true"></i> Xóa bài
                                                            </a>
                                                        
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    @if ($errors->any())
        $('#create_menu').modal('show');
    @endif
    $(document).ready(function() {
        $('#submit_menu').click(function() {
            $(this).prop('disabled', true);
            $('#form_menu').submit();
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn_cat').each(function() {
            var is_open = 0;
            var id = $(this).data('id');
            $(this).click(function() {
                if (is_open == 0) {
                    $('.cat_' + id).removeClass('hide');
                    is_open = 1;
                } else {
                    $('.cat_' + id).addClass('hide');
                    is_open = 0;
                }
                return false;
            });
        });
    });
</script>
@endsection
