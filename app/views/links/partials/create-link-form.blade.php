{{ Form::open(['route' => 'home']) }}
    <div class="form-group">
        {{ Form::text('url', null, ['placeholder' => 'http://www.example.com']) }}
        {{ Form::submit('Shorten') }}
        {{ $errors->first('url', '<span class="error">:message</span>') }}
    </div>
{{ Form::close() }}