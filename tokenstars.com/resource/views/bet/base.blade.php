<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset(mix('/css/app.css')) }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/glyphicons-halflings-regular.woff') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/glyphicons-halflings-regular.woff2') }}">
    <script src="{{ asset(mix("/js/bet.js")) }}"></script>
    <title>Bet Adimn</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">
            <p class="navbar-text">
                UTC time: {{ now()->format('d.m.Y H:i') }}
            </p>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{route('admin:bet-sport:create')}}">Add Sport</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{route('admin:bet-index')}}">Manage Sports</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{route('admin:tmsend:question')}}">Send Question</a>--}}
            {{--</li>--}}

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin:bet-index')}}">Questions</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:bet-question:create') }}" class="btn btn-light">New Question</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:bet-users') }}" class="btn btn-light">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin:bet-analytics')}}">Analytics</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:withdraw:index') }}" class="btn btn-light">Withdraw</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:configure-index') }}" class="btn btn-light">Configure Questions</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:telegram-message:index') }}" class="btn btn-light">Telegram Messages</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:quiz-question:index') }}" class="btn btn-light">Quiz Questions</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:telegram-users:rating') }}" class="btn btn-light">Rating</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:scheduled-message:index') }}" class="btn btn-light">Schedule</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:tier:index') }}" class="btn btn-light">Tiers</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin:telegram-users:bet_bonus') }}" class="btn btn-light">Bonuses</a>
            </li>
        </ul>
    </div>
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@yield('content')
</body>
</html>
