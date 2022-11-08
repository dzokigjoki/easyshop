@extends('layouts.admin')
@section('content')

    <form method="POST" action="{{route('admin.contant.send')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-6"><p>Доколку се соочувате со некаков проблем во врска со Easyshop, пополнете ја следната форма и за брзо ќе добиете одговор.</p>
        {{--<div class="col-md-6">--}}
            <label>Име</label>
            {{--ime na klientot--}}
            <input class="form-control" id="name" type="text" name="name" placeholder="Име"
                   value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}">
            <br>
            <input class="form-control" type="hidden" name="client" value="{{ \EasyShop\Models\AdminSettings::getField('contactemail') }}">
            {{--naslov na tiketot--}}

            {{--email--}}
            <input class="form-control" type="hidden" name="email" value="{{Auth::user()->email}}">

            <label type="text" for="subject">Наслов</label>
            <input class="form-control" id="subject" type="text" name="subject" placeholder="Наслов на проблемот" value="EasyShop support::{{ \EasyShop\Models\AdminSettings::getField('titlepage') }}" disabled>
            <br>
            {{--opis na tiketot--}}
            <label for="description">Опис</label>
            <textarea class="form-control" id="description" name="description" rows="10"
                      placeholder="Опишете го проблемот"></textarea>
            <br>
            {{-- screenshot ili file of problemot --}}
            <label for="file">Screenshot/File од проблемот</label>
            <input class="form-control" type="file" id="screeshot" name="screeshot">
            <br>
            
            <button class="btn btn-lg btn-info blue-soft" type="submit">Испрати</button>
        {{--</div>--}}
        </div>
    </form>




@endsection