@extends('clients.dobra_voda.layouts.default')
@section('content')

<div class="main-content_area">
    <!-- Begin Banner With Text Area -->
    <div class="banner-with_text overflow-hidden pb-15 pt-100">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6 col-md-7 align_center">
                    <div class="text-area text_align_jusitfy">
                        <h2 class="heading">За нашата компанија</h2>
                        <p class="short-desc pearl-text_color">Во 2000 година почнавме од почеток, но знаевме каде одиме и кон што целиме. Имавме идеали, знаење, технологија и најважно од сѐ - јасни цели.
                            Денес сме една од водечките компании за производството и дистрибуција на вода
                            и освежителни пијалаци во Македонија и ги инвестираме наши ресурси и
                            ентузијазам во насока нашите производи да станат достапни до нови клиенти низ светот.
                        </p>
                        <p class="short-desc pearl-text_color pb-0">Над 100 вработени во нашата компанија ја делат подеднакво истата страст за извонредност, усовршување, најсовремена продукција и посветеност да донесеме насмевка и задоволство на секој потрошувач што го имаме.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 align_center">
                    <div class="banner-area pt-md-90">
                        <img class="w-100" src="{{url_assets('/dobra_voda/images/about_1.jpg')}}" alt="none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner With Text Area End Here -->
    <!-- Begin Banner With Text Area -->
    <div class="banner-with_text banner-with_text-2 pb-15 overflow-hidden pt-15">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6 col-md-5 align_center show_photo">
                    <div class="banner-area">
                        <img class="width_105" src="{{url_assets('/dobra_voda/images/about_2.jpg')}}" alt="none">
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 align_center">
                    <div class="text-area text_align_jusitfy change_padding">
                        <span>Нашите вредности</span>
                        <h3 class="heading-2">Еколошка свест</h3>
                        <p class="short-desc-2 pearl-text_color">Една од нашите главни цели е еколошката свет и грижата за животната средина. Токму затоа го имплементиравме и работиме согласно барањата на стандардот за управување со животна средина ISO 14001:2015.
                        </p>
                        <h3 class="heading-2">Општествена одговорност</h3>
                        <p class="short-desc-2 pearl-text_color">Ние сме и ќе останеме општествено одговорна компанија, која заедно со своите потрошувачи работи на создавање на подобро утре и постојана афирмација на нови иновативни и квалитетни производи.</p>
                        <h3 class="heading-2">Стремење кон подобри навики</h3>
                        <p class="short-desc-2 pearl-text_color pb-0">Нашите секојдневни активности вклучуваат поддршка на настани кои го поттикнуваат и охрабруваат општеството да се движи кон подобри насоки.
                            Активност од мали нозе, фокус на здравјето и спортот, како и грижа за себе си и животната средина, се водечки прироритети на нашата компанија.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 align_center hide_photo">
                    <div class="banner-area">
                        <img class="width_105" src="{{url_assets('/dobra_voda/images/about_2.jpg')}}" alt="none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner With Text Area End Here -->
    <!-- Begin Banner With Text Area Three -->
    <div class="banner-with_text banner-with_text-3 overflow-hidden">
        <div class="container-fluid p-0">
            <div class="banner-nav bg-black">
                <div class="row">
                    <div class="col-lg-6 col-md-7 align_center">
                        <div class="text-area text-justify">
                            <span class="white-text_color"></span>
                            <h2 class="heading white-text_color">Како работиме?</h2>
                            <p class="pearl-text_color">Нашата фабрика во с.Вакав, Кратовско, располага со комплетно автоматизирана линија за полнење на неповратна стаклена и PEТ амбалажа со капацитет од 12.000 l/h и комплетно автоматизирана сирупана, во согласност со законските прописи и сите правила за добра производна пракса.</p>
                            <p class="pearl-text_color">Од изворот до погонот за полнење, водата се транспортира низ затворен систем целосно заштитен од сите надворешни влијанија. Во погонот се врши механичко филтрирање и апсолутна 0.2μ ултрафилтрацијa со цел задоволување на барањата на сертифицираниот стандард за управување со безбедност на храна ISO 22000:2018 </p>
                            <p class="pearl-text_color pb-0">Пакуваниот производ, подготвен за консумација, се дистрибуира до продажните и угостителските објекти во строго контролирани услови, со сопствен возен парк. </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 align_center">
                        <div class="banner-area">
                            <img src="{{url_assets('/dobra_voda/images/about_3.jpg')}}" alt="none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop