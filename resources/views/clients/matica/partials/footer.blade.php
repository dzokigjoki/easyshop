<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <h3 data-target="#collapse_1">Линкови</h3>
        <div class="collapse dont-collapse-sm links" id="collapse_1">
          <ul>
            <li><a href="{{ route('category', [34, 'promocii']) }}">Промоции</a></li>
            <li><a href="{{ route('blog.all') }}">#Bukmarker</a></li>
            {{-- <li><a href="account.html">Контакт</a></li> --}}
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <h3 data-target="#collapse_3" class="opened">Контакт</h3>
        <div class="collapse show dont-collapse-sm contacts" id="collapse_3">
          <ul>
            <li><i class="ti-home"></i>Булевар Свети Климент Охридски 23, Скопје 1000</li>
            <li><i class="ti-headphone-alt"></i><a href="0038923221138">02 3 22 11 38</a></li>
            <li><i class="ti-email"></i><a href="mailto:marketing@matica.com.mk">marketing@matica.com.mk</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <h3 data-target="#collapse_4">Зачлени се</h3>
        <div class="collapse dont-collapse-sm" id="collapse_4">
          <div id="newsletter">
            <form id="newsletter_form">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Вашата Е- пошта">
                <button type="submit" id="submit-newsletter" href="javascript://" data-newsletter-submit>
                  <i class="ti-angle-double-right"></i>
                </button>
                <div class="newsletter-message" data-newsletter-placeholder></div>
              </div>
            </form>
          </div>
          <div class="follow_us">
            <ul>
              <li><a href="https://www.facebook.com/ClubMatica" target="_blank"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/matica/img/facebook_icon.svg')}}" class="lazy"></a></li>
              <li><a href="https://www.instagram.com/club_matica" target="_blank"><img
                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                    data-src="{{url_assets('/matica/img/instagram_icon.svg')}}" class="lazy"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /row-->
    <hr>
    <div class="row add_bottom_25">
      <div class="col-lg-5">
        <span class="footer_powered">Powered by <a href="https://generadevelopment.com" target="_blank"
            class="footer_powered-link"> Genera Development LLC</a></span>
      </div>
      <div class="col-lg-7">
        <ul class="additional_links">
        <li><a href="{{ route('category', [29, 'pravila-za-kupuvanje']) }}">Правила за купување</a></li>
          <li><a href="{{ route('category', [30, 'politika-na-privatnost']) }}">Политика на приватност</a></li>
          <li><a href="{{ route('category', [49, 'politika-na-kolacinja']) }}">Политика на колачиња</a></li>
          <li><span>© {{ date('Y') }} Клуб Матица</span></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
@section('scripts')
<script>
  $(document).ready(function() {
    //** Newsletter
    $('[data-newsletter-submit]').click(function() {
    $('#newsletter_form').submit();
    })
    $('#newsletter_form').on('submit', function(e) {
    e.preventDefault();

    if (isSubscribing) return false;

    $('[data-newsletter-placeholder]').html('');

    isSubscribing = true;
    $.ajax({
        type: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: '/newsletter/subscribe',
        data: {
          email: $('#newsletter_form').find('.email').val(),
        }
      }).done(function(response) {
        $('[data-newsletter-placeholder]').html(response.message);
        $('#newsletter_form').find('.email').val('');
      })
      .fail(function(jqXHR, textStatus) {
        var error = '';

        try {
          error = jqXHR.responseJSON.errors.email.shift();
        } catch (e) {}

        $('[data-newsletter-placeholder]').html(error);
      })
      .always(function() {
        isSubscribing = false;
      });
    });
  });
</script>
@stop