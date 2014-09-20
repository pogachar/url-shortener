{{ Form::open(['route' => 'login']) }}
    {{ Form::email('email', null, ['placeholder' => 'email']) }}
    {{ $errors->first('email', '<span class="error">:message</span>') }}

    {{ Form::password('password', ['placeholder' => 'password']) }}
    {{ $errors->first('password', '<span class="error">:message</span>') }}

    {{ Form::submit('Login') }}
{{ Form::close() }}