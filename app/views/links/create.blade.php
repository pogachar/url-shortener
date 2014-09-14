@extends('layouts.default')

@section('content')
    {{ Form::open(['route' => 'home']) }}
        <div class="form-group">
        	{{ Form::text('url', null, ['placeholder' => 'http://www.example.com']) }}
        	{{ Form::submit('Shorten') }}
            {{ $errors->first('url', '<span class="error">:message</span>') }}
        </div>

    {{ Form::close() }}

    @if(Session::has('hash'))
       {{ HTML::link(Session::get('hash')) }}
    @endif

    @if(Session::has('flash_message'))
       {{ Session::get('flash_message') }}
    @endif
@stop