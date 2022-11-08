@extends('clients.naturatherapy.layouts.default')
@section('content')




<section class="breadcrumb-section bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 py-lg-3">
                <li class="breadcrumb-item">
                    <a href="/">{!! trans('naturatherapy/global.home') !!}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                {!! trans('naturatherapy/faq.faq') !!}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section bg-white py-5">
    <div class="container">
        <h2 class="h1 mb-4 mb-md-5">
        {!! trans('naturatherapy/faq.faq_title') !!}</h2>
        <div class="accordion accordion-style-1" id="accordion1">
            <div class="row">
            {!! trans('naturatherapy/faq.faq_content') !!}
            </div>
        </div>
    </div>
</section>





@stop