<footer style="background: #282828;" class="footer footer-type-1">
    <div class="container">
        <div class="footer-widgets">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 col-xxs-12 col-xxs-offset-3 text-center">
                    <div class="widget footer-about-us">
                        <img src="{{ url_assets('/naturatherapyshop/img/logo.png') }}" alt="" class="logo" />
                        <h6 style="color:#fff; text-align: center !important"
                            class="widget-title widget_switch bottom-line left-align grey">

                            Natura Therapy
                        </h6>
                        <p style="color:#fff">
                        {!! trans('naturatherapy/global.work_time') !!}
                            <br>
                            {!! trans('naturatherapy/global.work_time_weekend') !!}
                        </p>
                        <div class="footer-socials">
                            <div class="social-icons nobase">
                                <a href="https://www.facebook.com/naturatherapy.ks/" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="https://www.youtube.com/channel/UCUH7clLtbM5huq6hP1ZLkiA" target="_blank"><i
                                        class="fa fa-youtube"></i></a>
                                <a href="https://www.instagram.com/naturatherapy.ks/" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 style="color:#fff" class="widget-title widget_switch bottom-line left-align grey">

                        {!! trans('naturatherapy/global.contact_us') !!}
                        </h5>
                        <ul class="list-no-dividers li_footer">
                            <li><a><i class="fa fa-map-marker"></i> Myslym Shyrri nr.20, Tiranë</a></li>
                            <li><a href="mailto:contact@naturaks.com"><i class="fa fa-envelope"></i>
                               @if (App::getLocale() != 'al') contact@naturatherapy.mk @else naturatherapy.al@gmail.com  @endif</a></li>
                               @if (App::getLocale() != 'al')
                            <li><a href="tel:+389 71317111"><i class="fa fa-phone"></i> +389 71 317 111</a></li>
                            @else
                            <li><a href="tel:0038945 956 000"><i class="fa fa-phone"></i> +355 44 80 33 44</a></li>
                            @endif
                            {{-- <li><a href="tel:0038970230459"><i class="fa fa-phone"></i> +389 70 230 459</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-xxs-12 text-center-xs">
                    <div class="widget footer-links">
                        <h5 style="color:#fff" class="widget-title widget_switch bottom-line left-align grey">

                        {!! trans('naturatherapy/global.your_health') !!}
                        </h5>
                        <p style="color: #fff">
                        {!! trans('naturatherapy/global.your_health_txt') !!}
                        </p>
                        <a class="btn btn-dark add-to-cart" href="{{ $urlLang }}contact">{!! trans('naturatherapy/global.seek_advice') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 copyright sm-text-center">
                    <span>
                        &copy; {{ date('Y') }} Naturatherapy
                    </span>
                </div>
                <div class="col-sm-6 col-xxs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-amex"></i>
                </div>
            </div>
        </div>
    </div>
</footer>
