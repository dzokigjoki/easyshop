@extends('clients.tehnopolis.layouts.default')

@section('content')
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">


            <div class="col-md-8">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Регистрација на профил</h2>
                    <p>Со регистрација ќе имате можност за побрзо купување, и можност да бидете во тек со новитетите и попустите во Технополис</p>

                    <form role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <label>Е-пошта</label>
                            <input type="text" class="le-input">
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Лозинка</label>
                            <input type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Потврди лозинка</label>
                            <input type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Регистрирај се</button>
                        </div><!-- /.buttons-holder -->
                    </form>
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
@endsection