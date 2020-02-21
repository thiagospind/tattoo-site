<!doctype html>
<html lang="pt-br">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">

    <title>May Pinheiro Tattoo - @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid no-gutters ">
        @component('layouts.navbar')
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
{{--        @component('footer')--}}
{{--        @endcomponent--}}
    </div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/site.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
</body>
</html>