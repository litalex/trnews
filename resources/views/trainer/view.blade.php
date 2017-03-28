@extends('layouts.app')

@section('content')
    <section class="container">
        @if (count($trainer) > 0)
            <section class="mb-4">
                <div class="author-box">
                    <div class="row">
                        <hr>
                        <h3 class="h3-responsive text-xs-center">{{ $trainer->firstName }} {{ $trainer->lastName }}</h3>
                        <hr>
                        <div class="col-xs-12 col-sm-4">
                            <img src="{{ $trainer->photo }}" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    {{ trans('base.city') }}
                                    <span class="badge">{{ $trainer->city->name }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.trainerExperience') }}
                                    <span class="badge">{{ $trainer->trainerExperience }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.driverExperience') }}
                                    <span class="badge">{{ $trainer->driverExperience }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.studentCar') }}
                                    <span class="badge">{{ ($trainer->studentCar == true) ? trans('base.yes') : trans('base.no') }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.payByHour') }}
                                    <span class="badge">{{ $trainer->payByHour }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.payByDistance') }}
                                    <span class="badge">{{ $trainer->payByDistance }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.phoneNumber') }}
                                    <span class="badge">{{ $trainer->phoneNumber }}</span>
                                </li>
                                <li class="list-group-item">
                                    {{ trans('base.site') }}
                                    <a class="badge" href="//{{ $trainer->site }}"
                                       target="_blank">{{ $trainer->site }}</a>
                                </li>
                                <li class="list-group-item">
                                    <p class="semi-title">{{ trans("base.aboutMe")}}</p>
                                    {{ $trainer->aboutMe }}
                                </li>
                            </ul>
                            <hr>
                            <h3 class="h3-responsive text-xs-center">{{ trans('base.cars') }}</h3>
                            <hr>
                            @if (count($trainer->cars) > 0)
                                @foreach ($trainer->cars as $car)
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="card">
                                            <img src="{{ $car->photo }}" class="img-responsive" alt="">
                                            <div class="card-block">
                                                <h4 id="{{ $car->name }}" class="card-title text-center">
                                                    {{ $car->brand->title }} {{ $car->model }} {{ $car->year }} {{ trans('base.year') }}
                                                </h4>
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <span class="badge">{{ trans($car->transmission) }}</span>
                                                        {{ trans('base.transmission.base') }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <p class="semi-title">{{ trans("base.aboutCar")}}</p>
                                                        {{ $car->aboutCar }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            @endif</div>
    </section>
@endsection
