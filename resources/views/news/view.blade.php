@extends('layouts.app')

@section('content')
    <div class="container">
            @if (count($news) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{{ $news->title }}</h1>
                    </div>
                    <div class="panel-body">
                        {{ $news->text }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
