{{ Form::open(['route' => ['user.settings', $user->username], 'method' => 'PUT']) }}
    <div class="form-group">
        {{ Form::label('old_password', 'Old password:') }}
        {{ Form::password('old_password', ['placeholder' => 'Old password']) }}
        {{ $errors->first('old_password', '<span class="error">:message</span>') }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'New password:') }}
        {{ Form::password('password', ['placeholder' => 'New password']) }}
        {{ $errors->first('password', '<span class="error">:message</span>') }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm new password:') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm new password']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Update') }}
    </div>
{{ Form::close() }}