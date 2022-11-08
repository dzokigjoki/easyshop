<footer id="footer" class="footer">
    <div class="footer-featured">
        <div class="container">
            <div class="row">
                <div class="footer-featured-col col-sm-4 col-xs-4">
                    <div class="footer-icon-wrap">
                        <img src="{{ url_assets('/crystal-bella/images/delivery.png') }}">
                    </div>
                    <div class="footer-desc-wrap">
                        <h4 class="footer-featured-title">
                            достава на врата
                        </h4>
                        Најбрза достава до Вашиот дом
                    </div>
                </div>
                <div class="footer-featured-col col-sm-4 col-xs-4">
                    <div class="footer-icon-wrap">
                        <img src="{{ url_assets('/crystal-bella/images/piggy-bank.png') }}">
                    </div>
                    <div class="footer-desc-wrap">
                        <h4 class="footer-featured-title">
                            најповолни цени
                        </h4>
                        Најголеми попусти на пазарот
                    </div>
                </div>
                <div class="footer-featured-col col-sm-4 col-xs-4">
                    <div class="footer-icon-wrap">
                        <img src="{{ url_assets('/crystal-bella/images/coins.png') }}">
                    </div>
                    <div class="footer-desc-wrap">
                        <h4 class="footer-featured-title">
                            плаќање во готово и со картичка
                        </h4>
                        Платете за нарачката при достава
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="footer-widget-wrap">
                <div class="row">
                    <div class="footer-widget-col col-md-2 col-sm-2 kategorii-vo-footer">
                        <div class="widget">
                            <h3 class="widget-title">
                                <span>Категории</span>
                            </h3>
                            <div class="menu-infomation-container">
                                <ul class="menu">
                                    @foreach($menuCategories as $mc)
                                        <li><a href="{{route('category',[$mc['id'],$mc['url']])}}">{{$mc['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget-col col-md-2 col-sm-3 col-md-offset-0 col-sm-offset-1 col-xs-4">
                        <div class="widget">
                            <h3 class="widget-title">
                                <span>Информации</span>
                            </h3>
                            <div class="menu-infomation-container">
                                <ul class="menu">
                                    <li><a href="{{route('blog',[1,'kako-da-naracham?'])}}">Како да нарачам?</a></li>
                                    <li><a href="{{route('blog',[4,'lokacii'])}}">Локација на продавници</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget-col col-md-4 col-sm-4 col-xs-4">
                        <div class="fb-page" data-href="https://www.facebook.com/nakit.crystal.bella/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/nakit.crystal.bella/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/nakit.crystal.bella/">Nakit Bella</a></blockquote></div>
                    </div>
                    <div class="footer-widget-col col-md-4 col-sm-4 col-xs-4">
                        <!-- InstaWidget -->
                        <a href="https://instawidget.net/v/user/nakit_crystalbella" id="link-289add718bb7c3d484e9322269aa76ed066e5bba2488b18f34e402c58dfd4d4a">@nakit_crystalbella</a>
                        <script src="https://instawidget.net/js/instawidget.js?u=289add718bb7c3d484e9322269aa76ed066e5bba2488b18f34e402c58dfd4d4a&width=100%"></script>
                        <br>
                        <img src="{{ url_assets('/crystal-bella/images/313131.jpg') }}" class="img-responsive" style="width: 100%;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center">
        <div class="container-fluid">
            <ul>
                <li><a href="{{route('blog',[3,'pravila-za-kupuvanje'])}}">Правила за купување</a></li>
                <li><a href="{{route('blog',[2,'politika-na-privatnost'])}}">Политика на приватност</a></li>
            </ul>
            <p class="powered-by">Powered by <a href="https://easyshop.mk/"> <img src="{{ url_assets('/crystal-bella/images/easyshop-logo.png') }}" class="es-logo"></a></p>
            <img src="{{ url_assets('/crystal-bella/images/mastercard.png') }}">
            <img src="{{ url_assets('/crystal-bella/images/visa.png') }}">
        </div>
    </div>
</footer>
</div>



<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/mk_MK/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

