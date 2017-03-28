@if (Auth::guest())
    <p class="alert alert-info">Чтобы оставить комментарий, необходимо войти на сайт или <a class="underline" href="{{ url('/register') }}">{{ trans("base.register") }}</a></p>
    @includeIf('auth.login-form')
@else
    {{ Form::open(['method' => 'POST', 'route' => 'store_comment']) }}
    <fieldset class="form-group">
        <div class="row">
            <div class="col-xs-12">
                {{ Form::textarea('text', app('request')->input('text'), ["class" => "form-control", "rows" => "5", "placeholder" => trans("base.set_comment")]) }}
                {{ Form::hidden('newsId', $news->id, ["class" => "form-control"]) }}
            </div>
        </div>
    </fieldset>
    {{ Form::submit('Отправить', ["class" => "btn btn-primary"]) }}
    {{ Form::close() }}
@endif
