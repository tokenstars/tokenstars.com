<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield("title") </title>
        <link href="{{asset("/plugins/fotorama/fotorama.css")}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset("/css/main2.css")}}">
        <link href="{{asset("/css/notie.min.css")}}" rel="stylesheet">
        <link href="{{asset("/css/custom.css")}}" rel="stylesheet">
        <link href="{{asset("/css/toastr.min.css")}}" rel="stylesheet">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#157ffb">
        <meta name="application-name">

        @include('partial.analitics-head')
    </head>
    <body class="dark bg-new">

        <div class="cabinet">
            <div class="cabinet-box">
                <a href="/" class="cabinet--logo"></a>

                @yield("content")
            </div>
        </div>

        <script type="text/javascript" src="{{asset("/plugins/notie.min.js")}}"></script>
        <script>
            @if (isset($new_confirmed) && $new_confirmed == 1)
                notie.alert({ type: 1, text: 'Thanks, you registration is confirmed! Please sign in.', stay: true });
            @endif
        </script>

        @include('partial.analitics')
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="/js/toastr.min.js"></script>
        <script type="text/javascript">
            var a_status = $('#auth-status').html();
            if(a_status && a_status.trim() != '') {
                toastr.error(a_status, 'Error!')
            }
            var s_status = $('#auth-success').html();
            console.log(s_status)
            if(s_status && s_status.trim() != '') {
                toastr.success(s_status, 'Success!')
            }
        </script>
    </body>
</html>
