@extends('clients.clarissabalkan.layout')
<style>
    #register:hover {
        color: #000000;
    }

    .border-radius-none {
        border-radius: 0 !important;
    }
</style>
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/account.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="row justify-content-center">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <li>
                        Настана грешка при ресетирањето на лозинка. Ве молиме пробајте повторно.
                    </li>
                </ul>
            </div>
            @elseif (session('status'))
            <div class="alert alert-success">
                Лозинката ви е успешно променета!
            </div>
            @endif
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="box_account">
                    <h3 class="client mb-25">Ресетирај лозинка</h3> <small class="float-right pt-2">* Задолжителни полиња</small>
                    <div class="form_container">
                        <form method="POST" action="{{route('password.update')}}" class="login-form cf-style-1"
                            role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Е- пошта*">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Лозинка*" title="Лозинка" required="" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password-confirm"
                                    class="form-control" placeholder="Потврди лозинка*" title="Потврди Лозинка" required="" />
                            </div>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="text-center">
                                <div class="text-center"><input type="submit" value="Ресетирај лозинка"
                                        class="btn_1 full-width"></div>
                            </div>
                        </form>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection