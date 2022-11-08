@extends('clients.alex_filippe.layouts.default')

@section('content')

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Ресетирај лозинка</h2>
                    <p>Внесете нова лозинка.</p>
                    @include('clients.'.config( 'app.client').'.partials.errors')
                    {!! Form::open(['route' => ['auth.reset_password.post'], 'role' => 'form', 'class' => 'login-form cf-style-1']) !!}
                    {!! Form::hidden('token', $token) !!}
                    <form role="form" class="login-form cf-style-1">
                        <div class="field-row">
                            {!! Form::label('email', 'Е-пошта') !!}
                            {!! Form::email('email', $email, ['class' => 'le-input']) !!}
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            {!! Form::label('password', 'Лозинка') !!}
                            {!! Form::password('password', ['class' => 'le-input']) !!}
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            {!! Form::label('password_confirmation', 'Потврди лозинка') !!}
                            {!! Form::password('password_confirmation', ['class' => 'le-input']) !!}
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            {!! Form::submit('Ресет', ['class' => 'le-button huge']) !!}                            
                        </div><!-- /.buttons-holder -->
                    {!! Form::close() !!}<!-- /.cf-style-1 -->

                </section><!-- /.sign-in -->
            </div><!-- /.col -->

            <div class="col-md-6">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Нов корисник?</h2>
                    <p>Со регистрација ќе имате можност за побрзо купување, и можност да бидете во тек со новитетите и попустите во Технополис</p>


                    <h2 class="semi-bold">Регистрирајте се и ќе можете :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Побрзо да купувате</li>
                        <li><i class="fa fa-check primary-color"></i> Да го следите статусот вашите нарачки</li>
                        <li><i class="fa fa-check primary-color"></i> Ќе имаге преглед на претходно направените нарачки</li>
                    </ul>

                    <div class="buttons-holder">
                        <a href="{{ route('auth.register.get') }}" class="le-button huge">Најава</a>
                    </div><!-- /.buttons-holder -->
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->

@endsection