@extends('clients.tehnopolis.layouts.default')

@section('content')
    <div class="page_wrapper">
        <div class="container">
            <section class="section_offset">

                <h3>Ресетирај ја лозинката</h3>

                <div class="theme_box">

                    <form method="POST"  action="{{ url('/password/reset') }}" class="type_2">
                        {{csrf_field()}}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="col-xs-5">

                            @if ($errors->any())
                                <div class="error m-b-15">Настана грешка при ресетирањето на лозинка. Ве молиме пробајте повторно.</div>
                            @endif

                            <ul>

                                <li class="row m-b-15">

                                    <div class="col-xs-12">

                                        <label for="email" class="required">Е-Пошта</label>
                                        <input type="email" name="email" id="email" value="{{ $email or old('email') }}" title="Е-Пошта" autofocus="" required=""/>
                                    </div><!--/ [col]-->

                                </li><!--/ .row -->


                                <li class="row m-b-15">

                                    <div class="col-xs-12">

                                        <label for="password" class="required">Лозинка</label>
                                        <input type="password" name="password" id="password" title="Лозинка" required=""/>
                                    </div><!--/ [col]-->

                                </li><!--/ .row -->


                                <li class="row m-b-15">

                                    <div class="col-xs-12">

                                        <label for="password-confirm" class="required">Потврди Лозинка</label>
                                        <input type="password" name="password_confirmation" id="password-confirm" title="Потврди Лозинка" required=""/>
                                    </div><!--/ [col]-->

                                </li><!--/ .row -->

                                <li class="row">

                                    <div class="col-sm-12">

                                        <div class="left_side">

                                            <button type="submit" class="button_green big_btn middle_btn">Ресетирај лозинка</button>

                                        </div>

                                    </div><!--/ [col]-->

                                </li>

                            </ul>
                        </div>

                    </form><!--/ .contactform -->

                </div><!--/ .theme_box -->


            </section>
        </div>
    </div>
@endsection
