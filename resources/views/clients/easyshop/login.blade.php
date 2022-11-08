@extends('clients.tehnopolis.layouts.default')

@section('content')

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Најава</h2>
                    {{--<p>Hello, Welcome to your account</p>--}}

                    {{--<div class="social-auth-buttons">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <form role="form" class="login-form cf-style-1">
                        <div class="field-row">
                            <label>Емаил</label>
                            <input type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Лозинка</label>
                            <input type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Запамети ме</span></label>
                        	</span>
                        	<span class="pull-right">
                        		<a href="#" class="content-color bold">Заборавена лозинка?</a>
                        	</span>
                        </div>

                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Најава</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->

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
                        <а href="{{ route('auth.register.get')  }}" class="le-button huge">Најава</а>
                    </div><!-- /.buttons-holder -->
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->

@endsection