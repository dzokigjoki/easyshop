<footer id="footer">
    <div id="twitterfeed-container">
        <div class="container">
            <div class="row">
                <div class="steps-block steps-block-blue">
                    <div class="">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 steps-block-col">
                                <img class="pull-left" src="{{ url_assets('/topmarketmk/images/box.png') }}">
                                <div>
                                    <h2 style="padding-left:15px; padding-top: 15px;">Сигурна достава</h2>
                                    {{--<em>низ цела Македонија за 48 часа</em>--}}
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 steps-block-col">
                                <img class="pull-left" src="{{ url_assets('/topmarketmk/images/tag.png') }}">
                                <div>
                                    <h2 style="padding-left:15px; padding-top: 15px;">Секојдневни попусти</h2>
                                    {{--<em>по достапни цени</em>--}}
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 steps-block-col">
                                <img class="pull-left" src="{{ url_assets('/topmarketmk/images/payment-method.png') }}">
                                <div>
                                    <h2 style="padding-left:15px; padding-top: 15px;">
                                        Плаќање при достава
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End #twitterfeed-container -->
    <div id="inner-footer">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12 widget">
                    <h3>Како да нарачам? </h3>
                    <p>
                        Сите производи кои ги имаме на залиха можете да ги купите со директна
                        нарачка на нашиот сајт. Изберете го посакуваниот производ и кликнете
                        на копчето „Додади во кошничка“ на страницата на производот. Вашата
                        потрошувачка кошничка се наоѓа во десниот горен агол од сајтот. За да
                        ги нарачате производите кои се наоѓаат во Вашата кошничка, кликнете на
                        копчето „Купи“. Ќе добиете e-mail порака за потврда на нарачката.
                    </p>
                </div><!-- End .widget -->
                <div class="col-md-4 col-sm-6 col-xs-12 widget">
                    <h3>Нашата Facebook страна: </h3>

                    <div class="facebook-likebox">
                        <div style="border:none; overflow:hidden; width:270px; height:216px;" class="fb-page" data-href="https://www.facebook.com/topmarketmk/" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/topmarketmk/" class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/topmarketmk/">TopMarketmk</a></blockquote>
                        </div>
                    </div>
                </div><!-- End .widget -->



                <div class="clearfix visible-sm"></div>

                <div class="col-md-3 col-sm-6 col-xs-12 widget">
                    <h3>КОНТАКТ</h3>
                    <ul>
                        <li>Телефон/ Viber: <i class="fa fa-phone"></i><a href="tel:0038971670203"> 071/670-203</a></li>
                        <li>Е-пошта: <a href="mailto:info@topmarketmk.mk"><i class="fa fa-envelope"></i> info@topmarketmk.mk</a></li>
                        <br><br><li>
                            <span class="logo clearfix">
                                <a style="margin-left:0px !important;" href="{{route('home')}}"><img class="logoImage" src="{{ url_assets('/topmarketmk/images/logo.png') }}"></a>
                            </span>
                        </li>
                    </ul>
                </div><!-- End .widget -->
            </div><!-- End .row -->
        </div><!-- End .container -->

    </div><!-- End #inner-footer -->


    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12 footer-social-links-container">
                    &copy; Topmarketmk. Сите права се задржани. Developed by <a href="https://generadevelopment.com"><img style="height: 20px;" src="{{url_assets('/topmarketmk/images/genera_logo_white.svg')}}"/></a>
                </div><!-- End .col-md-7 -->

                <div class="col-md-5 col-sm-5 col-xs-12 footer-text-container">
                    <span class="text-centered-xs col-md-6 col-lg-7 col-xs-12"><a  href="{{route('blog', [2, 'politika-na-privatnost'])}}"> Политика на приватност</a></span>
                    <span class="text-centered-xs col-md-6 col-lg-5 col-xs-12"><a  href="{{route('blog', [1, 'pravila-za-kupuvanje'])}}"> Правила на купување</a></span>
                </div><!-- End .col-md-5 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End #footer-bottom -->

</footer><!-- End #footer -->
