@extends('clients.hotspot.layouts.default')
<style>
  iframe.map_contact {
    border: 0;
    width: 100%;
    height: 370px;
  }

  .box_contacts i {
    color: black !important;
  }
</style>
@section('style')
<link href="{{url_assets('/hotspot/css/contact.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_white">
  <div class="row">
    <div class="col-lg-12 col-md-12 add_bottom_25">
      <iframe class="map_contact"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d265.9060988250547!2d21.418659961160092!3d41.99483426381547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13541449cd6d55ff%3A0x7e7a7d7ff908bdd0!2z0JzQuNGC0YDQvtC_0L7Qu9C40YIg0KLQtdC-0LTQvtGB0LjRmCDQk2_Qu9C-0LPQsNC90L7QsiA0NCwg0KHQutC-0L_RmNC1IDEwMDA!5e0!3m2!1smk!2smk!4v1616423248618!5m2!1smk!2smk"
        width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe>
    </div>
  </div>
  <div class="container margin_30">
    <div class="bg_white">
      <div class="container">
        <h4 class="pb-3">Контакт форма</h4>
        <div class="row">
          <div class="col-lg-12 col-md-12 add_bottom_25">
            <form method="post" action="{{route('kontakt-forma')}}">
              {{ csrf_field() }}
              <div class="form-group">
                <input class="form-control" type="text" name="name" id="name" placeholder="Име и Презиме *"
                  data-form-name required />
              </div>
              <div class="form-group">
                <input class="form-control" type="email" data-form-email name="email" id="email"
                  placeholder="Е- пошта *" required />
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
        </div>
      </div>
    </div>
  </div>
</main>
@stop