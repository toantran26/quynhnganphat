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
                <img src="{{asset('frontend/svg-v2/icon-eath.svg')}}" alt="">
                <span>Giới thiệu</span>
              </a>
            </li>
            <li class="item">
              <a href="javascript:void(0)">
                <img src="{{asset('frontend/svg-v2/icon-news.svg')}}" alt="">
                <span>
                  Tin tức sự kiện
                </span>
              </a>
            </li>
            <li class="item">
              <a href="javascript:void(0)">
                <img src="{{asset('frontend/svg-v2/icon-clsp.svg')}}" alt="">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27" fill="none">
                  <path d="M24.2736 22.0804L21.7382 24.6263C21.3914 24.2892 21.0376 23.9513 20.69 23.6064C19.2103 22.138 17.7332 20.6673 16.2587 19.1942C16.0682 19.0035 15.9281 19.019 15.7129 19.1498C12.9491 20.83 10.0158 21.164 6.96024 20.1519C4.85994 19.4581 3.17846 18.1556 1.89336 16.3368C0.641591 14.5853 -0.0215376 12.4776 0.000533614 10.3208C0.00790958 8.2137 0.655401 6.15924 1.85626 4.43263C3.05711 2.70603 4.75397 1.38975 6.71947 0.660164C9.08763 -0.208729 11.4899 -0.231308 13.8487 0.660164C16.6465 1.71981 18.6485 3.65691 19.8012 6.44811C20.6613 8.53003 20.7844 10.6727 20.2657 12.8535C19.98 14.0685 19.4623 15.2161 18.7414 16.2325C18.6415 16.375 18.6942 16.4513 18.7964 16.5517C19.9901 17.7313 21.1862 18.9077 22.3699 20.0974C23.014 20.7436 23.6333 21.4116 24.2736 22.0804ZM10.3031 3.01147C6.22556 3.10023 3.14982 6.48704 3.12195 10.3223C3.09331 14.3476 6.45084 17.8403 10.6452 17.7188C14.5462 17.6044 17.7954 14.3258 17.742 10.2445C17.6893 6.22622 14.3628 2.97721 10.3031 3.01147Z" fill="#919191"/>
                  <path d="M22.4558 25.3271L25.0485 22.7578C25.3024 23.0155 25.5904 23.2725 25.8335 23.5652C26.0417 23.8151 26.0278 24.1406 25.9372 24.431C25.6275 25.4143 24.9788 26.0504 23.9701 26.2855C23.829 26.3238 23.6803 26.3229 23.5397 26.2828C23.3992 26.2428 23.2721 26.1652 23.1719 26.0582C22.9428 25.8215 22.7121 25.5879 22.4558 25.3271Z" fill="#919191"/>
                </svg>
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
        <div class="col-8 menu__box">
          <div class="container">
            <div class="row">
              <div class="col-12 menu__header">
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
            </div>
          </div>
        </div>
        <div class="col-4 chat__menu__header">
          <a href="#">
            <span>Miễn phí tư vấn + Thiết kế</span>
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