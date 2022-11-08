@extends('clients.sofu.layouts.default')
@section('content')
<style>
    .pt-35 {
        padding-top: 35px;
    }

    .ps-accordion {
        margin-bottom: 30px;
        padding: 30px;
        background-color: #fff;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.15);
        -ms-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.15);
        box-shadow:
    }

    .ps-accordion.active .ps-accordion__header:before {
        content: "\f106";
        font-family: FontAwesome;
        color: #000;
    }

    .padding_top_121 {
        padding-top: 121px !important;
    }

    .certificates_col {
        height: 100%;
    }

    .certificates_img {
        border: 1px solid gray !important;
        width: 100%;

        margin-bottom: 20px;
    }

    .ps-accordion__content>p {
        text-align: justify;
    }

    .ps-accordion__header>p {
        margin-right: 7%;
    }

    .ps-accordion__header:before {
        content: "\f107";
        font-family: FontAwesome;
        position: absolute;
        top: 0;
        right: 0;
        color: black;
    }

    .ps-accordion__header {
        position: relative;
        cursor: pointer;
        font-weight: bold;
        color: black;
    }
</style>
<section class="page-banner">
    <h2 class="page-title">Најчесто поставувани прашања</h2>
</section>
<section id="main-container" class="main-container">
    <div class="section-contact-v1 container">
        <div class="contact-content">
            <h5 class="text-center">Општи Информации</h5>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Што е SoFu?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Софу, или комплетното име Solid Furniture, е бренд кој се занимава со изработка на мебел од масивно дрво во комбинација со природни материјали како метал, мермер, кожа и др. Секое парче мебел иработено во SoFu е уникатно и дизајнирано по желба на корисникот до најситен детаљ
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Дали СоФу мебелот е рачно изработен?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Да, SoFu мебелот е во целост рачно изработен користејќи ги најстарите и најавтентични столарски техники.
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Каде се произведува SoFu?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Комплетното производство на SoFu се случува во нашиот производствен погон во Скопје. Целиот процес на обработка на дрвото кое се користи во нашиот мебел, од технички материјал па сè до финален производ го изготвуваме сами. Соработуваме со талентирани дизајнери и занаетчии кога се во прашање елементи од метал, мермер и месинг кои нѝ помагаат SoFu мебелот да го добие својот впечатлив карактер.
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Од каде се снабдува дрвото кое се користи во парчињата мебел на SoFu? </p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Тргнувајќи од идејата да му дадеме втор живот на секое дрво, најголем дел од дрвата кои ги користиме се од локално потекло, одговорно исечени по сите стандарди за заштита и обнова на локалните шуми. Дел од дрвата се и реупотребени, тоа е случај само кога работиме на “vintage” производи. Сите стандардни видови на дрва кои ги користиме се од локално потекло освен егзотичните видови на дрво, кои пристигнуваат надвор од нашата држава.
                    </p>
                </div>
            </div>
            <h5 class="text-center">Нарачки</h5>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Може ли да се видат производите во живо пред да бидат нарачани?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Со оглед дека во моментов немаме изложбен салон, односно е во процес на подготовка, имаме одреден број на производи на лагер кои можете да ги видите во нашиот производствен погон.
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Може ли да ни помогнете во дизајнирање на нашето уникатно парче мебел?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Секако. Нашиот тим во целост стои на располагање да соработува со вас со цел заедно да го дизајнираме и изготвиме парчето мебел кое до најситен детаљ ги исполнува вашите желби.
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Колку долго трае процесот на изготвување на SoFu мебелот по нарачка? </p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Стандардниот процес на производство трае од 6 до 8 недели. Отстапки се можни доколу однапред е договорена точната дата на испорака.
                    </p>
                </div>
            </div>
            <h5 class="text-center">Правила на Купување и Поправки</h5>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>оже ли да се врати производот кој е направен по нарачка?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Поради тоа што сите производи на SoFu се дизајнирани и направени по ваша нарачка, не вршиме враќање на производот доколку сте се предомислиле, не ви се допаѓа бојата која сте ја одбрале или не ви се вклопува во просторот. Ако има грешка од наша страна ќе ја исправиме во најкус можен рок. Доколку не сте комплетно задоволни со вашиот производ, контактирајте нè и ние со целокупниот тим ќе се вложиме вашиот производ да биде онаков каков што сте го замислиле.
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Дали можам да го вратам производот кој е купен од лагер?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Секако. Производите дизајнирани од SoFu кои ги имаме на лагер можете да ги вратите во рок од 7 дена. Секако да бидат во иста состојба како при испорака. Оштетените производи не сме во можност да ги вратиме.
                    </p>
                </div>
            </div>
            <h5 class="text-center">Испорака и Дистрибуција</h5>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Кога ќе биде извршена испорака на производите по нарачка?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Производите по нарачка најчесто се испорачуваат во времетраење од 6-8 недели. Бидејќи ве инволвираме во сите фази од изработката на вашето парче мебел, по договор со вас ќе биде дефинирана точната дата на испорака.
                    </p>
                </div>
            </div>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Како ќе биде извршена испораката?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Испораката ја вршиме со сопствена дистрибуција и производите ги носиме до вашиот дом. Исклучоци правиме само доколку поради непристапност како тесни ходици и влезови до стан или куќа каде не можеме да го доставиме парчето мебел до вашиот дом.
                    </p>
                </div>
            </div>
            <h5 class="text-center">Заштита и Одржување</h5>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Како се одржуваат и чистат производите?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">
                    <p>
                        Во зависност од составот на производот, дали е дрво, дрво со метал, мермер, мебел штоф или кожа, одржувањето и заштитата на производот е различен. Во продолжение е линк со комплетно објаснување за <a href="/c/8/zastita-i-odrzuvanje">Заштита и Одржување</a>.
                    </p>
                </div>
            </div>
            <h5 class="text-center">Соработки</h5>
            <div class="ps-accordion">
                <div class="ps-accordion__header">
                    <p>Дали правите комерцијални соработки?</p>
                </div>
                <div class="ps-accordion__content" style="display: none;">

                    <p>
                        Апсолутно. Со огромно задоволство прифаќаме соработки со талентирани архитекти, дизајнери и занаетчии. Контактирајте нé за дополнителни информации.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@stop


@section('scripts')
<script>
    $(document).ready(function() {
        $('.ps-accordion').click(function() {
            $(this).toggleClass("active");
            $(this).children('.ps-accordion__content').slideToggle();
        });
        if (window.location.pathname === "/FAQ") {
            $("header").css("background", "#f0bc25");
            $(".top_panel_middle").css("background", "#f0bc25");
            $("header").css("height", "81px");
            $(".header_mobile").css("background", "#f0bc25");
        }
    });
</script>
@stop