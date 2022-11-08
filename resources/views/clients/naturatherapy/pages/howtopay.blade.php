@extends('clients.naturatherapy.layouts.default')
@section('content')


<section class="section bg-white py-100">
    <div class="container">
        
        <div class="accordion accordion-style-1" id="accordion1">
            <div class="row">
            <h2 class="h1 mb-4 mb-md-5">{!! trans('naturatherapy/howtopay.title') !!}</h2>

            {!! trans('naturatherapy/howtopay.content') !!}
            
            </div>
        </div>
    </div>
</section>





@stop