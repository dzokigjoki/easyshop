@extends('clients.barbakan.layouts.default')
@section('content')




<style>
    .pt-150 {
        padding-top: 150px !important;
    }

    .mb-60 {
        margin-bottom: 60px !important;
        padding-bottom: 0;
    }

    .ti-shopping-cart {
        font-size: 100px;
    }
</style>



<div class="ps-about-features text-center pt-150">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="ps-section__header mb-60">
                    <i class="ti ti-shopping-cart"></i>

                    <h3 class="font-weight-700 text-center">
                        Вашата кошничка моментално е празна
                    </h3>
                    <br>
                    <a href="/" class="panel-cart-action btn btn-secondary  btn-lg"><span>Започни со купување</span></a>
                </div>
            </div>
        </div>

    </div>
</div>
@stop