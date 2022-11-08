@extends('clients.expressbook_new.layouts.default')

@section('content')

    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark text-capitalize">За нас</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">За нас</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <section class="about-section pt-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-11 mx-auto mb-30">
                    <div class="about-content row">
                        <div class="about-left-image col-md-6 mb-30">
                            <img src="{{ url_assets('/expressbook_new/img/about.jpg') }}" alt="img"
                                class="img-responsive" />
                        </div>
                        <div class="col-md-6">
                            <p class="mb-15">
                                Експрес Бук е официјален дистрибутер на издавачката куќа Express Publishing во Македонија.
                                Наша одговорност е дистрибуција на книгите, како и промоција и рекламирање на истите. Преку
                                нашата дистрибутивна мрежа во можност сме сами да ја испорачаме секоја нарачка во Скопје.
                            </p>
                            <p class="mb-15">
                                Бидејќи сакаме да се доближиме до вас на побрз и поедноставен начин, ја создадовме оваа
                                on-line продавница каде што ке може да ги разгледате и купите сите наши изданија наменети за
                                индивидуално изучување на англискиот јазик.
                            </p>
                            <p class="mb-15">
                                Секогаш сме достапни за сите ваши прашања и брзо ги доставуваме вашите нарачки на
                                најефективен начин.
                            </p>
                            <p class="mb-15">
                                За повеќе информации и нарачки на книги кои што не ги гледате на нашата страна може да ни
                                пишете на marija@expressbook.mk
                            </p>
                            <p class="mb-15">
                                Express Publishing е Британска издавачка куќа посветена на ЕЛТ книги и учебници. Основана во
                                1988, оваа фирма континуирано создава квалитетни материјали за изучување на англискиот јазик
                                и моментално има преку 2,000 наслови и има продажна мрежа во преку 80 земји.
                            </p>
                            <p class="mb-15">
                                Со наслови за деца и возразни, Express Publishing издава книги на сите нивоа и е пред се
                                посветена на квалитет. Тоа што може да ви понудат се учебници за редовна настава, книги за
                                подготовка за меѓународни испити, лектири, специјализирани книги за одредени професии, и
                                сите овие книги имаат многу додатоци како ЦД-а, интеракивни материјали, работни тетратки и
                                книги за професори. Сите книги се во боја и повеќето се со интерактвни ЦД-а кои овозможуваат
                                полесно изучување на материјалот.
                            </p>
                            <p class="mb-15">
                                <a href="https://www.expresspublishing.co.uk/">https://www.expresspublishing.co.uk/</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product tab end -->

    <!-- staic media start -->
    <section class="static-media-section py-30 bg-white">
        <div class="container">
            <div class="static-media-wrap theme-bg">
                <div class="row values-slider-init text-center">
                        <div class="d-flex static-media2 flex-column flex-sm-row">
                            
                            <div class="media-body">
                                <img class="align-self-center mb-2 mb-1 m-auto"
                                src="{{ url_assets('/expressbook_new/img/icon/2.png') }}" alt="icon" />
                                <h4 class="title">Бесплатна испорака</h4>
                                <p class="text">На сите производи над 1200 денари</p>
                            </div>
                        
                    </div>
                        <div class="d-flex static-media2 flex-column flex-sm-row">
                            
                            <div class="media-body">
                                <img class="align-self-center mb-2 mb-1 m-auto"
                                src="{{ url_assets('/expressbook_new/img/icon/7.png') }}" alt="icon" />
                                <h4 class="title">Плаќање во готово</h4>
                                <p class="text">Наплатете ги вашите нарачки при достава</p>
                            </div>
                        
                    </div>
                        <div class="d-flex static-media2 flex-column flex-sm-row">
                            
                            <div class="media-body">
                                <img class="align-self-center mb-2 mb-1 m-auto"
                                src="{{ url_assets('/expressbook_new/img/icon/4.png') }}" alt="icon" />
                                <h4 class="title">Поддршка 24/7</h4>
                                <p class="text">Контактирајте не во секое време</p>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- staic media end -->
@stop
