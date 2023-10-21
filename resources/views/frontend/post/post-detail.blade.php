@extends('frontend.layout.index')
@php
$tags = '';
foreach ($onePost->tags as $tag) {
    $tags .= $tag->getTranslate('title').',';
}
@endphp
@section('SEO')
<title>{{$onePost->getTranslate('title')}}</title>
<meta name="keywords" content="{{($onePost->key_seo) ? $onePost->key_seo : $onePost->getTranslate('title')}}">
<meta name="description" charset="UTF-8" content="{{($onePost->desc_seo) ? $onePost->desc_seo : $onePost->getTranslate('description')}}" />
<meta name="title" charset="UTF-8" content="{{($onePost->title_seo) ? $onePost->title_seo : $onePost->getTranslate('title')}}" />
<meta property="og:title" content="{{($onePost->title_seo) ? $onePost->title_seo : $onePost->getTranslate('title')}}}}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{asset('/resize/600x340'.$post->avatar)}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:description" content="{{($onePost->desc_seo) ? $onePost->desc_seo : $onePost->getTranslate('description')}}" />
<meta name="og:keywords" content="{{($onePost->key_seo) ? $onePost->key_seo : $onePost->getTranslate('title') }}">
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/post_detail.css') }}?{{VERSION}}">
<link rel="stylesheet" href="{{ asset('library/owl-carousel-2/assets/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection
@section('content')
<main>
  <div class="container-fix">
    <div class="post-detail">
      <h1>{{ $onePost->getTranslate('title') }}</h1>
      <div class="post-detail-info">
        <div class="time">
          <img src="{{ asset('frontend/svg/time-icon.svg') }}" alt="">
          <span>{{date("H:i d-m-Y", strtotime($onePost->public_date))}}</span>
        </div>
        <ul class="social d-sm-flex d-none">
          <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}"
              onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;"
              rel="nofollow" target="_blank">
              <img src="{{ asset('frontend/svg/fb-post.svg') }}" alt="">
            </a>
          </li>
          {{-- <li><a href="#"><img src="{{ asset('frontend/svg/instagram-post.svg') }}" alt=""></a></li> --}}
          <li>
            <a href="javascript:void(0)" class="zalo-share-button" data-customize="true" data-href="{{ URL::current()}}"
              data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true data-target="_blank">
              <img src="{{ asset('frontend/svg/zalo-post.svg') }}" alt="">
            </a>
          </li>
          <li>
            <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ URL::current()}}">
              <img src="{{ asset('frontend/svg/linkded-post.svg') }}" alt="">
            </a>
          </li>
        </ul>
      </div>
      <i class="description">
        {{ $onePost->getTranslate('description') }}
      </i>
      <div class="post-detail-content">
        <?= $onePost->getTranslate('content') ?>
      </div>
      <div class="pseudonym">
        <img src="{{ asset('frontend/svg/edit-2.svg') }}" alt="">
        <span>{{ $onePost->pseudonym ?? 'PC1 Miền Nam'}}</span>
      </div>
      @if($onePost->tags->toArray())
      <ul class="tag">
        <li>
          <img src="{{ asset('frontend/svg/tag-2.svg') }}" alt="">
        </li>
        @foreach ($onePost->tags as $item)
        <li><a href="#;">{{ $item->title_vi }}</a></li>
        @endforeach
      </ul>
      @endif
    </div>
    <div class="post-related">
      <h2 class="post-related-title">Bài viết liên quan</h2>
      <div class="post-related-content row">
        @foreach ($listRelation as $item)
        <div class="col-md-4 col-6">
          <div class="post-related-item">
            <div class="post-related-img">
              <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
                <img src="{{ asset('/resize/365x245'.$item->avatar) }}" alt="" width="100%">
              </a>
              <p>{{ $item->category->getTranslate('title')}}</p>
            </div>
            <p class="date d-sm-block d-none">{{date("d/m/Y", strtotime($item->public_date))}}</p>
            <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
              <h3>
                {{$item->getTranslate('title')}}
              </h3>
            </a>
            <p class="date d-block d-sm-none">{{date("d/m/Y", strtotime($item->public_date))}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</main>
<div class="modal fade bd-example-modal-lg show__gallery" tabindex="-1" aria-labelledby="myLargeModalLabel"
  style="display: none;" aria-hidden="true">
  <p class="index__gallery"><span class="index__image">1</span> / <span class="total__image">6</span></p>
  <button type="button" class="close close__show__modal" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <button class="left__click">
    <i class="fa fa-arrow-left"></i>
  </button>
  <button class="right__click">
    <i class="fa fa-arrow-right"></i>
  </button>
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="show__img" style="overflow: hidden">
        <img src="" alt="" class="ui-draggable ui-draggable-handle" style="position: relative;">
      </div>
      <div class="title__gallery">{{ $onePost->getTranslate('title') }}</div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function() {
      
  });
</script>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<script src="{{ asset('library/owl-carousel-2/assets/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}?v={{VERSION}}"></script>
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

                    $(".left__click ").click(() => {
                        index = (index === listGallery.length - 1) ? 0 : index + 1
                        $('.show__img img').attr('src', listGallery[index])
                        $('.title__gallery').text(listGalleryAlt[index])
                        $('.index__image').text(index + 1)
                        $('.total__image').text(listGallery.length)
                    });

                    $(".right__click ").click(() => {
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