<!-- Footer -->
<footer id="footer" class="bg-dark dark">

    <div class="container">
        <!-- Footer 1st Row -->
        <div class="footer-first-row row">
            <div class="col-lg-3 text-center">
                @if(\Request::route()->getPath() == "/old")
                <a href="/old"><img src="{{ url_assets('/barbakan/img/logo.png') }}" alt="" width="150" class="mt-5 mb-5"></a>
                @else
                <a href="/"><img src="{{ url_assets('/barbakan/img/logo2.png') }}" alt="" width="150" class="mt-5 mb-5"></a>
                @endif
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-muted">Линкови</h5>
                <ul class="list-posts">
                    <li>
                        <a href="/" class="title">Почетна</a>
                    </li>
                    <li>
                        <a href="/c/1/meni" class="title">Мени</a>
                    </li>
                    <li>
                        <a href="/za-nas" class="title">За нас</a>
                    </li>
                    <li>
                        <a href="/kontakt" class="title">Контакт</a>
                    </li>
                    <li>
                        <a href="/c/4/novosti" class="title">Новости</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 class="text-muted">Пријави се!</h5>
                <!-- MailChimp Form -->
                <form action="//suelo.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad" id="sign-up-form" class="sign-up-form validate-form mb-5" method="POST">
                    <div class="input-group">
                        <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control" placeholder="Внесете ја вашата е-пошта" required>
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-submit" type="submit">
                                <span class="description">Испрати</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" /></svg>
                                </span>
                                <span class="error">Try again...</span>
                            </button>
                        </span>
                    </div>
                </form>
                <h5 class="text-muted mb-3">Бидете поврзани</h5>
                <a href="https://www.facebook.com/BarbakanBistroBar/" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/bistro_bar_barbakan/" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Footer 2nd Row -->
        <div class="footer-second-row">
            <span class="text-muted">Copyright Barbakan 2021©. Developed by <a href="//generadevelopment.com" target="_blank"><img width="80" src="//assets-easyshop.generadevelopment.com/bellina/images/genera-logo.svg"></a></span>
        </div>
    </div>

    <!-- Back To Top -->
    <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

</footer>
<!-- Footer / End -->