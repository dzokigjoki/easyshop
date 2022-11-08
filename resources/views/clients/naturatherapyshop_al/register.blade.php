@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')


<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">{!! trans('naturatherapy/global.register') !!}</h1>
            </div>
        </div>
    </div>
</section>

<div class="content-wrapper pt-30 oh">
    <section class="section-wrap contact pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xxs-12 mb-20">
                    <form method="POST" action="{{route('auth.register.post')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contact-name">
                                    <input name="first_name" id="first_name" type="text" placeholder="{!! trans('naturatherapy/global.your_name') !!}*">
                                </div>
                                @if($errors->first('first_name'))
                                <div class="alert alert-danger">{{$errors->first('first_name')}}</div>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-name">
                                    <input name="last_name" id="last_name" type="text" placeholder="{!! trans('naturatherapy/global.your_lastname') !!}*">
                                </div>
                                @if($errors->first('last_name'))
                                <div class="alert alert-danger">{{$errors->first('last_name')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contact-telephone">
                                    <input name="phone" id="phone" type="text" placeholder="{!! trans('naturatherapy/global.phone_number') !!}*">
                                </div>
                                @if($errors->first('phone'))
                                <div class="alert alert-danger">{{$errors->first('phone')}}</div>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-email">
                                    <input name="email" id="email" type="email" placeholder="E-mail*">
                                </div>
                                @if($errors->first('email'))
                                <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="password" id="password" type="password" placeholder="{!! trans('naturatherapy/global.password') !!}*">
                                </div>
                                @if($errors->first('password'))
                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="contact-name">
                                    <input name="password_confirmation" id="password_confirmation" type="password" placeholder="{!! trans('naturatherapy/global.confirm_password') !!}*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-lg btn-dark btn-submit" value="{!! trans('naturatherapy/global.registration') !!}" id="register">
                            </div>
                        </div>

                    </form>
                </div> <!-- end col -->

                <div class="col-xs-4 col-xxs-12 already_registered">
                    <h4>{!! trans('naturatherapy/global.already_registered') !!}</h4>
                    <form class="pt-20" action="{{ $urlLang }}login">
                        <button class="btn btn-lg btn-dark">{!! trans('naturatherapy/global.log_in') !!}</button>
                    </form>

                </div>
            </div>
        </div>
    </section> <!-- end contact -->
</div>
@stop