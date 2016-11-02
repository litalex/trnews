@extends('layouts.admin')

<div class="container">
    <div class="row">
        @section('left_block')
            <div class="col-md-2">
                @if (count($menu) > 0)
                    <ul class="nav nav-stacked">
                        @foreach ($menu as $item)
                                <li><a href="{{ $item['href'] }}">{{ $item['title'] }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endsection

        @section('content')
            <div class="col-md-10">
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New News Form -->
                    {!! Form::open(['route' => 'admin_save']) !!}
                    {{ Form::token() }}

                    <div class="form-group">
                        {!! Form::label('Your Name') !!}
                        {!! Form::text('name', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Your name')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Your E-mail Address') !!}
                        {!! Form::text('email', null,
                            array('required',
                                  'class'=>'form-control',
                                  'placeholder'=>'Your e-mail address')) !!}
                    </div>
                    {!! Form::close() !!}

                <!-- Add News Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </div>
</div>