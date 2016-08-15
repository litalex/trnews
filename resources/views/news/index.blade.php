@extends('layouts.app')

@section('content')
    <div class="container">
            @if (count($news) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>News</h1>
                    </div>
                    <div class="panel-body">
                        @foreach ($news as $item)
                            <div>
                                <h4>{{ $item->title }}</h4>
                                <div>{{ $item->text }}</div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
