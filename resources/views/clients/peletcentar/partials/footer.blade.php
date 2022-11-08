<footer class="flat-footer flat-reset">
    <div class="flat-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="widget widget_about_us">
                        <!--  <h2>Контакт</h2>
                         <p>ПЕЛЕТ ЦЕНТАР СКОПЈЕ<br></p> -->
                        <img src="{{ url_assets('/peletcentar/img/logoPNGnamaleno.png') }}"
                            style="width:150px; height: 90px;">
                        <br>
                        <br>
                        <ul class="flat-infomation">
                            <li class="address">ул. 1409 бр.35, Ѓорче Петров (Индус. зона Лепенец) <br>
                                1000 Скопје, Карпош</li>
                            <li class="email"> <a href="email:info@peletcentar.mk" style="color: white;">
                                    info@peletcentar.mk</a></li>
                            <li class="phone"><a style="color: white;" href="tel:+38978333383">078 333
                                    383</a>&nbsp&nbsp<br><a style="color: white;" href="tel:+38972230120">072 230
                                    120</a>&nbsp&nbsp<br><a style="color: white;" href="tel:+38925511300">02 5511
                                    300</a></li>
                            <a href="{{ route('page.contact') }}" class="flat-button">Контактирај нè!</a>
                        </ul>

                    </div> <!-- /.widget_about_us -->
                </div>

                <div class="hide-xs col-md-4 col-sm-4">
                    <br>
                    <br>
                    <div class="widget widget_instagram">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpeletcentarskopje%2F&tabs&width=350px&height=240px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            width="100%" height="215px" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowTransparency="true">
                        </iframe>
                    </div>
                </div>

                <div class="AdjustMd footerMargin col-md-4 col-sm-4" style="">
                    <br>
                    <br>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2964.26868802764!2d21.36683571544545!3d42.01596807921153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13541384dbe24cbb%3A0xf35141aebe898135!2sPelet+Centar!5e0!3m2!1sen!2smk!4v1524732118618"
                        width="100%" height="215px" frameborder="0" style="border:0" scrolling="no"
                        allowfullscreen></iframe>
                    {{-- <div class="col-md-7 widget widget_services flat-underline"> --}}
                    {{-- <h2>Услуги</h2> --}}
                    {{-- <ul> --}}
                    {{-- <li><a href="{{route('blog', [11, 'dostava'])}}">Бесплатна достава</a></li> --}}
                    {{-- <li><a href="{{route('blog', [11, 'dostava'])}}">Достава за 24 часа</a></li> --}}
                    {{-- <li><a href="{{route('blog', [10, 'galerija'])}}">Залиха во секое време</a></li> --}}
                    {{-- <li><a href="{{route('category', [6, 'kotli'])}}">Избор на грејни тела и решенија</a></li> --}}
                    {{-- </ul> --}}
                    {{-- </div> <!-- /.widget_services --> --}}
                    {{-- <div class="col-md-5 widget widget_services flat-underline"> --}}
                    {{-- <h2>Категории</h2> --}}
                    {{-- <ul> --}}
                    {{-- @foreach ($menuCategories as $item) --}}
                    {{-- <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}> --}}
                    {{-- <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a> --}}
                    {{-- </li> --}}
                    {{-- @endforeach --}}
                    {{-- </ul> --}}
                    {{-- </div> --}}

                </div>


            </div>
        </div>
    </div>
    </div> <!-- /.flat-footer-top -->
    <div class="cookie-consent hidden">
        <span style="padding-bottom: 9px;" class="cookie-consent__message">
            Оваа страница користи колачиња со цел да ја подобриме функционалноста и корисничкото искуство.
            Прочитајте ја нашата политика на колачиња на следниот <a href="{{ route('blog', [12, 'politika-na-kolacinja']) }}">линк.</a>
        </span>
        <br>
        <button class="cookie-consent__agree" data-cookie-consent-confirm>
            Се согласувам
        </button>
        <button class="cookie-consent__disagree" data-cookie-consent-disagree>
            Не се согласувам
        </button>
    </div>
    <script>
        function setCookie(name, value, minutes) {
            var expires = "";
            if (minutes) {
                var date = new Date();
                console.log(date.toUTCString());
                date.setTime(date.getTime() + minutes * 60 * 1000);
                console.log(date.toUTCString());
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
        var cookieConsentExists = getCookie('cookie_consent');
        var cookieConsent = document.querySelector('.cookie-consent');
        if (!cookieConsentExists) {
            var cookieConsentBtn = document.querySelector('[data-cookie-consent-confirm]');
            if (cookieConsentBtn && cookieConsent) {
                cookieConsent.classList.remove('hidden');
                cookieConsentBtn.addEventListener('click', function() {
                    setCookie('cookie_consent', true, 60 * 24 * 30);
                    cookieConsent.remove();
                });
            }
        } else {
            if (cookieConsent) {
                cookieConsent.remove();
            }
        }
        if (!cookieConsentExists) {
            var cookieConsentBtn = document.querySelector('[data-cookie-consent-disagree]');
            if (cookieConsentBtn && cookieConsent) {
                cookieConsent.classList.remove('hidden');
                cookieConsentBtn.addEventListener('click', function() {
                    setCookie('cookie_consent', true, 60 * 24 * 30);
                    cookieConsent.remove();
                });
            }
        } else {
            if (cookieConsent) {
                cookieConsent.remove();
            }
        }
    </script>
</footer> <!-- /.flat-footer -->

<div class="flat-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="flat-copyright flat-left">2018 © Pelet Centar.&nbsp All Rights Reserved. &nbsp&nbsp&nbsp
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="pomestuvanje">
                    <a href="{{ route('blog', [2, 'pravila-za-kupuvanje']) }}">Правила
                        закупување</a>
                    <a href="{{ route('blog', [3, 'politika-na-privatnost']) }}">&nbsp Политика на приватност</a>
                    <a href="{{ route('blog', [12, 'politika-na-kolacinja']) }}">&nbsp Политика на колачиња</a>
                </div>
            </div>
            <!-- /.flat-copyright -->

            <div class="col-md-3 col-sm-3">
                <div class="flat-cash flat-right">
                    Powered by
                    <a href="https://easyshop.mk" target="_blank">
                        <img src="{{ url_assets('/peletcentar/img/genera_logo.png') }}"
                            style="width: 100px; height: auto;" alt="EasyShop">
                    </a>&nbsp
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.flat-bottom -->

<!-- Go Top -->
<a class="go-top">
    <i class="fa fa-chevron-up"></i>
</a>

</div><!-- /.boxed -->
