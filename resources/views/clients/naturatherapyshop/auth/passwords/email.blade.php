@extends('clients.naturatherapyshop.layouts.default')

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
    <div style="display:flex; justify-content: center" class="row">
        <div class="col-md-8">
            <div class="box-lg">
                <div class="row" data-gutter="60">
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
                    <div class="col-md-12 pb-35">
                        <h3>Ресетирај ја лозинката</h3>
                        <p>Ја заборавивте вашата лозинка?<br>
                            Внесете ја вашата Е-Пошта во полето и ние ќе Ви испратиме линк за ресетирање на лозинката.</p>
                        <form method="POST" action="{{route('auth.email_password.post')}}" class="login-form cf-style-1"
                            role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Е-пошта</label>
                                <input type="email" name="email" id="email" class="border-radius-none form-control" />
                            </div>
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