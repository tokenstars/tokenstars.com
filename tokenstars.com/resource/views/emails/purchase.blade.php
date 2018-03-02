<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>{{ trans('meta.title') }}</title>
    <!-- <link href="styles.css" rel="stylesheet" type="text/css" /> -->

    <style type="text/css">
        body{
            background-color:#0B112A;
            background-image:url();
            background-repeat:repeat;
            margin-top:0;
            margin-right:0;
            margin-bottom:0;
            margin-left:0;
            padding:0;
        }
        .background-table{
            font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
            font-size:16px;
            -webkit-text-size-adjust:100%;
            -webkit-font-smoothing:antialiased;
            font-weight:300;
            line-height:1.2em;
            color:#2d2d2d;
            background-color:#0B112A;
            background-image:url();
            background-repeat:repeat;
        }
        .content-holder{
            background-color:#ffffff;
            -webkit-border-radius:5px !important;
            -moz-border-radius:5px !important;
            border-radius:5px !important;
            -moz-box-shadow:#dcdcdc 0 2px 0;
            -webkit-box-shadow:#dcdcdc 0 2px 0;
            box-shadow:#dcdcdc 0 2px 0;
        }
        .inside-post-text{
            font-size:16px;
        }
        .intro{
            display:block;
            padding:30px 50px 60px;
            position:relative;
        }
        .intro h1,.intro p{
            color:white;
        }
        .intro a{
            color:#f3be08;
        }
        a{
            text-decoration:none;
            color:#1f65c2;
        }
        h1{
            font-weight:bold;
            font-size:25px;
            line-height:1.2em;
            margin:0;
            padding:30px 0 20px;
            border-bottom:solid 1px #dddddd;
            border-bottom-color:rgba(255,255,255,.4);
        }
        h2{
            font-size:20px;
            font-weight:bold;
            line-height:1.15em;
            margin-top:30px;
            margin-bottom:0;
            padding-top:30px;
            border-top:solid 1px #dddddd;
            position:relative;
        }
        p{
            font-size:16px;
            line-height:1.4em;
            padding-top:1.1em;
            margin-bottom:0;
            margin-top:0;
        }
        p+p{
            padding-top:.9em;
        }
        .quote{
            font-weight:bold;
            margin-top:1em;
            padding:.5em 0 .5em 35px;
            border-left:solid 5px #32d300;
        }
        img{
            max-width:100%;
        }
        .small-font{
            font-size:12px;
            line-height:1.3em;
        }
        .medium-font{
            font-size:14px;
        }
        .sub-light-font-color{
            color:#808080;
        }
        b{
            font-weight:bold;
        }
        .green-color{
            color:#7cc331;
        }
        .white-color{
            color:white;
        }
        ul,ol{
            font-size:18px;
            line-height:1.4em;
            list-style-type:disc;
        }
        li+li{
            margin-top:.8em;
        }
        ol{
            list-style-type:decimal;
        }
        .no-border-header{
            padding-top:0;
            border:none;
        }
        .middle-bg{
            background-color:#fafafa;
        }
        .dark-bg{
            background-color:#eeeeee;
        }
        .green-bg{
            background-color:#7cc331;
        }
        .vertical-margin{
            height:35px;
        }
        .side-margin{
            width:50px;
        }
        .extra-padding{
            padding-top:20px;
            padding-bottom:20px;
        }
        .header{
            padding-top:15px;
            padding-bottom:15px;
        }
        .nav-link{
            font-size:12px;
            margin-left:10px;
        }
        .big-btn{
            color:#fff;
            text-align:center;
            background:#157FFB;
            display:inline-block;
            margin-top:15px;
            padding-top:7px;
            padding-right:30px;
            padding-bottom:7px;
            padding-left:30px;
            -webkit-border-radius:5px;
            -moz-border-radius:5px;
            border-radius:5px;
            -moz-box-shadow:#144380 0 2px 0;
            -webkit-box-shadow:#144380 0 2px 0;
            box-shadow:#1160BD 0 2px 0;
        }
        @media screen and (max-width: 700px){
            td[class=side-margin]{
                width:15px !important;
            }

        }	@media screen and (max-width: 700px){
            table[class=content-holder]{
                width:100% !important;
            }

        }	@media screen and (max-width: 700px){
            td[class=course-info]{
                padding-left:10px !important;
            }

        }	@media screen and (max-width: 700px){
            table[class=background-table]{
                line-height:1em !important;
            }

        }	@media screen and (max-width: 700px){
            .small-font{
                font-size:11px !important;
            }

        }	@media screen and (max-width: 700px){
            .medium-font{
                font-size:13px !important;
            }

        }	@media screen and (max-width: 700px){
            .blog-post-link{
                font-size:12px !important;
            }

        }	@media screen and (max-width: 700px){
            .vertical-margin{
                height:10px !important;
            }

        }	@media screen and (max-width: 700px){
            .nav-link{
                display:block !important;
            }

        }	@media screen and (max-width: 700px){
            .intro{
                padding:30px 10px 60px !important;
            }

        }</style></head>
