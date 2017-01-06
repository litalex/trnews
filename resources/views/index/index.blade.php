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
        <div class="col-lg-6">
            @if (count($news) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{{ trans('base.news-list') }}</h1>
                    </div>
                    <div class="panel-body">
                        @foreach ($news as $item)
                            <ul class="tags-list">
                                <li><a class="news-link" href="{{ $item->view_route }}">{{ $item->title }}</a></li>
                            </ul>
                        @endforeach
                        <div class="row text-center">
                            <a class="underline" href="{{ route("news_index") }}">Все новости</a>
                        </div>
                    </div>
                    @endif
                </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ trans('base.author-article') }}</h1>
                </div>
                <div class="panel-body">
                    <ul class="tags-list">
                        @foreach (\Litalex\Helpers\Widget::articles() as $article)
                            <li>
                                <a class="tag-link" href="{{ $article->view_route }}">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ trans('base.interview') }}</h1>
                </div>
                <div class="panel-body">
                    <ul class="tags-list">
                        @foreach (\Litalex\Helpers\Widget::interviews() as $article)
                            <li>
                                <a class="tag-link" href="{{ $article->view_route }}">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
