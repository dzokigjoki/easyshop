@extends('clients.fitactive.layouts.default')
@section('content')
    <?php $title = 'title_' . $lang;
    $url = 'url_' . $lang; ?>
     <div class="levelek"></div>
    <div class="ps-breadcrumb ps-breadcrumb--2 hidden-xs pl-100">
        <div class="ps-container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                    <ol class="breadcrumb">
                        <li><a href="/">Почетна</a></li>
                        <li><a>За нас</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <div class="ps-about-features">
        <div class="ps-container-fluid">
            <div class="ps-section__header">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">

                        <h4 class="text-left">Главен застапник за Fit Active – e компанијата МАСТ 2021 !</h4>

                        <p class="font-weight-700 text-justify">
                            <br>
                            Фирмата <bold>МАСТ 2021</bold> е компанија која е регистрирана во 2021 година , основачите на оваа компанија
                            се
                            долгогодишни одгледувачи на домашни миленици поточно расни кучиња како и активисти за права на
                            домашните
                            миленици, големи љубители на животни.
                            <br>
                            <br>
                        </p>
                        <p class="text-justify">
                            Нивните успеси на Кинолошките настани низ Европа, нивното познавање на областа миленици , беа
                            потик да
                            некој бренд менаџери од големи производители на храна за домашни миленици да иницираат за да
                            бидат
                            генерални застапници на брендиви на храна за домашни миленици.

                            Целта и стратегијата на МАСТ 2021 е да се развива во оваа област со увоз на многу брендови во
                            Македонија
                            од областа на Пет индустријата и воведување на нови стандарди во оваа област со професионален
                            пристап.
                        </br>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-8">
                        <img src="{{ url_assets('/fitactive/images/za-nas-mast.png') }}" alt="">
                    </div>
                </div>

            </div>
        </div>

    @stop
