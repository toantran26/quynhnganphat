@extends('frontend.layout.index')
@section('SEO')
@php
$tags = '';
foreach ($post->tags as $tag) {
$tags .= $tag->title_vi.',';
}
@endphp
<title>{{$post->desc_seo ?? $post->description}}</title>
<meta name="keywords" content="{{$tags ?? ''}}">
<meta name="description" charset="UTF-8" content="{{$post->desc_seo ?? $post->description}}" />
<meta name="title" charset="UTF-8" content="{{$post->title_seo ?? $post->titles}}" />

<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{$post->title_seo ?? $post->titles}}" />
<meta property="og:description" content="{{$post->desc_seo ?? $post->description}}" />
<meta property="og:image" content="{{asset('/resize/600x340'.$post->avatar)}}" />
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
<style>
  @media print {

    footer {
      display: none
    }

    section.main_banner_cate {
      display: none;
    }

    nav {
      display: none;
    }

    .detail-content._news_path {
      display: none;
    }

    .detail-content {
      margin-top: 40px;
    }
  }
</style>

@endsection
@section('content')
<main>
  <section class="main_banner_cate">
    <div class="nav__images cate" style="background-image: url({{ asset('frontend/images/nav_cate.png') }});">
      <div class="navbar__gadient ">
        <div class="w-1176 main-content position-relative ">
          <div class="position-absolute ">
            <div class="content__navbar">
              @if (@$category->parent)
              <div class="category_parent">
                <a href="{{route('detail-cate', $category->parent->slug)}}" class="">{{$category->parent->title_vi}}</a>
              </div>
              @endif
              <h1 class="tile__navbar fs-32">
                <a href="{{route('detail-cate', $category->slug)}}" class="">{{$category->title_vi}}</a>
              </h1>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <div class="w-835 mt-4 mb-2">
    <div class="col-lg-12 col-sm-12 col-12 px-0 detail-box">
      <div class="position-relative d-lg-block d-none">
        <div class="icon-share-2">
          <div class="detail-icon-comment">
            <a class="icon-detail-l fb-hover"
              href="https://www.facebook.com/sharer/sharer.php?u={{route('detail-post',['slug' => $post->slug,'id'=>$post->id])}}"
              onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;"
              rel="nofollow" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none">
                <path
                  d="M9.34475 11.1068L9.86301 7.69417H6.621V5.48058C6.621 4.54672 7.07306 3.63592 8.52512 3.63592H10V0.730583C10 0.730583 8.6621 0.5 7.38356 0.5C4.71233 0.5 2.96804 2.13483 2.96804 5.0932V7.69417H0V11.1068H2.96804V19.357C3.56393 19.4516 4.17352 19.5 4.79452 19.5C5.41553 19.5 6.02511 19.4516 6.621 19.357V11.1068H9.34475Z"
                  fill="currentColor" />
              </svg>
              {{-- <img src="{{asset('frontend/svg/icon_fb.svg')}}" alt=""> --}}
            </a>
          </div>
          <div class="detail-icon-comment">
            <div class="zalo-share-button icon-detail-l zalo-hover" data-customize="true"
              data-href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
              data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true data-target="_blank">
              {{-- <img src="{{asset('/frontend/images/Zalo.svg')}}" alt="" width="14px" height="14px"> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 24 23" fill="none"
                style="&#10;">
                <path
                  d="M5.05615 19.8021C4.96724 19.7626 4.90303 19.7182 5.00676 19.6293C5.07097 19.5799 5.14012 19.5354 5.20927 19.491C5.85633 19.0711 6.46387 18.6118 6.86396 17.9351C7.19983 17.372 7.1455 17.041 6.72565 16.6261C4.3844 14.2849 3.35701 11.4843 3.8707 8.17488C4.16212 6.30781 5.01663 4.69263 6.26135 3.28986C7.01214 2.44029 7.90616 1.75371 8.88416 1.18075C8.94343 1.14617 9.0274 1.13629 9.03728 1.04739C9.01752 0.997993 8.98294 1.01281 8.95331 1.01281C7.28874 1.01281 5.62418 0.978235 3.96455 1.02269C2.37408 1.07208 1.00093 2.30198 1.00587 4.06534C1.01575 9.21709 1.00587 14.3688 1.00587 19.5255C1.00587 21.1259 2.2259 22.4645 3.82131 22.5237C5.16975 22.5781 6.5182 22.5336 7.87159 22.5287C7.97037 22.5336 8.06916 22.5385 8.16795 22.5385H15.3004C17.0786 22.5385 18.8567 22.5484 20.6349 22.5385C22.2846 22.5385 23.6232 21.2049 23.6232 19.5601V19.5305V16.641C23.6232 16.5718 23.6479 16.4977 23.6035 16.4236C23.5145 16.4286 23.48 16.5026 23.4306 16.552C22.4723 17.5152 21.3412 18.2907 20.1014 18.839C17.0637 20.1775 13.9717 20.2714 10.8352 19.1946C10.5635 19.0958 10.2672 19.0859 9.98563 19.1551C9.57073 19.2588 9.16076 19.3823 8.75079 19.5058C7.54559 19.8812 6.31569 20.0491 5.05615 19.8021ZM8.63719 11.4793C8.72116 11.3707 8.76561 11.3064 8.815 11.2422C9.46206 10.4223 10.1091 9.60236 10.7562 8.77749C10.9439 8.5404 11.1316 8.29837 11.2501 8.01189C11.3884 7.68589 11.2402 7.37965 10.9044 7.2611C10.7562 7.21665 10.5981 7.19689 10.4401 7.20677C9.56085 7.20183 8.6767 7.20183 7.7975 7.20677C7.67401 7.20677 7.55053 7.22159 7.43198 7.25122C7.15538 7.32037 6.98744 7.60192 7.05659 7.88346C7.10598 8.07116 7.25417 8.21934 7.44186 8.26379C7.56041 8.29343 7.68389 8.30825 7.80737 8.30331C8.34083 8.30825 8.87922 8.30331 9.41267 8.30825C9.47194 8.30825 9.54603 8.26873 9.59048 8.35764C9.54603 8.41691 9.50158 8.47619 9.45712 8.53052C8.69152 9.49863 7.93086 10.4717 7.16526 11.4398C6.97756 11.6818 6.87877 11.9486 7.01708 12.2449C7.15538 12.5413 7.43692 12.5956 7.72341 12.6154C7.95062 12.6302 8.18277 12.6203 8.41492 12.6203C9.21509 12.6203 10.0103 12.6252 10.8105 12.6154C11.2353 12.6104 11.4625 12.3536 11.418 11.9584C11.3835 11.6473 11.1711 11.4843 10.7759 11.4793C10.0795 11.4744 9.38303 11.4793 8.63719 11.4793ZM14.3668 8.88121C13.7494 8.34282 13.0678 8.30825 12.401 8.7034C11.5909 9.17757 11.2946 9.95305 11.3934 10.852C11.4872 11.6917 11.8527 12.3783 12.7319 12.6598C13.2802 12.8376 13.7889 12.7734 14.2384 12.4079C14.357 12.3141 14.3915 12.3338 14.4755 12.4376C14.6385 12.645 14.9201 12.724 15.167 12.6302C15.414 12.5561 15.577 12.3289 15.577 12.072C15.5819 11.0842 15.5869 10.0963 15.577 9.10842C15.5721 8.71327 15.2016 8.46137 14.8163 8.5404C14.6039 8.58485 14.4854 8.72809 14.3668 8.88121ZM17.7898 10.7137C17.7701 11.9486 18.7925 12.8821 20.0767 12.7537C21.2573 12.6351 22.0229 11.751 21.9833 10.5013C21.9438 9.26648 21.0251 8.42185 19.7656 8.46137C18.5851 8.49594 17.7503 9.4443 17.7898 10.7137ZM17.3552 9.73078C17.3552 8.9553 17.3601 8.18476 17.3552 7.40928C17.3552 7.01413 17.1033 6.76717 16.7279 6.77211C16.3623 6.77704 16.1203 7.02401 16.1154 7.40434C16.1104 7.63649 16.1154 7.8637 16.1154 8.09585V12.0226C16.1154 12.3289 16.3031 12.5956 16.55 12.6598C16.8909 12.7537 17.2416 12.5512 17.3305 12.2103C17.3453 12.1511 17.3552 12.0918 17.3502 12.0276C17.3601 11.262 17.3552 10.4964 17.3552 9.73078Z"
                  fill="#787878" />
                <path
                  d="M7.86571 22.5335C6.51727 22.5335 5.16388 22.578 3.81544 22.5286C2.22002 22.4643 1 21.1258 1 19.5304C1 14.3786 1.00988 9.22686 1 4.07016C1 2.30681 2.37808 1.07691 3.96362 1.03245C5.62324 0.988001 7.28781 1.02258 8.95237 1.02258C8.98201 1.02258 9.02152 1.00776 9.03634 1.05715C9.02646 1.14606 8.93755 1.15594 8.88322 1.19051C7.90523 1.76348 7.0112 2.45005 6.26042 3.29962C5.02064 4.7024 4.16119 6.31263 3.86977 8.18465C3.35608 11.4891 4.3884 14.2946 6.72472 16.6359C7.13963 17.0557 7.19396 17.3817 6.86302 17.9448C6.46293 18.6215 5.85539 19.0809 5.20834 19.5007C5.13918 19.5402 5.07003 19.5896 5.00088 19.6341C4.89716 19.723 4.96137 19.7675 5.05028 19.807C5.07003 19.8514 5.09473 19.8909 5.12437 19.9305C5.69239 20.4343 6.23078 20.9727 6.78893 21.4864C7.05072 21.7284 7.3125 21.9803 7.56441 22.2322C7.66814 22.326 7.84102 22.3557 7.86571 22.5335Z"
                  fill="currentColor" />
                <path
                  d="M7.86622 22.5337C7.84152 22.3608 7.66864 22.3312 7.56492 22.2275C7.31301 21.9706 7.05122 21.7236 6.78944 21.4816C6.23129 20.9679 5.6929 20.4295 5.12487 19.9257C5.09524 19.8862 5.07054 19.8467 5.05078 19.8022C6.31032 20.0492 7.54022 19.8813 8.75036 19.5108C9.16033 19.3873 9.5703 19.2638 9.9852 19.1601C10.2667 19.086 10.5631 19.1008 10.8348 19.1996C13.9663 20.2764 17.0584 20.1776 20.101 18.844C21.3408 18.2957 22.4719 17.5252 23.4301 16.562C23.4795 16.5126 23.5141 16.4385 23.603 16.4336C23.6475 16.5027 23.6228 16.5768 23.6228 16.6509V19.5405C23.6327 21.1902 22.3089 22.5337 20.6592 22.5485H20.6345C18.8563 22.5584 17.0781 22.5485 15.3 22.5485H8.16258C8.06379 22.5386 7.965 22.5337 7.86622 22.5337Z"
                  fill="currentColor" />
                <path
                  d="M8.63701 11.4793C9.38285 11.4793 10.0842 11.4744 10.7807 11.4793C11.1709 11.4843 11.3833 11.6473 11.4228 11.9584C11.4673 12.3486 11.24 12.6104 10.8153 12.6154C10.0151 12.6253 9.21985 12.6203 8.41967 12.6203C8.18752 12.6203 7.96031 12.6302 7.72816 12.6154C7.44168 12.6006 7.16014 12.5413 7.02183 12.2449C6.88353 11.9486 6.98232 11.6818 7.17002 11.4398C7.93068 10.4717 8.69628 9.49864 9.46188 8.53052C9.50633 8.47125 9.55079 8.41198 9.59524 8.35764C9.54585 8.27367 9.4767 8.31319 9.41742 8.30825C8.88397 8.30331 8.34558 8.30825 7.81213 8.30331C7.68865 8.30331 7.56516 8.28849 7.44662 8.2638C7.16508 8.19958 6.9922 7.91804 7.05641 7.64144C7.10086 7.45374 7.24905 7.30062 7.43674 7.25617C7.55529 7.22653 7.67877 7.21171 7.80225 7.21171C8.68146 7.20677 9.56561 7.20677 10.4448 7.21171C10.6029 7.20677 10.756 7.22653 10.9091 7.26605C11.245 7.37965 11.3882 7.69083 11.2549 8.01683C11.1363 8.29837 10.9486 8.5404 10.7609 8.78243C10.1139 9.6073 9.46682 10.4272 8.81976 11.2422C8.76543 11.3064 8.71604 11.3707 8.63701 11.4793Z"
                  fill="currentColor" />
                <path
                  d="M14.3653 8.88158C14.4839 8.72846 14.6074 8.58522 14.8099 8.54571C15.2001 8.46668 15.5656 8.71859 15.5705 9.11373C15.5854 10.1016 15.5804 11.0895 15.5705 12.0774C15.5705 12.3342 15.4026 12.5614 15.1606 12.6355C14.9136 12.7293 14.6321 12.6553 14.4691 12.4429C14.3851 12.3391 14.3505 12.3194 14.232 12.4132C13.7825 12.7787 13.2737 12.843 12.7255 12.6651C11.8463 12.3787 11.4857 11.6921 11.3869 10.8573C11.2832 9.95343 11.5845 9.18289 12.3945 8.70871C13.0663 8.30862 13.7479 8.34319 14.3653 8.88158ZM12.6168 10.6845C12.6267 10.9018 12.6958 11.1092 12.8243 11.2821C13.091 11.6377 13.5997 11.7118 13.9603 11.4451C14.0196 11.4007 14.0739 11.3463 14.1233 11.2821C14.3999 10.9067 14.3999 10.2893 14.1233 9.91391C13.985 9.72128 13.7677 9.60767 13.5355 9.60273C12.9922 9.56816 12.6119 9.988 12.6168 10.6845ZM17.7883 10.7141C17.7488 9.44467 18.5835 8.49631 19.769 8.46174C21.0285 8.42222 21.9473 9.26686 21.9868 10.5017C22.0263 11.7514 21.2607 12.6355 20.0802 12.754C18.791 12.8825 17.7686 11.9489 17.7883 10.7141ZM19.0281 10.5955C19.0182 10.8425 19.0923 11.0845 19.2405 11.2871C19.5121 11.6427 20.0209 11.7118 20.3765 11.4352C20.4309 11.3957 20.4753 11.3463 20.5198 11.2969C20.8063 10.9215 20.8063 10.2893 20.5247 9.91391C20.3864 9.72622 20.1691 9.60767 19.9369 9.60273C19.4035 9.57309 19.0281 9.97812 19.0281 10.5955ZM17.3536 9.73115C17.3536 10.4968 17.3586 11.2624 17.3536 12.028C17.3586 12.3787 17.082 12.6701 16.7313 12.68C16.672 12.68 16.6078 12.675 16.5485 12.6602C16.3016 12.596 16.1139 12.3342 16.1139 12.023V8.09623C16.1139 7.86408 16.1089 7.63687 16.1139 7.40472C16.1188 7.02438 16.3608 6.77742 16.7263 6.77742C17.1017 6.77248 17.3536 7.01945 17.3536 7.41459C17.3586 8.18513 17.3536 8.96061 17.3536 9.73115Z"
                  fill="currentColor" />
                <path
                  d="M12.6172 10.6838C12.6123 9.98738 12.9926 9.56754 13.531 9.59717C13.7632 9.60705 13.9805 9.72066 14.1188 9.91329C14.3954 10.2837 14.3954 10.9061 14.1188 11.2815C13.8521 11.6371 13.3433 11.7112 12.9827 11.4445C12.9235 11.4 12.8691 11.3457 12.8197 11.2815C12.6963 11.1086 12.6271 10.9012 12.6172 10.6838ZM19.0285 10.5949C19.0285 9.98244 19.4039 9.57248 19.9374 9.60211C20.1695 9.60705 20.3868 9.7256 20.5252 9.91329C20.8067 10.2887 20.8067 10.9259 20.5202 11.2963C20.2436 11.647 19.7299 11.7063 19.3792 11.4297C19.3249 11.3902 19.2804 11.3408 19.2409 11.2864C19.0927 11.0839 19.0236 10.8419 19.0285 10.5949Z"
                  fill="#FDFEFE" />
                <path
                  d="M4.23598 1.0376H20.442C22.2153 1.0376 23.6526 2.47495 23.6526 4.24818V19.2144C23.6526 20.9877 22.2153 22.425 20.442 22.425H4.23598C2.46274 22.425 1.02539 20.9877 1.02539 19.2144V4.24818C1.02539 2.47495 2.46274 1.0376 4.23598 1.0376Z"
                  stroke="currentColor" stroke-width="0.274525" stroke-miterlimit="10" />
              </svg>

            </div>
            {{-- <a class="icon-detail-l" href="https://twitter.com/intent/tweet?&url={{URL::current()}}"
              onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;"
              rel="nofollow" target="_blank">
              <img src="{{asset('frontend/svg/icon_twitter.svg')}}" alt="">
            </a> --}}
          </div>

          <div class="detail-icon-comment">
            {{-- <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="4"
              data-color="blue" data-customize="false"></div> --}}

            {{-- <a class="icon-detail-l" href="javascript:void(0)">
              <img src="{{asset('frontend/svg/icon_share.svg')}}" alt="">
            </a> --}}
            <a class="icon-detail-l mail-hover"
              href="mailto:?body=<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" title="">
              {{-- <img src="{{asset('frontend/svg/icon-mail.svg')}}" alt=""> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M14 0H2C1.175 0 0.5075 0.675 0.5075 1.5L0.5 10.5C0.5 11.325 1.175 12 2 12H14C14.825 12 15.5 11.325 15.5 10.5V1.5C15.5 0.675 14.825 0 14 0ZM14 9.75C14 10.1625 13.6625 10.5 13.25 10.5H2.75C2.3375 10.5 2 10.1625 2 9.75V3L7.205 6.255C7.6925 6.5625 8.3075 6.5625 8.795 6.255L14 3V9.75ZM2 1.5L8 5.25L14 1.5H2Z"
                  fill="currentColor" />
              </svg>
            </a>
          </div>
          <div class="detail-icon-comment">
            <a class="icon-detail-l print-hover" href="javascript:print()">
              {{-- <img src="{{asset('frontend/svg/icon_print.svg')}}" alt=""> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                <path
                  d="M3.42334 2.44782H12.564V2.35366C12.564 1.40569 11.8043 0.959961 10.7497 0.959961H5.24393C4.23319 0.959961 3.42334 1.40569 3.42334 2.35366V2.44782ZM2.84577 12.2916H2.96505V8.88267C2.96505 7.91588 3.53006 7.34459 4.50314 7.34459H11.4842C12.4572 7.34459 13.0285 7.91588 13.0285 8.88267V12.2916H13.1478C14.4222 12.2916 15.1191 11.6261 15.1191 10.3454V5.29799C15.1191 4.0173 14.4222 3.35184 13.1478 3.35184H2.84577C1.6153 3.35184 0.874512 4.0173 0.874512 5.29799V10.3454C0.874512 11.6261 1.56508 12.2916 2.84577 12.2916ZM10.9819 5.53027C10.9819 5.08454 11.3649 4.69531 11.8232 4.69531C12.2752 4.69531 12.6581 5.08454 12.6581 5.53027C12.6581 5.99484 12.2752 6.35896 11.8232 6.36523C11.3649 6.36523 10.9819 5.99484 10.9819 5.53027ZM3.88163 13.8485C3.88163 14.3633 4.22063 14.7023 4.73542 14.7023H11.2519C11.7667 14.7023 12.1057 14.3633 12.1057 13.8485V8.88267C12.1057 8.51228 11.8608 8.26744 11.4842 8.26744H4.50314C4.13274 8.26744 3.88163 8.51228 3.88163 8.88267V13.8485ZM6.04122 10.81C5.78383 10.81 5.59549 10.6154 5.59549 10.3643C5.59549 10.1257 5.78383 9.93108 6.04122 9.93108H9.97119C10.216 9.93108 10.4044 10.1257 10.4044 10.3643C10.4044 10.6154 10.216 10.81 9.97119 10.81H6.04122ZM6.04122 13.0324C5.78383 13.0324 5.59549 12.844 5.59549 12.5992C5.59549 12.3481 5.78383 12.1535 6.04122 12.1535H9.97119C10.216 12.1535 10.4044 12.3481 10.4044 12.5992C10.4044 12.844 10.216 13.0324 9.97119 13.0324H6.04122Z"
                  fill="currentColor" />
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="detail-content w-100">
        <h1 class="fs-32 title_detail">{{(App::currentLocale() == 'vn') ? $post->title : $post->title_en}}</h1>
        <div class="time_detail">
          <p class="date__blog__main__top">
            <span class="time-ago-vn mr-2"><i class="fas fa-clock mr-1"></i> {{$post->created_at->diffForHumans()}}
            </span>
            <span class="time-ago-vn mr-2">|</span>
            {{date("d/m/Y", strtotime($post->created_at))}}
            {{-- {{Carbon::create($post->created_at)->diffForHumans(Carbon::now())}} --}}
          </p>
        </div>
        <h2 class="detail-des">
          {{(App::currentLocale() == 'vn') ? $post->description : $post->description_en}}
        </h2>
        <div class="content-news">
          <?=(App::currentLocale() == 'vn') ? $post->content : $post->content_en ?>
        </div>
        <div class="author_news">
          <span class="icon_edit"><i class="fas fa-pen"></i></span>
          <strong>{{($post->pseudonym)?$post->pseudonym:$post->admins->name}}</strong>
        </div>
      </div>
    </div>

    <div class="detail_tag detail-content _news_path">
      @if($post->tags->toArray())
      <div class="list_tags_r">
        <div class="icon_tags"><span><i class="fas fa-tag"></i></span></div>
        @foreach($post->tags as $value)
        <div class="tags_">
          <a href="{{route('tag-post',['slug' => $value->slug,'id'=>$value->id])}}" class="fs-14 tag_one">
            <span>
              {{$value->title_vi}}
            </span>
          </a>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
  <?php if($postRelation->toArray()) {?>
  <div class="w-835 mt-2 mb-2 ">
    <div class="detail-content _news_path">
      <div class="_category mb-5">
        <div class="_cate_2_media">
          <h2 class="title_post_path fs-24">
            <a href="#">
              {{__('related_news')}}
            </a>
          </h2>
        </div>
        <div class="list-related-news">
          <div class="row">
            @foreach ($postRelation as $item => $oneNews)
            <div class="col-md-4">
              <div class="top_meida_r">
                <div class="img-small-right position-relative">
                  <div class="thumb-img">
                    <a href="{{route('detail-post',['slug' => $oneNews->slug,'id'=>$oneNews->id])}}" class="">
                      <img src="{{ asset('/resize/480x300'.$oneNews->avatar) }}" alt="">
                      {{-- <span class="icon-block"><i class="fas fa-camera"></i></span> --}}
                    </a>
                  </div>
                </div>
                <div class="title_media_r mt-2 pt-1">
                  <h3 class="fs-15 title_news-path fw-500 ">
                    <a href="{{route('detail-post',['slug' => $oneNews->slug,'id'=>$oneNews->id])}}"
                      class="line-clamp-3">
                      {{$oneNews->title}}</a>
                  </h3>
                </div>
                <div class="time_news-path pt-1 fs-14 fw-400">
                  <span>{{date("d/m/Y", strtotime($post->created_at))}}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="d-flex justify-content-center">
            <div class="page">
              @include('component.pagination', $object = $postRelation)
            </div>
            {{-- <span class="see_load_more">{{__('see_more')}}</span> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</main>
<div class="modal fade bd-example-modal-lg show__gallery" tabindex="-1" aria-labelledby="myLargeModalLabel"
  style="display: none;" aria-hidden="true">
  <p class="index__gallery"><span class="index__image">1</span> / <span class="total__image">6</span></p>
  {{-- <p class="index__gallery_right">
    <span class="download"><i class="fas fa-download"></i></span>
    <span class="full_m"><i class="fas fa-expand"></i></span>
    <span class="directions"><i class="fas fa-directions"></i></span>
  </p> --}}
  <button type="button" class="close close__show__modal" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <button class="left__click">
    <i class="fa fa-chevron-left"></i>
  </button>
  <button class="right__click">
    <i class="fa fa-chevron-right"></i>
  </button>
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="show__img" style="overflow: hidden">
        <img src="" alt="" class="ui-draggable ui-draggable-handle" style="position: relative;">
      </div>
      <div class="title__gallery">{{$post->title}}</div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}?v=1"></script>
<script>
  var page = "<?=@$_GET['page']?>";
        if(page){
            $('html, body').animate({
            scrollTop: $('.detail-content._news_path').offset().top
            }, 'slow');
        }

        const where = document.documentElement
        const listGallery = [];
        const listGalleryAlt = [];
        document.addEventListener('DOMContentLoaded', ready => {
            const galleryElements = where.querySelectorAll('.expNoEdit')
            for (const element of galleryElements) {
                var src = $(element.children).attr('src')
                var alt = $(element.children).attr('alt')
                $(element.children).css({'cursor': 'zoom-in'})
                if (!(listGallery.indexOf(src) > -1)) {
                    listGallery.push(src);
                    listGalleryAlt.push(alt);
                }
                element.addEventListener('click', event => {
                    event.preventDefault()
                    child = $(event.target).attr('src')
                    altChild = $(event.target).attr('alt')
                    index = jQuery.inArray(child, listGallery)
                    $('.show__img img').attr('src', listGallery[index])
                    $('.title__gallery').text(listGalleryAlt[index])
                    $('.bd-example-modal-lg').modal()
                    $('.index__image').text(index + 1)
                    $('.total__image').text(listGallery.length)

                    var start, stop;

                    $(".show__img img ").draggable({
                        axis: "x",
                        start: function (event, ui) {
                            start = ui.position.left;
                        },
                        stop: function (event, ui) {
                            stop = ui.position.left;
                            if (start < stop) {
                                index = (index === listGallery.length - 1) ? 0 : index + 1
                                $('.show__img img').attr('src', listGallery[index])
                                $('.show__img img').css({'left': '0'})
                                $('.title__gallery').text(listGalleryAlt[index])
                                $('.index__image').text(index + 1)
                                $('.total__image').text(listGallery.length)
                            } else {
                                index = (index === 0) ? listGallery.length - 1 : index - 1
                                $('.show__img img').attr('src', listGallery[index])
                                $('.show__img img').css({'left': '0'})
                                $('.title__gallery').text(listGalleryAlt[index])
                                $('.index__image').text(index + 1)
                                $('.total__image').text(listGallery.length)
                            }
                        }

                    });

                    $(" .left__click ").click(() => {
                        index = (index === listGallery.length - 1) ? 0 : index + 1
                        $('.show__img img').attr('src', listGallery[index])
                        $('.title__gallery').text(listGalleryAlt[index])
                        $('.index__image').text(index + 1)
                        $('.total__image').text(listGallery.length)
                    });

                    $(" .right__click ").click(() => {
                        index = (index === 0) ? listGallery.length - 1 : index - 1
                        $('.show__img img').attr('src', listGallery[index])
                        $('.title__gallery').text(listGalleryAlt[index])
                        $('.index__image').text(index + 1)
                        $('.total__image').text(listGallery.length)

                    });
                })
            }
        })
</script>
@endsection