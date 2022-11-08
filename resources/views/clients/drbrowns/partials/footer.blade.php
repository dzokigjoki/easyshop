<footer class="footer">

    <div class="footer-top container">

        <div class="row">

            <div class="col-lg-12 col-xs-12">


                <div class="clearfix col-lg-4 contact-details">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="list-unstyled link-list">
                        <li style="padding-bottom: 10px;" class="active"><h5 style="color:white !important;">Информации</h5></li>
                        <li style="padding-bottom: 10px;" class=""><a href="{{route('blog', [1, 'nagradi'])}}">Награди</a></li>
                        <li style="padding-bottom: 10px;" class=""><a href="{{route('blog',[6,'zoshto-drbrowns?'])}}">Зошто DrBrowns?</a></li>
                        {{--<li style="padding-bottom: 10px;" class=""><a href="/">Локација</a></li>--}}
                        <li style="padding-bottom: 10px;" class=""><a href="{{route('blog',[5,'kade-da-kupime'])}}">Каде да купиме?</a></li>
                        <li style="padding-bottom: 10px;" class=""><a href="{{route('blog',[3,'faqs'])}}">FAQs</a></li>
                    </ul>
                    </div>
                    {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">--}}
                        {{--<ul class="list-unstyled link-list">--}}
                            {{--<li style="padding-bottom: 10px;" class="active"><h5 style="color:white !important;">Поддршка</h5> </li>--}}
                           {{----}}
                            {{--<li style="padding-bottom: 10px;" class=""><a href="/">Инструкции</a></li>--}}
                            {{--<li style="padding-bottom: 10px;" class=""><a href="{{route('blog',[4,'upatstvo'])}}">Упатство</a></li>--}}
                            {{--<li style="padding-bottom: 10px;" class=""><a href="/">Контакт</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>

                <div class="marginsFB clearfix col-lg-5 contact-details">
                    <div style="border:none; overflow:hidden; width:270px; height:216px;" class="fb-page" data-href="https://www.facebook.com/Dr.BrownsMacedonia/" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Dr.BrownsMacedonia/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/Dr.BrownsMacedonia/">drbrowns.mk</a></blockquote>
                    </div>
                </div>

                <div style="line-height: 10px;color:white;" class="col-lg-3 contact-details clearfix fade-in-left ">
                    <img src="{{ url_assets('/drbrowns/images/logoDRB.png') }}">
                    <img style="margin-top:5px; margin-left:5px;" src="{{ url_assets('/drbrowns/images/happyFeeding.png') }}">

                    {{--<address>--}}
                        {{--<br>--}}
                        {{--<i class="fa fa-home"></i>Орце Николов 206 бр. 3--}}
                    {{--</address>--}}
                    <br>
                    <br>
                    <a class="phone-number" href="tel:0038971297619">
                        <i class="fa fa-mobile"></i>071/297-619</a>
                    <span class="email">
                        <br>
                        <br>
                        <i class="fa fa-envelope-o"></i>
                        <a href="mailto:&#105;&#110;f&#111;&#64;y&#111;u&#114;w&#101;b&#115;&#105;&#116;&#101;&#46;c&#111;m">marija@drbrowns.mk</a></span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom mobileXs">
        <div class="container">
            <p style="font-weight:bold; font-size:12px;  color: white; float: left;" class="copyright-text col-lg-4 col-sm-4 col-md-4 col-xs-12">2018 © <a href="{{route('home')}}">DrBrowns</a> All Rights Reserved.</p>
            <p style="color:white; float:left;" class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <a style="font-weight:bold; font-size:12px; color:white !important; margin-right:10px;" class="copyright-text" href="{{route('blog', [8, 'politika-na-privatnost'])}}">Политика на приватност</a>
                <a style="font-weight:bold; font-size:12px; color:white; margin-right:10px;" class="copyright-text" href="{{route('blog', [7, 'pravila-na-kupuvanje'])}}">Правила на купување</a>
                <a href="/politika-na-kolacinja" class="copyright-text" style="font-weight:bold; font-size:12px; color:white">Политика на колачиња</a>
            </p>
            <p style="font-weight:bold; font-size:12px; color: white; float: right;" class="copyright-text col-lg-3 col-sm-3 col-md-3 col-xs-12">Developed by <a href="https://easyshop.mk" target="_blank"><img style="margin-left:10px; width:100px;" src="{{ url_assets('/drbrowns/images/genera_logo.png') }}"></a></p>
        </div>
    </div>

</footer><!-- End Footer -->