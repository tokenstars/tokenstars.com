@php
    $lang = app('translator')->getLocale()
@endphp

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://tokenstars.com/build/fresh.css">
    <link rel="stylesheet" href="/assets/card/app.css">

</head>
<body class="page-body">
@include('layouts.cabinet.header')

<div class="page-wrapper">

    <div class="jumbotron jumbotron-intro jumbotron-fluid text-white bg-blue-darker position-relative jumbotron-voting d-flex align-items-center">
        <div class="jumbotron-image bg-voting container"></div>
        <div class="container jumbotron-container">
            <div class="row">
                <div class="col-7">
                    <h1 class="text-uppercase jumbotron-title">
                        <small class="jumbotron-sup-title text-pink d-block font-weight-bold">Module</small>
                        Crypto Voting
                    </h1>
                    <div class="lead jumbotron-lead">
                        <p>As a decentralized platform we value the input of our supporters and investors and therefore involve you into the main decisions around the development of TokenStars business.</p><p>Token holders can vote below. Voting is blockchain-based and works via dedicated smart contract.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    <div class="container">
        @yield('content')
    </div>

</div>

@include('scouting.footer')


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="javascripts/app.js"></script>

</body>
</html>
