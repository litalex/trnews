@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            {!! $newsWidget !!}
        </div>
        <div class="col-lg-5">
            {!! $featuresWidget !!}
        </div>
        <div class="col-lg-3">
            {!! $tagsListWidget !!}
        </div>
    </div>
@endsection
