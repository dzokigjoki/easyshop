@extends('clients.torti.layouts.default')
@section('content')
<div class="contact-section container-fluid no-padding">
  <div class="container">
    <div class="mt-35 section-header">
      <h3>Контактирајте нé</h3>
      <h5>Доколку имате било какви прашања, внесете ги тука
      </h5>
      <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
    </div>
    <div class="contact-us col-md-7">
      <form action="/contact" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input class="form-control" type="text" name="name" id="name" placeholder="Име и Презиме" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="email" name="email" id="email" placeholder="Е- пошта" required />
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" id="message" cols="30" rows="8" placeholder="Напишете Порака..."
            required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" data-contact-message-send>Испрати</button>
        </div>
        <div id="alert-msg" class="alert-msg"></div>
      </form>
    </div>
    <div class="map-responsive col-md-5">
      <iframe width="100%" height="440" id="gmap_canvas"
        src="https://maps.google.com/maps?q=%D0%9C%D0%B0%D0%BA%D0%B5%D0%B4%D0%BE%D0%BD%D0%B8%D1%98%D0%B0%2058%2C%20%D0%A1%D0%BA%D0%BE%D0%BF%D1%98%D0%B5%201000&t=&z=19&ie=UTF8&iwloc=&output=embed"
        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
  </div>
</div>
@stop