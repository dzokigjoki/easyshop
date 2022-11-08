@extends('clients.dobra_voda.layouts.default')
@section('content')


<!-- Begin Login Register Area -->
<div class="login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                @include('clients.'.config( 'app.client').'.partials.errors')
                <form method="POST" action="{{route('auth.login.post')}}">
                {{csrf_field()}}
                    <div class="login-form">
                        <h3 class="login-title text-center">Најава</h3>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label>Е-Пошта</label>
                                <input type="email" name="email" id="email" placeholder="Внесете ја вашата е-пошта">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Лозинка</label>
                                <input type="password" name="password" id="password" placeholder="Внесете ја вашата лозинка">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Запомни ме</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="forgotton-password_info">
                                    <a href="{{ route('auth.email_password.get') }}">Заборавена лозинка?</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="login_btn">Најава</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 login-form">
                <h3 class="widget-title pb-30">Зошто да се регистрирате?</h3>
                <p>Со регистрација ќе можете: </p>
                <ul class="ul_register">
                    <li>Побрзо да купувате</li>
                    <li>Ќе имате преглед на претходно направените нарачки</li>
                </ul>
                <br />
                <a href="{{route('auth.register.get')}}" class="btn btn_register" id="register">Регистрирај се</a>
            </div>
        </div>
    </div>
</div>
@stop