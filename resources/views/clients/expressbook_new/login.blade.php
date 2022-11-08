@extends('clients.expressbook_new.layouts.default')

@section('content')
    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark text-capitalize">Најава</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Најава
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->

    <!-- login area start -->
    <div class="login-register-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4>Најава</h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4>Регистрација</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('auth.login.post') }}" method="post">
                                            {{ csrf_field() }}

                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger pb-35 pt-35">{{ $error }}</div>
                                                @endforeach
                                            @endif


                                            <input required type="email" name="email" placeholder="E-Пошта" />
                                            <input required type="password" name="password" placeholder="Лозинка" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <span>
                                                        <input id="remember" type="checkbox" />
                                                        <label for="remember">Запомни ме</label>
                                                    </span>

                                                    <a href="#">Заборавена лозинка?</a>
                                                </div>
                                                <button type="submit" class="btn btn-dark btn--md">
                                                    <span>Најава</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('auth.register.post') }}" method="post">

                                            {{ csrf_field() }}

                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger pb-35 pt-35">{{ $error }}</div>
                                                @endforeach
                                            @endif


                                            <input required name="email" placeholder="Е-Пошта" type="email" />
                                            <input required type="text" name="first_name" placeholder="Име" />
                                            <input required type="text" name="last_name" placeholder="Презиме" />
                                            <input required type="text" name="phone" placeholder="Телефон" />
                                            <input required type="password" name="password" placeholder="Лозинка" />
                                            <input required type="password" name="password_confirmation"
                                                placeholder="Потврди лозинка" />
                                            <div class="button-box">
                                                <button type="submit" class="btn btn-dark btn--md">
                                                    <span>Регистрација</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->





@stop
