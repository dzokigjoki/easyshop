@extends('clients.naturatherapyshop_alb.layouts.default')
@section('content')


<style>
    ul{
        list-style-type: disc;
        padding-left: 17px;
    }
</style>
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder"> 
            <div class="title-text">
                <h1 class="uppercase">{!! trans('naturatherapy/global.log_in') !!}</h1>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper pt-30 oh">
    <section class="section-wrap contact pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xxs-12 mb-20">
                    <form method="POST" action="{{ $urlLang }}login">
                        {{csrf_field()}}
                        @include('clients.'.config( 'app.client').'.partials.errors')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="email" id="email" type="email" placeholder="Email*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="password" id="password" type="password" placeholder="{!! trans('naturatherapy/global.password') !!}*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a style="color: red;" href="{{ $urlLang }}password/email">{!! trans('naturatherapy/global.forgot_password') !!}</a>
                            </div>
                        </div>
                        <div class="row pt-20">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-lg btn-dark btn-submit" value="{!! trans('naturatherapy/global.enter') !!}" id="register">
                            </div>
                        </div>

                    </form>
                </div> <!-- end col -->

                <div class="col-xs-4 col-xxs-12 already_registered">
                    <h4 class="mb-10">{!! trans('naturatherapy/global.new_user') !!}</h4>
                    <p class="mb-10">{!! trans('naturatherapy/global.fast_shopping') !!}</p>

                    <p>{!! trans('naturatherapy/global.register_than_you_can') !!}</p>
                    <ul>
                        <li>{!! trans('naturatherapy/global.faster_purchasing') !!}</li>
                        <li>{!! trans('naturatherapy/global.following_status') !!}</li>
                        <li>{!! trans('naturatherapy/global.order_history') !!}</li>
                    </ul>
                    <form class="pt-20" action="{{ $urlLang }}register4">
                        <button class="btn btn-lg btn-dark">{!! trans('naturatherapy/global.registration') !!}</button>
                    </form>

                </div>
            </div>
        </div>
    </section> <!-- end contact -->
</div>
@stop