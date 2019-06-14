<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{--        <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merriweather|Roboto:400">--}}
{{--        <link rel="stylesheet" href="//unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css">--}}
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons">
    </head>
    <body>
        <div id="app"></div>
        <script>
            window._sharedData = {
                app: {
                    name: '{{ config('app.name') }}'
                }
            };
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
