@extends('layouts.default')

@section('content')
    {{ Form::open() }}
        <div class="form-group">
        	{{ Form::text('url', null, ['placeholder' => 'http://www.example.com', 'required']) }}
        	{{ Form::submit('Shorten') }}
        </div>

        {{ $errors->first('url', '<span class="error">:message</span>') }}
    {{ Form::close() }}
@stop