
@extends('clients.' .config( 'app.client').'.layouts.default')

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
    <div style="display:flex; justify-content: center; padding: 50px 0;" class="row">
        <div class="col-md-8">
            <div class="box-lg">
                <div class="row" data-gutter="60">
                    <div class="col-md-12 pb-35 text-center">
                        <h3>Успешна регистрација!</h3>
                        <br>
                        <p>Проверете ја својата е-пошта за да ја потврдите регистрацијата.</p>
                        <br>
                        <a class="btn btn-success" style="padding: 5px 10px; color: white;" href="/login">Кон најава</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection