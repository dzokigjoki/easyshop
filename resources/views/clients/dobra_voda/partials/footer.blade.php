<div class="footer-area">
    <div class="footer-top_area bg-buttery-white">
        <div class="container container_footer">
            <div class="row row_footer_hide">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="footer-widgets_area">
                        <div class="logo-area">
                            <a href="javascript:void(0)">
                                <img src="{{url_assets('/dobra_voda/images/logo1.png')}}" alt="Quicky's Logo">
                            </a>
                        </div>
                        <p class="text-justify">Мagstore е интернет продавница на Магрони ДОО Скопје, една од водечките компании за производство
                            и дистрибуција на природна минерална вода и изворска вода, освежителни безалкохолни и алкохолни пијалаци.</p>
                        <div class="social-link">
                            <div>
                                <img style="width: 50%; padding-bottom: 10px;" src="{{url_assets('/dobra_voda/images/cards.png')}}" alt="Quicky's Logo">
                                <a href='https://www.ecommerce4all.mk/badge'><img style="width: 30%; padding-left: 20px;" src='https://www.ecommerce4all.mk/verifiedbadge/xl.png'/></a>
                            </div>
                            <ul>
                                <li class="facebook text-center">
                                    Ладна
                                    <a class="pt_5" href="https://www.facebook.com/Ladna.mk" data-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>

                                <li class="facebook text-center">
                                    Добра
                                    <a class="pt_5" href="https://www.facebook.com/dobravoda.mk" data-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                                <li class="facebook text-center">
                                    Ладна
                                    <a class="pt_5" href="https://www.instagram.com/ladna.mk/" data-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="icon-social-instagram"></i>
                                    </a>
                                </li>
                                <li class="facebook text-center">
                                    Добра
                                    <a class="pt_5" href="https://www.instagram.com/dobravodamk/?hl=en" data-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="icon-social-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="footer-widgets_area">
                        <h3 class="heading">Категории</h3>
                        <div class="footer-widgets">
                            <ul>
                                @foreach ($menuCategories as $menuCategory)
                                <li><a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}">{{$menuCategory['title']}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="footer-widgets_area">
                        <h3 class="heading">Информации</h3>
                        <div class="footer-widgets">
                            <ul>
                                <li><a href="/za-nas">За нас</a></li>
                                <li><a href="/kontakt">Контакт</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="footer-widgets_area">
                        <h3 class="heading">Контактирајте нѐ</h3>
                        <div class="footer-widgets">
                            <p class="address-info">ул.1732 бр.2, Скопје</p>
                            <div class="widgets-mail">
                                <a class="break_word" href="mailto:eprodavnica@magroni.com.mk">eprodavnica@magroni.com.mk</a>
                            </div>
                            <a class="widgets-contects" href="tel:+389 02 3228 458">02 3228 458</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_footer_show">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="footer-widgets_area">
                        <div class="logo-area">
                            <a href="/">
                                <img src="{{url_assets('/dobra_voda/images/logo1.png')}}" alt="Quicky's Logo">
                            </a>
                        </div>
                        <p>Мagstore е интернет продавница на Магрони ДОО Скопје, една од водечките компании за производство
                            и дистрибуција на природна минерална вода и изворска вода, освежителни безалкохолни и алкохолни пијалаци.</p>
                            <div>
                                <img style="width: 75%; margin:auto; padding-bottom: 10px;" src="{{url_assets('/dobra_voda/images/cards.png')}}" alt="Quicky's Logo">
                                <a href='https://www.ecommerce4all.mk/badge'><img style="width: 75px; margin:auto; padding-bottom: 10px;"  src='https://www.ecommerce4all.mk/verifiedbadge/medium.png'/></a>
                            </div>
                        <div class="social-link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="icon-social-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <div>
                        <h3 class="heading heading_footer">Категории</h3>
                        <div class="footer-widgets pt-15 pb-30 hide_links">
                            <ul>
                                @foreach ($menuCategories as $menuCategory)
                                <li><a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}">{{$menuCategory['title']}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div>
                        <h3 class="heading heading_footer">Информации</h3>
                        <div class="footer-widgets pt-15 pb-30 hide_links">
                            <ul>
                                <li><a href="/za-nas">За нас</a></li>
                                <li><a href="/kontakt">Контакт</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div>
                        <h3 class="heading heading_footer">Контактирајте нѐ</h3>
                        <div class="footer-widgets pt-15 pb-30 hide_links">
                            <p class="address-info">ул.1732 бр.2, Скопје</p>
                            <div class="widgets-mail">
                                <a class="break_word" href="mailto:eprodavnica@magroni.com.mk">eprodavnica@magroni.com.mk</a>
                            </div>
                            <a class="widgets-contects" href="tel://+0981 2568 658">02 3228 458</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area container">
        <div class="row text_align_center">
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <p class="white-color margin_0">Copyright © MagStore 2020 <span class="plr-10">|</span> Powered By <a href="//generadevelopment.com" target="_blank"><img width="80" src="//assets-easyshop.generadevelopment.com/bellina/images/genera-logo.svg"></a></p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <ul class="ps-footer__social">
                    <li><a class="white-color" href="{{ route('category', [6, 'pravila-na-kupuvanje']) }}">Правила на купување</a></li>
                    {{-- <li><a class="white-color" href="{{ route('category', [7, 'politika-na-privatnost']) }}">Политика на приватнос</a></li> --}}
                    <li><a class="white-color" href="/politika-na-kolacinja">Политика на колачиња</a></li>
                    <li><a class="white-color" href="/politika-na-privatnost">Политика на приватност</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>