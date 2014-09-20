@if(Session::has('flash_message'))
   {{ Session::get('flash_message') }}
@endif

@if(Session::has('exception_message'))
    {{ Session::get('exception_message') }}
@endif