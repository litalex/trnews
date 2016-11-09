@extends('layouts.app')

@section('content')
    <div class="container" id="main">
        @if (count($trainers) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ trans('base.trainers') }}</h1>
                </div>
                <div class="row">
                    @foreach ($trainers as $trainer)
                        <div class="panel panel-default">
                            <div class="panel-heading"><a href="#" class="pull-right">View all</a><h4><a
                                            href="">{{ $trainer->firstName }} {{ $trainer->middleName }} {{ $trainer->lastName }}</a>
                                </h4></div>
                            <div class="panel-body">
                                <div><img src="{{ $trainer->photo }}"></div>
                                <div>
                                    <small>{{ trans('base.driverExperience') }}:</small>{{ $trainer->driverExperience }}
                                    <small>{{ trans('base.trainerExperience') }}:
                                    </small>{{ $trainer->trainerExperience }}
                                </div>
                            </div>
                            <small>{{ $trainer->updated_at }}</small>
                            <div>
                                @if (count($trainer->cars) > 0)
                                    <small>{{ trans('base.cars') }}:</small>
                                    @foreach ($trainer->cars as $car)
                                        <small>
                                            <a href="">{{ $car->name }}</a>
                                        </small>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
