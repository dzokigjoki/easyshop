@extends('clients.dobra_voda.layouts.default')
@section('content')
<div class="login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 offset-lg-3">
                <form method="POST" action="{{route('auth.register.post')}}">
                    {{csrf_field()}}
                    <div class="login-form">
                        <h3 class="login-title text-center">Регистрација</h3>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                                <label>Име</label>
                                <input type="text" name="first_name" id="first_name" placeholder="Внесете го вашето име">
                                @if($errors->first('first_name'))
                                <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label>Презиме</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Внесете го вашето презиме">
                                @if($errors->first('last_name'))
                                <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label>Е-Пошта</label>
                                <input type="email" name="email" id="email" placeholder="Внесете ја вашата е-пошта">
                                @if($errors->first('email'))
                                <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Лозинка</label>
                                <input type="password" name="password" id="password" placeholder="Внесете ја вашата лозинка">
                                @if($errors->first('password'))
                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Потврди лозинка</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Потврдете ја вашата лозинка">
                            </div>
                            <div class="col-12">
                                <button class="register_btn">Регистрирај се</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop