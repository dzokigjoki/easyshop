@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">{!! trans('naturatherapy/global.contact') !!}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content-wrapper oh">
        <section class="section-wrap contact pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mb-40">
                        <form method="POST" action="{{ $urlLang }}kontact">
                            {{ csrf_field() }}
                            <div class="contact-name">
                                <input name="name" id="name" type="text" placeholder="{!! trans('naturatherapy/global.name_first_last') !!}*">
                            </div>
                            <div class="contact-email">
                                <input name="email" id="email" type="email" placeholder="E-mail*">
                            </div>
                            <div class="contact-email">
                                <input name="phone" id="phone" type="text" placeholder="{!! trans('naturatherapy/global.phone_number') !!}*">
                            </div>
                            <div class="contact-subject">
                                <input name="subject" id="subject" type="text" placeholder="{!! trans('naturatherapy/global.title') !!}">
                            </div>
                            <textarea name="comment" id="comment" placeholder="{!! trans('naturatherapy/global.comment') !!}" rows="4"></textarea>
                            <input type="hidden" name="naturakontakt" id="naturakontakt">
                            <input type="submit" class="btn btn-lg btn-dark btn-submit" value="{!! trans('naturatherapy/global.send') !!}">
                        </form>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-5 mb-40">
                        <div class="contact-item">
                            <h6>{!! trans('naturatherapy/global.address') !!}</h6>
                            <address>
                                {!! trans('naturatherapy/global.street_number') !!}<br>
                            </address>
                        </div>
                        <div class="contact-item">
                            <h6>{!! trans('naturatherapy/global.information') !!}</h6>
                            <ul>
                                <li>
                                    <a href="mailto:contact@naturaks.com"><i
                                            class="fa fa-envelope"></i>@if (App::getLocale() != 'al') contact@naturatherapy.mk @else contact@naturaks.com  @endif</a>
                                </li>
                                <li><a href="tel:0038945956000"><i class="fa fa-phone"></i>@if (App::getLocale() != 'al')
                             +389 71 317 111
                            @else
                             +383 45 956 000
                            @endif</a></li>
                                {{-- <li><a href="tel:0038970230459"><i class="fa fa-phone"></i> +389 70 230 459</a></li> --}}
                            </ul>
                        </div>
                        <div class="contact-item">
                            <h6>{!! trans('naturatherapy/global.work_hours') !!}</h6>
                            <ul>
                                <li>{!! trans('naturatherapy/global.monday-friday') !!}: 08:00am - 08:00pm</li>
                                <li>{!! trans('naturatherapy/global.saturday') !!}: 10:00am - 06:00pm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2934.45912838345!2d21.156337815717205!3d42.651625024630924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sBulevardi%20D%C3%ABshmor%C3%ABt%20e%20Kombit%20K-P%20H-2%20N-1%2C%20Ulpian%C3%AB!5e0!3m2!1sen!2smk!4v1629278419918!5m2!1sen!2smk"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
@stop
