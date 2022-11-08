<style></style>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <h3 data-target="#collapse_1">Кратки линкови</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_1">
          <ul>
            <li><a href="/za-nas">За нас</a></li>
            <li><a href="/faq">FAQ</a></li>
            @if(auth()->check() && auth()->user()->role != 'admin')
            <li><a href="/profile">Мој профил</a></li>
            @endif
            @foreach($menuCategories as $row)
            @if($row['title'] == 'Новости')
            <li>
              {{-- <a href="{{ $urlLang }}/c/{{ $row->id }}/{{ $row->url }}">{{ $row->title }}</a> --}}
            </li>
            @endif
            @endforeach
            <li><a href="/wishlist">Листа на желби</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <h3 data-target="#collapse_2">Главни категории</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_2">
          <ul>
            @foreach($menuCategories as $mc)
            <li>
              <a href="/c/{{ $mc['id'] }}/{{ $mc['url'] }}">{{ $mc['title'] }}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <h3 data-target="#collapse_3">Контакт</h3>
        <div class="collapse dont-collapse-sm contacts" id="collapse_3">
          <ul>
            <li><i class="ti-home"></i>Clarissa Balkan ДОО</li>
            <li><a href="tel:003933277078"><i class="ti-headphone-alt"></i>+39 33 277 078</li></a>
            <li><i class="ti-email"></i><a href="mailto:info@clarissabalkan.com">info@clarissabalkan.com</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <h3 data-target="#collapse_4">Останете во тек</h3>
        <div class="collapse dont-collapse-sm" id="collapse_4">
          <div id="newsletter">
            <form id="newsletter_form">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Е- маил адреса">
                <button type="submit" id="submit-newsletter" href="javascript://" data-newsletter-submit>
                  <i class="ti-angle-double-right"></i>
                </button>
                <div class="newsletter-message" data-newsletter-placeholder></div>
              </div>
            </form>
          </div>
          <div class="follow_us">
            <h5>Следете нé</h5>
            <ul>
              {{-- <li><a href="#0"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/clarissabalkan/img/twitter_icon.svg')}}" alt="" class="lazy"></a>
              </li> --}}
              <li><a rel="noreferrer" href="https://www.facebook.com/ClarissaBalkan/" target="_blank"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/clarissabalkan/img/facebook_icon.svg')}}" alt="" class="lazy"></a>
              </li>
              <li><a rel="noreferrer" href="https://www.instagram.com/clarissabalkan/" target="_blank"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/clarissabalkan/img/instagram_icon.svg')}}" alt="" class="lazy"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="flex-centered row add_bottom_25">
      <div class="col-sm-6 col-xs-12">
        <ul class="footer-selector clearfix">
          <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
              data-src="{{url_assets('/clarissabalkan/img/banki.png')}}" alt="" width="198" height="30"
              class="lazy"></li>
        </ul>
      </div>
      <div class="col-sm-6 col-xs-12">
        <ul class="additional_links">
          {{--  <a><a href="https://generadevelopment.com" target="_blank">Powered By: Genera Development</a></a>  --}}
          <li><a href="/pravila-na-kupuvanje">Правила на купување</a></li>
          <li><a href="/politika-na-privatnost">Политика на приватност</a></li>
          <li><span>© {{ date('Y') }} Clarissa Balkan Doo</span></li>
        </ul>
      </div>
    </div>
  </div>
</footer>