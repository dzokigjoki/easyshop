@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/contact.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">

  <div class="container margin_60">
    <div class="main_title">
      <h2>Контактирајте нé</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="box_contacts">
          <i class="ti-support"></i>
          <h2>Е- пошта</h2>
          <a href="mailto:info@clarissabalkan.com">info@clarissabalkan.com</a>
          <small></small>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="box_contacts">
          <i class="ti-map-alt"></i>
          <h2>Адреса</h2>
          <div>Clarissa Balkan ДОО</div>
          <small></small>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="box_contacts">
          <i class="ti-package"></i>
          <h2>Телефон</h2>
          <a href="tel:0038923173058">+389 2 3173 058</a>
          <small></small>
        </div>
      </div>
    </div>
  </div>
  <div class="bg_white">
    <div class="container margin_60_35">
      <h4 class="pb-3">Контакт форма</h4>
      <div class="row">
        <div class="col-lg-4 col-md-6 add_bottom_25">
          <form method="post" action="/contact">
            {{ csrf_field() }}
            <div class="form-group">
              <input class="form-control" type="text" name="name" id="name" placeholder="Име и Презиме *" data-form-name
                required />
            </div>
            <div class="form-group">
              <input class="form-control" type="email" data-form-email name="email" id="email" placeholder="Е- пошта *"
                required />
            </div>
            <div class="form-group">
              <input class="form-control" type="text" data-form-phone name="phone" id="phone" placeholder="Телефон *"
                required>
            </div>
            <div class="form-group">
              <textarea class="form-control" style="height: 150px;" name="message" data-form-message required
                placeholder="Порака *"></textarea>
            </div>
            <div class="form-group">
              <input class="btn_1 full-width" type="submit" value="Испрати">
            </div>
          </form>
        </div>
        <div class="col-lg-8 col-md-6 add_bottom_25">
          <iframe class="map_contact"
            src=""
            width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>
</main>
@stop