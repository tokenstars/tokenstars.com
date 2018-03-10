<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>{{ trans('meta.title') }} -  @yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>