@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/account.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
  <div class="container margin_30">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        @include('clients.'.config( 'app.client').'.partials.errors')
        <div class="box_account">
          <h3 class="mb-25 client">Најава</h3> <small class="float-right pt-2">Нов корисник? <a
              href="/register"><strong>Регистрирај се</strong></a></small>
          <form method="POST" action="{{route('auth.login.post')}}" class="login-form cf-style-1" role="form">
            {{csrf_field()}}
            <div class="form_container">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Е- пошта*">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" value=""
                  placeholder="Лозинка*">
              </div>
              <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                  <label class="container_check">Запамети ме
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="float-right"><a href="{{ route('auth.email_password.get') }}">Заборавена лозинка?</a></div>
              </div>
              <div class="float-right form-group">
                <a href="{{ url('/redirect/google') }}" style="margin-right:15px;"
                  class="border-radius-20 btn btn-primary"><img width="30" data-toggle="tooltip" data-placement="left"
                    title="Најава преку Google" src="{{ url_assets('/clarissabalkan/img/google_icon.png')}}" alt=""></a>
                <a href="{{ url('/redirect/facebook') }}" style="margin-right:15px;"
                  class="border-radius-20 btn btn-primary">
                  <img width="30" data-toggle="tooltip" data-placement="left" title="Најава преку Facebook"
                    src="{{ url_assets('/clarissabalkan/img/facebook_icon.svg')}}" alt=""></a>
              </div>
              <div class="text-center"><input type="submit" value="Најави се" class="btn_1 full-width"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection