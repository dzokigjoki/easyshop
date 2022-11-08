@extends('clients.mobiin.layouts.default')

@section('content')

    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Login</h1>
                    <div class="content-form-page">
                        <div class="row">
                            <div class="col-md-4">

                                @include('clients.'.config( 'app.client').'.partials.errors')

                                {!! Form::open(['route' => ['auth.login.post'], 'role' => 'form', 'class' => 'form-horizontal form-without-legend']) !!}
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
                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0">
                                            <a href="{{ route('auth.email_password.get') }}">Заборавена лозинка?</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                            {!! Form::submit('Најава', ['class' => 'btn btn-primary']) !!}
                                            <div class="pull-right">
                                                {{ Form::checkbox('remember', '1', ['class'=>'']) }}
                                                <span class="bold">Запамети ме</span>
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                            <div class="col-md-6 col-md-offset-2 pull-right">
                                <div class="form-info">
                                    <h2>Сеуште не сте регистрирани?</h2>
                                    <p>Регистрацијата е бесплатна! Со регистрација ќе имате можност за побрзо купување и можност да бидете во тек со новитетите и попустите во Перла.</p>

                                    <a href="{{ route('auth.register.get') }}" class="btn btn-default">Регистрирај се</a>
                                </div>
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