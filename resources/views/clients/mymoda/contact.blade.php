@extends('clients.mymoda.layouts.default')
@section('content')

<style>
  .map-responsive {
    overflow: hidden;
    padding-bottom: 96.25%;
    position: relative;
    height: 0;
  }

  .map-responsive iframe {
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    position: absolute;
  }

  .form-control {
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
  }
</style>
<div class="ps-breadcrumb ps-breadcrumb--2 hidden-xs">
  <div class="ps-container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
        <ol class="breadcrumb">
          <li><a href="/">Почетна</a></li>
          <li><a>Контакт</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="ps-contact">
  <div class="ps-contact__left">
    <div class="map-responsive">
      <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%D0%9C%D0%B0%D0%BA%D0%B5%D0%B4%D0%BE%D0%BD%D0%B8%D1%98%D0%B0%2058%2C%20%D0%A1%D0%BA%D0%BE%D0%BF%D1%98%D0%B5%201000&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0"
        scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
  </div>
  <div class="ps-contact__right pt-30" data-mh="contact-1">
    <div class="ps-contact__info">
      <h3 class="ps-heading">Контактирајте нé</h3>
      <p>Доколку имате било какви прашања, Ве молиме внесете ги овде Вашите контакт информации заедно со Вашето прашање
      </p>
      <div class="ps-contact__detail">
        <p><span>Адреса</span>Ул. Македонија Бр.58 ВЛ.001/КАТ ПР-БР.0000 - Центар</p>
        <p><span>Телефон</span><a href="tel:0038971683682">071/683-682</a></p>
        <p><span>Email</span><a href="mailto:info@mymoda.mk">info@mymoda.mk</a></p>
      </div>
      <form class="ps-form--contact" action="/contact" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            <div class="form-group">
              <input class="form-control" type="text" name="name" id="name" placeholder="Име и Презиме" required />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
            <div class="form-group">
              <input class="form-control" type="email" name="email" id="email" placeholder="Е- пошта" required />
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" id="message" cols="30" rows="8" placeholder="Напишете Порака..."
            required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="ps-btn ps-btn--fullwidth ps-btn--black"
            data-contact-message-send>Испрати</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop