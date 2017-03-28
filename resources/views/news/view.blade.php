@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-9">
            @if (count($news) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{{ $news->title }}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="body-info text-center">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <small>{{ Carbon\Carbon::parse($news->updated_at)->formatLocalized('%d %B %H:%m') }}</small>
                            @if (count($news->tags) > 0)
                                <i class="small fa fa-tags" aria-hidden="true"></i>
                                @foreach ($news->tags as $tag)
                                    <a class="small" href="{{ $tag->view_route }}">{{ $tag->title }}</a>
                                @endforeach
                            @endif
                            <small><a target="_blank" href="{{ $news->source }}"><i class="fa fa-external-link"
                                                                                    aria-hidden="true"></i> {{ $news->source }}
                                </a></small>
                        </div>
                        <p>{!! $news->text !!}</p>
                        <hr>
                        <div id="comments-panel">
                            @includeIf('comments.form')
                            @if (count($news->comments) > 0)
                                <div class="comments">
                                    <h3 class="comments-title">{{ trans("base.comments") }}
                                        ({{ count($news->comments) }})</h3>
                                    <ul class="comments-list">
                                        @foreach ($news->comments as $comments)
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">{{ $comments->user->name }}
                                                            <span class="date">{{ Carbon\Carbon::parse($comments->updated_at)->format('d.m.Y H:i') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">{{ $comments->text }}</div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
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
