@extends('clients.fitactive.layouts.default')

@section('content')

<style>
  #your-profile-heading {
    color: #000000;
  }
  td {
    padding-bottom: 15px;
  }

  #table {
    border: none;
  }
</style>

<div class="container">
  <div class="col-md-6">
    <section class="section_offset panel panel-body">

      <h3 id="your-profile-heading">Вашиот профил</h3>

      <br>

      <form method="post" action="{{route('profiles.store')}}" class="type_2">
        {{csrf_field()}}
        <table class="table-responsive table-shopping-cart" id="table" style="width: 100%;">
          <tr>
            <td>
              <label for="first_name" class="required">Име</label>
            </td>
            <td>
              <input class="form-control" type="text" required name="first_name" id="first_name" autofocus=""
                value="{{ old('first_name', $client->first_name) }}" />
              @if($errors->has('first_name'))<div class="error">Полето Име е задолжително</div>@endif
              <!--/ [col]-->
            </td>
          </tr>
          <tr>
            <td> <label for="last_name" class="required">Презиме</label></td>
            <td><input class="form-control" type="text" required name="last_name" id="last_name"
                value="{{ old('last_name', $client->last_name) }}" />

              @if($errors->has('last_name'))<div class="error">Полето Презиме е задолжително</div>@endif</td>
          </tr>

          <tr>
            <td>
              <label for="email" class="required">Е-Пошта</label>
            </td>
            <td>
              <input class="form-control" type="email" disabled readonly name="email" id="email" autofocus=""
                value="{{ old('email', $client->email) }}" />
            </td>
          </tr>
          <tr>
            <td> <label for="country_id" class="required">Држава</label></td>
            <td> <select class="form-control" id="country_id" name="country_id" disabled>
                @foreach($countries as $country)
                <option @if(isset($client->country_id) && $client->country_id == $country->id) selected @endif
                  value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
              </select> @if($errors->has('country_id'))<div class="error">Полето Држава е задолжително</div>@endif</td>
          </tr>
          <tr>
            <td> <label for="address" class="required">Адреса</label></td>
            <td> <input class="form-control" type="text" name="address" id="address" required=""
                value="{{ old('address', $client->address) }}" />

              @if($errors->has('address'))<div class="error">Полето Адреса е задолжително</div>@endif</td>
          </tr>
          <tr>
            <td> <label for="phone">Пол</label></td>
            <td> <input type="radio" @if($client->gender == 'male') checked="checked" @endif value="male" name="gender"
              id="radio_1">
              <label for="radio_1">Машки</label>

              <input type="radio" @if($client->gender == 'female') checked="checked" @endif value="female" name="gender"
              id="radio_2">
              <label for="radio_2">Женски</label></td>
          </tr>
          <tr>
            <td> <label for="city_id" class="required">Град</label></td>
            <td> <select class="form-control" id="city_id" name="city_id">
                <option value="">-- Избери град --</option>
                @foreach($cities as $city)
                <option @if(isset($client->city_id) && $client->city_id == $city->id) selected @endif
                  value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
              </select></td>
          </tr>
          <tr>
            <td><label for="phone" class="required">Телефон</label></td>
            <td><input class="form-control" type="text" name="phone" id="phone" required=""
                value="{{ old('phone', $client->phone) }}" />

              @if($errors->has('phone'))<div class="error">Полето Телефон е задолжително</div>@endif</td>
          </tr>

        </table>
        <br>
        <button type="submit" class="btn btn-cart" style="background-color: #ef4135; color: white">Зачувај</button>
        <br><br>






        {{--<div class="row">--}}
        {{--<div class="col-xs-6">--}}
        {{--<ul>--}}


        {{--<label for="first_name" class="required">Име</label>--}}
        {{--<input type="text" required name="first_name" id="first_name" autofocus="" value="{{ old('first_name', $client->first_name) }}"
        />--}}
        {{--@if($errors->has('first_name'))<div class="error">Полето Име е задолжително</div>@endif--}}
        {{--</div><!--/ [col]-->--}}

        {{--</li><!--/ .row -->--}}

        {{--<li class="row m-b-15">--}}

        {{--<div class="col-xs-12">--}}

        {{--<label for="email" class="required">Е-Пошта</label>--}}
        {{--<input type="email" disabled readonly name="email" id="email" autofocus="" value="{{ old('email', $client->email) }}"
        />--}}

        {{--</div><!--/ [col]-->--}}

        {{--</li><!--/ .row -->--}}


        {{--<li class="row m-b-15">--}}

        {{--<div class="col-xs-12">--}}

        {{--<label for="country_id" class="required">Држава</label>--}}
        {{--<div class="select disabled block">--}}

        {{--<select id="country_id"  name="country_id" disabled>--}}
        {{--@foreach($countries as $country)--}}
        {{--<option  @if(isset($client->country_id) && $client->country_id == $country->id) selected @endif value="{{$country->id}}">{{$country->country_name}}
        </option>--}}
        {{--@endforeach--}}
        {{--</select>--}}

        {{--</div>--}}
        {{--@if($errors->has('country_id'))<div class="error">Полето Држава е задолжително</div>@endif--}}


        {{--</div><!--/ [col]-->--}}

        {{--</li><!--/ .row -->--}}


        {{--<li class="row m-b-15">--}}

        {{--<div class="col-sm-12">--}}

        {{--<label for="address" class="required">Адреса</label>--}}
        {{--<input type="text" name="address" id="address" required=""  value="{{ old('address', $client->address) }}"
        />--}}

        {{--@if($errors->has('address'))<div class="error">Полето Адреса е задолжително</div>@endif--}}


        {{--</div><!--/ [col]-->--}}

        {{--</li>--}}

        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6">--}}
        {{--<ul>--}}

        {{--<li class="row m-b-15">--}}

        {{--<div class="col-sm-12">--}}

        {{--<label for="last_name" class="required">Презиме</label>--}}
        {{--<input type="text" required name="last_name" id="last_name"  value="{{ old('last_name', $client->last_name) }}"
        />--}}

        {{--@if($errors->has('last_name'))<div class="error">Полето Презиме е задолжително</div>@endif--}}


        {{--</div><!--/ [col]-->--}}

        {{--</li>--}}

        {{--<li class="row m-b-15">--}}

        {{--<div class="col-sm-12">--}}

        {{--<label for="phone">Пол</label>--}}
        {{--<div class="form_el" style="height: 38px;padding-top: 8px;">--}}

        {{--<input type="radio" @if($client->gender == 'male') checked="checked" @endif value="male" name="gender" id="radio_1">--}}
        {{--<label for="radio_1">Машки</label>--}}

        {{--<input type="radio" @if($client->gender == 'female') checked="checked" @endif value="female" name="gender" id="radio_2">--}}
        {{--<label for="radio_2">Женски</label>--}}

        {{--</div>--}}

        {{--</div><!--/ [col]-->--}}

        {{--</li>--}}

        {{--<li class="row m-b-15">--}}
        {{--<div class="col-sm-12">--}}

        {{--<label for="city_id" class="required">Град</label>--}}
        {{--<div class="select block">--}}

        {{--<select id="city_id"  name="city_id" >--}}
        {{--<option value="">-- Избери град --</option>--}}
        {{--@foreach($cities as $city)--}}
        {{--<option  @if(isset($client->city_id) && $client->city_id == $city->id) selected @endif value="{{$city->id}}">{{$city->city_name}}
        </option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--</div>--}}

        {{--@if($errors->has('city_id'))<div class="error">Полето Град е задолжително</div>@endif--}}

        {{--</div>--}}

        {{--</li><!--/ .row -->--}}

        {{--<li class="row m-b-15">--}}

        {{--<div class="col-sm-12">--}}

        {{--<label for="phone" class="required">Телефон</label>--}}
        {{--<input type="text" name="phone" id="phone" required="" value="{{ old('phone', $client->phone) }}" />--}}

        {{--@if($errors->has('phone'))<div class="error">Полето Телефон е задолжително</div>@endif--}}

        {{--</div><!--/ [col]-->--}}

        {{--</li>--}}


        {{--</ul>--}}
        {{--</div>--}}

        {{--</div>--}}

        {{--<div class="row p-t-20">--}}
        {{--<div class="col-xs-12 align_right">--}}
        {{--<button type="submit" class="button_green big_btn" style="padding-left: 50px;padding-right: 50px;">Зачувај</button>--}}
        {{--</div>--}}
        {{--</div>--}}
      </form>
    </section>
  </div>
</div>




@stop
@section('scripts')
@stop