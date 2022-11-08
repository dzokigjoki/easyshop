@extends('clients.energy_point_peleti.layouts.default')
@section('content')
<style>
    .mt-35 {
        margin-top: 35px;
    }
</style>
<div class="heading-container">
    <div class="container heading-standar">
        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li><span><a href="/" class="home"><span>Почетна</span></a></span></li>
                <li><span>Регистрација</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container">
        <div class="row flex-centered">
            <div class="col-md-8 text-center main-wrap">
                <div class="main-content">
                    <div class="shop">
                        <h2 class="shop-account-heading">Регистрација</h2>
                        <div class="user-login-or"></div>
                        <form method="POST" action="{{route('auth.register.post')}}" class="login">
                            {{csrf_field()}}
                            <p class="mt-35 form-row form-row-wide">
                                <label>Име <span class="required">*</span></label>
                                <input required="" type="text" name="first_name" id="first_name" title="Име"
                                    autofocus="" value="{{old('first_name')}}" class="input-text" />
                                @if($errors->first('first_name'))
                                <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
                                @endif
                            </p>
                            <p class="mt-35 form-row form-row-wide">
                                <label>Презиме <span class="required">*</span></label>
                                <input required="" type="text" name="last_name" id="last_name" title="Име" autofocus=""
                                    value="{{old('last_name')}}" class="input-text" />
                                @if($errors->first('last_name'))
                                <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
                                @endif
                            </p>
                            <p class="mt-35 form-row form-row-wide">
                                <label>Е- пошта <span class="required">*</span></label>
                                <input type="text" class="input-text" name="email" value="" />
                            </p>
                            <p class="form-row form-row-wide">
                                <label>Лозинка <span class="required">*</span></label>
                                <input required="" type="password" name="password" id="password" title="Лозинка"
                                    class="input-text" />
                                @if($errors->first('password'))
                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                @endif
                            </p>
                            <p class="form-row form-row-wide">
                                <label>Потврди лозинка <span class="required">*</span></label>
                                <input required="" type="password" name="password_confirmation"
                                    id="password_confirmation" title="Потврди Лозинка" class="input-text">
                                @if($errors->first('password'))
                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                @endif
                            </p>
                            <p class="form-row">
                                <label class="inline form-flat-checkbox">
                                    <input name="rememberme" type="checkbox" value="forever" /><i></i>
                                    Ги прочитав и се согласувам со Политиката на приватност и Условите за купување
                                </label>
                                <br><br>
                                <input type="submit" class="button" name="login" value="Регистрирај се" />
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection