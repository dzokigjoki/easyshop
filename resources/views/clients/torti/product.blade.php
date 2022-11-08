@extends('clients.torti.layouts.default')
@section('content')

@if($product->custom == 1)
<link rel="stylesheet" href="/assets/torti_plugin/js/fancy-product-designer/css/FancyProductDesigner-all.min.css">
@endif
<?php $cake_form = Route::current()->parameters()['slug'] ?>
<style>
  #design-plugin,
  #save-design {
    display: none;
  }



  .gallery-image {
    width: 100px;
    display: inline;
    padding-right: 15px;
    padding-top: 15px;
    float: left
  }



  @media(min-width:991px) {
    .custom-img-position {
      position: absolute;
      top: -10px;
      right: -15px;
      z-index: 500
    }
  }

  @media(max-width:991px) {
    .custom-img-position {
      position: absolute;
      top: -7px;
      right: 2px;
      z-index: 500
    }
  }

  @media(max-width: 400px) {
    .price-style {
      width: 100% !important;
      font-size: 14px !important;
    }
  }

  #cake {
    width: 100% !important;
  }

  #wizard {
    /* margin-top: 90px; */
  }

  .stepwizard-step p {
    margin-top: 10px;
  }

  .stepwizard-row {
    display: table-row;
  }

  .stepwizard {
    display: table;
    width: 100%;
    position: relative;
  }

  .stepwizard-step {
    width: 16.6666666667%;
  }

  .stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
  }

  .stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
  }

  #bottom_decoration,
  #top_decoration {
    margin-left: 60px;
  }

  .stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
  }

  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
  }

  #main-container {
    padding-bottom: 50px;
  }

  .btn-primary {
    background-color: #C87D81 !important;
    border-color: #C87D81 !important;
  }

  .btn-primary:hover {
    background-color: #b44b50 !important;
    border-color: #b44b50 !important;
  }


  label {
    font-family: 'Montserrat';
    font-weight: 400;
  }

  button {
    font-family: 'Montserrat';
  }

  p,
  h3 {
    font-family: 'Montserrat';
  }

  [type=radio] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
  }

  [type=radio]+img {
    cursor: pointer;
    border: 2px solid rgba(109, 110, 113, .5);
  }

  [type=radio]:hover+img {
    cursor: pointer;
    border: 2px solid #6d6e71;
  }

  [type=radio]:checked+img {
    border: 2px solid #000000;
  }

  [type=radio]+svg {
    cursor: pointer;
    border: 2px solid rgba(109, 110, 113, .5);
  }

  [type=radio]:hover+svg {
    cursor: pointer;
    border: 2px solid #6d6e71;
  }

  [type=radio]:checked+svg {
    border: 2px solid #000000;
  }

  [type=radio]+div {
    cursor: pointer;
    border: 2px solid rgba(109, 110, 113, .5);
  }

  [type=radio]:hover+div {
    cursor: pointer;
    border: 2px solid #6d6e71;
  }

  #left-part {
    padding-bottom: 15px;
  }

  [type=radio]:checked+div {
    border: 2px solid #000000;
  }

  .button.btn.btn-primary.nextBtn.btn-lg.pull-right {
    font-family: 'Montserrat';
  }
</style>

