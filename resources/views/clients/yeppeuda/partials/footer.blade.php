<footer class="footer footer-type-1">
    <div class="container">
        <div class="footer-widgets">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 col-xxs-6 col-xxs-offset-3 text-center">
                    <div class="widget footer-about-us">

                        <img src="{{ url_assets('/yeppeuda/img/logo.png') }}" alt="" class="logo" />
                        
                        <div class="footer-socials mt-20">
                            <div class="social-icons nobase">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end about us -->

                <div class="col-md-2 col-md-offset-1 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Информации <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><a href="/kontakt">Контакт</a></li>
                            <li><a href="/za-nas">За нас</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Профил <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><a href="#">Мој профил</a></li>
                            <li><a href="#">Листа на желби</a></li>
                            <li><a href="#">Мои нарачки</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Линкови <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><a href="#">Најпродавани производи</a></li>
                            <li><a href="#">Производи на акција</a></li>
                            <li><a href="#">Најнови производи</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-xs-3 col-xxs-12">
                    <div class="widget footer-links">
                        <h5 class="widget-title widget_switch bottom-line left-align grey">
                            Сервиси <i class="fa fa-chevron-right"></i>
                        </h5>
                        <ul class="list-no-dividers">
                            <li><a href="/faq">FAQ</a></li>
                            <li><a href="/c/2/pravila-na-kupuvanje">Правила на купување</a></li>
                            <li><a href="/c/3/politika-na-privatnost">Политика на приватност</a></li>
                            <li><a href="/c/80/politika-na-kolacinja">Политика на колачиња</a></li>
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
                        &copy; 2020 Yeppeuda, Developed by
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
    <div class="cookie-consent hidden">
        <span style="padding-bottom: 9px;" class="cookie-consent__message">
            Оваа страница користи колачиња со цел да ја подобриме функционалноста и корисничкото искуство.
            Прочитајте ја нашата политика на колачиња на следниот <a href="/c/80/politika-na-kolacinja">линк.</a>
        </span>
        <br>
        <button class="cookie-consent__agree" data-cookie-consent-confirm>
          Се согласувам
        </button>
        <button class="cookie-consent__disagree" data-cookie-consent-disagree>
          Не се согласувам
        </button>
      </div>
</footer>

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