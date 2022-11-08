<footer class="flat-footer flat-reset">
    <div class="flat-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget widget_about_us">



                        <img src="/assets/finki-giftshop/img/finki-logo.png" style="width:20%;">
                        <h2>КОНТАКТ</h2>
                        <ul class="flat-infomation">
                            <li class="address">ул. Руѓер Бошковиќ 16, Пoштенски Фах 393,
                                1000, Скопје, Р. Македонија</li>
                            <li class="email"> contact@finki.ukim.mk</li>
                            {{--<li class="phone">(+1) 123 456 789  -  (+1) 123 456 987</li>--}}
                        </ul>

                    </div> <!-- /.widget_about_us -->
                </div>

                <div class="col-md-2">
                    <div class="widget widget_services flat-underline">
                        <h2>Категории</h2>
                        <ul>
                            @foreach($menuCategories as $item)
                            <li><a href="{{route('category',[$item['id'],$item['url']])}}">{{$item['title']}}</a></li>
                                @endforeach

                        </ul>
                    </div> <!-- /.widget_services -->
                </div>

                <div class="col-md-3">
                    <div class="widget widget_my_account flat-underline">
                        <h2>Информации</h2>
                        <ul>
                            <li><a href="#">Регистрирај се</a></li>
                            <li><a href="#">Најави се</a></li>
                            <li><a href="#">За нас</a></li>
                            <li><a href="#">Официјална страна на ФИНКИ</a></li>
                        </ul>
                    </div> <!-- /.widget_my_account -->
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div> <!-- /.flat-footer-top -->
</footer> <!-- /.flat-footer -->

<!-- Go Top -->
<a class="go-top">
    <i class="fa fa-chevron-up"></i>
</a>

</div><!-- /.boxed -->
