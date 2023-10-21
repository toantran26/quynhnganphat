@extends('backend.layout.index')
@section('style')
@endsection
@section('content')
<div class="content-wrapper mt-2">
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        @include('backend.box.box-menu-setting')
        <div class="card-body">
          <div class="row">
            <div class="col-4 col-sm-3">
              <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab"
                  aria-controls="vert-tabs-home" aria-selected="true">Cài đặt SEO</a>
                {{-- <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
                  role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Logo</a> --}}
                <a class="nav-link" id="vert-tabs-text-link-tab" data-toggle="pill" href="#vert-tabs-text-link"
                  role="tab" aria-controls="vert-tabs-text-link" aria-selected="false">TextLink</a>
                <a class="nav-link" id="vert-tabs-footer-tab" data-toggle="pill" href="#vert-tabs-footer" role="tab"
                  aria-controls="vert-tabs-footer" aria-selected="false">Chân trang</a>
              </div>
            </div>
            <div class="col-8 col-sm-9">
              <div class="tab-content" id="vert-tabs-tabContent">
                <div class="tab-pane text-left fade active show" id="vert-tabs-home" role="tabpanel"
                  aria-labelledby="vert-tabs-home-tab">
                  <div class="card card-secondary card-outline">
                    <div class="card-header " style="text-align: end">
                      <h3 class="card-title"><i class="fas fa-info-circle"></i> SEO trang chủ</h3>
                    </div>
                    <div class="card-body ">
                      <form action="{{route('update-info-config')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="title_seo">Tiêu đề SEO </label>
                            <input class="form-control" value="{{$info['title_seo']}}" name="title_seo" id="title_seo"
                              type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="desc_seo">Mô tả SEO </label>
                            <textarea id="desc_seo" class="count-length form-control" name="desc_seo" maxlength="500"
                              rows="3" data-name="news-description"><?= $info['desc_seo']?></textarea>
                            <div class="help-block"></div>

                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="key_seo">Từ khóa SEO </label>
                            <textarea id="key_seo" class="count-length form-control" name="key_seo" maxlength="500"
                              rows="3" data-name="news-description"><?= $info['key_seo']?></textarea>
                            <div class="help-block"></div>

                          </div>
                        </div>
                        <div class="form-group text-center m-auto">
                          <div class="wrap-count field-news-description has-success">
                            <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>
                              Cập nhật
                            </button>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                  aria-labelledby="vert-tabs-profile-tab">
                  Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula
                  tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                  sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus.
                  Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                </div>
                <div class="tab-pane fade" id="vert-tabs-text-link" role="tabpanel"
                  aria-labelledby="vert-tabs-text-link-tab">
                  <div class="card card-secondary card-outline">
                    <div class="card-header " style="text-align: end">
                      <h3 class="card-title"><i class="fas fa-info-circle"></i> Mạng xã hội</h3>
                    </div>
                    <form action="{{route('update-info-config')}}" method="post">
                      @csrf
                      <div class="card-body row">
                        <div class="col-6">
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="facebook_link">Facebook </label>
                              <input class="form-control" value="{{$info['facebook_link']}}" name="facebook_link"
                                id="facebook_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="linkedin_link">Linked In </label>
                              <input class="form-control" value="{{$info['linkedin_link']}}" name="linkedin_link"
                                id="linkedin_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="twitter_link">Twitter</label>
                              <input class="form-control" value="{{$info['twitter_link']}}" name="twitter_link"
                                id="twitter_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="pinterest_link">Pinterest </label>
                              <input class="form-control" value="{{$info['pinterest_link']}}" name="pinterest_link"
                                id="pinterest_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="instagram_link">Instagram </label>
                              <input class="form-control" value="{{$info['instagram_link']}}" name="instagram_link"
                                id="instagram_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="youtube_link">Youtube</label>
                              <input class="form-control" value="{{$info['youtube_link']}}" name="youtube_link"
                                id="youtube_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="google_link">Google </label>
                              <input class="form-control" value="{{$info['google_link']}}" name="google_link"
                                id="google_link" type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="wrap-count field-news-description has-success">
                              <label class="d-block control-label" for="zalo_link">Zalo </label>
                              <input class="form-control" value="{{$info['zalo_link']}}" name="zalo_link" id="zalo_link"
                                type="text">
                              <div class="help-block"></div>
                            </div>
                          </div>

                        </div>
                        <div class="form-group text-center m-auto">
                          <div class="wrap-count field-news-description has-success">
                            <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>
                              Cập nhật
                            </button>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="vert-tabs-footer" role="tabpanel" aria-labelledby="vert-tabs-footer-tab">
                  <div class="card card-secondary card-outline">
                    <div class="card-header " style="text-align: end">
                      <h3 class="card-title"><i class="fas fa-info-circle"></i> Thông tin cuối trang</h3>
                    </div>
                    <div class="card-body ">
                      <form action="{{route('update-info-config')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="contact_address">Địa chỉ </label>
                            <input class="form-control" value="{{$info['contact_address']}}" name="contact_address"
                              id="contact_address" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="en_contact_address">Địa chỉ (tiếng anh)</label>
                            <input class="form-control" value="{{$info['en_contact_address']}}"
                              name="en_contact_address" id="en_contact_address" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="contact_email">Email </label>
                            <input class="form-control" value="{{$info['contact_email']}}" name="contact_email"
                              id="contact_email" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="domain">Domain </label>
                            <input class="form-control" value="{{$info['domain']}}" name="domain" id="domain"
                              type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="contact_phone">Số điện thoại </label>
                            <input class="form-control" value="{{$info['contact_phone']}}" name="contact_phone"
                              id="contact_phone" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="copy_right">Bản quyền </label>
                            <input class="form-control" value="{{$info['copy_right']}}" name="copy_right"
                              id="copy_right" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="copy_right">License </label>
                            <input class="form-control" value="{{$info['en_copy_right']}}" name="en_copy_right"
                              id="copy_right" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        {{-- <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="license">Giấy phép </label>
                            <input class="form-control" value="{{$info['license']}}" name="license" id="license"
                              type="text">
                            <div class="help-block"></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="wrap-count field-news-description has-success">
                            <label class="d-block control-label" for="en_license">License </label>
                            <input class="form-control" value="{{$info['en_license']}}" name="en_license"
                              id="en_license" type="text">
                            <div class="help-block"></div>
                          </div>
                        </div> --}}
                        <div class="form-group text-center m-auto">
                          <div class="wrap-count field-news-description has-success">
                            <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i>
                              Cập nhật
                            </button>
                            <div class="help-block"></div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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