@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
        @if (count($tags) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ trans('base.tags') }}</h1>
                </div>
                <div class="panel-body">
                    @foreach ($tags as $item)
                        <div>
                            <h4><a href="{{ $item->view_route }}">{{ $item->title }}</a>
                                <small>{{ $item->updated_at }}</small>
                            </h4>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        @endif
        </div>
    </div>
@endsection
