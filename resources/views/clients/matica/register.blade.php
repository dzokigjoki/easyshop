@extends('clients.matica.layouts.default')
@section('style')
<link href="{{url_assets('/matica/css/account.css')}}" rel="stylesheet">
<style>
    .g-recaptcha div {
        margin: 0 auto !important;
    }

    .mb-10 {
        margin-bottom: 10px;
    }
</style>
@stop
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                @include('clients.'.config( 'app.client').'.partials.errors')
                <div class="box_account">
                    <h3 class="mb-25 new_client">Регистрација</h3> <small class="float-right pt-2">* Задолжителни
                        полиња</small>
                    <form method="POST" action="{{route('auth.register.post')}}" class="type_2">
                        {{csrf_field()}}
                        <div class="form_container">
                            <div class="private box">
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="first_name"
                                                id="first_name" placeholder="Име*">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="last_name"
                                                id="last_name" placeholder="Презиме*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="email" required class="form-control" name="email" id="email"
                                    placeholder="Email*">
                            </div>
                            <div class="form-group">
                                <input type="password" required class="form-control" name="password" id="password"
                                    value="" placeholder="Лозинка*">
                            </div>
                            <div class="form-group">
                                <input type="password" required class="form-control" name="password_confirmation"
                                    id="password_confirmation" value="" placeholder="Потврди лозинка*">
                            </div>

                            <div class="form-group">
                                <input type="text" required class="form-control" name="phone" id="phone"
                                    placeholder="Телефонски број*">
                            </div>

                            <?php $all_cities = \EasyShop\Models\City::orderBy('city_name', 'ASC')->get() ?>

                            <div class="form-group">
                                <select class="form-control" name="city" required>
                                    <option value="" selected>-- Град --</option>
                                    @foreach($all_cities as $city)
                                    @if($city->id != 35)
                                    <option value="{{$city->id}}" data-name="{{$city->city_name}}"
                                        data-zip="{{$city->zip}}">
                                        {{$city->city_name}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" required class="form-control" name="address" id="address"
                                    placeholder="Адреса*">
                            </div>

                            <div class="form-group" id="tax_number_container" style="display: none">
                                <input type="text" class="form-control mb-10" name="company" id="company"
                                    placeholder="Компанија*">
                                <input type="text" class="form-control" name="danocen_broj" id="danocen_broj"
                                    placeholder="Даночен број*">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="container_check">Ги прифаќам <a style="text-decoration: underline"
                                        href="{{ route('category', [30, 'politika-na-privatnost']) }}">Политиката на
                                        приватност</a> и <a style="text-decoration: underline"
                                        href="{{ route('category', [29, 'pravila-za-kupuvanje']) }}">Условите за
                                        купување</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-center"><input type="submit" value="Регистрирај се"
                                    class="btn_1 full-width"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){
    $("#pravno_lice").on('change', function(){
      $("#tax_number_container").toggle();
      $("#company").val('');
      $("#danocen_broj").val('');
    })
  })
</script>
@stop