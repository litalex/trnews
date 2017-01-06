@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $tags->title }}</h1>
                </div>
                <div class="panel-body">
                    @if (count($tags->news) > 0)
                        @foreach ($tags->news as $news)
                            <div>
                                <h4><a href="{{ $news->view_route }}">{{ $news->title }}</a>
                                    <small>{{ $news->updated_at }}</small>
                                </h4>
                                <div>{{ $news->short_text }}... | <a
                                            href="{{ $news->view_route }}">{{ trans('base.read_more') }}</a></div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
