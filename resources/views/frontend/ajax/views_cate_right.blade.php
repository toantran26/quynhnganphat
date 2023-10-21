@foreach ($listPostRight as $key => $onePost)
<div class="top_small_list">
    <div class="row">
        <div class="col-6 pr-0">
            <div class="img-small-right position-relative">
                <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}">
                    <img src="{{ asset('/resize/476x264'.$onePost->avatar) }}"
                        alt="{{$onePost->title}}">
                </a>
            </div>
        </div>
        <div class="col-6">
            <div>
                <div class="title-lbth">
                    <h5>
                        <a href="{{route('detail-post',['slug' => $onePost->slug,'id'=>$onePost->id])}}" class="smaill-line-r fix-text3"
                            title="{{$onePost->title}}">
                            {{(App::currentLocale() == 'vn')?$onePost->title : $onePost->title_en}}
                        </a>
                    </h5>
                </div>
                <div class="time-top_smaill">
                    <p class="date__blog__main__top mb-0">{{date("d/m/Y", strtotime($onePost->created_at))}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach