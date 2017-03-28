@extends('layouts.app')

@section('content')
    <div class="container">
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
        <div class="col-lg-9">
            @if (count($news) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{{ trans('base.news') }}</h1>
                    </div>
                    <div class="panel-body">
                        @foreach ($news as $item)
                            <div>
                                <h4><a href="{{ $item->view_route }}">{{ $item->title }}</a>
                                    <div>
                                        <small><i class="fa fa-clock-o"
                                                  aria-hidden="true"></i> {{ Carbon\Carbon::parse($item->updated_at)->formatLocalized('%d %B %H:%m') }}
                                        </small>
                                        @if (count($item->tags) > 0)
                                            <i class="small fa fa-tags" aria-hidden="true" title="Теги"></i>
                                            @foreach ($item->tags as $tag)
                                                <small><a href="{{ $tag->view_route }}">{{ $tag->title }}</a></small>
                                            @endforeach
                                        @endif
                                        <i class="small fa fa-external-link" aria-hidden="true" title="Источник"></i>
                                        <small><a target="_blank" href="//{{ $item->source }}">{{ $item->source }}</a>
                                        </small>
                                    </div>
                                </h4>
                                <div>{{ $item->description }}... | <a
                                            href="{{ $item->view_route }}">{{ trans('base.read_more') }}</a></div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="row text-center">
                            @if (isset($links))
                                {!! $links !!}
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
        </div>
        {{--<div class="col-lg-3">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
        {{--<h1>{{ trans('base.tags') }}</h1>--}}
        {{--</div>--}}
        {{--<div class="panel-body"></div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