<body>
<center>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="background-table">
        <!-- Vertical margin -->
        <tr>
            <td class="vertical-margin"></td>
        </tr>
        <!-- Main content holder -->
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="500" class="content-holder">
                    <!-- Email header -->
                    <tr>
                        <td class="side-margin"></td>
                        <td class="header">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="320">
                                        <br><a href="https://tokenator.io?utm_campaign=purchase&utm_medium=email&utm_source=tr_email"><img src="https://gallery.mailchimp.com/9102e6e0eb8b8634bad275065/images/3aadb6ad-e86a-47ef-a218-416015f4b699.png" alt="Tokenator" height="40"></a>
                                    </td>
                                    <td align="right"></td>
                                </tr>
                            </table>
                        </td>
                        <td class="side-margin"></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br><a href="https://tokenator.io?utm_campaign=purchase&utm_medium=email&utm_source=tr_email"><img src="https://gallery.mailchimp.com/9102e6e0eb8b8634bad275065/images/3ad32b13-fcb7-4ffa-bed4-0dcdf58048d4.jpg" alt="" width="100%"></a>
                        </td>
                    </tr>
                    <!-- Message -->
                    <tr>
                        <td class="side-margin"></td>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <h2 class="no-border-header">Dear contributor,</h2>
                                        <p class="medium-font">Thank you for participating in the success of the token sale {{ $promo->currency->name }}!
                                            You transferred  @foreach($items as $item) <b> {{ $item }}</b> @endforeach and got <b>{{ $amount }} {{ $promo->currency->code }}</b> tokens.<br><br>
                                            Insert an ERC20 wallet address in the profile section of your <a href="{{ route("portfolio") }}?utm_campaign=purchase&utm_medium=email&utm_source=tr_email">personal account</a> to receive your tokens.</p>
                                <tr align="center">
                                    <td>
                                        <a href="{{ route("profile") }}?utm_campaign=purchase&utm_medium=email&utm_source=tr_email" class="big-btn">Insert a wallet address</a>
                                    </td>
                                </tr>
                                </td>
                                </tr>
                                <tr align="center">

                                </tr>
                            </table>
                        </td>
                        <td class="side-margin"></td>
                    </tr>
                    <tr>
                        <td class="side-margin"></td>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <h2>Note:</h2>
                                        <ul class="medium-font">
                                            <li>Tokens will be distributed at the end of the ICO.</li>


                                            <li>If we don’t get {{number_format($promo->min_amount, 0)}} {{$promo->mainCurrency->code}} sales, $ will be returned to your account and can be used to purchase other tokens.</li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="side-margin"></td>
                    </tr>
                    <tr>
                        <td class="side-margin"></td>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">

                            </table>
                        </td>
                        <td class="side-margin"></td>
                    </tr>
                    <tr>
                        <td class="side-margin"></td>
                        <td>

                        </td>
                        <td class="side-margin"></td>
                    </tr>
                    <!-- Signature -->
                    <tr>
                        <td class="side-margin"></td>
                        <td class="extra-padding">

                        </td>
                        <td class="side-margin"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" class="small-font white-color">
                <br>Please let us know if you have any questions:
                <br>
                <a href="mailto:ask@tokenator.io" class="white-color">ask@tokenator.io</a>
                <br>
                <br><a href="https://www.facebook.com/tokenator.io
"><img src="https://gallery.mailchimp.com/9102e6e0eb8b8634bad275065/images/286c95e8-47e4-4ed8-8a9f-621d0c2db2ae.png" width="30" alt="286c95e8-47e4-4ed8-8a9f-621d0c2db2ae.png"></a>  
                <a href="https://twitter.com/tokenator_io
"><img src="https://gallery.mailchimp.com/9102e6e0eb8b8634bad275065/images/4d1fac3b-4487-4711-94c5-285266289af5.png" width="30" alt="4d1fac3b-4487-4711-94c5-285266289af5.png"></a>  
                <a href="https://www.linkedin.com/company/11312027"><img src="https://gallery.mailchimp.com/9102e6e0eb8b8634bad275065/images/4e50fe59-98bd-4a5b-8d80-e77ce9409c1c.png" width="30" alt="41b2237b-64e4-4ab2-9b86-5dcdf5333b0e.png"></a>  

                <a href="https://t.me/tokenator
"><img src="https://gallery.mailchimp.com/9102e6e0eb8b8634bad275065/images/e35e820c-5bb3-4566-95d2-d26cf1ed9508.png" width="30" alt="e35e820c-5bb3-4566-95d2-d26cf1ed9508.png"></a>  

                <br>
                <br><a text-decoration: none href="#" class="white-color">Privacy policy</a>
                <br>



            </td>
        </tr>
        <!-- Vertical margin -->
        <tr>
            <td class="vertical-margin"></td>
        </tr>
    </table>
</center>
</body>
</html>