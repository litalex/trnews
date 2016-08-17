@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($news) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ trans('base.news') }}</h1>
                </div>
                <div class="panel-body">
                    @foreach ($news as $item)
                        <div>
                            <h4><a href="{{ $item->view_route }}">{{ $item->title }}</a>
                                <small>{{ $item->updated_at }}</small>
                            </h4>
                            <div>{{ $item->short_text }}... | <a href="{{ $item->view_route }}">{{ trans('base.read_more') }}</a></div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
