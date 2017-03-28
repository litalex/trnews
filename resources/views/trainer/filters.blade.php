<div class="panel panel-default">
    <div class="panel-heading choice">{{ trans("base.instructors.choice") }}</div>
    <div class="panel-body">
        {{ Form::open(['method' => 'GET', 'route' => 'search_trainer']) }}
        <fieldset class="form-group">
            <legend>{{ trans("base.city") }}</legend>
            {{ Form::select('city', \Litalex\Models\City::getCityChoices(), app('request')->input('city'), ["class" => "form-control", 'placeholder' => trans("base.city")]) }}
        </fieldset>
        <fieldset class="form-group">
            <legend>{{ trans("base.gender.base") }}</legend>
            {{ Form::label('gender', trans("base.gender.male")) }}
            {{ Form::checkbox('gender', 'male', (app('request')->input('gender') == 'male') ? true : false) }}
            {{ Form::label('gender', trans("base.gender.female")) }}
            {{ Form::checkbox('gender', 'female', (app('request')->input('gender') == 'female') ? true : false) }}
        </fieldset>
        <fieldset class="form-group">
            <legend>{{ trans("base.payByHour") }}</legend>
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::label('minPayByHour', trans("base.from")) }}
                    {{ Form::number('minPayByHour', app('request')->input('minPayByHour'), ["class" => "form-control"]) }}
                </div>
                <div class="col-xs-6">
                    {{ Form::label('maxPayByHour', trans("base.to")) }}
                    {{ Form::number('maxPayByHour', app('request')->input('maxPayByHour'), ["class" => "form-control"]) }}
                </div>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <legend>{{ trans("base.trainerExperience") }}</legend>
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::label('minTrainerExperience', trans("base.from")) }}
                    {{ Form::number('minTrainerExperience', app('request')->input('minTrainerExperience'), ["class" => "form-control"]) }}
                </div>
                <div class="col-xs-6">
                    {{ Form::label('maxTrainerExperience', trans("base.to")) }}
                    {{ Form::number('maxTrainerExperience', app('request')->input('maxTrainerExperience'), ["class" => "form-control"]) }}
                </div>
            </div>
        </fieldset>
        <hr>
        {{--<b>{{ trans("base.payByDistance") }}</b><br>--}}
        {{--{{ Form::label('minPayByDistance', trans("base.from")) }}--}}
        {{--{{ Form::number('minPayByDistance', app('request')->input('minPayByDistance'), ["class" => "pay-range"]) }}--}}
        {{--{{ Form::label('maxPayByDistance', trans("base.to")) }}--}}
        {{--{{ Form::number('maxPayByDistance', app('request')->input('maxPayByDistance'), ["class" => "pay-range"]) }}--}}
        {{--<hr>--}}
        <fieldset class="form-group">
            <legend>{{ trans("base.car_for_study") }}</legend>
            {{ Form::label('studentCar', trans("base.studentCar")) }}
            {{ Form::checkbox('studentCar', true, (app('request')->input('studentCar') == true) ? true : false) }}
            {{ Form::select('brand', \Litalex\Models\Car::getCarBrandChoices(), app('request')->input('brand'), ["class" => "form-control", 'placeholder' => trans("base.brand")]) }}
        </fieldset>
        <fieldset class="form-group">
            <legend>{{ trans("base.transmission.base") }}</legend>
            {{ Form::label('transmission', trans("base.transmission.auto")) }}
            {{ Form::checkbox('transmission', 'auto', (app('request')->input('transmission') == 'auto') ? true : false) }}
            {{ Form::label('transmission', trans("base.transmission.mechanic")) }}
            {{ Form::checkbox('transmission', 'mechanic', (app('request')->input('transmission') == 'mechanic') ? true : false) }}
        </fieldset>
        <hr>
        {{ Form::submit('Найти', ["class" => "btn btn-primary"]) }}
        {{ Form::submit('Сбросить', ["class" => "btn btn-primary", 'name' => 'reset']) }}
        {{ Form::close() }}
    </div>
</div>