@extends('clients.barbakan.layouts.default')
@section('content')
<style>
  #empty-cart-icon {
    width: 200px;
    margin-left: 45%;
    margin-bottom: 5.5rem;
    display: block;
  }

  .pt-60 {
    padding-top: 60px !important;
  }

  .mb-60 {
    margin-bottom: 60px !important;
    padding-bottom: 0;  
  }

  .ps-about-features {
    padding: 0;
  }

  #start-shopping {
    background-color: #ca2028;
    line-height: 20px;
    padding: 15px 30px;
    color: #fff;
    margin-left: 46%;
  }
</style>

<div class="ps-about-features pt-60">
  <div class="ps-container-fluid">
    <div class="ps-section__header mb-60">
      <h2 class="font-weight-800 text-center">
        <b>Вашата нарачка е успешна, ви благодариме!</b>
      </h2>
      <br>
      <div>
        <img id="empty-cart-icon" src="{{url_assets('/barbakan/img/icons/check1.svg')}}" alt="No image found">
      </div>
      <br>
      <a href="/" class="ps-btn" id="start-shopping">
        Почетна
      </a>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script>
  $(document).ready(function() {
    sessionStorage.clear();
  });
</script>
@stop