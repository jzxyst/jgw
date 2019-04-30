<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{Config::get('app.name')}}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="root"></div>
        <script>
            window._sharedData = {
                app: {
                    name: '{{Config::get('app.name')}}'
                }
            };
        </script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
