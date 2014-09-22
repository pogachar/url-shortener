{{ Form::open(['route' => 'register']) }}
    <div class="form-group">
        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username', null, ['placeholder' => 'Username']) }}
        {{ $errors->first('username', '<span class="error">:message</span>') }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', null, ['placeholder' => 'Email']) }}
        {{ $errors->first('email', '<span class="error">:message</span>') }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', ['placeholder' => 'Password']) }}
        {{ $errors->first('password', '<span class="error">:message</span>') }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Password Confirmation:') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Password Confirmation']) }}
    </div>

        {{ Form::submit('Register') }}
{{ Form::close() }}