<style>
    #footer-logo {
        width: 120px;
    }

    @media(max-width: 767px) {
        .pt-mobile-35 {
            padding-top: 35px;
        }
    }

</style>



<footer class="footer-section footer-hp-2 section-box">
    <div class="footer-content">
        <div class="container">
            <div class="row pb-4">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="footer-items">
                        <div class="logo">
                            <a href="/"><img src="{{ url_assets('/luxbox/images/logo/logo-white.png') }}"
                                    id="footer-logo" alt="LuxBox"></a>
                        </div>
                        {{-- <div class="socials"> --}}
                        {{-- <a href="#"><i class="zmdi zmdi-facebook"></i></a>
              <a href="#"><i class="zmdi zmdi-twitter"></i></a>
              <a href="#"><i class="zmdi zmdi-tumblr"></i></a>
              <a href="#"><i class="zmdi zmdi-instagram"></i></a> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="footer-items footer-items-1">
                        <h4>Помош при купување</h4>
                        <div class="profile"><a href="/politika_na_kolacinja">Политика на колачиња</a></div>
                        <div class="profile"><a href="/b/1/politika-na-privatnost">Политика на приватност</a>
                        </div>
                        <div class="profile"><a href="/b/2/uslovi-na-koristenje">Услови на користење</a></div>
                        <div class="profile"><a href="/b/5/kako-da-kupite?">Како да купите</a></div>
                        <div class="profile"><a href="/b/6/vrakjanje-i-reklamacija">Рекламации и поврат на
                                производи</a></div>
                        <div class="profile"><a href="/b/3/uslovi-za-isporaka">Услови за испорака</a></div>
                        <div class="profile"><a href="/b/4/nachin-na-plakjanje">Плаќање</a></div>
                        <div class="profile"><a href="/b/7/odrzuvanje-na-proizvodite">Одржување</a></div>
                    </div>
                </div>
                <div class="pt-mobile-35 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="footer-items footer-items-2">
                        <h4>Информации</h4>
                        <div class="profile"><a href="/c/22/za-nas">За нас</a></div>
                        <div class="profile"><a href="/kontakt">Контакт</a></div>
                        <div class="profile"><a href="/faq">Најчести прашања</a></div>
                        <div class="profile"><a href="/sorabotka-so-nas">Соработка со нас</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row_generadevelopment">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <p class="white-color">Copyright © Luxbox 2020 <span class="plr-10">|</span> Powered By <a
                        href="//generadevelopment.com" target="_blank"><img width="80"
                            src="//assets-easyshop.generadevelopment.com/bellina/images/genera-logo.svg"></a></p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cards-image">
                <img width="150" src="{{ url_assets('/luxbox/images/icons/banki_oli.png') }}" alt="">
            </div>
        </div>

        <div class="cookie-consent hidden mobilno">
            <span style="padding-bottom: 9px;" class="cookie-consent__message">
                Оваа страница користи колачиња со цел да ја подобриме функционалноста и корисничкото искуство.
                Прочитајте ја нашата политика на колачиња на следниот <a href="/politika_na_kolacinja">линк.</a>
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
    </div>
    </div>


</footer>
