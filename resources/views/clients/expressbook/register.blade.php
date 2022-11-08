@extends('clients.expressbook.layouts.default')

@section('content')
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Регистрација на профил</h2>                    
                    <p>Со регистрација ќе имате можност за побрзо купување, и можност да бидете во тек со новитетите и попустите во Технополис</p>
                    
                    @include('clients.'.config( 'app.client').'.partials.errors')
                    
                    {!! Form::open(['route' => ['auth.register.post'], 'role' => 'form', 'class' => 'register-form cf-style-1']) !!}
                        <div class="field-row">
                            {!! Form::label('email', 'Е-пошта') !!}
                            {!! Form::email('email', null, ['class' => 'le-input']) !!}
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
                            {!! Form::submit('Регистрирај се', ['class' => 'le-button huge']) !!}
                        </div><!-- /.buttons-holder -->
                    {!! Form::close() !!}
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
@endsection