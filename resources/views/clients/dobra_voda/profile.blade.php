@extends('clients.dobra_voda.layouts.default')
@section('content')

<div class="account-page-area">
    <div class="container">


        <div class="row">
            <div class="col-lg-3">
                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Профил</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Нарачки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-logout-tab" href="{{route('auth.logout.get')}}" role="tab" aria-selected="false">Одјава</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                @include('clients.'.config( 'app.client').'.partials.errors')
                <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                    <div class="tab-pane fade active" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                        <div class="myaccount-details">
                            <form action="{{ route('profiles.store') }}" method="post" class="quicky-form">
                                {{csrf_field()}}
                                <div class="quicky-form-inner">
                                    <div class="single-input single-input-half">
                                        <label for="account-details-firstname">Вашето име</label>
                                        <input type="text" name="first_name" id="account-details-firstname" value="{{ old('first_name', $client->first_name) }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label for="account-details-lastname">Вашето презиме</label>
                                        <input type="text" name="last_name" id="account-details-lastname" value="{{ old('last_name', $client->last_name) }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label for="account-details-email">Вашата е-пошта</label>
                                        <div class="@if($errors->has('email')) has-error  @endif">
                                            <input disabled="" name="email" type="email" class="border-radius-none form-control" value="{{ old('email', $client->email) }}">
                                        </div>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label for="account-details-email">Пол</label>
                                        <select name="gender" class="border-radius-none form-control select2" name="">
                                            <option @if(isset($client->gender) && $client->gender == 'male') selected
                                                @endif value="male">Машко</option>
                                            <option @if(isset($client->gender) && $client->gender == 'female') selected
                                                @endif value="female">Женско</option>
                                        </select>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label for="account-details-email">Телефонски број</label>
                                        <input type="text" name="phone" value="{{ old('phone', $client->phone) }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label> Префериран начин на плаќање:</label>
                                        <select class="border-radius-none form-control select2" name="nacin_plakanje">
                                            <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                                'karticka') selected @endif value="karticka">Картичка</option>
                                            <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                                'gotovo') selected @endif value="gotovo">Готовина</option>
                                        </select>
                                    </div>
                                    <div class="single-input">
                                        <div class="user_address">Адреса на живеење:</div>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Адреса:</label>
                                        <div class="@if($errors->has('address')) has-error  @endif">
                                            <input type="text" class="border-radius-none form-control" name="address" value="{{ old('address', $client->address) }}">
                                        </div>
                                    </div>
                                    <div class="single-input single-input-half">

                                        <label>Град:</label>
                                        <div>
                                            <select style="width: 100%" id="city_id" class="border-radius-none form-control select2" name="city_id">
                                                @foreach($cities as $cy)
                                                <option @if(isset($client->city_id) && $client->city_id == $cy->id) selected
                                                    @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Населба:</label>
                                        <div class="@if($errors->has('address')) has-error  @endif">
                                            <input type="text" class="border-radius-none form-control" name="municipality" value="{{ old('municipality', $client->municipality) }}">
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <div class="client_address">Адреса на испорака:</div>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Адреса:</label>
                                        <div class="@if($errors->has('address_shiping')) has-error  @endif">
                                            <input type="text" class="border-radius-none form-control" name="address_shiping" value="{{ old('address_shiping', $client->address_shiping) }}">
                                        </div>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Град:</label>
                                        <div>


                                            <select id="city_id_shipping" class="border-radius-none form-control" style="width:100%;" name="city_id_shipping">
                                                <option selected value="27" data-name="Скопје" data-zip="1000">
                                                    Скопје
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Населба:</label>
                                        <div class="@if($errors->has('address')) has-error  @endif">
                                            <input type="text" class="border-radius-none form-control" name="municipality_shipping" value="{{ old('municipality_shipping', $client->municipality_shipping) }}">
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <label for="account-details-oldpass">Моментална лозинка(оставете празно доколку нема промени)</label>
                                        <input type="password" name="old_password" id="account-details-oldpass">
                                    </div>
                                    <div class="single-input">
                                        <label for="account-details-newpass">Нова лозинка(оставете празно доколку нема промени)</label>
                                        <input type="password" name="password" id="account-details-newpass">
                                    </div>
                                    <div class="single-input">
                                        <label for="account-details-confpass">Потврдете ја новата лозинка</label>
                                        <input type="password" name="password_confirmation" id="account-details-confpass">
                                    </div>
                                    <div class="single-input">
                                        <button class="quicky-btn-2" type="submit">Зачувај</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                        <div class="myaccount-orders">
                            <h4 class="small-title text-center">Ваши нарачки</h4>
                            @if(count($order_data) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Нарачка</th>
                                            <th>Датум</th>
                                            <th>Производи</th>
                                            <th>Цена</th>
                                        </tr>

                                        @foreach($order_data as $row)
                                        <tr class="cart-item">
                                            <td style="vertical-align: middle">{{$row->document_number}}</td>
                                            <td style="vertical-align: middle">@if(isset($row->created_at)){{$row->created_at->format('d.m.Y')}}@endif</td>
                                            <td style="vertical-align: middle">@foreach($row->items as $i)
                                                <strong>{{$i->item_name}}</strong> <span style="font-size: 14px; margin-left: 5px;">x{{$i->quantity}}</span><br> @endforeach</td>
                                            <td style="vertical-align: center">
                                                <?php $total = 0; ?>
                                                @foreach($row->items as $i)
                                                <?php $total += $i->sum_vat ?>
                                                @endforeach
                                                {{number_format((int)$total)}} ден.
                                                {{--@endforeach--}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @else
                            <h5 class="pt-30 text-center">Немате извршено ниедна нарачка</h5>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
