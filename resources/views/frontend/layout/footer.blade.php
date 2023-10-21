<footer>
  <div class="container-fix">
    <div class="row">
      <div class="col-md-5 logo__footer">
        <div class="after__logo">
          <a href=".">
            <img src="{{asset('frontend/images/logo-footer.svg')}}" alt="">
          </a>
        </div>

      </div>
      <div class="col-md-7 name__site__footer d-md-flex d-none">
        <div class="after__logo">
          <a href=".">{{__('PC1 Group Mien nam')}}</a>
        </div>
      </div>
    </div>
    <div class="row menu__footer">
      <div class="col-md-5 title__site__footer">
        <p>{!!('CÔNG TY TNHH MTV XÂY LẮP ĐIỆN 1 - MIỀN NAM <br> Mien Nam – No 1 Power Construction Company Limited')!!}
        </p>
      </div>
      <div class="col-md-7 box__menu__footer d-md-block d-none">
        <ul>
          @php
          $listmenu = ConfigSite::listMenu();
          // dd($listmenu);
          @endphp
          @foreach ($listmenu as $item)
          @if ($item->getTranslate('title') != "")
          <li>
            <a href="{{($item->slug =='du-an' || $item->slug =='blog')? 'javascrip:vod(0)' :route('detail-cate', $item->slug)}}"
              data-toggle="tooltip" title="{{$item->getTranslate('title')}}">
              {{ \Illuminate\Support\Str::limit($item->getTranslate('title'), 20, $end='...') }}
            </a>
          </li>
          @endif
          @if (count($item->childrenMenu) > 0)
          @foreach ($item->childrenMenu as $item2)
          @if ($item2->getTranslate('title') != "")
          <li>
            <a href="{{route('detail-cate', $item->slug.'/'.$item2->slug)}}" data-toggle="tooltip"
              title="{{$item2->getTranslate('title')}}">
              {{ \Illuminate\Support\Str::limit($item2->getTranslate('title'), 20, $end='...') }}
            </a>
          </li>
          @endif
          @endforeach
          @endif
          @endforeach
        </ul>
      </div>
    </div>

  </div>
  <div class="contact__info__footer">
    <div class="container-fix">
      <div class="row">
        <div class="col-md-4 col-12">
          <div class="contact__address">
            <div class="contact__address__img">
              <img src="{{asset('frontend/svg/map-footer-icon.svg')}}" alt="">
            </div>
            <div class="content__info">
              <p class="title">{{__('address')}}:</p>
              <p class="content">
                {{(App::currentLocale()=='vi')?
                ConfigSite::getInfoByName('contact_address'):
                ConfigSite::getInfoByName('en_contact_address')}}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-12">
          <div class="contact__address">
            <div class="contact__address__img">
              <img src="{{asset('frontend/svg/phone-footer-icon.svg')}}" alt="">
            </div>
            <div class="content__info">
              <p class="title">{{__('phone')}}:</p>
              <p class="content">{{ConfigSite::getInfoByName('contact_phone')}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-12">
          <div class="contact__address">
            <div class="contact__address__img">
              <img src="{{asset('frontend/svg/email-footer-icon.svg')}}" alt="">
            </div>
            <div class="content__info">
              <p class="title">{{__('Email:')}}</p>
              <p class="content">{{ConfigSite::getInfoByName('contact_email')}}</p>
            </div>
          </div>
        </div>
        <div class="d-md-none d-block col-12">
          <ul class="social">
            <li>
              <a href="{{ConfigSite::getInfoByName('facebook_link')}}">
                <img src="{{asset('frontend/svg/fb-icon-foot.svg')}}" alt=""></a>
            </li>
            <li>
              <a href="{{ConfigSite::getInfoByName('instagram_link')}}">
                <img src="{{asset('frontend/svg/instagram-icon-foot.svg')}}" alt=""></a>
            </li>
            <li>
              <a href="{{ConfigSite::getInfoByName('zalo_link')}}">
                <img src="{{asset('frontend/svg/zalo-icon-foot.svg')}}" alt=""></a>
            </li>
            <li>
              <a href="{{ConfigSite::getInfoByName('linkedin_link')}}">
                <img src="{{asset('frontend/svg/linkded-icon-foot.svg')}}" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="copy__right">
  <div class="container-fix">
    <div class="row">
      <div class="col-md-8 col-12">
        <p class="title">{{(App::currentLocale()=='vi')?
          ConfigSite::getInfoByName('copy_right'):
          ConfigSite::getInfoByName('en_copy_right')}}. {{__('copyright')}} <a
            href="https://giaminhmedia.vn">Giaminhmedia.vn</a></p>
      </div>
      <div class="col-md-4 d-md-block d-none">
        <ul class="site__map">
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<style>
  .tooltip.top .tooltip-inner {
    background-color: pink;
  }

  .tooltip.top .tooltip-arrow {
    border-top-color: pink;
  }
</style>