@extends('clients.expressbook.layouts.default')
@section('content')
<div class="container">
    <div class="row hidden-xs hidden-sm">
        <ul class="breadcrumb text-center">
            <li><a href="{{route('home')}}">Почетна</a></li>
            <li class="active">Контакт</li>
        </ul>
        <div class="divider">
            <img class="img-responsive" src="{{ url_assets('/expressbook/images/shadow.png') }}" alt="">
        </div>
    </div>
    <div class="col-md-12">
        <form method="POST" action="{{ route('kontakt-forma') }}">
            {{ csrf_field() }}
            <br>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label for="name">Име*</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Вашето име..." required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label for="email">Е-пошта*</label>
                    <input type="email" class="form-control" id="email" placeholder="Внесете Е-пошта..." name="email">
                </div>
                <div class="form-group col-md-12">
                    <label for="phone">Телефонски број*</label>
                    <input type="text" class="form-control" required name="phone" id="phone" placeholder="Вашиот телефон">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label for="txt">Порака*</label>
                    <textarea style="height:150px;" name="message" class="form-control" id="message"
                        placeholder="Внесете порака..." name="txt"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <button style="background-color: #4E7F16;" type="submit" class="btn btn-success">Испрати
                        порака
                    </button>
                </div>
            </div>
            <br><br>
        </form>
    </div>
</div>
@endsection