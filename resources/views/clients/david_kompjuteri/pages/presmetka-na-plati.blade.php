@extends('clients.david_kompjuteri.layouts.default')
@section('content')

    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">Пресметка на плати</h1>
                </div>

                <div class="pt-10">

                </div>
            </div>
        </div>
    </section>

    <div class="row" style="padding-bottom: 5rem">
        <div class="desc text-justify">
            <div class="container">
                <div class="col-sm-12">
                    <div class="title pt-40">
                        <h2>Пресметка на плати</h2>
                    </div>
                    <p>Софтверот за пресметка на плати нуди можност за пресметување на месечни примања на секој вработен,
                        како и за евиденција на вработените во една компанија. Овој софтвер има можност за поврзување со
                        програмата МПИН на Управата за јавни приходи. Софтвер е направен од <strong>ПИКСЕЛ Системи</strong>,
                        кои се
                        долгогодишен партнер на <strong>ДАВИД Компјутери</strong>, и преку кои оди поддршката за сите
                        софтверски решенија од
                        ДАВИД Компјутери.</p>
                    <div class="title-characteristics pt-20">
                        <h3>Клучни карактеристики</h3>
                    </div>
                    <p>
                        Внесување на вработени во фирмата, Можност за повеќекратно пријавување и одјавување на вработените,
                        дефинирање на плата како бруто плата или како бодови. Слободно дефинирање на банки, работни единици,
                        работни места, стрична спрена на вработените, подрачни единици на Фондот за здравствено осигурување,
                        општини, примања, и податоци за фирмата. Нуди можност за дефинирање на месечните параметри како
                        процентите за придонеси, процент за персонален данок, просечна плата, работни часови и друго. За
                        секој вработен покрај основната плата, може да се внесуваат боледувања, и прекувремена работа. Може
                        да се печатат пресметковни ливчиња за секој вработен, и извештаи ПДД месечен, и ПДД годишен
                        извештај, печатење на ПД по општини, формирање на МПИН датотека која се вчитува во програмата за
                        пресметување на плати од УЈП.
                    </p>
                </div>
                {{-- <div class="col-sm-6 pt-100">
                    <img src="{{ url_assets('/david_kompjuteri/img/paycheck.png') }}" alt="Paycheck calcutaion">
                </div> --}}
            </div>
        </div>
    </div>
@stop