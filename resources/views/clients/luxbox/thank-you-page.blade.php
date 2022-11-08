@extends('clients.luxbox.layouts.default')
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
  <div class="woocommerce">
    <div class="container">
      <div class="entry-content">
        <div class="row text-center">
          <h1>Успешна нарачка. Ви благодариме!</h1>
          <div class="btn-home">
          <a href="/" class="button checkout wc-forward au-btn au-btn-black btn-small">Кон почетна</a>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop