<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    @yield('meta-tags')
    {{-- <link rel="shortcut icon" href="{{ asset('assets/img/logo/favicon.ico') }}" />
    <link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}" type="image/png" sizes="16x16">
    <link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logo/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo/favicon-16x16.png') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</head>

<body>
    @include('frontend.layouts.inc.navbar')
    @yield('content')
   @if (request()->routeIs('home'))
   @include('frontend.layouts.inc.footer')
   @endif
    @stack('js')
</body>

</html>
