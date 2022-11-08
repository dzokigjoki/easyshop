@extends('clients.sofu.layouts.default')
@section('content')
<section class="page-banner">
    <h4 class="page-title">Регистрација</h4>
</section>
<section>
    <div class="section-iconboxes-firts container">
        <div class="row">
            <div class="col-md-12">
                <div class="myaccount">
                    <div class="ts-login-form text-center">
                        <div class="inner-login">
                            <form method="POST" class="login-form" action="{{route('auth.register.post')}}">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-md-6 p-0">
                                        <label for="username">Име * </label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" id="username">
                                        @if($errors->first('first_name'))
                                        <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 p-0">
                                        <label for="username">Презиме * </label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" id="username">
                                        @if($errors->first('last_name'))
                                        <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <label for="username">Е-Пошта * </label>
                                        <input type="email" style="background: white; border: 1px solid #ededed;" name="email" id="email" class="form-control" id="username">
                                        @if($errors->first('email'))
                                        <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 p-0">
                                        <label for="password">Лозинка * </label>
                                        <input type="password" name="password" id="password" class="form-control" id="password">
                                        @if($errors->first('email'))
                                        <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 p-0">
                                        <label for="password">Потврди лозинка * </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="password">
                                    </div>
                                    <button type="submit">Регистрација</button>
                                    <div class="bottom-login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop