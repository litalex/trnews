@extends('layouts.app')

@section('content')
    <section id="blog">
        <div class="container">
            <div class="col-lg-9">
                <h1 class="column-title">{{ $tags->title }}</h1>
                <div class="panel-body">
                    @if (count($tags->news) > 0)
                        @foreach ($tags->news as $news)
                            <div class="blog-post blog-large wow fadeInLeft animated" data-wow-duration="300ms"
                                 data-wow-delay="0ms"
                                 style="visibility: visible; animation-duration: 300ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                                <article>
                                    <header class="entry-header">
                                        <div class="entry-date"><i
                                                    class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($news->updated_at)->formatLocalized('%d %B %H:%M') }}
                                        </div>
                                        <h2 class="entry-title"><a href="{{ $news->view_route }}">{{ $news->title }}</a>
                                        </h2>
                                    </header>
                                    <div class="entry-content">
                                        <p><img class="preview-image" src="{{ url('/') }}/{{ env('APP_NEWS_IMAGES_PATH') }}{{ Carbon\Carbon::parse($news->updated_at)->format('Y-m-d') }}/preview-{{ $news->images[0]->name }}"></p>
                                        <div class="description-block">
                                            {!! $news->description !!}<br>
                                            <a class="details btn btn-primary"
                                               href="{{ $news->view_route }}">{{ trans('base.read_more') }}</a>
                                        </div>
                                    </div>
                                    <footer class="entry-meta">
                                        <span class="entry-author"><i class="fa fa-pencil"></i> <a> {{ $news->user->name }}</a></span>
                                        <span class="entry-comments"><i class="fa fa-comments-o"></i> <a
                                                    href="{{ $news->view_route }}#comments">{{ count($news->comments) }}</a></span>
                                        <span><a target="_blank" href="{{ $news->source }}"><i
                                                        class="fa fa-external-link"
                                                        aria-hidden="true"></i> {{ $news->source }}
                                        </a></span>
                                    </footer>
                                </article>
                            </div>
                        @endforeach
                    @endif
                    <div class="row text-center">
                        @if (isset($pagination))
                            {!! $pagination !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                {!! $tagListWidget !!}
            </div>
        </div>
    </section>
@endsection
