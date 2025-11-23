<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'TwoHundredOK') }}</title>
        @routes
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-base-100 text-base-content min-h-screen">
        @inertia
    </body>
</html>