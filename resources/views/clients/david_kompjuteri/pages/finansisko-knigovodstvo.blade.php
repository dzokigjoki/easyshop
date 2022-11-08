@extends('clients.david_kompjuteri.layouts.default')
@section('content')
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">Финансиско книговодство</h1>
                </div>

                <div class="pt-10">

                </div>
            </div>
        </div>
    </section>
    <div class="container">

        <div class="row" style="padding-bottom: 5rem">
            <div class="desc text-justify">
                <div class="col-sm-12">
                    <div class="title pt-40">
                        <h2>Финансиско книговодство</h2>
                    </div>
                    <p>Софтверот за финанскиско книговодство нуди можности за книжење налози, слободно додавање на
                        коминтенти, типови на документи, контен план, валути, фирми, и разни видови на извештаи. Овој
                        софтвер е направен од <strong>ПИКСЕЛ Системи</strong>, кои се долгогодишен партнер на <strong>ДАВИД
                            Компјутери</strong>, и преку кои
                        оди поддршката за сите софтверски решенија од ДАВИД Компјутери.</p>
                    <div class="title-characteristics pt-20">
                        <h3>Клучни карактеристики</h3>
                    </div>
                    <p class="paragraph pb-20">
                        Книжење на налози, шифрарници на конта, коминтенти, типови документи, валути, курсна листа, профитни
                        центри, прегледи по коминтенти, спецификација по коминтенти, картица на конто, салда по конта и
                        друго. За повеќе детали околу софтверот, неговите карактеристики и цена <a
                            href="/contact">контактирајте не</a>.
                    </p>
                </div>
               
            </div>
           
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{ url_assets('/david_kompjuteri/img/pixelFIN_1.jpg') }}" alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ url_assets('/david_kompjuteri/img/pixelFIN_2.jpg') }}" alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ url_assets('/david_kompjuteri/img/pixelFIN_3.jpg') }}" alt="">
                </div>
            </div>
        </div>

    </div>
@stop
