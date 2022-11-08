@extends('clients.mobiin.layouts.default')

@section('content')

    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center">Регистрирај се на mobiin.mk</h1>
                    <div class="content-form-page">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                @include('clients.'.config( 'app.client').'.partials.errors')
                                <p>Регистрацијата е бесплатна! Со регистрација ќе имате можност за побрзо купување и можност да бидете во тек со новитетите и попустите во Перла.</p>

                                {!! Form::open(['route' => ['auth.register.post'], 'role' => 'form', 'class' => 'form-horizontal form-without-legend']) !!}
                                <div class="form-group">
                                    <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                                    <div class="col-lg-8">
                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Лозинка <span class="require">*</span></label>
                                    <div class="col-lg-8">
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Повтори лозинка <span class="require">*</span></label>
                                    <div class="col-lg-8">
                                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                        {!! Form::submit('Регистрирај се', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

@endsection