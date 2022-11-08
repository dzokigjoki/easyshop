@extends('clients.naturatherapyshop.layouts.default')
@section('content')


<style>
    ul{
        list-style-type: disc;
        padding-left: 17px;
    }
</style>
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">Најава</h1>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper pt-30 oh">
    <section class="section-wrap contact pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xxs-12 mb-20">
                    <form method="POST" action="{{route('auth.login.post')}}">
                        {{csrf_field()}}
                        @include('clients.'.config( 'app.client').'.partials.errors')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="email" id="email" type="email" placeholder="Е- пошта*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="password" id="password" type="password" placeholder="Лозинка*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a style="color: red;" href="{{ route('auth.email_password.get') }}">Заборавена лозинка?</a>
                            </div>
                        </div>
                        <div class="row pt-20">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-lg btn-dark btn-submit" value="Најава" id="register">
                            </div>
                        </div>

                    </form>
                </div> <!-- end col -->

                <div class="col-xs-4 col-xxs-12 already_registered">
                    <h4 class="mb-10">Нов корисник?</h4>
                    <p class="mb-10">Со регистрација ќе имате можност за побрзо купување, и можност да бидете во тек со новитетите и попустите
                        во Natura Therapy</p>

                    <p>Регистрирајте се и ќе можете:</p>
                    <ul>
                        <li>Побрзо да купувате</li>
                        <li>Да го следите статусот на вашите нарачки</li>
                        <li>Ќе имате преглед на претходно направените нарачки</li>
                    </ul>
                    <form class="pt-20" action="{{route('auth.register.get')}}">
                        <button class="btn btn-lg btn-dark">Регистрација</button>
                    </form>

                </div>
            </div>
        </div>
    </section> <!-- end contact -->
</div>
@stop