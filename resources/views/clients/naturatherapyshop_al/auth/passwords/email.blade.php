@extends('clients.naturatherapyshop_al.layouts.default')

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
                                Nuk ka asnjë përdorues të tillë
                            </li>
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        Lidhja juaj e rivendosjes së fjalëkalimit është dërguar me sukses në adresën tuaj të emailit
                    </div>
                    @endif
                    <div class="col-md-12 pb-35">
                        <h3>Rivendosni fjalëkalimin</h3>
                        <p>Keni harruar fjalëkalimin tuaj?<br>
                            Futni emailin tuaj në fushë dhe ne do t'ju dërgojmë një lidhje për të rivendosur fjalëkalimin tuaj.</p>
                        <form method="POST" action="{{route('auth.email_password.post')}}" class="login-form cf-style-1"
                            role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="border-radius-none form-control" />
                            </div>
                            <input class="btn btn-lg btn-danger" type="submit" value="Rivendosni fjalëkalimin" />
                        </form>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection