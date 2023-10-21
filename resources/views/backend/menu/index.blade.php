@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('backend.box.box-menu-setting')
                    <form action="{{ route('update-position') }}" method="post" id="form_default">
                        @method('post')
                        @csrf
                        <div class="card card-secondary card-outline">
                            <div class="card-header " style="text-align: end">
                                <h3 class="card-title"><i class="fas fa-info-circle"></i> Thông tin Menu</h3>
                                <a href="#" role="button" data-toggle="modal" data-target="#create_menu"
                                    class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Tên Menu</th>
                                            <th>Tên Tiếng anh</th>
                                            <th>Vị trí</th>
                                            <th>link</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($menu) <= 0)
                                            <tr>
                                                <td>
                                                    <p>(Không có dữ liệu)</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($menu as $key => $value)
                                            <tr>
                                                <td class="btn_cat" data-id="{{ $value->id }}">
                                                    {{ $value->name != null ? $value->name : $value->category->name }}
                                                    <?= $value->children->toArray() ? '<i class="fas fa-arrow-down"></i>' : '' ?>

                                                </td>
                                                <td>
                                                    <input name="name_en[{{ $value->id }}]" type="text"
                                                        class="text form-control" value="{{ $value->name_en }}" />
                                                    {{-- {{$value->slug}} --}}
                                                </td>
                                                <td>
                                                    <input name="position[{{ $value->id }}]" type="text"
                                                        class="text number" value="{{ $value->position }}" maxlength="2"
                                                        style="width: 25px; text-align: center; margin: 0; padding: 0;"
                                                        autocomplete="OFF" />
                                                    {{-- <span class="badge badge-info">{{$value->position}}</span> --}}
                                                </td>
                                                <td>
                                                    <input name="link[{{ $value->id }}]" type="text"
                                                        class="text form-control" value="{{ $value->link }}" />
                                                </td>
                                                <td>
                                                    <div class=" text-center">
                                                        <a href="javascript:void(0)" data-toggle="dropdown"
                                                            class="btn btn-default btn-xs dropdown-toggle">
                                                            <span class="fas fa-cog"></span>
                                                        </a>
                                                        <ul class="dropdown-menu" id="dropdown{{ $value->id }}">
                                                            <li>
                                                                <a href="{{ route('edit-menu', ['id' => $value->id]) }}">
                                                                    <i class="fas fa-edit"></i>
                                                                    Chỉnh sửa
                                                                </a>
                                                            </li>
                                                            <li class="remove-button">
                                                                <a href="#">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                                                </a>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach ($value->children as $index => $child)
                                                <tr class="odd gradeX hide cat_{{ $value->id }}">
                                                    <td>|-- {{ $child->name }}</td>
                                                    <td>
                                                        <input name="name_en[{{ $child->id }}]" type="text"
                                                            class="text form-control" value="{{ $child->name_en }}" />
                                                    </td>
                                                    <td>
                                                        <input name="position[{{ $child->id }}]" type="text"
                                                            class="text number" value="{{ $child->position }}"
                                                            maxlength="2"
                                                            style="width: 25px; text-align: center; margin: 0; padding: 0;"
                                                            autocomplete="OFF" />
                                                    </td>
                                                    <td>
                                                        <input name="link[{{ $child->id }}]" type="text"
                                                            class="text form-control" value="{{ $child->link }}" />
                                                    </td>
                                                    <td>
                                                        <div class=" text-center">
                                                            <a href="javascript:void(0)" data-toggle="dropdown"
                                                                class="btn btn-default btn-xs dropdown-toggle">
                                                                <span class="fas fa-cog"></span>
                                                            </a>
                                                            <ul class="dropdown-menu" id="dropdown{{ $child->id }}">
                                                                <li>
                                                                    <a href="{{ route('edit-menu', ['id' => $child->id]) }}">
                                                                        <i class="fas fa-edit"></i>
                                                                        Chỉnh sửa
                                                                    </a>
                                                                </li>
                                                                <li class="remove-button">
                                                                    <a href="#">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                                                    </a>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @foreach ($child->children2 as $index => $child2)
                                                    <tr class="odd gradeX hide cat_{{ $value->id }}">
                                                        <td>|--|-- {{ $child2->name }}</td>
                                                        <td>
                                                            <input name="name_en[{{ $child2->id }}]" type="text"
                                                                class="text form-control" value="{{ $child2->name_en }}" />
                                                        </td>
                                                        <td>
                                                            <input name="position[{{ $child2->id }}]" type="text"
                                                                class="text number" value="{{ $child2->position }}"
                                                                maxlength="2"
                                                                style="width: 25px; text-align: center; margin: 0; padding: 0;"
                                                                autocomplete="OFF" />
                                                            {{-- <span class="badge badge-info">{{$value->position}}</span> --}}
                                                        </td>
                                                        <td>
                                                            <input name="link[{{ $child2->id }}]" type="text"
                                                                class="text form-control" value="{{ $child2->link }}" />
                                                        </td>
                                                        <td>
                                                            <div class=" text-center">
                                                                <a href="javascript:void(0)" data-toggle="dropdown"
                                                                    class="btn btn-default btn-xs dropdown-toggle">
                                                                    <span class="fas fa-cog"></span>
                                                                </a>
                                                                <ul class="dropdown-menu" id="dropdown{{ $child2->id }}">
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('edit-menu', ['id' => $child2->id]) }}">
                                                                            <i class="fas fa-edit"></i>
                                                                            Chỉnh sửa
                                                                        </a>
                                                                    </li>
                                                                    <li class="remove-button">
                                                                        <a href="#">
                                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                                            Xóa
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
                        </div>
                        <div class="text-center"> <button type="submit" class="btn btn-success">Cập nhật</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('add-menu') }}" method="post" id="form_menu">
                    @method('post')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Tên menu</label>
                            @error('menu_name')
                                <p style="color: red; font-size: 14px">* {{ $message }}</p>
                            @enderror
                            <input type="text" class="form-control" name="menu_name" id="title"
                                aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <small id="emailHelp" class="form-text text-muted">(Bằng Tiếng Anh)</small>
                            <input type="text" name="name_en" class="form-control" id="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="link">Link liên kết</label>
                            @error('link')
                                <p style="color: red; font-size: 14px">* {{ $message }}</p>
                            @enderror
                            <input type="text" name="link" class="form-control" id="link">
                        </div>

                        <div class="form-group">
                            <label for="exampleCheck1">Vị trí</label>
                            @error('position')
                                <p style="color: red; font-size: 14px">* {{ $message }}</p>
                            @enderror
                            <input type="number" name="position" class="form-control" id="position">
                        </div>
                        <div class="form-group">
                            <label for="exampleCheck1">Menu cha nếu có</label>
                            @error('parent_id')
                            @enderror
                            <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                                <option value="" selected> Chọn menu </option>
                                @foreach ($menu as $index => $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @foreach ($parent->children as $index => $child)
                                        <option value="{{ $child->id }}">|-- {{ $child->name }}</option>
                                        @foreach ($child->children2 as $index2 => $child2)
                                            <option value="{{ $child2->id }}"> &nbsp; |--- {{ $child2->name }}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" hidden>
                            <label for="slug">Slug</label>
                            @error('slug')
                                <p style="color: red; font-size: 14px">* {{ $message }}</p>
                            @enderror
                            <input type="text" name="slug" class="form-control" id="slug">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" id="submit_menu">Lưu lại</button>
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
