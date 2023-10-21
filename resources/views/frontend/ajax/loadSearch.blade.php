@if ($listSearch->toArray())
@foreach ($listSearch as $item)
<div class="search-post-item">
    <div class="search-post-img">
        <img src="{{ asset($item->avatar) }}" alt="" width="100%">
        <p>{{ $item->category->getTranslate('title')}}</p>
    </div>
    <div class="time">
        <img src="{{ asset('frontend/svg/time-icon.svg') }}" alt="">
        <span>{{date("d-m-Y", strtotime($item->public_date))}}</span>
    </div>
    <a href="{{route('detail-post',['slug' => $item->slug,'id'=>$item->id])}}">
        <h3>{{$item->getTranslate('title')}}</h3>
    </a>
</div>
@endforeach
@endif