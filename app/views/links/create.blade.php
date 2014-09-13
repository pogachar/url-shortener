@extends('layouts.default')

@section('content')
    {{ Form::open(['route' => 'home']) }}
        <div class="form-group">
        	{{ Form::text('url', null, ['placeholder' => 'http://www.example.com', 'required']) }}
        	{{ Form::submit('Shorten') }}
            {{ $errors->first('url', '<span class="error">:message</span>') }}
        </div>

        <div class="form-group">
            <p>urlshortener.dev/</p>
        	{{ Form::text('hash', null, ['placeholder' => 'goo']) }}
        	{{ $errors->first('hash', '<span class="error">:message</span>') }}
        </div>

    {{ Form::close() }}
@stop