@extends('clients.herline.layouts.default')
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
        <li><span>Најава</span></li>
      </ul>
    </div>
  </div>
</div>
<div class="content-container">
  <div class="container">
    <div class="row flex-centered">
      <div class="col-md-8 text-center main-wrap">
        @include('clients.'.config( 'app.client').'.partials.errors')
        <div class="main-content">
          <div class="shop">
            <h2 class="shop-account-heading">Најава</h2>
            <div class="user-login-or"></div>
            <form method="POST" action="{{route('auth.login.post')}}" class="login" role="form">
              {{csrf_field()}}
              <p class="mt-35 form-row form-row-wide">
                <label>Е- пошта <span class="required">*</span></label>
                <input type="text" class="input-text" name="email" value="" />
              </p>
              <p class="form-row form-row-wide">
                <label>Лозинка <span class="required">*</span></label>
                <input class="input-text" type="password" name="password" />
              </p>
              <p class="form-row">
                <label class="inline form-flat-checkbox">
                  <input name="rememberme" type="checkbox" value="forever" /><i></i>Запамети ме
                </label>
                <br><br>
                <input type="submit" class="button" name="login" value="Најава" />
              </p>
              <p class="lost_password">
                <a href="{{ route('auth.email_password.get') }}">Ја заборавивте вашата лозинка?</a>
              </p>
              <p class="lost_password">
                Нов корисник?
                <a href="{{route('auth.register.get')}}" id="register"><strong>Регистрирај се</strong></a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection