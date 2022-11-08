<!-- footer strat -->
<footer class="bg-light theme1 position-relative">
    <!-- footer bottom start -->
    <div class="footer-bottom pt-80 pt-mob-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-4 mb-30">
                    <div class="footer-widget mx-w-400">
                        <div class="footer-logo mb-25">
                            <a href="index.html">
                                <img src="{{ url_assets('/expressbook_new/img/logo/logo.png') }}" alt="footer logo" />
                            </a>
                        </div>
                        <p class="text mb-30">
                            Експрес Бук е официјален дистрибутер на издавачката куќа Express Publishing во Македонија.
                            Наша одговорност е дистрибуција на книгите, како и промоција и рекламирање на истите.
                        </p>

                        <div class="social-network">
                            <ul class="d-flex">
                                <li>
                                    <a href="https://www.facebook.com/ekspresbuk/" target="_blank"><span
                                            class="icon-social-facebook"></span></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank"><span
                                            class="icon-social-twitter"></span></a>
                                </li>
                                <li class="mr-0">
                                    <a href="https://www.instagram.com/" target="_blank"><span
                                            class="icon-social-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-2 mb-30">
                    <div class="footer-widget">
                        <div class="border-bottom cbb1 mb-25">
                            <div class="section-title">
                                <h2 class="title">Информации</h2>
                            </div>
                        </div>
                        <!-- footer-menu start -->
                        <ul class="footer-menu">
                            <li><a href="/about">За нас</a></li>
                            <li><a href="/contact">Контакт</a></li>
                            <li><a href="/c/5/plakjanje-i-isporaka">Плаќање и Испорака</a></li>
                            <li><a href="/c/9/pravila-na-kupuvanje">Правила на купување</a></li>
                            <li><a href="/c/8/kako-da-naracham">Како да нарачам</a></li>
                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-2 mb-30">
                    <div class="footer-widget">
                        <div class="border-bottom cbb1 mb-25">
                            <div class="section-title">
                                <h2 class="title">Категории</h2>
                            </div>
                        </div>
                        <!-- footer-menu start -->
                        <ul class="footer-menu">
                            @foreach ($menuCategories as $i)
                                <li><a href="/c/{{ $i['id'] }}/{{ $i['url'] }}">{{ $i['title'] }}</a></li>
                            @endforeach
                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-4 mb-30">
                    <div class="footer-widget">
                        <div class="border-bottom cbb1 mb-25">
                            <div class="section-title">
                                <h2 class="title">Newsletter</h2>
                            </div>
                        </div>
                        <div class="fb-page" data-height="200" data-href="https://www.facebook.com/ekspresbuk/"
                            data-tabs="timeline" data-width="" data-height="" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/ekspresbuk/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/ekspresbuk/">Express Publishing - Експрес Бук</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom end -->
    <!-- coppy-right start -->
    <div class="coppy-right bg-dark py-15">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4 order-last order-md-first">
                    <div class="text-md-left text-center mt-3 mt-md-0">
                        <p>
                            Copyright &copy; 2021 ExpressBook
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-8">
                    <div class="text-md-right text-center">
                        Powered by 
                        <a href="https://generadevelopment.com" target="_blank">
                            <img width="70"
                                src="{{ url_assets('/expressbook_new/img/genera_logo.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- coppy-right end -->
</footer>
<!-- footer end -->
