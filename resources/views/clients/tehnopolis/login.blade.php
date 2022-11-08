@extends('clients.tehnopolis.layouts.default')
@section('content')
    <div class="page_wrapper">
        <div class="container">
        <section class="section_offset">
            <div class="col-md-6">
            <h3>Најава</h3>



                <form method="POST" action="{{route('auth.login.post')}}" class="type_2">
                    {{csrf_field()}}


                        @if ($errors->any())
                            <div class="error m-b-15">Внесовте погрешна е-пошта или лозинка.</div>
                        @endif

                        @if (session('status'))
                            <div class="success">
                                {{ session('status') }}
                            </div>
                        @endif



                           <table class="login-table">
                               <tr>
                                   <td><label for="email" class="required">E-mail: </label></td>
                                   <td><input class="form-control" tabindex="1" type="email" required name="email" title="Email" autofocus=""></td>
                               </tr>
                               <tr>
                                    <td><label for="password" class="required">Лозинка:</label></td>
                                    <td><input class="form-control" tabindex="2" type="password" required name="password" id="password" title="Лозинка">
                                    </td>
                               </tr>
                               <tr>
                                   <td><input tabindex="3" checked="" type="checkbox" value="1" name="remember" id="remember">
                                       <label for="remember">Запамети ме</label></td>
                               </tr>
                               <tr>
                                   <td> <a href="{{route('auth.email_password.get')}}">Заборавена лозинка?</a></td>
                               </tr>
                           </table><br>

                            <button tabindex="4" type="submit" class="btn btn-cart" style="color: white; background-color: #ef4135; width: 150px">Најава</button>
                <br><br></form>
                    </div>



                        {{--<ul>--}}

                            {{--<li class="row m-b-15">--}}

                                {{--<div class="col-xs-12">--}}

                                    {{--<label for="email" class="required">Е-Пошта</label>--}}
                                    {{--<input tabindex="1" type="email" required name="email" id="email" title="Е-Пошта" autofocus="" />--}}

                                {{--</div><!--/ [col]-->--}}

                            {{--</li>--}}

                            {{--<li class="row m-b-15">--}}

                                {{--<div class="col-sm-12">--}}

                                    {{--<label for="password" class="required">Лозинка</label>--}}
                                    {{--<input tabindex="2" type="password" required name="password" id="password" title="Лозинка">--}}

                                {{--</div><!--/ [col]-->--}}

                            {{--</li>--}}


                            {{--<li class="row m-b-15">--}}

                                {{--<div class="col-sm-12">--}}

                                    {{--<input tabindex="3" checked="" type="checkbox" value="1" name="remember" id="remember">--}}
                                    {{--<label for="remember">Запамети ме</label>--}}
                                {{--</div><!--/ [col]-->--}}

                            {{--</li>--}}

                            {{--<li class="row m-b-15">--}}

                                {{--<div class="col-sm-12">--}}
                                    {{--<a href="{{route('auth.email_password.get')}}">Заборавена лозинка?</a>--}}
                                {{--</div><!--/ [col]-->--}}

                            {{--</li>--}}


                            {{--<li class="row">--}}

                                {{--<div class="col-sm-12">--}}

                                    {{--<div class="left_side">--}}

                                        {{--<button tabindex="4" type="submit" class="button_green big_btn middle_btn">Најава</button>--}}

                                    {{--</div>--}}

                                {{--</div><!--/ [col]-->--}}

                            {{--</li>--}}

                        {{--</ul>--}}
                    {{--</div>--}}

                    <div class="col-md-6">

                        <h3 class="heading_border">СЕ УШТЕ НЕ СТЕ РЕГИСТРИРАНИ?</h3>
                        <p>
                            <b>Регистрацијата е бесплатна!</b>
                            <br/>Со регистрација ќе имате можност за побрзо купување и можност да бидете во тек со новитетите и попустите во Технополис.</p>

                        <a  href="{{route('auth.register.get')}}" class="btn btn-cart" style="background-color: #ef4135; color: white">Регистрирај се</a>

                    </div>


              <!--/ .contactform -->
             </section>
            </div><!--/ .theme_box -->



        </div>

@endsection
