<footer class="footer footer-type-1">
    <div class="container">
        <div class="footer-widgets footer-row">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 col-xxs-12 text-center">
                    <div class="widget footer-about-us">

                        <img src="{{ url_assets('/david_kompjuteri/img/logo.png') }}" alt="" class="logo" />
                        
                        <div class="footer-socials mt-20">
                            <div class="social-icons nobase">
                                <a href="https://www.facebook.com/David-Kompjuteri-dooel-1396055890615089"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/david.kompjuteri/"><i class="fa fa-instagram"></i></a>
                                <a href="https://mk.linkedin.com/in/david-kompjuteri-11299534"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end about us -->

                <div class="col-md-2 col-md-offset-1 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                        Корисни информации <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><a href="/faq">ЧПП</a></li>
                            <li><a href="/contact">Контакт</a></li>
                            <li><a href="/about-us">За нас</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Профил <i class="fa fa-chevron-right"></i>
                        </h5>
                        @if(auth()->check())
                        <ul class="list-no-dividers">
                            <li><a href="/profile">Мој профил</a></li>
                            <li><a href="/profile#wishlist">Листа на желби</a></li>
                        </ul>
                        @else
                        <ul class="list-no-dividers">
                            <li><a href="/login">Најава</a></li>
                            <li><a href="/register">Регистрација</a></li>
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Политики и правила <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><a href="">Правила на купување</a></li>
                            <li><a href="">Политика на приватност</a></li>
                        </ul>
                    </div>
                </div>



                <div class="col-md-2 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Контакт <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><strong>Адреса:</strong> Бул.„Јане Сандански“ бр.72 - Скопје</li>
                            <li><strong>Tел/факс:</strong> +389-(0)2-2450-372</li>
                            <li><strong>Mоб:</strong> 078/414-736</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end container -->

    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 copyright sm-text-center">
                    <span>
                        &copy; 2021 David Kompjuteri, Developed by
                        <a href="//generadevelopment.com" target="_blank"><img width="80" src="//assets-easyshop.generadevelopment.com/bellina/images/genera-logo.svg"></a>
                    </span>
                </div>

                <div class="col-sm-6 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-amex"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- end bottom footer -->
</footer>