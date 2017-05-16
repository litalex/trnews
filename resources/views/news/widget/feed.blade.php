@if (count($news) > 0)
    <h3 class="column-title">{{ trans('base.news-list') }}</h3>
    <div class="panel-group fadeInLeft animated" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach ($news as $item)
            <div class="panel panel-default">
                <div class="news-feed-time">{{ Carbon\Carbon::parse($item->updated_at)->formatLocalized('%H:%M') }}</div>
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title text-left">
                        <a href="{{ $item->view_route }}">{{ $item->title }}</a>
                    </h4>
                </div>
            </div>
        @endforeach
        <div class="row text-center">
            <a class="underline" href="{{ route("news_index") }}">{{ trans('base.all_news') }}</a>
        </div>
    </div>
@endif
