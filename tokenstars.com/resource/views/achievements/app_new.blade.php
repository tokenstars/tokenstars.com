<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="/build/fresh.css?5" rel="stylesheet" />
    <!--<link rel="stylesheet" href="/css/app-scouting.css">
    <link rel="stylesheet" href="/css/app-achievements-new.css">
    <link rel="stylesheet" href="/css/main4.css">-->
    @include('layouts.styles')
    @include('scouting.app-icons')
</head>
<body class="page-body bg-light adaptive-page">
@include('layouts.cabinet.header')
<div class="page-wrapper">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--<script src="/js/app-achievements-new.js"></script>-->
@include('layouts.javascripts')

<script type="text/javascript">
    $(document).ready(function () {
        $('.ach-btn-more').on('click', function (e) {
            //$(this).css('display','none !important;');
            $(this).attr('style','display: none !important;');
            $(this).data('ach-item');
            $('.ach-items-'+$(this).data('ach-item')).attr('style','display: flex !important;');
        });

        var StickyElement = function(node){
            var doc = $(document),
                fixed = false,
                anchor = node.find('.sticky-anchor'),
                content = node.find('.sticky-content');

            var onScroll = function(e){
                var docTop = doc.scrollTop(),
                    anchorTop = anchor.offset().top;

                //console.log('scroll', docTop, anchorTop);
                if(docTop > anchorTop){
                    if(!fixed){
                        anchor.height(content.outerHeight());
                        content.addClass('fixed');
                        content.width(anchor.width());
                        console.log(anchor.width());
                        fixed = true;
                    }
                }  else   {
                    if(fixed){
                        anchor.height(0);
                        content.removeClass('fixed');
                        content.width('auto');
                        fixed = false;
                    }
                }
            };

            $(window).on('scroll', onScroll);
        };
        var demo = new StickyElement($('#sticky'));

        // http://jsfiddle.net/bonilka/p7sgwg4L/
        jQuery(window).scroll(function(){
            var $sections = $('.ach-item');
            console.log('$sections ' +$sections);
            $sections.each(function(i,el){
                var top  = $(el).offset().top-100;
                var bottom = top +$(el).height();
                var scroll = $(window).scrollTop();
                var id = $(el).attr('id');
                console.log('id '+ id);
                if( scroll > top && scroll < bottom){
                    $('a.active').removeClass('active');
                    $('a[href="#'+id+'"]').addClass('active');

                }
            })
        });

        // https://theme.co/apex/forum/t/scroll-to-anchor-with-offset-when-coming-from-another-page/26622
        var hash= window.location.hash
        console.log('hash = ' + hash);
        if ( hash == '' || hash == '#' || hash == undefined ) return false;
        var target = $(hash);
        headerHeight = 120;
        target = target.length ? target : $('[name=' + hash.slice(1) +']');
        if (target.length) {
            console.log('target.offset().top = ' + target.offset().top);
            $('html,body').stop().animate({
                scrollTop: target.offset().top - 65 //offsets for fixed header
            }, 'linear');
        }

        $('a[href*="#"]:not([href="#"])').click(function(e) {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
                var target = $(this.hash);
                console.log('this.hash = ' + this.hash);
                headerHeight = 120;
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    console.log('target.offset().top = ' + target.offset().top);
                    $('html,body').stop().animate({
                        scrollTop: target.offset().top - 65 //offsets for fixed header
                    }, 'linear');
                }
            }
        });
    });
</script>
</body>
</html>
