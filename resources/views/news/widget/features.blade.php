@if (count($news) > 0)
    <section id="blog">
        @foreach ($news as $item)
            @if($news[0]->id === $item->id)
                <div class="blog-post blog-large wow fadeInLeft animated" data-wow-duration="300ms" data-wow-delay="0ms"
                     style="visibility: visible; animation-duration: 300ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <article>
                        <header class="entry-header">
                            <div class="entry-thumbnail">
                                <img class="img-responsive"
                                     src="{{ url('/') }}/{{ env('APP_NEWS_IMAGES_PATH') }}{{ Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}/feature-{{ $item->images[0]->name }}"
                                     alt="">
                            </div>
                            <div class="entry-date"><i
                                        class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($item->updated_at)->formatLocalized('%d %B %H:%M') }}
                            </div>
                            <h2 class="entry-title"><a href="{{ $item->view_route }}">{{ $item->title }}</a></h2>
                        </header>

                        <div class="entry-content">
                            <p>{{ $item->description }}</p>
                        </div>

                        <footer class="entry-meta">
                            <span class="entry-author"><i class="fa fa-pencil"></i> <a
                                        href="#">{{ $item->user->name }}</a></span>
                            <span class="entry-comments"><i class="fa fa-comments-o"></i> <a
                                        href="{{ $item->view_route }}#comments">{{ count($item->comments) }}</a></span>
                            <span><a target="_blank" href="{{ $item->source }}"><i
                                            class="fa fa-external-link"
                                            aria-hidden="true"></i> <a target="_blank" href="{{ $item->source }}">{{ trans('base.original') }}</a>
                                                </a></span>
                        </footer>
                    </article>
                </div>
            @else
                <div class="panel-group fadeInLeft animated" id="accordion" role="tablist" aria-multiselectable="true">
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
                                <p><img class="preview-image"
                                        src="{{ url('/') }}/{{ env('APP_NEWS_IMAGES_PATH') }}{{ Carbon\Carbon::parse($item->updated_at)->format('Y-m-d') }}/preview-{{ $item->images[0]->name }}">
                                </p>
                                <p>{!! $item->description !!}<a
                                            href="{{ $item->view_route }}">{{ trans('base.details') }}</a></p>
                            </div>
                            <footer class="entry-meta">
                                <span class="entry-author"><i class="fa fa-pencil"></i> <a
                                            href="#">{{ $item->user->name }}</a></span>
                                <span class="entry-comments"><i class="fa fa-comments-o"></i> <a
                                            href="{{ $item->view_route }}#comments">{{ count($item->comments) }}</a></span>
                                <span><a target="_blank" href="{{ $item->source }}"><i
                                                class="fa fa-external-link"
                                                aria-hidden="true"></i> <a target="_blank" href="{{ $item->source }}">{{ trans('base.original') }}</a>
                                        </a></span>
                            </footer>
                        </article>
                    </div>
                </div>
            @endif
        @endforeach
    </section>
@endif