<main>

  <input type="hidden" id="product-id" value="{{$product->id}}">

  <div class="gallery-single-section container-fluid">
    <div class="container" id="main-container">
      <div class="section-header">
      </div>
      @if($product->custom == 1)
      <h3 class="title">{{ $product->title }} форма</h3>
      <div class="pb-35 col-lg-12">
        <div class="stepwizard">
          <div class="justify-centered stepwizard-row setup-panel">
            <div class="stepwizard-step">
              <a href="#step-3" type="button" class="btn btn-primary btn-circle">1</a>
              <p class="hidden-xs">Состав</p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-1" type="button" class="btn btn-default btn-circle">2</a>
              <p class="hidden-xs">Големина</p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-2" type="button" class="btn btn-default btn-circle">3</a>
              <p class="hidden-xs">Декорација</p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
              <p class="hidden-xs">Долна рамка</p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-5" type="button" class="btn btn-default btn-circle">5</a>
              <p class="hidden-xs">Горна рамка</p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-6" type="button" class="btn btn-default btn-circle">6</a>
              <p class="hidden-xs">Print слика/текст </p>
            </div>
            <div class="stepwizard-step">
              <a href="#step-7" type="button" class="btn btn-default btn-circle">7</a>
              <p class="hidden-xs">Коментар</p>
            </div>
          </div>
        </div>
      </div>
      <div class="height-tabs col-lg-12">
        <div class="row">
          <div class="col-md-7 col-sm-7 col-xs-12" id="draw-cake">
            @if($cake_form == 'srce')
            <div id="fill" style="position: absolute; top: -7px; right: 10px; z-index: 600 !important;">
              @else
              <div id="fill" style="position: absolute; top: -10px; right:5px; z-index: 400">
                @endif
                <img style="margin-top: 2px; margin-left: 4px;" src="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/choco-malina.png') }}" />
              </div>
              <div id="cake" style="position: relative; z-index: 500">
                <img src="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/brown.png') }}" alt="">
              </div>
              <div id="bottom" class="custom-img-position" style="">
              </div>
              <div id="top" style="position: absolute; top: 0px; right: 30px; z-index: 500">
              </div>
              <div class="price-style mb-35" class="price">
                Цена:
                <span id="price_container">800 мкд.</span>
              </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <div id="wizard">
                <form role="form" action="" method="post">
                  <input type="hidden" name="price" id="current_price" value="800">
                  <div class="row setup-content" id="step-1">
                    <div class="col-md-12">
                      <h3 class="mt-0">Големина</h3>
                      <div class="mt-35 mb-35 form-group">
                        <label class="option-torti">
                          <input type="radio" name="size" value="50">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/50.png') }}">
                          <span class="option-text">Парчиња</span>
                        </label>
                        <label class="option-torti">
                          <input type="radio" name="size" value="40">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/40.png') }}">
                          <span class="option-text">Парчиња</span>
                        </label>
                        <label class="option-torti">
                          <input type="radio" name="size" value="30">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/30.png') }}">
                          <span class="option-text">Парчиња</span>
                        </label>
                        <label class="option-torti">
                          <input type="radio" name="size" checked value="20">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/20.png') }}">
                          <span class="option-text">Парчиња</span>
                        </label>
                      </div>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <div class="row setup-content" id="step-2">
                    <div class="col-md-12">
                      <h3 class="mt-0">Декорација</h3>
                      <div class="mt-35 mb-35 form-group">
                        <label class="option-torti flex-centered">
                          <input type="radio" name="decoration_type" value="shlag">
                          <svg class="option-image" style="border-radius: 50%" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.376 10.202c.298.424.624.937.624 1.531C16 14.046 12.794 16 9 16s-7-1.954-7-4.267c0-.577.286-1.094.597-1.535a5.287 5.287 0 0 1 .032-1.03c.374-3.077 2.985-4.944 4.507-5.784 1.205-.658 1.867-1.02 3.657-1.374a.502.502 0 0 1 .452.843c-.186.188-.658.793-.606 1.336.036.361.236.597.647.763 1.417.6 3.823 2.343 4.068 5.108.003.021.015.04.015.062l-.001.024c.001.014.005.025.006.04l.002.016zM9 15c3.434 0 6-1.725 6-3.267 0-.04-.015-.082-.022-.123-.265.415-.608.67-.863.776a.5.5 0 0 1-.387-.922c.006-.003.637-.284.638-1.275-.179-2.318-2.252-3.8-3.462-4.313-.948-.382-1.21-1.076-1.26-1.59a2.215 2.215 0 0 1 .156-1.01c-.831.246-1.361.536-2.183.985-1.353.746-3.675 2.393-3.995 5.027-.036.297-.039.56-.022.801.028.245.201.58.287.671a.5.5 0 0 1-.729.685c-.023-.024-.046-.062-.069-.09a1.05 1.05 0 0 0-.089.378C3 13.443 5.86 15 9 15zm-.42-2.26a.5.5 0 0 1-.014 1h-.014c-1.597-.043-2.36-.194-3.472-.955a.5.5 0 1 1 .565-.825c.876.6 1.397.739 2.934.78z" fill="#000" fill-rule="evenodd"></path>
                          </svg>
                          <span class="option-text">Шлаг</span>
                        </label>
                        <label class="option-torti flex-centered">
                          <input type="radio" name="decoration_type" value="fondan">
                          <svg class="option-image" style="border-radius: 50%" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.902 7.11a3.41 3.41 0 0 1-.231 2.271c.071 1.571-.552 3.177-1.731 4.428A7.03 7.03 0 0 1 8.837 16H8.75c-1.975-.024-3.743-.739-4.979-2.011a5.592 5.592 0 0 1-1.603-3.845A1.362 1.362 0 0 1 2 9.474c0-.474.279-.861.756-1.099-.388-.426-.466-.846-.44-1.17.102-1.254 1.771-2.116 2.64-2.396l.297-.095c.974-.309 1.676-.532 2.129-1.172-.025-.012-.192-.163-.308-.23a.502.502 0 0 1-.247-.481.503.503 0 0 1 .336-.424c1.248-.428 3.17-.67 4.483.059.67.373 1.119.972 1.295 1.734.088.387.043.784-.13 1.179.618-.055 1.274.01 1.817.246.669.292 1.109.806 1.274 1.485zm-2.69 6.012c.735-.779 1.212-1.717 1.39-2.678-1.386.673-4.086 1.471-5.94 1.479h-.064c-2.066 0-4.099-.359-5.339-.926a4.675 4.675 0 0 0 1.228 2.295c1.05 1.08 2.569 1.687 4.276 1.708 1.672.058 3.303-.664 4.449-1.878zM3.05 9.369c-.042.04-.05.067-.05.105 0 .23.112.329.447.509 1.056.57 3.119.928 5.211.94 1.881-.008 4.937-.975 5.9-1.586.141-.199.621-.966.373-1.992-.091-.373-.321-.636-.703-.803-.748-.327-1.902-.183-2.509.157-.016.009-.035.01-.052.017-.651.45-1.556.722-2.483.722a4.82 4.82 0 0 1-.624-.041.5.5 0 1 1 .131-.991c1.158.151 2.209-.241 2.671-.718.336-.328.709-.808.604-1.264a1.581 1.581 0 0 0-.806-1.084c-.755-.419-1.891-.412-2.894-.2.038.076.069.157.088.244a.91.91 0 0 1-.156.737c-.647.913-1.616 1.22-2.642 1.546l-.293.094c-.887.286-1.906.983-1.949 1.525-.032.379.524.724.858.895v.001a.452.452 0 0 1 .267.367.501.501 0 0 1-.576.57c-.164.003-.629.071-.813.25z" fill="#000" fill-rule="evenodd"></path>
                          </svg>
                          <span class="option-text">Фондан</span>
                        </label>
                        <h4 class="mt-15">Боја</h4>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" id="default" name="color" checked value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/brown.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #6E4235;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/pink.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #CD5587;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/black.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #21201C;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/blue.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #244A9F;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/bright_green.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #86A23C;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/green.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #2D7121;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/grey.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #D2CBBC;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/light_pink.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #D6BDB5;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/light_blue.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #A9F1FC;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/orange.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #FF691A;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/purple.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #774BAE;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/red.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #9B2B33;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/teal.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #348F84;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/white.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #D8D8D2;"></div>
                        </label>
                        <label class="bottom_top_decoration_values">
                          <input type="radio" name="color" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/yellow.png') }}">
                          <div class="color-images" style="border-radius: 50%; background-color: #DABB17;"></div>
                        </label>
                      </div>
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="fa fa-arrow-left"></i></button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <div class="row setup-content" id="step-3">
                    <div class="col-md-12">
                      <h3 class="mt-0">Состав</h3>
                      <div class="mt-35 mb-35 form-group">
                        <label class="option-torti">
                          <input type="radio" name="fill" value="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/chocolate.png') }}">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/fill/chocolate.png') }}">
                          <span class="option-text">Чоколадо</span>
                        </label>
                        <label class="option-torti">
                          <input type="radio" name="fill" value="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/choco-malina.png') }}">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/fill/choco-malina.png') }}">
                          <span class="option-text">Чоко- Малина</span>
                        </label>



                        <!-- img replace -->
                        <label class="option-torti">
                          <input type="radio" name="fill" value="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/fruity.png') }}">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/fill/fruity.png') }}">
                          <span class="option-text">Фрути</span>
                        </label>


                        <label class="option-torti">
                          <input type="radio" name="fill" value="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/oreo.png') }}">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/fill/oreo.png') }}">
                          <span class="option-text">Орео</span>
                        </label>
                        <label class="option-torti">
                          <input type="radio" name="fill" value="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/nougat.png') }}">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/fill/nougat.png') }}">
                          <span class="option-text">Нугат</span>
                        </label>
                        <label class="option-torti">
                          <input type="radio" name="fill" value="{{ url_assets('/torti/images/decorations/fill/'.$cake_form.'/rafaello.png') }}">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/fill/rafaello.png') }}">
                          <span class="option-text">Кокос (Рафаело)</span>
                        </label>
                      </div>
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="fa fa-arrow-left"></i></button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <div class="row setup-content" id="step-4">
                    <div class="col-md-12">
                      <h3 class="mt-0">Долна рамка</h3>
                      <div class="mt-35 mb-35 form-group">
                        <label class="option-torti flex-centered">
                          <input type="radio" name="bottom_decoration" value="no_selection">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/no_selection.png') }}">
                          <span class="option-text">Без Рамка</span>
                        </label>
                        <label class="option-torti flex-centered">
                          <input type="radio" name="bottom_decoration" value="selection">
                          <svg class="option-image" style="border-radius: 50%" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 10l-1-1a1 1 0 0 1-2 0 1 1 0 0 1-2 0 1 1 0 0 1-2 0l-1 1v1h8zm-9 2h10v3H4z" fill="none"></path>
                            <path d="M8 5h1V3v2h1c1-1-1-3-1-3-2 2-1 3-1 3zm8 10h-1v-3l-1-1V9l-1-1h-3V6H9v2H5L4 9v2l-1 1v3H2v1h14v-1zM5 10l1-1a1 1 0 0 0 2 0 1 1 0 0 0 2 0 1 1 0 0 0 2 0l1 1v1H5zm9 5H4v-3h10z">
                            </path>
                          </svg>
                          <span class="option-text">Со Декорација</span>
                        </label>
                        <div id="bottom_decoration">
                          <h4>Дизајн</h4>
                          <label class="inline">
                            <input type="radio" name="bottom_decoration_design" value="ball_design">
                            <img width="70" height="auto" src="{{ url_assets('/torti/images/decorations/radio-buttons/ball-design.png') }}">
                          </label>
                          <label class="inline">
                            <input type="radio" name="bottom_decoration_design" value="flower_design">
                            <img width="70" height="auto" src="{{ url_assets('/torti/images/decorations/radio-buttons/flower-design.png') }}">
                          </label>
                          <br>
                          <h4>Боја</h4>

                          {{-- TIP 1  --}}
                          <div id="flower_bottom_decoration">
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" checked value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/brown.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #6E4235;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #CD5587;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/black.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #21201C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #244A9F;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/bright_green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #86A23C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #2D7121;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/grey.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D2CBBC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/light_pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D6BDB5;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/light_blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #A9F1FC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/orange.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #FF691A;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/purple.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #774BAE;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/red.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #9B2B33;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/teal.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #348F84;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/white.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D8D8D2;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/cvet/'.$cake_form.'/yellow.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #DABB17;"></div>
                            </label>
                          </div>

                          {{-- TIP 2  --}}
                          <div id="ball_bottom_decoration">
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" checked value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/brown.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #6E4235;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #CD5587;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/black.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #21201C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #244A9F;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/bright_green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #86A23C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #2D7121;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/grey.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D2CBBC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/light_pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D6BDB5;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/light_blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #A9F1FC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/orange.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #FF691A;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/purple.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #774BAE;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/red.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #9B2B33;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/teal.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #348F84;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/white.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D8D8D2;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="bottom_decoration_color" value="{{ url_assets('/torti/images/decorations/bottom/topka/'.$cake_form.'/yellow.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #DABB17;"></div>
                            </label>
                          </div>

                        </div>
                      </div>
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">
                        <i class="fa fa-arrow-left"></i></button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"><i class="fa fa-arrow-right"></i>
                      </button>
                    </div>
                  </div>
                  <div class="row setup-content" id="step-5">
                    <div class="col-md-12">
                      <h3 class="mt-0">Горна рамка</h3>
                      <div class="mt-35 mb-35 form-group">
                        <label class="option-torti flex-centered">
                          <input type="radio" name="top_decoration" value="no_selection">
                          <img class="option-image" style="border-radius: 50%" src="{{ url_assets('/torti/images/decorations/radio-buttons/no_selection.png') }}">
                          <span class="option-text">Без Рамка</span>
                        </label>
                        <label class="option-torti flex-centered">
                          <input type="radio" name="top_decoration" value="selection">
                          <svg class="option-image" style="border-radius: 50%" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 10l-1-1a1 1 0 0 1-2 0 1 1 0 0 1-2 0 1 1 0 0 1-2 0l-1 1v1h8zm-9 2h10v3H4z" fill="none"></path>
                            <path d="M8 5h1V3v2h1c1-1-1-3-1-3-2 2-1 3-1 3zm8 10h-1v-3l-1-1V9l-1-1h-3V6H9v2H5L4 9v2l-1 1v3H2v1h14v-1zM5 10l1-1a1 1 0 0 0 2 0 1 1 0 0 0 2 0 1 1 0 0 0 2 0l1 1v1H5zm9 5H4v-3h10z">
                            </path>
                          </svg>
                          <span class="option-text">Со Декорација</span>
                        </label>
                        <div id="top_decoration">
                          <h4>Дизајн</h4>
                          <label class="inline">
                            <input type="radio" name="top_decoration_design" value="ball_design">
                            <img width="70" height="auto" src="{{ url_assets('/torti/images/decorations/radio-buttons/ball-design.png') }}">
                          </label>
                          <label class="inline">
                            <input type="radio" name="top_decoration_design" value="flower_design">
                            <img width="70" height="auto" src="{{ url_assets('/torti/images/decorations/radio-buttons/flower-design.png') }}">
                          </label>
                          <br>
                          <h4>Боја</h4>

                          {{-- TIP 1  --}}
                          <div id="flower_top_decoration">
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" checked value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/brown.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #6E4235;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #CD5587;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/black.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #21201C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #244A9F;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/bright_green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #86A23C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #2D7121;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/grey.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D2CBBC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/light_pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D6BDB5;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/light_blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #A9F1FC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/orange.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #FF691A;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/purple.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #774BAE;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/red.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #9B2B33;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/teal.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #348F84;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/white.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D8D8D2;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/cvet/'.$cake_form.'/yellow.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #DABB17;"></div>
                            </label>
                          </div>

                          {{-- TIP 2  --}}
                          <div id="ball_top_decoration">
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" checked value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/brown.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #6E4235;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #CD5587;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/black.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #21201C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #244A9F;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/bright_green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #86A23C;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/green.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #2D7121;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/grey.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D2CBBC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/light_pink.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D6BDB5;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/light_blue.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #A9F1FC;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/orange.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #FF691A;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/purple.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #774BAE;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/red.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #9B2B33;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/teal.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #348F84;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/white.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #D8D8D2;"></div>
                            </label>
                            <label class="bottom_top_decoration_values">
                              <input type="radio" name="top_decoration_color" value="{{ url_assets('/torti/images/decorations/top/topka/'.$cake_form.'/yellow.png') }}">
                              <div class="color-images" style="border-radius: 50%; background-color: #DABB17;"></div>
                            </label>
                          </div>

                        </div>
                      </div>
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">
                        <i class="fa fa-arrow-left"></i></button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"><i class="fa fa-arrow-right"></i>
                      </button>
                    </div>
                  </div>
                  <div class="row setup-content" id="step-6">
                    <div class="col-md-12">
                      <h3 class="mt-0 mb-0">Вашата слика и натпис</h3>
                      <br>

                      <button id="show-design" class="btn btn-primary btn-lg" type="button">Додади слика и
                        натпис</button>
                      <br><br>
                      <div id="design-plugin" class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left">

                      </div>
                      <br>
                      <button id="save-design" class="btn btn-primary btn-lg" type="button">Зачувај дизајн</button>
                      <br>

                      <div id="plugin-design-success"></div>
                      <br>
                      <input type="hidden" id="plugin-design-filename">
                      {{-- <span style="color:gray">Специјални барања</span>
                      <textarea name="comment" cols="20" id="message" rows="10" class="mt-15 form-control"
                        placeholder="Оставете коментар..."></textarea>
                      <button class="mt-15 btn btn-primary prevBtn btn-lg pull-left" type="button">
                        <i class="fa fa-arrow-left"></i></button>
                      <button class="mt-15 btn btn-primary btn-lg pull-right" data-cake-design-add-to-cart=""
                        type="submit" value="{{ $product->id }}" data-design="">Нарачај</button> --}}
                      <button class="btn btn-primary prevBtn btn-lg pull-left" type="button"><i class="fa fa-arrow-left"></i></button>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"><i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>

                  <div class="row setup-content" id="step-7">
                    <div class="col-md-12">
                      <h3 class="mt-0 mb-0">Ваш коментар</h3>
                      <span style="color:gray">Специјални барања</span>
                      <textarea name="comment" cols="20" id="message" rows="10" class="mt-15 form-control" placeholder="Оставете коментар..."></textarea>
                      <button class="mt-15 btn btn-primary prevBtn btn-lg pull-left" type="button">
                        <i class="fa fa-arrow-left"></i></button>
                      <button class="mt-15 btn btn-primary btn-lg pull-right" data-cake-design-add-to-cart="" id="add-to-cart" type="submit" value="{{ $product->id }}" data-design="">Нарачај</button>
                    </div>
                  </div>
              </div>
              </form>
            </div>
            <input type="hidden" id="default-cake" value="{{ url_assets('/torti/images/decorations/shlag/'.$cake_form.'/brown.png') }}">
          </div>
        </div>
      </div>
      @else
      <div class="col-md-7 col-sm-7 col-xs-7" id="left-part">
        <img id="main-image" src="{{$product->image}}" alt="gallery-single">
        @if(count($product->images) > 0)
        <div class="item"><img name="gallery" class="gallery-image" src="{{$product->image}}" alt="">
        </div>
        @foreach($product->images as $img)
        <div class="item"><img name="gallery" class="gallery-image" src=" {{ \ImagesHelper::getProductImage($img->filename, $product->id, 'md_') }}" alt="">
        </div>
        @endforeach
        @endif
      </div>
      <div class="col-md-5 col-sm-5 col-xs-5">
        <div class="gallery-single-content">
          <h3>{{ $product->title }}</h3>
          @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
          <?php
          $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
          ?>

          <input type="hidden" id="price-input" value="{{$discount}}">
          <span style="margin-bottom: 0px !important" class="price">
            <span class="ammount" id="main-price">
              {{$discount}}
              МКД
            </span>
            <del class="price">
              {{number_format($product->price, 0, ',', '.')}} МКД
            </del>
          </span>
          @else
          <input type="hidden" id="price-input" value="{{$product->price}}">
          <span style="margin-bottom: 0px !important" class="ps-product__price" id="main-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
          @endif
          <p>{!! $product->description !!}</p>
          <?php $variations = $product->variationValuesAndIds()->groupBy('name');
          ?>
          @if(!empty($variations) && count($variations) > 0)

          @foreach($variations as $key => $value)
          <h5 class="mt-30">{{ $key }}</h5>
          <select data-product-variation class="form-control variation-select" name="variations[]" @if($key=='Големина' ) id="size" @endif>
            @foreach($value as $v)
            <option @if($v->id == 8) selected
              @endif
              value="{{$v->id}}">{{$v->value}}</option>
            @endforeach
          </select>
          @endforeach
          @endif
          <br>
          <button title="Додади во кошничка" data-standard-cake-add-to-cart value="{{$product->id}}" class="btn btn-primary">Додади
            во кошничка</button>
        </div>
      </div>
      @endif
    </div>
  </div>
  <input type="hidden" id="cake_form" value="{{$cake_form}}">
  <input type="hidden" id="assets_directory" value="{{url_assets('/torti/images/decorations')}}">
</main>
@stop

@section('scripts')

@if($product->custom == 1)
<script src="/assets/torti_plugin/js/fancy-product-designer/js/fabric.min.js?v=1"></script>
<script src="/assets/torti_plugin/js/fancy-product-designer/js/FancyProductDesigner-all.min.js?v=1"></script>
<script>
  var images = new Array();

  function preload() {
    for (i = 0; i < preload.arguments.length; i++) {
      images[i] = new Image();
      images[i].src = preload.arguments[i];
    }
  };
  $(document).ready(function() {
    var cakeFormValue = $('#cake_form').val();
    var url_assets = $('#assets_directory').val();
    window.design = {
      cake_form: cakeFormValue,
      fill: 'choco-malina',
      cake_color: 'brown',
      cake_type: 'shlag',
      bottom_decoration_design: null,
      bottom_decoration_color: null,
      top_decoration_design: null,
      top_decoration_color: null,
      price: 800,
      size: 20,
      message: null,
      natpis_image: null,
      natpis_text: null,
    };
    preload(
      `${url_assets}/bottom/topka/${cakeFormValue}/black.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/blue.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/bright_green.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/brown.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/green.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/grey.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/light_blue.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/light_pink.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/orange.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/pink.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/purple.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/red.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/teal.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/white.png`,
      `${url_assets}/bottom/topka/${cakeFormValue}/yellow.png`,
      `${url_assets}/top/topka/${cakeFormValue}/black.png`,
      `${url_assets}/top/topka/${cakeFormValue}/blue.png`,
      `${url_assets}/top/topka/${cakeFormValue}/bright_green.png`,
      `${url_assets}/top/topka/${cakeFormValue}/brown.png`,
      `${url_assets}/top/topka/${cakeFormValue}/green.png`,
      `${url_assets}/top/topka/${cakeFormValue}/grey.png`,
      `${url_assets}/top/topka/${cakeFormValue}/light_blue.png`,
      `${url_assets}/top/topka/${cakeFormValue}/light_pink.png`,
      `${url_assets}/top/topka/${cakeFormValue}/orange.png`,
      `${url_assets}/top/topka/${cakeFormValue}/pink.png`,
      `${url_assets}/top/topka/${cakeFormValue}/purple.png`,
      `${url_assets}/top/topka/${cakeFormValue}/red.png`,
      `${url_assets}/top/topka/${cakeFormValue}/teal.png`,
      `${url_assets}/top/topka/${cakeFormValue}/white.png`,
      `${url_assets}/top/topka/${cakeFormValue}/yellow.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/black.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/blue.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/bright_green.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/brown.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/green.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/grey.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/light_blue.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/light_pink.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/orange.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/pink.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/purple.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/red.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/teal.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/white.png`,
      `${url_assets}/bottom/cvet/${cakeFormValue}/yellow.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/black.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/blue.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/bright_green.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/brown.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/green.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/grey.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/light_blue.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/light_pink.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/orange.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/pink.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/purple.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/red.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/teal.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/white.png`,
      `${url_assets}/top/cvet/${cakeFormValue}/yellow.png`,
      `${url_assets}/shlag/${cakeFormValue}/black.png`,
      `${url_assets}/shlag/${cakeFormValue}/blue.png`,
      `${url_assets}/shlag/${cakeFormValue}/bright_green.png`,
      `${url_assets}/shlag/${cakeFormValue}/brown.png`,
      `${url_assets}/shlag/${cakeFormValue}/green.png`,
      `${url_assets}/shlag/${cakeFormValue}/grey.png`,
      `${url_assets}/shlag/${cakeFormValue}/light_blue.png`,
      `${url_assets}/shlag/${cakeFormValue}/light_pink.png`,
      `${url_assets}/shlag/${cakeFormValue}/orange.png`,
      `${url_assets}/shlag/${cakeFormValue}/pink.png`,
      `${url_assets}/shlag/${cakeFormValue}/purple.png`,
      `${url_assets}/shlag/${cakeFormValue}/red.png`,
      `${url_assets}/shlag/${cakeFormValue}/teal.png`,
      `${url_assets}/shlag/${cakeFormValue}/white.png`,
      `${url_assets}/shlag/${cakeFormValue}/yellow.png`,
      `${url_assets}/fill/${cakeFormValue}/choco-malina.png`,
      `${url_assets}/fill/${cakeFormValue}/nougat.png`,
      `${url_assets}/fill/${cakeFormValue}/oreo.png`,
      `${url_assets}/fill/${cakeFormValue}/rafaello.png`,
    );
    var previousTypeSelected = null;
    $('#bottom_decoration').hide();
    $('#top_decoration').hide();
    $('#bottom_decoration_design').hide();
    $('#top_decoration_design').hide();
    $('#flower_bottom_decoration').hide();
    $('#flower_top_decoration').hide();
    $('#ball_bottom_decoration').hide();
    $('#ball_top_decoration').hide();

    $('input[name="size"]').on('change', function() {
      design.size = $(this).val();

      switch ($(this).val()) {
        case '20':
          $('#price_container').text('800 мкд');
          $('#current_price').val(800);
          design.price = 800
          break;
        case '30':
          $('#price_container').text('1200 мкд');
          $('#current_price').val(1200);
          design.price = 1200
          break;
        case '40':
          $('#price_container').text('1600 мкд');
          $('#current_price').val(1600);
          design.price = 1600
          break;
        case '50':
          $('#price_container').text('2000 мкд');
          $('#current_price').val(2000);
          design.price = 2000
          break;
      }
      $('input[name="decoration_type"]').attr('checked', false);

      previousTypeSelected = null;
    })

    $('input[name="decoration_type"]').on('change', function() {
      var currentPrice = $("#current_price").val();
      design.cake_type = $(this).val();
      switch ($(this).val()) {
        case 'shlag':
          if (previousTypeSelected == 'fondan') {
            currentPrice = parseInt(currentPrice) - 700
          }
          previousTypeSelected = 'shlag';
          break;
        case 'fondan':
          currentPrice = parseInt(currentPrice) + 700;
          previousTypeSelected = 'fondan';
          break;
      }
      design.price = currentPrice;

      $('#current_price').val(currentPrice);
      $('#price_container').text(`${currentPrice} мкд`);
    })

    var navListItems = $('div.setup-panel div a'),
      allWells = $('.setup-content'),
      allNextBtn = $('.nextBtn'),
      allPrevBtn = $('.prevBtn');
    allWells.hide();

    navListItems.click(function(e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
        $item = $(this);

      if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
      }
    });

    allPrevBtn.click(function() {
      var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

      prevStepWizard.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function() {
      var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

      $(".form-group").removeClass("has-error");
      for (var i = 0; i < curInputs.length; i++) {
        if (!curInputs[i].validity.valid) {
          isValid = false;
          $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
      }
      if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    $('input[name="color"]').on('click', function(element) {
      var image = element.target.value;
      var cake_color_with_extension = image.split('/')[image.split('/').length - 1];
      var cake_color = cake_color_with_extension.split('.')[0];
      design.cake_color = cake_color;

      $("#cake").empty();
      $("#cake").prepend('<img src="' + element.target.value + '"/>')
    });

    // PLUGIN
    $("#show-design").click(function() {
      $("#save-design").show();
      $("#show-design").hide();
      $("#design-plugin").show();
      var productId = $("#product-id").val();
      var $yourDesigner = $('#design-plugin'),
        pluginOpts = {
          productsJSON: '/products/torti-attributes-json/' + productId + '/' + cakeFormValue,
          designsJSON: '/assets/torti_plugin/js/fancy-product-designer/designs.json',
          langJSON: '/assets/torti_plugin/js/fancy-product-designer/lang/default.json',
          editorMode: false,
          smartGuides: true,
          fonts: [{
              name: 'Helvetica'
            },
            {
              name: 'Times New Roman'
            },
            {
              name: 'Pacifico',
              url: 'Enter_URL_To_Pacifico_TTF'
            },
            {
              name: 'Arial'
            },
            {
              name: 'Lobster',
              url: 'google'
            }
          ],
          customTextParameters: {
            colors: true,
            removable: true,
            resizable: true,
            draggable: true,
            rotatable: true,
            autoCenter: true,
            boundingBoxMode: 'clipping',
            boundingBox: 'clipping',

          },
          customImageParameters: {
            draggable: true,
            removable: true,
            resizable: true,
            rotatable: true,
            colors: '#000',
            autoCenter: true,
            boundingBox: 'Base',
            boundingBoxMode: 'clipping',
            maxH: 10000,
            maxW: 10000
          },
          actions: {}
        },

        yourDesigner = new FancyProductDesigner($yourDesigner, pluginOpts);

      $("#save-design").click(function() {
        yourDesigner.getProductDataURL(function(dataURL) {
          var fd = new FormData();

          fd.append('image', dataURL);
          $.ajax({
            url: '/products/upload-plugin-design',
            type: 'POST',
            processData: false,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            data: fd,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              $("#plugin-design-success").html('<label><i class="fa fa-check" style="color:0CF574; margin-right: 10px;"></i> Успешно прикачен дизајн</label><br>');
              $("#plugin-design-filename").val(data.filename);

              var currentPrice = $("#current_price").val();
              var currentPrice = parseInt(currentPrice) + 200;


              $('#current_price').val(currentPrice);
              $('#price_container').text(`${currentPrice} мкд`);
              design.price = currentPrice;

              design.natpis_image = data.filename;
              $("#save-design").hide();
            }
          });
        });

        var fabricElement = yourDesigner.getElementByTitle('Base');

        yourDesigner.currentViewInstance.stage.remove(fabricElement);


        yourDesigner.getProductDataURL(function(dataURL) {
          var fd = new FormData();

          fd.append('image', dataURL);
          $.ajax({
            url: '/products/upload-plugin-design',
            type: 'POST',
            processData: false,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            data: fd,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              $("#plugin-design-success").html('<label><i class="fa fa-check" style="color:0CF574; margin-right: 10px;"></i> Успешно прикачен дизајн</label><br>');
              var existingValue = $("#plugin-design-filename").val();
              var final = existingValue + "," + data.filename;

              $("#plugin-design-filename").val(final);

              // var currentPrice = $("#current_price").val();
              // var currentPrice = parseInt(currentPrice) + 200;


              // $('#current_price').val(currentPrice);
              // $('#price_container').text(`${currentPrice} мкд`);
              // design.price = currentPrice;

              design.natpis_image = final;
              $("#save-design").hide();
            }
          });
        });




      })
    });

    // END PLUGIN
    $('input[name="fill"]').on('click', function(element) {
      var image = element.target.value;
      var fill_type_with_extension = image.split('/')[image.split('/').length - 1];
      var fill_type = fill_type_with_extension.split('.')[0];
      design.fill = fill_type;

      $("#fill").empty();
      $("#fill").prepend('<img style="margin-top: 2px; margin-left: 4px;" src="' + element.target.value + '"/>')
    });

    $('input[name="bottom_decoration"]').on('click', function(element) {
      if (element.target.value == 'selection') {
        $("#bottom").empty();
        $('#bottom_decoration').show();
        $('input[name=bottom_decoration_design]:first').prop('checked', true);
        $("#bottom").prepend('<img class="ml-5-xs" src="//assets-easyshop.generadevelopment.com/torti/images/decorations/bottom/topka/' + cakeFormValue + '/black.png"/>')
        design.bottom_decoration_design = 'topka';
        design.bottom_decoration_color = 'black';

        $('#bottom_decoration_design').show();
        $('#ball_bottom_decoration').show();
      } else {
        $("#bottom").empty();
        $('#bottom_decoration').hide();
        $('#bottom_decoration_design').hide();
        $('#ball_bottom_decoration').hide();
      }
    });

    $('input[name="bottom_decoration_design"]').on('click', function(element) {

      if (element.target.value == 'flower_design') {
        design.bottom_decoration_design = 'cvet';
        $('#flower_bottom_decoration').show();
        $("#bottom").empty();
        $("#bottom").prepend('<img class="ml-5-xs" src="//assets-easyshop.generadevelopment.com/torti/images/decorations/bottom/cvet/' + cakeFormValue + '/black.png"/>')
        $('#ball_bottom_decoration').hide();
      } else {
        design.bottom_decoration_design = 'topka',
          $('#ball_bottom_decoration').show();
        $("#bottom").empty();
        $("#bottom").prepend('<img class="ml-5-xs" src="//assets-easyshop.generadevelopment.com/torti/images/decorations/bottom/topka/' + cakeFormValue + '/black.png"/>')
        $('#flower_bottom_decoration').hide();
      }
    });

    $('input[name="top_decoration"]').on('click', function(element) {
      if (element.target.value == 'selection') {
        $("#top").empty();
        $('#top_decoration').show();
        $('input[name=top_decoration_design]:first').prop('checked', true);
        $("#top").prepend('<img style="margin-left:15px;" src="//assets-easyshop.generadevelopment.com/torti/images/decorations/top/topka/' + cakeFormValue + '/black.png"/>')
        design.top_decoration_design = 'topka';
        design.top_decoration_color = 'black';

        $('#top_decoration_design').show();
        $('#ball_top_decoration').show();
      } else {
        $("#top").empty();
        $('#top_decoration').hide();
        $('#top_decoration_design').hide();
        $('#ball_top_decoration').hide();
      }
    });

    $('input[name="top_decoration_design"]').on('click', function(element) {

      if (element.target.value == 'flower_design') {
        design.top_decoration_design = 'cvet';
        $('#flower_top_decoration').show();
        $("#top").empty();
        $("#top").prepend('<img style="margin-left:15px;" src="//assets-easyshop.generadevelopment.com/torti/images/decorations/top/cvet/' + cakeFormValue + '/black.png"/>')
        $('#ball_top_decoration').hide();
      } else {
        design.top_decoration_design = 'topka';
        $('#ball_top_decoration').show();
        $("#top").empty();
        $("#top").prepend('<img style="margin-left:15px;" src="//assets-easyshop.generadevelopment.com/torti/images/decorations/top/topka/' + cakeFormValue + '/black.png"/>')
        $('#flower_top_decoration').hide();
      }
    });

    $('input[name="bottom_decoration_color"]').on('click', function(element) {
      var image = element.target.value;
      var bottom_decoration_color_with_extension = image.split('/')[image.split('/').length - 1];
      var bottom_decoration_color = bottom_decoration_color_with_extension.split('.')[0];
      design.bottom_decoration_color = bottom_decoration_color;
      $("#bottom").empty();
      $("#bottom").prepend('<img class="ml-5-xs" src="' + element.target.value + '"/>')

    });

    $('input[name="top_decoration_color"]').on('click', function(element) {
      var image = element.target.value;
      var top_decoration_color_with_extension = image.split('/')[image.split('/').length - 1];
      var top_decoration_color = top_decoration_color_with_extension.split('.')[0];
      design.top_decoration_color = top_decoration_color;
      $("#top").empty();
      $("#top").prepend('<img style="margin-left:15px;" src="' + element.target.value + '"/>')

    });

    $("#message").on('change', function() {
      if ($("#message").val() != '') {
        design.message = $(this).val();
      }

    });
  });
</script>
@else
<script>
  var initialSize = document.getElementById('size').value;

  $(document).ready(function() {
    $("img[name='gallery']").on('click', function() {
      $("img[name='gallery'").removeClass('active-image');
      $("#main-image").attr('src', this.src);
      this.addClass('active-image');
    })
    $("#main-image").attr('src', )
    var initialPrice = $("#price-input").val();
    var currentPrice = initialPrice;
    window.predefinedCake = {
      price: initialPrice,
    };







    $("#size").on('change', function() {

      var result = initialSize - $(this).val();
      if (result == 1) {
        currentPrice = parseInt(initialPrice) - 400;
      } else if (result == 0) {
        currentPrice = initialPrice;
      } else if (result == -1) {
        currentPrice = parseInt(initialPrice) + 400;
      } else if (result == -2) {
        currentPrice = parseInt(initialPrice) + 800;
      } else if (result == -3) {
        currentPrice = parseInt(initialPrice) + 1200;
      }





      $("#price-input").val(currentPrice);
      $("#main-price").html(currentPrice + ' МКД');


      var initial = true;
      window.predefinedCake = {
        price: currentPrice,
      };

    });
  });
</script>

@endif


@stop