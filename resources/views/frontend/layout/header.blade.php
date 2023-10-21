<header>
  <div class="info__header__box">
    <div class="container-fix">
      <div class="row">
        <div class="col-8 left__info__box">
          <ul class="d-flex">
            <li class="item">
              <a href="/">
                <img src="{{asset('frontend/images/logo.svg')}}" alt="">
              </a>
            </li>
            <li class="item">
              <a href="mailto:{{ConfigSite::getInfoByName('contact_email')}}">
                <img src="{{asset('frontend/svg/mail-icon.svg')}}" alt="">
                <span>Giới thiệu</span>
              </a>
            </li>
            <li class="item">
              <a href="javascript:void(0)">
                <img src="{{asset('frontend/svg/time-icon.svg')}}" alt="">
                <span>
                  Tin tức sự kiện
                </span>
              </a>
            </li>
            <li class="item">
              <a href="javascript:void(0)">
                <img src="{{asset('frontend/svg/time-icon.svg')}}" alt="">
                <span>
                  Chất lượng sản phẩm
                </span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-4 right__info__box">
          <ul class="d-flex">
            <li class="item">
              <form action="" method="GET">
                <input placeholder="Tìm kiếm">
              </form>
            </li>            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="menu__header__box">
    <div class="container-fix">
      <div class="row">
        <div class="col-2 logo__header">
          <a href="/">
            <img src="{{asset('frontend/images/logo.svg')}}" alt="">
          </a>
        </div>
        <div class="col-8 menu__box">
          <div class="container">
            <div class="row">
              <div class="col-11 menu__header">
                <ul>
                  @foreach (ConfigSite::listMenu() as $key => $value)
                  <li class="item {{route('detail-cate', $value->slug) == URL::current()?'active':''}}">
                    <a
                      href="{{ ($value->slug =='du-an' || $value->slug =='blog')? '#' :route('detail-cate', $value->slug) }}">
                      {{$value->getTranslate('title')}}
                      @if (count($value->childrenMenu) > 0)
                      <img src="{{asset('frontend/svg/drop-down-icon.svg')}}" alt="">
                      @endif
                    </a>
                    @if (count($value->childrenMenu) > 0)
                    <ul class="child">
                      @foreach($value->childrenMenu as $index => $child)
                      <li class="{{route('detail-cate',$value->slug.'/'.$child->slug) == URL::current()?'active':''}}">
                        <a href="{{ route('detail-cate',$value->slug.'/'.$child->slug) }}">{{
                          $child->getTranslate('title')}}</a>
                      </li>
                      @endforeach
                    </ul>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="col-1 search__icon__header">
                <form action="{{route('search')}}" class="search__form">
                  <input type="text" name="search" placeholder="Tìm kiếm...">
                  <a href="javascript:void(0);" class="close-search">
                    <img src="{{asset('frontend/svg/x.svg')}}" alt="">
                  </a>
                </form>
                <a href="javascript:void(0);" class="btn-search">
                  <img src="{{asset('frontend/svg/search-icon.svg')}}" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-2 chat__menu__header">
          <a href=".">
            <img src="{{asset('frontend/svg/chat-icon.svg')}}" alt="">
            <span>{{__('Chat với chúng tôi')}}</span>
          </a>
        </div>
      </div>

    </div>
  </div>
  <div class="menu__header__mobile__layout">
    <div class="container-fix">
      <a href="/" class="menu__header__mobile__layout_logo">
        <img src="{{asset('frontend/images/logo.svg')}}" alt="">
      </a>
      <div class="menu__header__mobile__layout_btn">
        <input type="checkbox" id="menu">
        <label for="menu" class="icon">
          <div class="menu"></div>
        </label>
        <nav class="menu_mini">
          <div class="menu__list__header">
            <div class="content__list__menu__header">
              <ul class="list__menu__mobile">
                <li>
                  <form action="/search-post" method="GET">
                    <input type="text" name="search" class="search__header__input" placeholder="Tìm kiếm">
                    <button>
                      <img src="{{asset('/frontend/images/search.svg')}}" alt="search">
                    </button>
                  </form>
                </li>
                @foreach (ConfigSite::listMenu() as $key => $value)
                <li class="dropdown-list">
                  <div class="d-flex justify-content-between align-items-center">
                    <a class="reset_style_link"
                      href="{{ ($value->slug =='du-an' || $value->slug =='blog')? '#' :route('detail-cate', $value->slug) }}">
                      {{$value->getTranslate('title')}}
                    </a>
                    @if (count($value->childrenMenu) > 0)
                    <i class="fas fa-angle-down ml-1"></i>
                    @endif
                  </div>
                  @if (count($value->childrenMenu) > 0)
                  <ul class="dropdown-list__menu">
                    @foreach($value->childrenMenu as $index => $child)
                    <li>
                      <a href="{{ route('detail-cate',$value->slug.'/'.$child->slug) }}">
                        {{ $child->getTranslate('title')}}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  @endif
                </li>
                @endforeach
              </ul>
              <div class="foot__menu__mobile">
                <h3>CÔNG TY TNHH MỘT THÀNH VIÊN XÂY LẮP ĐIỆN 1 MIỀN NAM</h3>
                <div class="menu__mobile__contact">
                  <a href="#">
                    <img src="{{asset('frontend/images/email-icon.svg')}}" alt="">
                    <span>miennam@pc1group.vn</span>
                  </a>
                  <a href="tel:028 6281 4270">
                    <img src="{{asset('frontend/images/phone-icon.svg')}}" alt="">
                    <span>028 6281 4270</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>