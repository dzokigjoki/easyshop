@extends('clients.ibutik.layouts.default')

@section('content')
<div class="container no-header-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-lg">
                        <div class="row" data-gutter="60">
                            @include('clients.'.config( 'app.client').'.partials.errors')
                            <div class="col-md-6">
                                <h3 class="widget-title">Најава</h3>
                                <form method="POST" action="{{route('auth.login.post')}}" class="login-form cf-style-1" role="form">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email">Е-пошта</label>
                                        <input type="email" name="email" id="email" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Лозинка</label>
                                        <input type="password" name="password" id="password" class="form-control"/>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" />Запамети ме</label>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Најава" />
                                </form>
                                <br /><a href="#">Заборавена лозинка?</a>
                            </div>
                            <div class="col-md-6">
                                <h3 class="widget-title">Нов корисник?</h3>
                                <p>Со регистрација ќе имате можност за побрзо купување, и можност да бидете во тек со новитетите и попустите во iButik</p>

                                <p>Регистрирајте се и ќе можете:</p>
                                <ul>
                                    <li>Побрзо да купувате</li>
                                    <li>Да го следите статусот вашите нарачки</li>
                                    <li>Ќе имате преглед на претходно направените нарачки</li>
                                </ul>
                                <br/>
                                <a href="{{route('auth.register.get')}}" class="btn btn-primary">Регистрирај се</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gap gap-small"></div>

@endsection