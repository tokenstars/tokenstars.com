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
    <script src='https://www.google.com/recaptcha/api.js?explicit&hl=en'></script>
    <style>
        .jumbotron-intro {
            padding-top: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="page-body">
@include('layouts.cabinet.header')

<div class="page-wrapper">

    <div class="jumbotron jumbotron-intro jumbotron-fluid text-white bg-blue-darker position-relative jumbotron-adv d-flex align-items-center mb-0">
        <div class="jumbotron-image bg-ad container"></div>
        <div class="container jumbotron-container">
            <div class="row">
                <div class="col-7">
                    <h1 class="text-uppercase jumbotron-title">
                        <small class="jumbotron-sup-title text-pink d-block font-weight-bold">Module</small>
                        Advertising Smart Contract
                    </h1>
                    <div class="lead jumbotron-lead">
                        <p>TokenStars offers brands an opportunity to access a highly involved fan audience and increase the efficiency of campaigns by implementing advertising smart contracts.</p><p>Our team of professional blockchain developers helps you to build a combination of transparent advertising formats with the help of the blockchain technology, as well as get more engaged audiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-blue-darker-gradient py-1px">
        <div class="section-divider"></div>
        <div class="container">
            @yield('content')
        </div>
        <div class="section-divider"></div>
    </div>

</div>

@include('scouting.footer')


<script src="/assets/js/app.js"></script>

</body>
</html>
