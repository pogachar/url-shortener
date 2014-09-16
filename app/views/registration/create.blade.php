@extends('...layouts.default')

@section('content')
    {{ Form::open(['route' => 'register']) }}
        <!-- Username Form Input -->
        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
        	{{ Form::text('username', null, ['placeholder' => 'username']) }}
        	{{ $errors->first('username', '<span class="error">:message</span>') }}
        </div>

        <!-- Email Form Input -->
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
        	{{ Form::email('email', null, ['placeholder' => 'password']) }}
        	{{ $errors->first('email', '<span class="error">:message</span>') }}
        </div>

        <!-- Password Form Input -->
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
        	{{ Form::password('password', ['placeholder' => 'password']) }}
        	{{ $errors->first('password', '<span class="error">:message</span>') }}
        </div>

        <!-- Password_confirmed Form Input -->
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Password Confirmation:') }}
        	{{ Form::password('password_confirmation', ['placeholder' => 'password_confirmed']) }}
        </div>

        <!-- Register Form Input -->
        <div class="form-group">
        	{{ Form::submit('Register') }}
        </div>
    {{ Form::close() }}
@stop