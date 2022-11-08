@extends('clients.hotspot.layouts.default')
@section('style')
<link href="{{url_assets('/hotspot/css/account.css')}}" rel="stylesheet">
<style>
    .pt-15 {
        padding-top: 15px !important;
    }

    .pl-0 {
        padding-left: 0 !important;
    }

    .font-normal {
        font-weight: normal !important;
    }

    .border-none {
        border: none !important;
    }
</style>
@stop
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-3">
                <div class="box_account">
                    <h3 class="mb-25 hidden-xs hidden-sm"></h3>
                    <div class="form_container">
                        <div class="private box">
                            <div class="row no-gutters">
                                <div class="form-group">
                                    <a href="{{route('order.history')}}"><img class="custom-img-circle"
                                            src="{{ url_assets('/hotspot/img/orders.png') }}" alt="">Моите
                                        нарачки</a>
                                    <hr>
                                    <a href="{{route('profiles.get')}}"><img class="custom-img-circle"
                                            src="{{ url_assets('/hotspot/img/user.png') }}" alt=""> Мојот
                                        профил</a>
                                    <hr>
                                    <a href="{{route('auth.logout.get')}}"><img class="custom-img-circle"
                                            src="{{ url_assets('/hotspot/img/logout.png') }}" alt="">Одјава</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9">
                @include('clients.'.config( 'app.client').'.partials.errors')
                <div class="box_account">
                    <h3 class="mb-25 new_client">Мој Профил</h3>
                    <form method="post" action="{{ route('profiles.store') }}" class="type_2">
                        {{csrf_field()}}
                        <div class="form_container">
                            <div class="form-group">
                                <h3 class="profile-title">
                                    Персонални информации:
                                </h3>
                            </div>
                            <hr>
                            <div class="private box">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="first_name"
                                                value="{{ old('first_name', $client->first_name) }}" id="first_name"
                                                placeholder="Име*">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="last_name"
                                                id="last_name" value="{{ old('last_name', $client->last_name) }}"
                                                placeholder="Презиме*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="gender" class="border-radius-none form-control select2" name="">
                                    <option @if(isset($client->gender) && $client->gender == 'male') selected
                                        @endif value="male">Машко</option>
                                    <option @if(isset($client->gender) && $client->gender == 'female') selected
                                        @endif value="female">Женско</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" disabled class="form-control"
                                    value="{{ old('email', $client->email) }}" name="email" id="email"
                                    placeholder="E- пошта*">
                            </div>
                            <div class="form-group">
                                <div class="@if($errors->has('phone')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control" placeholder="Телефон"
                                        name="phone" value="{{ old('phone', $client->phone) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="border-radius-none form-control select2" name="nacin_plakanje">
                                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                        'karticka') selected @endif value="karticka">Картичка</option>
                                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                        'gotovo') selected @endif value="gotovo">Готовина</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h3 class="profile-title">
                                    Адреса на живеење:
                                </h3>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="@if($errors->has('address')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control"
                                        placeholder="Адреса за плаќање" name="address"
                                        value="{{ old('address', $client->address) }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <select id="country_id" class="border-radius-none form-control select2"
                                    name="country_id">

                                    @foreach($countries as $co)
                                    <option @if(isset($client->country_id) && $client->country_id == $co->id)
                                        selected @endif value="{{$co->id}}">{{$co->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="country_other form-group" style="display:none">
                                <div class="@if($errors->has('country_other')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control"
                                        placeholder="Останати држави" name="country_other"
                                        value="{{ old('country_other', $client->country_other) }}">
                                </div>
                            </div>
                            <div id="mkd_gradovi" style="@if($client->country_id != 1) display:none @endif"
                                class="form-group">
                                <select style="width: 100%" id="city_id" class="border-radius-none form-control select2"
                                    name="city_id">
                                    @foreach($cities as $cy)
                                    <option @if(isset($client->city_id) && $client->city_id == $cy->id) selected
                                        @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group city_other"
                                style="@if($client->country_id == 1) display:none @endif">
                                <div class="@if($errors->has('city_other')) has-error  @endif">
                                    <input id="city_other" type="text" class="border-radius-none form-control"
                                        placeholder="Останати градови" name="city_other"
                                        value="{{ old('city_other', $client->city_other) }}">
                                </div>
                            </div>

                            <div style="@if($client->country_id == 1) display:none @endif" class="postenski form-group">
                                <div class="@if($errors->has('zip_other')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control"
                                        placeholder="Поштенски код" name="zip_other"
                                        value="{{ old('zip_other', $client->zip_other) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h3 class="profile-title">Адреса за испорака</h3>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="@if($errors->has('address_shiping')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control"
                                        placeholder="Адреса за испорака" name="address_shiping"
                                        value="{{ old('address_shiping', $client->address_shiping) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <select id="country_id_shipping" class="border-radius-none form-control select2"
                                    name="country_id_shipping">

                                    @foreach($countries as $co)
                                    <option @if(isset($client->country_id_shipping) &&
                                        $client->country_id_shipping == $co->id) selected @endif
                                        value="{{$co->id}}">{{$co->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="country_other_shipping form-group" style="display:none">
                                <div class="@if($errors->has('country_other_shipping')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control"
                                        placeholder="Останати држави" name="country_other_shipping"
                                        value="{{ old('country_other_shipping', $client->country_other_shipping) }}">
                                </div>
                            </div>

                            <div id="mkd_gradovi_shipping"
                                style="@if($client->country_id_shipping != 1) display:none @endif" class="form-group">
                                <select id="city_id_shipping" class="border-radius-none form-control select2"
                                    style="width:100%;" name="city_id_shipping">
                                    @foreach($cities as $cy)
                                    <option @if(isset($client->city_id_shipping) && $client->city_id_shipping ==
                                        $cy->id) selected @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group city_other_shipping"
                                style="@if($client->country_id_shipping == 1) display:none @endif">
                                <div class="@if($errors->has('city_other_shipping')) has-error  @endif">
                                    <input id="city_other_shipping" type="text" class="border-radius-none form-control"
                                        placeholder="Останати градови" name="city_other_shipping"
                                        value="{{ old('city_other_shipping', $client->city_other_shipping) }}">
                                </div>
                            </div>

                            <div style="@if($client->country_id_shipping == 1) display:none @endif"
                                class="postenski_shipping form-group">
                                <div class="@if($errors->has('zip_other_shipping')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control"
                                        placeholder="Поштенски код" name="zip_other_shipping"
                                        value="{{ old('zip_other_shipping', $client->zip_other_shipping) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h3 class="profile-title">Промени Лозинка</h3>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="@if($errors->has('password')) has-error  @endif">
                                    <input placeholder="Најмалку 6 карактери" type="password" name="password"
                                        id="password" title="Лозинка" class="form-control border-radius-none" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="@if($errors->has('password')) has-error  @endif">
                                    <input placeholder="Потврдете ја вашата лозинка" type="password"
                                        name="password_confirmation" id="password_confirmation" title="Потврди Лозинка"
                                        class="form-control border-radius-none">
                                </div>
                            </div>

                            @if(isset($client->No_of_Vouchers) && isset($client->VoucherValue))
                            <div class="form-group">
                                <h3 class="profile-title">Лојалност Програма</h3>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="pt-15 col-lg-3">
                                    <label class="font-normal" for="Loyalty_Status">Статус: </label>
                                    <label id="Loyalty_Status" class="pl-0 border-none border-radius-none">
                                        <strong>{{ $client->Loyalty_Status }}</strong>
                                    </label>
                                </div>
                                <div class="pt-15 col-lg-3">
                                    <label class="font-normal" for="Loyalty_Points">Поени: </label>
                                    <label id="Loyalty_Points" class="pl-0 border-none border-radius-none">
                                        <strong>{{ $client->Loyalty_Points }}</strong>
                                    </label>
                                </div>
                                <div class="pt-15 col-lg-3">
                                    <label class="font-normal" for="No_of_Vouchers">Број на ваучери: </label>
                                    <label id="No_of_Vouchers" class="pl-0 border-none border-radius-none">
                                        <strong>{{ $client->No_of_Vouchers }}</strong>
                                    </label>
                                </div>
                                <div class="pt-15 col-lg-3">
                                    <label class="font-normal" for="VoucherValue">Вредност на ваучер: </label>
                                    <label id="VoucherValue" class="pl-0 border-none border-radius-none">
                                        <strong>{{ $client->VoucherValue }}</strong>
                                    </label>
                                </div>
                            </div>
                            @endif
                            <br>
                            <div class="text-center"><input type="submit" value="Зачувај" class="btn_1 full-width">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection