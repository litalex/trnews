@extends('layouts.app')

@section('content')
    <div class="container">
            @if (count($news) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{{ $news->title }}</h1>
                        <small>{{ $news->updated_at }}</small>
                    </div>
                    <div class="panel-body">
                            @if (count($news->tags) > 0)
                                <small class="glyphicon glyphicon-tags">
                                    @foreach ($news->tags as $tag)
                                        <a href="{{ $tag->view_route }}">{{ $tag->title }}</a>
                                    @endforeach
                                </small>
                            @endif
                        <p>{{ $news->text }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
