@extends('clients.e-commerce.layouts.default')
@section('content')


<style> 
h1 {
  padding: 100px;
  width: 100%;
  text-align: center;
  padding-bottom: 10px;
}

.btn-home {
  width: 100%;
  text-align: center;
}
</style>
<section class="checkout-section section-box">
  <div class="woocommerce" style="padding-bottom: 336px;">
    <div class="container">
      <div class="entry-content">
        <div class="row cart_empty text-center">
          <h1>Вашата кошничка е празна</h1>
          <div class="btn-home pt_35">
          <a href="/" class="button checkout wc-forward au-btn au-btn-black btn-small startShopping">Започнете со купување</a>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop