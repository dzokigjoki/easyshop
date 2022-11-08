@extends('clients.tehnopolis.layouts.default')
@section('content')
    <div class="page_wrapper">
        <div class="container">
            <section class="section_offset">

                <h3>Заборавена лозинка?</h3>

                <div class="theme_box">

                    <form method="POST" action="{{ url('/password/email') }}" class="type_2">
                        {{csrf_field()}}
                        <div class="col-xs-5">
                            <div class="m-b-15">
                                {{--<p><strong>Ја заборавивте вашата лозинка?<br/>Внесете ја вашата Е-Пошта во полето и ние ќе Ви испратиме линк за ресетирање на лозинката.</strong></p>--}}
                                <p>Ја заборавивте вашата лозинка?<br/>Внесете ја вашата Е-Пошта во полето и ние ќе Ви испратиме линк за ресетирање на лозинката.</p>
                            </div>
                            <ul>

                                <li class="row m-b-15">

                                    <div class="col-xs-12">

                                        @if (session('status'))
                                            <div class="success">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <label for="email" class="required">Е-Пошта</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" title="Е-Пошта" autofocus="" required=""/>

                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
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
