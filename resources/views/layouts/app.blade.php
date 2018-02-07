<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
     @include('layouts._header')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @if(Auth::user())
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <script>
        window.userid = {{Auth::user()->id}};
        window.username = "{{Auth::user()->name}}";
    </script>
    @endif


</head>

<body style="    padding-top: 0px;">
 @include('layouts._navigation')
 <div class="page-wrap">
    <div id="app">


        @yield('content')
    </div>
 </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
@include('layouts._footer')
</html>
