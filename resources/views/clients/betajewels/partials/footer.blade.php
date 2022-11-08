
<style>
    .footer_area {
        font-size: 13px;
    }
    .mt--5 {
        margin-top: -5px;
    }

    .text-center {
        text-align: center !important;
    }

    .footer-widget a {
        font-family: "Roboto Condensed" !important;
    }
    #footer-categories {
        display: grid;
    }
</style>
<footer class="entire_footer">
    <div class="footer_top_area footer-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="top-border"></div>
                </div>
                <div class="col-sm-4 col-sm-4 col-xs-12">
                    <div class="footer_top_single min-height-footer-top-single">
                        <i class="fa fa-gift fs-40"></i>
                        <div class="pl-30">

                            <h4 class="fs-12">{{trans('betajewels.high_quality')}}!</h4>
                            <p>{{trans('betajewels.affordable_prices')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-4 col-xs-12">
                    <div class="footer_top_single min-height-footer-top-single">
                        <i class="fa fa-plane fs-40"></i>
                        <div class="pl-30">

                            <h4 class="fs-12">{{trans('betajewels.free_shipping_in_2_days')}}</h4>
                            <p>{{trans('betajewels.return_product')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-4 col-xs-12">
                    <div class="footer_top_single min-height-footer-top-single">
                        <i class="fa fa-phone fs-40"></i>
                        <div class="pl-30">
                            <h4 class="fs-12">Контактирајте нѐ</h4>
                            <p><a href="tel:0038970291330">+389 70 291 330</a>
                            <br>
                            <a href="tel:0038923246698">+389 2 3246 698</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-widget">
        <div id="footer-widget-overlay" class="ovelay">
            <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                        <div class="widget_single">
                            <h4><a href="#">{{trans('betajewels.about_us_footer')}}</a></h4>
                            <span class="color-white">
                                Beta Jewels е продавница за луксузни колекции накит од брендовите MAJORICA, MISAKI Monaco, ZEADES Monte Carlo, RITUALS.
                            </span>
                            <hr>
                            <ul>
                                <li>
                                    <a href="tel:0038970291330"><i class="fa fa-phone"></i>
                                        +389 70 291 330</a>
                                        |
                                        <a href="tel:0038923246698">
                                            +389 2 3246 698</a>  
                            </li>
                            <li>
                                <a href="mailto:betamed@t.mk"><i class="fa fa-envelope"></i>
                                    betamed@t.mk</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12">
                        <div class="widget_logo">
                            <h4><a href="#">ПРОИЗВОДИ</a></h4>
                            <ul id="footer-categories">
                                @foreach($menuCategories as $item)
                                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12">
                        <div class="widget_single">
                            <div class="widget_single">
                                <h4><a href="">{{trans('betajewels.informations')}}</a></h4>
                                <ul>
                                    <li><a href="{{route('blog',[3,'kako-da-naracham?'])}}">Како да нарачам</a>
                                    </li>
                                    <li><a href="/b/1/za-nas">За нас</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-xs-12">
                        <div style="border:none; overflow:hidden; width:270px !important; height:216px !important;"
                        class="fb-page" data-href="https://facebook.com/BetaJewels"
                        data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://facebook.com/BetaJewels"
                                    class="fb-xfbml-parse-ignore"><a
                                    href="https://facebook.com/BetaJewels"> </a></blockquote>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_area">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                    <div class="footer_text text-center">
                        Powered By: <a href="https://generadevelopment.com" target="_blank"><img class="genera-footer-logo mt--5" src="{{ url_assets('/betajewels/images/genera_logo.png') }}"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer_text footer_right">
                        &copy; BetaJewels {{date("Y")}}. Сите права се задржани
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="pull-r footer_right ">
                        <a class="color-white pr-10" href="/b/2/politika-na-privatnost">Политика на приватност</a>
                        <a class="color-white" href="/b/3/pravila-na-kupuvanje">Правила на купување</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>