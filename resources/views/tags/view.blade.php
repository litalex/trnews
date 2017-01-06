@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $tags->title }}</h1>
                </div>
                <div class="panel-body">
                    @if (count($tags->news) > 0)
                        @foreach ($tags->news as $news)
                            <div>
                                <h4><a href="{{ $news->view_route }}">{{ $news->title }}</a></h4>
                                <div>
                                    <small>{{ Carbon\Carbon::parse($news->updated_at)->formatLocalized('%d %B %H:%m') }}</small>
                                    <small>{{ trans('base.source') }} : <a
                                                href="{{ $news->source }}">{{ $news->source }}</a></small>
                                </div>
                                <div>{{ $news->description }}... | <a
                                            href="{{ $news->view_route }}">{{ trans('base.read_more') }}</a></div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    <div class="row text-center">
                        @if (isset($links))
                            {!! $links !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ trans('base.tags') }}</h1>
                </div>
                <div class="panel-body">
                    <ul class="tags-list">
                        @foreach (\Litalex\Helpers\Widget::tagsList() as $item)
                            <li>
                                <a class="tag-link" href="{{ $item->view_route }}">{{ $item->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
