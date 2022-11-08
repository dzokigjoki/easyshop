<!-- FOOTER section -->
<footer  class="layout-0" id="footer-id" style="padding-top:20px;">
    <!-- footer-data -->
    {{-- <div class="footer-top clearfix hidden-xs hidden-sm hidden-md">
       
    </div> --}}
    <div class="container">
        <div class="row" >
            <div class="col-sm-12 col-md-3 col-lg-3 border-sep-right">
                <div class="box-about">
                    <div class="mobile-collapse open">
                        <img src="{{ url_assets('/mojoutlet/images/footer_logo.png') }}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 border-sep-right">
                <div class="box-about">
                    <div class="mobile-collapse open">
                        <h4 class="text-left  title-under  mobile-collapse__title">Контакт</h4>
                        <div class="mobile-collapse__content">
                             <!-- address -->
                            <address class="box-address" style="font-size: 16px;">
                                {{--<span class="icon icon-call"></span><a class="color-dark" href="tel:0038977400100">+389 77 400 100</a><br>--}}
                                <span class="icon icon-access_time"></span><span class="color-dark">24/7 поддршка</span><br>
                                <span class="icon icon-markunread"></span> <a class="color-dark" href="mailto:info@shopathome.mk">info@shopathome.mk</a>
                            </address>
                            <!-- /address -->
                            <!-- social-icon -->
                            <div class="text-left hidden-sm  hidden-xs">
                                <div class="display-inline-block">
                                    <div style="border:none; overflow:hidden; width:270px; height:216px;" class="fb-page" data-href="https://www.facebook.com/generadevelopment/" data-small-header="false"
                                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                        <blockquote cite="https://www.facebook.com/generadevelopment/" class="fb-xfbml-parse-ignore"><a
                                                    href="https://www.facebook.com/generadevelopment/">generadevelopment</a></blockquote>
                                    </div>
                                </div>
                            </div>
                            <!-- /social-icon -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-6 col-lg-6 border-sep-left">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mobile-collapse">
                            <h4  class="text-left  title-under  mobile-collapse__title">Информации</h4>
                            <div class="v-links-list mobile-collapse__content">
                                <ul>
                                    <li><a href="{{route('blog',[5,'za-nas'])}}">За нас</a></li>
                                    <li><a href="{{route('blog',[3,'kako-da-naracham'])}}">Како да нарачам?</a></li>
                                    <li><a href="{{route('blog',['4','pravila-na-kupuvanje'])}}">Правила на купување</a></li>
                                    <li><a href="{{route('blog',['2','politika-na-privatnost'])}}">Политика на приватност</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-sm-4">--}}
                        {{--<div class="mobile-collapse">--}}
                            {{--<h4 class="text-left  title-under  mobile-collapse__title">Зошто од нас?</h4>--}}
                            {{--<div class="v-links-list mobile-collapse__content">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="warranty.html">Бесплатна достава</a></li>--}}
                                    {{--<li><a href="typography.html">Сигурна достава</a></li>--}}
                                    {{--<li><a href="about.html">Најквалитетни производи</a></li>--}}
                                    {{--<li><a href="/assets/mojoutlet/7_days_back.pdf" target="_blank">Гаранција за враќање на парите</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-sm-6">
                        <div class="mobile-collapse">
                            <h4 class="text-left  title-under  mobile-collapse__title">Категории</h4>
                            <div class="v-links-list mobile-collapse__content">
                                <ul>
                                    @foreach($menuCategories as $item)
                                        <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                            <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /footer-data -->
    <div class="divider divider-md visible-sm"></div>

    <!-- footer-copyright -->




    <div class="footer-top  hidden-xs hidden-sm hidden-md" style="margin-bottom: 0px !important; ">
        <div class="container">
            <div class="row">
            <div class="col-md-">
                <div class="col-lg-12" style="color: white; text-align: center;">
                    <a href="{{route('home')}}"><span style="color: white;">SHOP@</span><span style="color: #9F8AC2">HOME</span></a>
                    <b class="color-dark" style="color: white;"> &copy; 2019. Сите права се задржани </b>
                </div>
                {{-- <div class="col-lg-5"></div> --}}
                {{-- <div class="col-lg-3" style="text-align: right;"> --}}
                    {{--<div class="color-dark" style="    margin-left: 80px;--}}
    {{--margin-top: 7px; float:left; color: white; font-size: 10px;text-align: right;">Powered by:</div>--}}
                    {{--<a href="https://www.easyshop.mk" target="_blank">--}}
                        {{--<img src="https://easyshop.mk/img/logo.png" alt="EasyShop" height="30"/>--}}
                    {{--</a>--}}
                {{-- </div> --}}
            </div>
            </div>
        </div>
    </div>


    {{--<div class="container footer-copyright">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-4">--}}
                {{--<a href="{{route('home')}}"><span>MOJ</span>OUTLET</a>--}}
                {{--<b class="color-dark"> &copy; 2018. Сите права се задржани </b>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6"></div>--}}
            {{--<div class="col-lg-2" style="text-align: right;">--}}
                {{--<div class="color-dark" style="font-size: 10px;text-align: right;">Powered by:</div>--}}
                {{--<a href="https://www.easyshop.mk" target="_blank">--}}
                    {{--<img src="https://easyshop.mk/img/logo.png" alt="EasyShop" height="30"/>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- /footer-copyright -->
    <a href="javascript://" class="btn btn--ys btn--full visible-xs" id="backToTop">Најгоре <span class="icon icon-expand_less"></span></a>
</footer>
<!-- END FOOTER section -->
