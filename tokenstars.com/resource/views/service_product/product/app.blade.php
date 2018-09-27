<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link href="/build/fresh.css?5" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app-scouting.css">
    <link rel="stylesheet" href="/css/app-e-commerce.css">
    @include('scouting.app-icons')
</head>
<body class="page-body bg-light">
@include('layouts.cabinet.header')
<div class="page-wrapper">
    @yield('content')
</div>

@include('service_product.order.modals')
@yield('modals')

<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset("js/app-e-commerce.js")}}"></script>
<script src="{{asset("js/app-order.js")}}"></script>

</body>
</html>
