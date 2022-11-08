@extends('clients.hotspot.layouts.default')
<style>
    #register:hover {
        color: #000000;
    }

    .border-radius-none {
        border-radius: 0 !important;
    }
</style>
@section('style')
<link href="{{url_assets('/hotspot/css/account.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="row justify-content-center">
            @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    <li>
                        Не постои таков корисник
                    </li>
                </ul>
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success">
                Вашиот линк за ресетирање на лозинка е успрешно пратен на вашата е- маил адреса
            </div>
            @endif
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="box_account">
                    <h3 class="client mb-25">Ресетирај лозинка</h3> <small class="float-right pt-2">* Задолжителни полиња</small>
                    <div class="form_container">
                        <p>Ја заборавивте вашата лозинка?<br>
                            Внесете ја вашата Е-Пошта во полето и ние ќе Ви испратиме линк за ресетирање на
                            лозинката (доколку внесете валидна е-пошта).</p>
                        <form method="POST" action="{{route('auth.email_password.post')}}" class="login-form cf-style-1"
                            role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Е- пошта">
                            </div>
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