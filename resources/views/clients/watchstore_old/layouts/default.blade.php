<!DOCTYPE html>
<html lang="en">
<head>
@include('clients._partials.favicon')
@include('clients._partials.meta')

    
<!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700%7CMontserrat:400,700%7CPlayfair+Display:400,400italic'
          rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">

    <!-- Css -->
    <link rel="stylesheet" href="/assets/watchstore/css/core.min.css"/>
    <link rel="stylesheet" href="/assets/watchstore/css/skin.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @include('clients._partials.global-styles')
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @include('clients._partials.pixel-events')
</head>
<body class="shop home-page">
<aside class="side-navigation-wrapper enter-right" data-no-scrollbar data-animation="push-in">
    <div class="side-navigation-scroll-pane">
        <div class="side-navigation-inner">
            <div class="side-navigation-header">
                <div class="navigation-hide side-nav-hide">
                    <a href="#">
                        <span class="icon-cancel medium"></span>
                    </a>
                </div>
            </div>
            <nav class="side-navigation">
                <ul style="padding:10px;">
                    <li class="current">
                        <a href="{{route('home')}}">Почетна</a>

                    </li>




                    @foreach($menuCategories as $mc)
                        @if(isset($mc['children']))
                            <li class="parent">
                        @else
                            <li>
                                @endif
                                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                @if(isset($mc['children']))
                                    <ul class="sub-menu">
                                        @foreach($mc['children'] as $ch)
                                            <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                </ul>
            </nav>
            <nav class="side-navigation nav-block">
                {{--KOSHNICKA--}}
            </nav>
        </div>
    </div>
</aside>
<div class="wrapper">
    <div class="wrapper-inner">
<!-- Header -->
            @include('clients.watchstore_old.partials.header')
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Header End -->
<!-- Content -->
        <div class="content clearfix">
            @yield('content')
        </div>
<!-- Contend End ->
<!-- Footer -->
            @include('clients.watchstore_old.partials.footer')
<!-- Footer End -->
    </div>
</div>
<!-- Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3"></script>

<script src="/assets/watchstore/js/timber.master.min.js"></script>
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
<script>
    var countDownDate = new Date();
    countDownDate.setHours(24,0,0,0);
    countDownDate = countDownDate.getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with propper id

        $(".hours-timer").html(hours);
        $(".minutes-timer").html(minutes);
        $(".seconds-timer").html(seconds);

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

</script>
</body>
</html>