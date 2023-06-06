<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header-component 
            :color-primary="'{{ $color->primary_color }}'"
            
            :logo="'{{ $setting->logo }}'"
            :base-asset="'{{ asset('storage') }}'"
            :name="'{{ $setting->name }}'"
        ></header-component>
        
        <main>
            @yield('content')
        </main>

        <footer-component
            :about="'{{ $setting->about }}'"
            :logo="'{{ $setting->logo }}'"
            :base-asset="'{{ asset('storage') }}'"
            :name="'{{ $setting->name }}'"
            :contacts="{{ json_encode($contact) }}"
            :link-play="'{{ $setting->g_play_link }}'"
            :logo-play="'{{ $setting->g_play_logo }}'"
        ></footer-component>
    </div>
</body>
</html>
