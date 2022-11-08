<style>
    .Footer {
        padding: 0px !important;
    }

    @media(min-width: 992px) {
        .display_show {
            display: block !important;
        }
    }


    .footer-categories-li {
        display: inherit;
    }

    .black-color {
        color: black !important;
    }

    p.text-justify.white-color {
        color: #ffffff;
    }

    .fa-footer {
        background-color: transparent;
        color: #000000;
    }

    a.white-color {
        color: #ffffff;
    }

    .ps-footer--2 .ps-site-info__detail p span,
    h3,
    .widget .widget-title,
    p.white-color,
    a.white-color,
    #pravila-na-kupuvanje,
    #politika-na-privatnost {
        color: #ffffff;
    }

</style>
<footer class="Footer-67005 dsg_4879 " id="footer">
    <div class="ST1">
        <div class="Container W1180 W1181">
            <div class="row">
                <div class="col-12">
                    <div class="Footer">
                        <div class="row">
                            <div class="hidden-xs col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="ps-site-info Box p_10">
                                    <div class="Title D4879 ST15" style="color:#2c2c2c">MyModa</div>
                                    <p class="text-justify black-color p-xs-10" style="margin-bottom: 10px;">
                                        Само во Mymoda можете да најдете најмодерна и најквалитетна женска облека.
                                        Бидете во тренд и
                                        купувајте
                                        онлајн од нашата веб продавница.
                                    </p>
                                    <br>
                                    <a href="//www.facebook.com/Mymodamkk/" target="_blank"><i
                                            class="font-26 fa fa-facebook fa-footer"></i></a>

                                    <a class="pl-10" href="//www.instagram.com/mymoda.mk/" target="_blank"><i
                                            class="font-26 fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 ">
                                <div class="ps-site-info p_10 Box">
                                    <a data-toggle="collapse" href="#collapseCategories">
                                        <div class="Title D4879 ST15" style="font-weight: 700; color:#2c2c2c">Кратки
                                            линкови</div>
                                    </a>
                                    <ul class="collapse display_show in" id="collapseCategories">
                                        @foreach ($menuCategories as $item)
                                            <li class="Item">
                                                <a class="Link"
                                                    href="{{ route('category', [$item['id'], $item['url']]) }}">{{ $item['title'] }}</a>
                                            </li>
                                        @endforeach
                                        <li class="Item">
                                            <a href="/login" class="Link D4879 ST16"
                                                style="color:#2c2c2c">Најава/Регистрација</a>
                                        </li>
                                        <li class="Item">
                                            <a href="/contact" class="Link D4879 ST16" style="color:#2c2c2c">Контакт</a>
                                        </li>
                                        <ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="Box">
                                    <a data-toggle="collapse" href="#collapseContact">
                                        <div class="Title D4879 ST15" style="color:#2c2c2c">Контакт</div>
                                    </a>
                                    <ul class="collapse display_show" id="collapseContact">
                                        <li class="Item">
                                            <span class="bold">
                                                <i class="fa fa-map-marker mobile-footer-icon"></i>
                                                Ул. Македонија Бр.58 ВЛ.001/КАТ
                                                ПР-БР.0000 - Центар</span>
                                        </li>
                                        <li class="Item">
                                            <span class="bold">
                                                <i class="fa fa-phone mobile-footer-icon"></i>071/683-682</span>
                                        </li>
                                        <li class="Item">
                                            <span class="bold">
                                                <a href="mailto:info@mymoda.mk" class="bold">
                                                    <i class="fa fa-envelope mobile-footer-icon"></i>
                                                    info@mymoda.mk</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="Newsletter ST2 ST12">
                                    <div class="Container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="T ST3 ST4" style="color:#000000">БИДИ ВО ТЕК СО СИТЕ НОВОСТИ
                                                </div>
                                                <form class="NewsForm ebultenBox">
                                                    <input type="email" id="ebultenINPUT"
                                                        class="ST5 ST6 ST7 ST8 ST22 personaclick-initialized"
                                                        style="background:#fff;color:#4c4c4c;border-width:1pxpx;border-color:#dcdcdc"
                                                        placeholder="Внеси ја својата е-пошта">
                                                    <button type="button" id="ebultenSUBMIT"
                                                        class="ST9 ST10 S11">Испрати</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="BankLogos ST20 ST21">
                                    <div class="Container">
                                        <div class="row">
                                            <div class="col-12">
                                                <span><img src="https://static.farktor.com/Library/System/Img/comodo.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/GeoTrust.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/rapid.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/maestro.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/master.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/visa.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/ameciranexpress.png"></span>
                                                <span><img src="https://static.farktor.com/Library/System/Img/paypal.png"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Copyright ST24 ST26 app-phone-wrapper" style="background:white;color:#000">
            <div style="padding-top: 30px; padding-bottom: 30px;" class="Container W1181">
                <div class="row">
                    <div class="c-md-7 c-sm-7 text-left app-phone-container">
                        <div class="app-phones">
                            <div class="item">
                                <a href="https://play.google.com/store/apps/details?id=mk.mymoda.easyshop&hl=en_SG"
                                    target="_blank">
                                    <img src="{{ url_assets('/mymoda/images/android.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="/" target="_blank">
                                    <img src="{{ url_assets('/mymoda/images/ios.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="c-md-5 c-sm-5 text-right  app-phone-container">
                        <h4 class="text-left text_footer_right">Купувајте едноставно од вашите мобилни уреди со новата
                            MYMODA апликација.</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm hidden-md Copyright ST24 ST26" style="background:#D9D9D9;color:#000">
            <div class="text-center ps-footer__copyright">
                <div class="ps-container-fluid">
                    <div class="flex-center row">
                        <div class="col-lg-4 text-left col-md-4 col-sm-4 col-xs-12" id="copyright">
                            <p class="copyright-block flex-center">Powered By
                                <a href="//generadevelopment.com" target="_blank"><img width="80" class="ml-10"
                                        src="{{ url_assets('/mymoda/images/genera-logo.svg') }}">
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-4 text-right col-md-4 col-sm-4 col-xs-12 ">

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="payment-methods">

                            <ul class="ps-footer__social">
                                <li><a class="black-color" id="pravila-na-kupuvanje"
                                        href="/b/2/pravila-na-kupuvanje">Правила на
                                        купување</a></li>
                                <li><a class="black-color" id="politika-na-privatnost"
                                        href="/b/1/politika-na-privatnost">Политика на
                                        приватност</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
