<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield("title") </title>
    <link rel="stylesheet" href="{{asset("assets/cabinet/stylesheets/app.css")}}">
    <!-- Generate using http://realfavicongenerator.net/ -->
</head>
<body class="page-body bg-light">
@include('layouts.cabinet.header')
@yield('header')

<div class="page-wrapper">

    <div class="container">
        <div class="mt-5"></div>
        @yield("content")
        <div class="mt-5_5"></div>
    </div>

</div>

@include('layouts.cabinet.modals')
@yield('modals')



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset("js/tether.min.js")}}"></script>
<script src="{{asset("js/drop.js")}}"></script>
<script src="{{asset("assets/cabinet/js/app.js")}}"></script>

</body>
</html>
