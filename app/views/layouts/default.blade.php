<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Url Shortener</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <head id="header">
        @include('layouts.partials.header')
    </head>

    @if(Session::has('flash_message'))
       {{ Session::get('flash_message') }}
    @endif

    <div class="container">
        @yield('content')
    </div>

    <footer>

    </footer>


<!-- Browser Sync - testing only -->
<script type='text/javascript'>//<![CDATA[
	document.write("<script async src='//HOST:3000/browser-sync-client.1.3.7.js'><\/script>".replace(/HOST/g, location.hostname));
//]]></script>
</body>
</html>