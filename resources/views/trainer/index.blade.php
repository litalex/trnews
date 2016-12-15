@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @includeIf('trainer.filters')
            </div>
            @if (count($trainers) > 0)
                <div class="col-lg-9">
                    @foreach ($trainers as $trainer)
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{ $trainer->view_route }}"><img class="card-img-top img-responsive" src="{{ $trainer->photo }}" alt=""></a>
                                <div class="card-block">
                                    <a href="{{ $trainer->view_route }}"><h4 class="card-title">{{ $trainer->firstName }} {{ $trainer->lastName }}</h4></a>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {{ trans('base.trainerExperience') }}
                                        <span class="badge">{{ $trainer->trainerExperience }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {{ trans('base.driverExperience') }}
                                        <span class="badge">{{ $trainer->driverExperience }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {{ trans('base.auto') }}
                                        @if (count($trainer->cars) > 0)
                                            @foreach ($trainer->cars as $car)
                                                <span class="badge"><a href="{{ $trainer->view_route }}#{{ $car->name }}">{{ $car->brand->title }} {{ $car->model }}</a></span>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
            @elseif(count($error) > 0)
                <div class="error">{{ $error }}</div>
            @endif
                </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-12">
                @if (isset($links))
                    {!! $links !!}
                @endif
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row text-center">
                <div class="col-lg-12">
                    <p>Copyright &copy; Start 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
@endsection
