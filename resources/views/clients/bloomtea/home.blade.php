@extends('clients.bloomtea.layouts.default')
@section('content')
    {{--<section class="sec-slider">--}}
    {{--<div class="rev_slider_wrapper fullwidthbanner-container">--}}

    {{--<div id="rev_slider_3" class="rev_slide fullwidthabanner" data-version="5.4.5">--}}
    {{--<ul>--}}
    {{--<!-- Slide 1 -->--}}
    {{--<li data-transition="fade">--}}
    {{--<!--  -->--}}

    {{--<!--  -->--}}
    {{--<div class="tp-caption tp-resizeme flex-c-m flex-w layer1"--}}
    {{--data-frames='[{"delay":1700,"speed":1500,"frame":"0","from":"y:-150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}

    {{--data-x="['center']"--}}
    {{--data-y="['center']"--}}
    {{--data-hoffset="['0', '0', '0', '0']"--}}
    {{--data-voffset="[0, 0, 0, 0]"--}}

    {{--data-width="['960','960','768','576']"--}}
    {{--data-height="['auto']"--}}

    {{--data-paddingtop="[0, 0, 0, 0]"--}}
    {{--data-paddingright="[0, 0, 0, 0]"--}}
    {{--data-paddingbottom="[0, 0, 0, 0]"--}}
    {{--data-paddingleft="[0, 0, 0, 0]"--}}

    {{--data-basealign="slide"--}}
    {{--data-responsive_offset="on">--}}
    {{--<img src="assets/bloomtea/images/BLOOM-COVER-1-2.jpg" alt="IMG-BG" class="rev-slidebg">--}}

    {{--<a href="{{route('product',[1,'super-green-detox-tea'])}}"--}}
    {{--style="font-size: 32px; font-family: 'Roboto Condensed'; position: absolute;--}}
    {{--width: 50%; top: 90%; margin-left:-35%"--}}
    {{--class="flex-c-m txt-s-103 cl0 bg10 size-a-5 hov-btn2 trans-04 m-b-30" id="add_cart">--}}
    {{--Види повеќе--}}
    {{--</a>--}}

    {{--<img src="assets/bloomtea/images/symbol-19.png" alt="IMG">--}}
    {{--</div>--}}


    {{--<!--  -->--}}
    {{--<h2 class="tp-caption tp-resizeme layer2"--}}
    {{--data-frames='[{"delay":500,"split":"chars","splitdelay":0.05,"speed":1300,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'--}}

    {{--data-visibility="['on', 'on', 'on', 'on']"--}}

    {{--data-fontsize="['150', '120', '100', '80']"--}}
    {{--data-lineheight="['165', '130', '110', '82']"--}}
    {{--data-color="['#fff']"--}}
    {{--data-textAlign="['center', 'center', 'center', 'center']"--}}

    {{--data-x="['center']"--}}
    {{--data-y="['center']"--}}
    {{--data-hoffset="['0', '0', '0', '0']"--}}
    {{--data-voffset="['30', '30', '20', '0']"--}}

    {{--data-width="['960','960','768','576']"--}}
    {{--data-height="['auto']"--}}
    {{--data-whitespace="['normal']"--}}

    {{--data-paddingtop="[0, 0, 0, 0]"--}}
    {{--data-paddingright="[15, 15, 15, 15]"--}}
    {{--data-paddingbottom="[0, 0, 0, 0]"--}}
    {{--data-paddingleft="[15, 15, 15, 15]"--}}

    {{--data-basealign="slide"--}}
    {{--data-responsive_offset="on"--}}
    {{-->--}}
    {{--Farm Fresh--}}
    {{--</h2>--}}

    {{--<!--  -->--}}
    {{--<div class="tp-caption tp-resizeme flex-c-m flex-w layer3"--}}
    {{--data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'--}}

    {{--data-x="['center']"--}}
    {{--data-y="['center']"--}}
    {{--data-hoffset="['0', '0', '0', '0']"--}}
    {{--data-voffset="['190', '170', '150', '130']"--}}

    {{--data-width="['960','960','768','576']"--}}
    {{--data-height="['auto']"--}}

    {{--data-paddingtop="[0, 0, 0, 0]"--}}
    {{--data-paddingright="[15, 15, 15, 15]"--}}
    {{--data-paddingbottom="[0, 0, 0, 0]"--}}
    {{--data-paddingleft="[15, 15, 15, 15]"--}}

    {{--data-basealign="slide"--}}
    {{--data-responsive_offset="on"--}}
    {{-->--}}
    {{--</div>--}}
    {{--</li>--}}

    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <section class="sec-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container" id="after-banner">
            <div id="rev_slider_3" class="rev_slide fullwidthabanner" data-version="5.4.5" style="display:none">
                <ul>
                    <!-- Slide 1 -->
                    <li data-transition="fade">
                        <!--  -->


                        {{--<img src="/assets/bloomtea/images/mobile-banner.jpg" alt="IMG-BG" class="mobile-banner rev-slidebg">--}}
                        {{--<img src="/assets/bloomtea/images/nov-cover-1.jpg" alt="IMG-BG" class="desktop-banner rev-slidebg">--}}


                        <div id="banner" class="rev-slidebg"></div>


                        <!--  -->
                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer1"
                             data-frames='[{"delay":1700,"speed":1500,"frame":"0","from":"y:-150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                             data-x="['center']"
                             data-y="['center']"
                             data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-115', '-95', '-85', '-120']"

                             data-width="['960','960','768','576']"
                             data-height="['auto']"

                             data-paddingtop="[0, 0, 0, 0]"
                             data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]"
                             data-paddingleft="[15, 15, 15, 15]"

                             data-basealign="slide"
                             data-responsive_offset="on"
                        >
                            {{--<img src="/assets/bloomtea/images/icons/symbol-19.png" alt="IMG">--}}
                        </div>

                        <!--  -->
                        <h2 class="tp-caption tp-resizeme layer2"
                            data-frames='[{"delay":500,"split":"chars","splitdelay":0.05,"speed":1300,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                            data-visibility="['on', 'on', 'on', 'on']"

                            data-fontsize="['150', '120', '100', '80']"
                            data-lineheight="['165', '130', '110', '82']"
                            data-color="['#fff']"
                            data-textAlign="['center', 'center', 'center', 'center']"

                            data-x="['center']"
                            data-y="['center']"
                            data-hoffset="['0', '0', '0', '0']"
                            data-voffset="['30', '30', '20', '0']"

                            data-width="['960','960','768','576']"
                            data-height="['auto']"
                            data-whitespace="['normal']"

                            data-paddingtop="[0, 0, 0, 0]"
                            data-paddingright="[15, 15, 15, 15]"
                            data-paddingbottom="[0, 0, 0, 0]"
                            data-paddingleft="[15, 15, 15, 15]"

                            data-basealign="slide"
                            data-responsive_offset="on"
                        >
                        </h2>


                        <!--  -->
                        <div class=""
                             data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'

                             data-x="['center']"
                             data-y="['center']"
                             data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['190', '170', '150', '130']"

                             data-width="['960','960','768','576']"
                             data-height="['auto']"

                             data-paddingtop="[0, 0, 0, 0]"
                             data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]"
                             data-paddingleft="[15, 15, 15, 15]"

                             data-basealign="slide"
                             data-responsive_offset="on"
                        >
                            <a href="{{route('product',[1,'super-green-detox-tea'])}}" class="btn btn-lg"
                               id="naracaj-button" style="">
                                Нарачај тука</a>
                        </div>

                    </li>

                    <!-- Slide 2 -->

                </ul>

            </div>
        </div>
    </section>
    <section class="sec-welcome bg0 p-t-145 p-b-95">
        <div class="container">
            <div class="size-a-1 flex-col-c-m p-b-90">
                <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                    Органски SuperGreen Детокс Чај

                    <div class="how-pos1">
                        <img src="{{ url_assets('/bloomtea/images/symbol-02.png') }}" alt="IMG">
                    </div>
                </div>

                <h3 class="txt-center txt-l-101 cl3 respon1">
                    BLOOM
                </h3>
            </div>

            <div class="wrap-pic-max-w flex-c-t flex-w p-t-255 item-welcome-parent">
                <img class="size-w-1" src="{{ url_assets('/bloomtea/images/bloom-product.png') }}" alt="IMG">

                <!-- item welcome -->
                <div class="item-welcome one">
                    <div class="item-welcome-pic pos-relative">
                        <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon1.png') }}" alt="IMG">
                        </div>

                        <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon1.1.png') }}" alt="IMG">
                        </div>
                    </div>

                    <div class="item-welcome-txt p-t-27">
                        <h4 class="txt-m-101 cl3 txt-center p-b-11">
                            100% Органски
                        </h4>

                        <p class="txt-s-101 cl6 txt-center">
                            Сертифициран органски чај произведен во Германија со најквалитетни органски состојки
                        </p>
                    </div>
                </div>

                <!-- item welcome -->
                <div class="item-welcome two">
                    <div class="item-welcome-pic pos-relative">
                        <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
                            <img src="{{url_assets('/bloomtea/images/icon2.png')  }}" alt="IMG">
                        </div>

                        <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon2.2.png') }}" alt="IMG">
                        </div>
                    </div>

                    <div class="item-welcome-txt p-t-27">
                        <h4 class="txt-m-101 cl3 txt-center p-b-11">
                            Детоксификација
                        </h4>

                        <p class="txt-s-101 cl6 txt-center">
                            Состојките во детокс чајот помагаат за детоксификација и исфрлање на
                            токсините од телото
                        </p>
                    </div>
                </div>

                <!-- item welcome -->
                <div class="item-welcome three">
                    <div class="item-welcome-pic pos-relative">
                        <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon3.png') }}" alt="IMG">
                        </div>

                        <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon3.3.png') }}" alt="IMG">
                        </div>
                    </div>

                    <div class="item-welcome-txt p-t-27">
                        <h4 class="txt-m-101 cl3 txt-center p-b-11">
                            Енергија
                        </h4>

                        <p class="txt-s-101 cl6 txt-center">
                            Мешавината од зелени чаеви дава природна енергија и сила за попорудктивен ден
                        </p>
                    </div>
                </div>

                <!-- item welcome -->
                <div class="item-welcome four">
                    <div class="item-welcome-pic pos-relative">
                        <div class="wrap-pic-max-w flex-c-m item-welcome-pic-dark trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon4.png') }}" alt="IMG">
                        </div>

                        <div class="wrap-pic-max-w flex-c-m s-full ab-t-l item-welcome-pic-light trans-04">
                            <img src="{{ url_assets('/bloomtea/images/icon4.4.png') }}" alt="IMG">
                        </div>
                    </div>

                    <div class="item-welcome-txt p-t-27">
                        <h4 class="txt-m-101 cl3 txt-center p-b-11">
                            Метаболизам
                        </h4>

                        <p class="txt-s-101 cl6 txt-center">
                            Чајот помага за природно забрзување на метаболизмот што заедно со здрава
                            исхрана придонесува до топење масти
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>







    <section class="sec-deal bg-img1" style="-webkit-box-shadow: 0px 4px 10px 5px rgba(44,183,126,0.72);
-moz-box-shadow: 0px 4px 10px 5px rgba(44,183,126,0.72);
box-shadow: 0px 4px 10px 5px rgba(44,183,126,0.72);">
        <img src="{{ url_assets('/bloomtea/images/sostojki_ver2.jpg') }}" id="baner2" style="margin: 0 auto; width: 100%;">
        {{--<div class="flex-w flex-m how-pos2-parent">--}}
        {{--<img class="how-pos2 respon4 dis-none-xl" src="images/other-03.png" alt="IMG">--}}

        {{--<div class="size-w-3 txt-center wrap-pic-max-s w-full-lg">--}}
        {{--<img src="images/other-02.png" alt="IMG">--}}
        {{--</div>--}}

        {{--<div class="size-w-4 p-t-105 p-b-90 p-r-15 respon3">--}}
        {{--<div class="size-a-1 flex-col-l-m p-b-35">--}}


        {{--<h3 class="txt-l-101 cl3 respon1">--}}
        {{--deal of the day--}}
        {{--</h3>--}}
        {{--</div>--}}

        {{--<div class="p-b-32">--}}
        {{--<a href="#" class="txt-m-105 cl6 hov-cl10 trans-04">--}}
        {{--Roasted corn--}}
        {{--</a>--}}

        {{--<div class="txt-m-105 p-t-15 p-b-22">--}}
        {{--<span class="cl9">--}}
        {{--20$--}}
        {{--</span>--}}

        {{--<span class="cl10">--}}
        {{--Now Only 15$--}}
        {{--</span>--}}
        {{--</div>--}}

        {{--<p class="txt-s-102 cl9">--}}
        {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.--}}
        {{--</p>--}}
        {{--</div>--}}

        {{--<div class="flex-w coutdown100 p-b-22" data-year="0" data-month="0" data-date="10" data-hours="23" data-minutes="0" data-seconds="0" data-timezone="auto">--}}
        {{--<div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">--}}
        {{--<span class="txt-l-102 cl6 days">--}}
        {{--10--}}
        {{--</span>--}}

        {{--<span class="txt-m-106 cl9">--}}
        {{--days--}}
        {{--</span>--}}
        {{--</div>--}}

        {{--<div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">--}}
        {{--<span class="txt-l-102 cl6 hours">--}}
        {{--25--}}
        {{--</span>--}}

        {{--<span class="txt-m-106 cl9">--}}
        {{--hours--}}
        {{--</span>--}}
        {{--</div>--}}

        {{--<div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">--}}
        {{--<span class="txt-l-102 cl6 minutes">--}}
        {{--56--}}
        {{--</span>--}}

        {{--<span class="txt-m-106 cl9">--}}
        {{--mins--}}
        {{--</span>--}}
        {{--</div>--}}

        {{--<div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">--}}
        {{--<span class="txt-l-102 cl6 seconds">--}}
        {{--42--}}
        {{--</span>--}}

        {{--<span class="txt-m-106 cl9">--}}
        {{--secs--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="flex-w">--}}
        {{--<a href="shop-sidebar-grid.html" class="flex-c-m txt-s-103 cl6 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn1 trans-04">--}}
        {{--Shop now--}}
        {{--<span class="lnr lnr-chevron-right m-l-7"></span>--}}
        {{--<span class="lnr lnr-chevron-right"></span>--}}
        {{--</a>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
    </section>

    {{--<div class="sec-testimonials bg12 p-t-120 p-b-80 how-pos3-parent how-pos4-parent">--}}
    {{--<img class="how-pos3 dis-none-xl" src="assets/bloomtea/images/bloom-product.png" alt="IMG">--}}
    {{--<img class="how-pos4 dis-none-xl" src="assets/bloomtea/images/other-05.png" alt="IMG">--}}

    {{--<div class="container">--}}
    {{--<!-- Slide3 -->--}}
    {{--<div class="wrap-slick3">--}}
    {{--<div class="slick3">--}}
    {{--<div class="item-slick3">--}}
    {{--<div class="flex-col-c-m">--}}
    {{--<h1>Што велат нашите клиенти</h1>--}}
    {{--<br>--}}
    {{--<div class="layer-slick3 animated visible-false" data-appear="zoomIn" data-delay="100">--}}
    {{--<div class="wrap-pic-s size-a-3 bo-3-rad-50per bocl10 of-hidden">--}}
    {{--<img src="assets/bloomtea/images/avatar-01.jpg" alt="AVATAR">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="layer-slick3 animated visible-false" data-appear="fadeInUp" data-delay="800">--}}
    {{--<div class="flex-col-c-m p-t-33 p-b-25">--}}
    {{--<span class="txt-l-105 cl3 txt-center p-b-9">--}}
    {{--Lorem Ipsum--}}
    {{--</span>--}}


    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="layer-slick3 animated visible-false" data-appear="fadeInUp" data-delay="1600">--}}
    {{--<p class="txt-center txt-s-104 cl6 size-w-8">--}}
    {{--Lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="item-slick3">--}}
    {{--<div class="flex-col-c-m">--}}
    {{--<h1>Што велат нашите клиенти</h1>--}}
    {{--<br>--}}
    {{--<div class="layer-slick3 animated visible-false" data-appear="zoomIn" data-delay="100">--}}
    {{--<div class="wrap-pic-s size-a-3 bo-3-rad-50per bocl10 of-hidden">--}}
    {{--<img src="/assets/bloomtea/images/avatar-01.jpg" alt="AVATAR">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="layer-slick3 animated visible-false" data-appear="fadeInUp" data-delay="800">--}}
    {{--<div class="flex-col-c-m p-t-33 p-b-25">--}}
    {{--<span class="txt-l-105 cl3 txt-center p-b-9">--}}
    {{--Lorem Ipsum--}}
    {{--</span>--}}

    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="layer-slick3 animated visible-false" data-appear="fadeInUp" data-delay="1600">--}}
    {{--<p class="txt-center txt-s-104 cl6 size-w-8">--}}
    {{--Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="item-slick3">--}}
    {{--<div class="flex-col-c-m">--}}
    {{--<h1>Што велат нашите клиенти</h1>--}}
    {{--<br>--}}
    {{--<div class="layer-slick3 animated visible-false" data-appear="zoomIn" data-delay="100">--}}
    {{--<div class="wrap-pic-s size-a-3 bo-3-rad-50per bocl10 of-hidden">--}}
    {{--<img src="assets/bloomtea/images/avatar-01.jpg" alt="AVATAR">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="layer-slick3 animated visible-false" data-appear="fadeInUp" data-delay="800">--}}
    {{--<div class="flex-col-c-m p-t-33 p-b-25">--}}
    {{--<span class="txt-l-105 cl3 txt-center p-b-9">--}}
    {{--Lorem ipsum--}}
    {{--</span>--}}

    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="layer-slick3 animated visible-false" data-appear="fadeInUp" data-delay="1600">--}}
    {{--<p class="txt-center txt-s-104 cl6 size-w-8">--}}
    {{--Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="wrap-slick3-dots p-t-50"></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <section class="sec-blog bg0 p-t-145 p-b-70">
        <div class="container">
            <div class="size-a-1 flex-col-c-m p-b-70">
                <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                    Бидете во чекор со нас

                    <div class="how-pos1">
                        <img src="{{ url_assets('/bloomtea/images/symbol-02.png') }}" alt="IMG">
                    </div>
                </div>

                <h3 class="txt-center txt-l-101 cl3 respon1">
                    Од нашиот блог
                </h3>
            </div>

            <div class="row">
                @foreach($lastBlogs as $blog)
                    <div class="col-md-4 col-lg-6 col-sm-12 col-xs-12" style="padding-bottom: 20px;">
                        <div class="flex-w flex-t">
                            <a href="{{route('blog',[$blog->id,$blog->url])}}"
                               class="wrap-pic-w hov4 size-w-29 pos-relative m-r-25 w-full-sm m-r-0-sm">
                                <img src="{{\ImagesHelper::getBlogImage($blog)}}">

                            </a>

                            <div class="size-w-30 p-t-11 w-full-sm">
                                <h4 class="p-b-10">
                                    <a href="{{route('blog',[$blog->id,$blog->url])}}"
                                       class="txt-m-109 cl3 hov-cl10 trans-04">
                                        {{$blog->title}}
                                    </a>
                                </h4>

                                <p class="txt-s-101 cl6 p-b-20">
                                    {!! $blog->short_description!!}
                                </p>

                                <div class="how-line2 p-l-40">
                                    <a href="{{route('blog',[$blog->id,$blog->url])}}"
                                       class="txt-s-105 cl9 hov-cl10 trans-04">
                                        Прочитај повеќе
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Subscribe -->
@endsection