<style>
    .pt-5 {
        padding-top: 5px;
    }
</style>
<div class="footer-widget" id="footer">
    <div class="container">
        <div class="footer-widget-wrap">
            <div class="row">
                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Информации</span></h3>
                        <ul class="menu">
                            <li><a href="/za-nas">За нас</a></li>
                            {{-- <li><a href="/faq">FAQ</a></li> --}}
                            <li><a href="/kontakt">Контакт</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Категории</span></h3>
                        <ul class="menu">
                            @foreach($menuCategories as $mc)
                            <li><a href="{{route('category', [$mc['id'], $mc['url']])}}">{{ $mc['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="footer-widget-col col-md-2 col-sm-6">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title"><span>Кратки линкови</span></h3>
                        <ul class="menu">
                            <li><a href="{{ route('category', [3, 'politika-na-privatnost']) }}">Политика на
                                    приватност</a></li>
                            <li><a href="{{ route('category', [5, 'pravila-na-kupuvanje']) }}">Правила на купување</a>
                            </li>
                            <li><a href="/politika-na-kolacinja">Правила на колачиња</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget-col col-md-3 col-sm-6">
                    <div class="widget widget_text">
                        <h3 class="widget-title"><span>Контакт</span></h3>
                        <div class="textwidget">
                        {{-- <p><i class="fa fa-map-marker"></i> Железничка 6, 6000 Охрид</p> --}}
                            <p><i class="fa fa-phone"></i><a href="tel:0038970261436"> +389 70 261 436</a></p>
                            <p><i class="fa fa-envelope"></i> <a href="mailto:info@herline.mk"> info@herline.mk</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="footer-widget-col col-md-3 col-sm-6">
                    <div class="widget widget_text">
                        <h3 class="widget-title"><span>Facebook</span></h3>
                        <div class="textwidget textwidget_footer_photo mt-30 fb5SE col-sm-3 mt-45 col-md-3">
                            <div class="gettouch">
                                <div style="border:none; margin-left:-14px; overflow:hidden; width:270px !important; height:216px !important;"
                                    class="fb-page fb_widget" data-href="https://www.facebook.com/herlinemk/"
                                    data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                                    data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/herlinemk/"
                                        class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/herlinemk/">Herline MK</a></blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer id="footer" class="footer">
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="row">
                        <div class="pt-5 col-lg-6 col-md-6 col-sm-12 footer-info-logo">
                            Developed By <a href="https://generadevelopment.com" target="_blank">Genera Development
                                LLC</a>
                        </div>
                        <div class="pt-5 col-lg-6 col-md-6 col-sm-12 copyright">© {{date('Y')}} Herline. Сите права задржани.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>