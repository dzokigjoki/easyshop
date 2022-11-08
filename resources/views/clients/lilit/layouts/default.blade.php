<html lang="en-US">
<head>
    @include('clients._partials.favicon')
    @include('clients._partials.meta')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="shortcut icon" href="{{ url_assets('/lilit/images/favicon.png') }}">

    <link rel='stylesheet' href="{{ url_assets('/lilit/css/settings.css?v=1') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ url_assets('/lilit/css/swatches-and-photos.css?v=1') }}" type='text/css' media='all'/>
    <link rel='stylesheet' href="{{ url_assets('/lilit/css/font-awesome.min.css?v=1') }}" type='text/css' media='all'/>
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Montserrat%3A400%2C700&#038;' type='text/css' media='all'/>
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel='stylesheet' href="{{ url_assets('/lilit/css/elegant-icon.css?v=1') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ url_assets('/lilit/css/style.css?v=4') }}" type='text/css' media='all'/>
    <link rel='stylesheet' href="{{ url_assets('/lilit/css/shop.css?v=1') }}" type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/lilit/css/magnific-popup.css?v=1') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/lilit/css/layout.css?v=1') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href="{{ url_assets('/lilit/css/bootstrap.css') }}">

    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-init')

</head>
@include('clients._partials.pixel-events')
<body class="shop-account shop page-layout-left-sidebar {{isset($pageName) ? $pageName : ''}}">
<div class="offcanvas open">
    <div class="offcanvas-wrap">
        {{--<div class="offcanvas-user clearfix">--}}
            {{--<a class="offcanvas-user-wishlist-link">--}}
            {{--</a>--}}
        {{--</div>--}}
        <nav style="margin-top:30px;" class="offcanvas-navbar">
            <ul class="nav navbar-nav primary-nav">

                <li class="menu-item-has-children dropdown">
                    <a href="{{route('home')}}" class="dropdown-hover">
                        <span class="underline">Дома</span> <span class="caret"></span>
                    </a>
                </li>
                @foreach($menuCategories as $mc)
                    @if(isset($mc['children']))
                        <li class="menu-item-has-children dropdown">
                    @else
                        <li>
                    @endif
                        <a href="{{route('category', [$mc['id'], $mc['url']])}}"class="dropdown-hover">
                            <span class="underline">{{$mc['title']}}</span><span class="caret"></span>
                        </a>
                    @if(isset($mc['children']))
                        <ul class="dropdown-menu">
                            @foreach($mc['children'] as $ch)
                                <li>
                                    <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                        </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
<div id="wrapper" class="wide-wrap">
@include('clients.lilit.partials.header')
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@yield('content')
@include('clients.lilit.partials.footer')
</div>

<script type='text/javascript' src='//code.jquery.com/jquery-1.11.3.min.js'></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery-migrate.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.themepunch.tools.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/easing.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/imagesloaded.pkgd.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/bootstrap.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/superfish-1.7.4.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.appear.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/script.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/swatches-and-photos.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.prettyPhoto.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.prettyPhoto.init.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.selectBox.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.parallax.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.touchSwipe.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.transit.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/jquery.carouFredSel.min.js') }}"></script>
<script type='text/javascript' src="{{ url_assets('/lilit/js/isotope.pkgd.min.js') }}"></script>
<script type='text/javascript' src='{{ url_assets('/lilit/js/jquery.magnific-popup.min.js') }}'></script>

<script type='text/javascript' src='{{ url_assets('/lilit/js/core.min.js') }}'></script>
<script type='text/javascript' src='{{ url_assets('/lilit/js/widget.min.js') }}'></script>
<script type='text/javascript' src='{{ url_assets('/lilit/js/mouse.min.js') }}'></script>
<script type='text/javascript' src='{{ url_assets('/lilit/js/slider.min.js') }}'></script>
<script type='text/javascript' src='{{ url_assets('/lilit/js/jquery-ui-touch-punch.min.js') }}'></script>
<script type='text/javascript' src='{{ url_assets('/lilit/js/price-slider.js') }}'></script>


@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
</body>
</html>