<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <h3 data-target="#collapse_1">Линкови</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_1">
          <ul>
            <li><a href="{{ route('blog.all') }}">Новости</a></li>
            <li><a href="/kontakt">Контакт</a></li>
            <li><a href="/faq">FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <h3 data-target="#collapse_3" class="opened">Контакт</h3>
        <div class="collapse show dont-collapse-sm contacts" id="collapse_3">
          <ul>
            <li><i class="ti-home"></i>Теодосиј Гологанов бр.44 локал 9</li>
            <li><i class="ti-headphone-alt"></i><a href="0038977737077">077 737 077</a></li>
            <li><i class="ti-email"></i><a href="mailto:hotspotelektronik@gmail.com">hotspotelektronik@gmail.com</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <h3 data-target="#collapse_4">Зачлени се</h3>
        <div class="collapse dont-collapse-sm" id="collapse_4">
          <div id="newsletter">
            <div class="form-group">
              <input type="email" name="email_newsletter" id="email_newsletter" class="form-control"
                placeholder="Вашата Е-Пошта">
              <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
            </div>
          </div>
          <div class="follow_us">
            <ul>
              <li><a href="https://www.facebook.com/ClubHotspot" target="_blank"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/hotspot/img/facebook_icon.svg')}}" class="lazy"></a></li>
              <li><a href="https://www.instagram.com/club_hotspot" target="_blank"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/hotspot/img/instagram_icon.svg')}}" class="lazy"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /row-->
    <hr>
    <div class="row add_bottom_25">
      <div class="col-lg-6">

      </div>
      <div class="col-lg-6">
        <ul class="additional_links">
          <li><a href="{{ route('category', [38, 'pravila-za-kupuvanje']) }}">Правила за купување</a></li>
          <li><a href="{{ route('category', [39, 'politika-na-privatnost']) }}">Политика на приватност</a></li>
          <li><span>© {{ date('Y') }} Hotspot</span></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!--/footer-->