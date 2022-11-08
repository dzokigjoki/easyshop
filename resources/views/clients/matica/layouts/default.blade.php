<!DOCTYPE html>
<html lang="en">

<head>
  @include('clients._partials.meta')

  <!-- GOOGLE WEB FONT -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

  <!-- BASE CSS -->
  <link href="{{url_assets('/matica/css/bootstrap.custom.min.css')}}" rel="stylesheet">
  <link href="{{url_assets('/matica/css/style.css?v=1')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ url_assets('/matica/plugins/slick/slick.css') }}" />
  <link rel="stylesheet" href="{{ url_assets('/matica/plugins/slick/slick-theme.css') }}" />

  <!-- YOUR CUSTOM CSS -->
  <link href="{{url_assets('/matica/css/custom.css')}}" rel="stylesheet">
  @include('clients._partials.global-styles')
  <style>
    .hidden {

      display: none;
    }

    .cookie-consent {
      padding: 30px 20px;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      font-size: 16px;
      color: #222;
      background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.45);
      text-align: center;
      z-index: 1999;
      line-height: 25px;
    }

    .cookie-consent__agree {
      padding: 5px 20px;
      background-color: #FFC107;
      color: black;
      margin-top: 9px;
      margin-left: 10px;
      cursor: pointer;
      -webkit-transition: background-color 0.3s ease;
      transition: background-color 0.3s ease;
    }

    .cookie-consent__disagree {
      padding: 5px 20px;
      background-color: lightgrey;
      color: black;
      border-color: grey;
      margin-top: 9px;
      margin-left: 10px;
      cursor: pointer;
      -webkit-transition: background-color 0.3s ease;
      transition: background-color 0.3s ease;
    }

    .toast-success {
      background-color: #A1BE95 !important;
      color: #222 !important;
      box-shadow: -5px 5px 10px #999 !important;
    }

    #toast-container>.toast-success {
      background-image: url('{{ url_assets("/easycms/pneumatik/img/tick.png") }}') !important;
      background-size: 20px !important;
    }
    }
  </style>
  @section('style')
  @show
  @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')

<body>
  <div id="page">
    @include('clients.matica.partials.header')
    @yield('content')
    @if(isset($popupModal) && !is_null($popupModal))
    <div id="onLoadModal" class="popup_wrapper" style="opacity: 1; visibility: visible;">
      <div class="popup_content newsletter">
        <span class="popup_close">Затвори</span>
        <a href="{{ '/'.$popupModal->url }}">
          @if(isset($popupModal->image))
          <img class="img-fluid" src="{{ $popupModal->image }}" alt="" width="500" height="500">
          @else
          <div class="row no-gutters">
            <div class="col-lg-12">
              <div class="content">
                <div class="wrapper">
                  <img src="{{ url_assets('/matica/logo.png') }}" alt="" width="150" height="auto">
                  <h3>{{ $popupModal->title }}</h3>
                  <p>{{ $popupModal->short_description }}</p>
                  <div class="form-group">
                    <label class="container_check d-inline">{!! $popupModal->description !!}</label>
                  </div>
                  <a href="{{ $popupModal->url }}" class="btn_1 mt-2 mb-4">Види повеќе</a>
                </div>
              </div>
            </div>
          </div>
          @endif
        </a>
      </div>
    </div>
    @endif
    @include('clients.matica.partials.footer')
  </div>

  <div class="cookie-consent hidden">
    <span style="padding-bottom: 9px;" class="cookie-consent__message">
      Оваа страница користи колачиња со цел да ја подобриме функционалноста и корисничкото искуство.
    </span>
    <br>
    Линк до <a href="http://matica.com.mk/c/49/politika-na-kolacinja">Политика на колачиња</a>
    <br>
    <button class="cookie-consent__agree" data-cookie-consent-confirm>
      Се согласувам
    </button>
    <button class="cookie-consent__disagree" data-cookie-consent-disagree>
      Не се согласувам
    </button>
  </div>

  <div id="toTop"></div>
  <script src="{{url_assets('/matica/js/common_scripts.min.js')}}"></script>
  <script type="text/javascript" src="{{ url_assets('/matica/plugins/slick/slick.min.js')}}"></script>
  <script src="{{url_assets('/matica/js/main.js?v=1')}}"></script>
  @include('clients._partials.es-object')
  @include('clients._partials.global-scripts')
  <script>
    $(document).ready(function() {
      function setCookie(name, value, minutes) {
        var expires = "";
        if (minutes) {
          var date = new Date();
          date.setTime(date.getTime() + minutes * 60 * 1000);
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

      function eraseCookie(name) {
        document.cookie = name + '=; Max-Age=-99999999;';
      }
      if (!getCookie('popup_modal_matica')) {
        $('#onLoadModal').show();
        setCookie('popup_modal_matica', '1', 60);
      } else {
        $('#onLoadModal').hide();
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
    });
  </script>
  @section('scripts')
  @show
</body>

</html>