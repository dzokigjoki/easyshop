@extends('clients.sofu.layouts.default')

<style>
    #register:hover {
        color: #000000;
    }

    .border-radius-none {
        border-radius: 0 !important;
    }
</style>

@section('content')
<div class="container no-header-container">
    <div class="row">
        <div class="col-md-12">
            <div class="box-lg">
                <div class="row" data-gutter="60">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <li>
                                Настана грешка при ресетирањето на лозинка. Ве молиме пробајте повторно.
                            </li>
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        Лозинката ви е успешно променета!
                    </div>
                    @endif
                    <div class="col-md-12 pb-35">
                        <h3>Ресетирај ја лозинката</h3>
                        <form method="POST" action="{{route('auth.reset_password.post')}}" class="login-form cf-style-1"
                            role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email" class="required">Е-Пошта</label>
                                <input type="email" name="email" id="email" class="border-radius-none form-control" value="{{ $email or old('email') }}"
                                    title="Е-Пошта" autofocus="" required="" />
                            </div>
                            <div class="form-group">
                                <label for="password" class="required">Нова лозинка</label>
                                <input type="password" name="password"  id="password" class="border-radius-none form-control" title="Лозинка" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="required">Потврди нова лозинка</label>
                                <input type="password" name="password_confirmation" id="password-confirm" class="border-radius-none form-control" title="Потврди Лозинка" required=""/>
                            </div>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input class="btn btn-lg btn-danger" type="submit" value="Ресетирај лозинка" />
                        </form>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection