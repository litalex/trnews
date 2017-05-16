@extends('layouts.app')

@section('content')
    <section id="blog">
        <div class="container">
            <div class="col-lg-9">
                <h1 class="column-title">{{ $news->title }}</h1>
                <div class="blog-post blog-large wow fadeInLeft animated" data-wow-duration="300ms"
                     data-wow-delay="0ms"
                     style="visibility: visible; animation-duration: 300ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <article>
                        <span class="entry-date"><i
                                    class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($news->updated_at)->formatLocalized('%d %B %H:%M') }}</span>
                        <div class="entry-content">
                            <p><img class="full-image" src="{{ url('/') }}/{{ env('APP_NEWS_IMAGES_PATH') }}{{ Carbon\Carbon::parse($news->updated_at)->format('Y-m-d') }}/{{ $news->images[0]->name }}"></p>
                            <p>{!! $news->text !!}</p>
                        </div>
                        <footer class="entry-meta">
                            <span class="entry-author"><i class="fa fa-pencil"></i> {{ $news->user->name }}</span>
                            <span class="entry-category"><i class="fa fa-folder-o"></i>
                                @foreach ($news->tags as $tag)
                                    <a href="{{ $tag->view_route }}">{{ $tag->title }}</a>
                                @endforeach
                                </span>
                            <span class="entry-comments"><i class="fa fa-comments-o"></i> <a
                                        href="#comments">{{ count($news->comments) }}</a></span>
                            <span><a target="_blank" href="{{ $news->source }}"><i class="fa fa-external-link"
                                                                                   aria-hidden="true"></i> {{ $news->source }}
                                        </a></span>
                        </footer>
                    </article>
                </div>
                <div id="comments-panel">
                    @includeIf('comments.form')
                    @if (count($news->comments) > 0)
                        <div class="comments">
                            <h3 id="#comments" class="comments-title">{{ trans("base.comments") }}
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
            <div class="col-lg-3">
                {!! $tagsListWidget !!}
            </div>
        </div>
    </section>
@endsection
