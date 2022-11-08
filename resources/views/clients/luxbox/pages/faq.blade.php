@extends('clients.luxbox.layouts.default')
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
<div class="page-content">
    <section class="contact-section section-box">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="contact-details">
                        <h3 style="margin-bottom: 50px;" class="text-left special-heading">Најчесто поставувани прашања:
                        </h3>
                    </div>
                </div>
                <div class="ps-accordion">
                    <div class="ps-accordion__header">
                        <p>Дали имате продажен салон?</p>
                    </div>
                    <div class="ps-accordion__content" style="display: none;">
                        <p>Во моментов немаме продажен салон, единствен начин да ги купите нашите производи е онлајн
                            на нашата интернет продавница.</p>
                    </div>
                </div>
                <div class="ps-accordion">
                    <div class="ps-accordion__header">
                        <p>Дали може да се врати производ?</p>
                    </div>
                    <div class="ps-accordion__content" style="display: none;">
                        <p>И покрај тоа што производите се изработуваат по нарачка, имате можност да го вратите
                            производот во рок од 4 дена по испораката.</p>
                    </div>
                </div>
                <div class="ps-accordion">
                    <div class="ps-accordion__header">
                        <p>Дали се наплаќа за достава?</p>
                    </div>
                    <div class="ps-accordion__content" style="display: none;">
                        <p>Не, доставата е бесплатна.</p>
                    </div>
                </div>
                <div class="ps-accordion">
                    <div class="ps-accordion__header">
                        <p>За колку дена да го очекувам производот?</p>
                    </div>
                    <div class="ps-accordion__content" style="display: none;">
                        <p>Испораката се врши од 7 до 14 работни денови од моментот на направената нарачка.</p>
                    </div>
                </div>
                <div class="ps-accordion">
                    <div class="ps-accordion__header">
                        <p>На кој начин се врши плаќањето и дали можам да платам при достава? </p>
                    </div>
                    <div class="ps-accordion__content" style="display: none;">
                        <p>Плаќањето може да се изврши на два начина и тоа со електронска платежна картичка или со
                            фактура. Плаќање при достава не е возможно.</p>
                    </div>
                </div>
                <div class="ps-accordion">
                    <div class="ps-accordion__header">
                        <p>Како да ја исчистам мермерната површина?</p>
                    </div>
                    <div class="ps-accordion__content" style="display: none;">
                        <p>За да ја исчистите мермерната површина доволна е мека крпа со вода или пак детергент за миење
                            садови. Никогаш не користете белило! Ова е порозен материјал кој впива течности, па доколку
                            Ви
                            се истури течност треба веднаш да ја избришете за да избегнете дамки. Како виното така и
                            мермерот со стареење станува уште поубав. Малите дамки и траги му даваат посебен карактер на
                            Вашето мермерно парче, засакајте ги!</p>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
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
@endsection