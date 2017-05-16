@extends('layouts.app')

@section('content')
    <section id="blog">
        <div class="container">
            <div class="col-lg-3">
                {!! $tagsListWidget !!}
            </div>
            <div class="col-lg-9">
                <h1 class="column-title">{{ trans('base.news') }}</h1>
                @if (count($news) > 0)
                    @foreach ($news as $item)
                    <div class="blog-post blog-large wow fadeInLeft animated" data-wow-duration="300ms"
                         data-wow-delay="0ms"
                         style="visibility: visible; animation-duration: 300ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                            <article>
                                <header class="entry-header">
                                    <div class="entry-date"><i
                                                class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($item->updated_at)->formatLocalized('%d %B %H:%M') }}
                                    </div>
                                    <h2 class="entry-title"><a href="{{ $item->view_route }}">{{ $item->title }}</a>
                                    </h2>
                                </header>
                                <div class="entry-content">
                                    <p><img class="preview-image" src="{{ url('/') }}/{{ env('APP_NEWS_IMAGES_PATH') }}{{ Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}/preview-{{ $item->images[0]->name }}"></p>
                                    <p>{!! $item->description !!}</p>
                                    <a class="btn btn-primary"
                                       href="{{ $item->view_route }}">{{ trans('base.read_more') }}</a>
                                </div>
                                <footer class="entry-meta">
                                    <span class="entry-author"><i class="fa fa-pencil"></i> <a> {{ $item->user->name }}</a></span>
                                    <span class="entry-category"><i class="fa fa-folder-o"></i>
                                        @foreach ($item->tags as $tag)
                                            <a href="{{ $tag->view_route }}">{{ $tag->title }}</a>
                                        @endforeach
                                </span>
                                    <span class="entry-comments"><i class="fa fa-comments-o"></i> <a
                                                href="{{ $item->view_route }}#comments">{{ count($item->comments) }}</a></span>
                                    <span><a target="_blank" href="{{ $item->source }}"><i class="fa fa-external-link"
                                                                                           aria-hidden="true"></i> {{ $item->source }}
                                        </a></span>
                                </footer>
                            </article>
                    </div>
                    @endforeach
                    <div class="row text-center">
                        @if (isset($pagination))
                            {!! $pagination !!}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
