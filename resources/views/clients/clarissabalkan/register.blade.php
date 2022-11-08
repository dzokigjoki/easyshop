@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/account.css')}}" rel="stylesheet">
<style>
  .g-recaptcha div {
    margin: 0 auto !important;
  }
</style>
@stop
@section('content')
{{-- {!! htmlScriptTagJsApi() !!} --}}
<main class="bg_gray">
  <div class="container margin_30">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        @include('clients.'.config( 'app.client').'.partials.errors')
        <div class="box_account">
          <h3 class="mb-25 new_client">Регистрација</h3> <small class="float-right pt-2">* Задолжителни полиња</small>
          <form method="POST" action="{{route('auth.register.post')}}" class="type_2">
            {{csrf_field()}}
            <div class="form_container">
              <div class="private box">
                <div class="row no-gutters">
                  <div class="col-6 pr-1">
                    <div class="form-group">
                      <input type="text" required class="form-control" name="first_name" id="first_name" placeholder="Име*">
                    </div>
                  </div>
                  <div class="col-6 pl-1">
                    <div class="form-group">
                      <input type="text" required class="form-control" name="last_name" id="last_name" placeholder="Презиме*">
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <input type="email" required class="form-control" name="email" id="email" placeholder="Email*">
              </div>
              <div class="form-group">
                <input type="password" required class="form-control" name="password" id="password" value=""
                  placeholder="Лозинка*">
              </div>
              <div class="form-group">
                <input type="password" required class="form-control" name="password_confirmation"
                  id="password_confirmation" value="" placeholder="Потврди лозинка*">
              </div>
              <br>
              {{-- <div class="form-group"> --}}
                {{-- {!! htmlFormSnippet() !!} --}}
              {{-- </div> --}}
              <hr>
              <div class="form-group">
                <label class="container_check">Ги прифаќам <a href="#0">правилата и условите</a>
                  <input type="checkbox">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="text-center"><input type="submit" value="Регистрирај се" class="btn_1 full-width"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection