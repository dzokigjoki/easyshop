@extends('clients.sofu.layouts.default')
@section('content')

<div class="account-page-area main-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Профил</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Нарачки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-wishlist" role="tab" aria-controls="account-orders" aria-selected="false">Список со желби</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-logout-tab" href="{{route('auth.logout.get')}}" role="tab" aria-selected="false">Одјава</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                @include('clients.'.config( 'app.client').'.partials.errors')
                <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                    <div class="tab-pane active" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                        <div class="myaccount-details">
                            <form action="{{ route('profiles.store') }}" class="comment-form" method="post">
                            {{csrf_field()}}
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="account-details-firstname">Вашето име</label>
                                            <input type="text" name="first_name" id="account-details-firstname" value="{{ old('first_name', $client->first_name) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="account-details-lastname">Вашето презиме</label>
                                            <input type="text" name="last_name" id="account-details-lastname" value="{{ old('last_name', $client->last_name) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-form">
                                            <label for="account-details-email">Вашата е-пошта</label>
                                            <div class="@if($errors->has('email')) has-error  @endif">
                                                <input disabled="" name="email" type="email" class=" form-control" value="{{ old('email', $client->email) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="account-details-email">Пол</label>
                                            <select name="gender" class="form-control">
                                                <option @if(isset($client->gender) && $client->gender == 'male') selected
                                                    @endif value="male">Машко</option>
                                                <option @if(isset($client->gender) && $client->gender == 'female') selected
                                                    @endif value="female">Женско</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="account-details-email">Телефонски број</label>
                                            <input type="text" name="phone" value="{{ old('phone', $client->phone) }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label> Префериран начин на плаќање:</label>
                                            <select class=" form-control" name="nacin_plakanje">
                                                <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                                    'karticka') selected @endif value="karticka">Картичка</option>
                                                <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                                    'gotovo') selected @endif value="gotovo">Готовина</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="user_address">Адреса на живеење:</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Адреса:</label>
                                            <div class="@if($errors->has('address')) has-error  @endif">
                                                <input type="text" class=" " name="address" value="{{ old('address', $client->address) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Град:</label>
                                            <div>
                                                <select style="width: 100%" id="city_id" class=" select2" name="city_id">
                                                    @foreach($cities as $cy)
                                                    <option @if(isset($client->city_id) && $client->city_id == $cy->id) selected
                                                        @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="user_address">Адреса на испорака:</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Адреса:</label>
                                            <div class="@if($errors->has('address_shiping')) has-error  @endif">
                                                <input type="text" class=" " name="address_shiping" value="{{ old('address_shiping', $client->address_shiping) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Град:</label>
                                            <div>
                                                <select id="city_id_shipping" class=" select2" style="width:100%;" name="city_id_shipping">
                                                    @foreach($cities as $cy)
                                                    <option @if(isset($client->city_id_shipping) && $client->city_id_shipping ==
                                                        $cy->id) selected @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="account-details-oldpass">Моментална лозинка(оставете празно доколку нема промени)</label><br>
                                            <input class="width_100" type="password" name="old_password" id="account-details-oldpass">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="account-details-newpass">Нова лозинка(оставете празно доколку нема промени)</label><br>
                                            <input class="width_100" type="password" name="password" id="account-details-newpass">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="account-details-confpass">Потврдете ја новата лозинка</label><br>
                                            <input class="width_100" type="password" name="password_confirmation" id="account-details-confpass">
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button>Зачувај</button>
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
                                            <td style="vertical-align: middle">{{$row->created_at->format('d.m.Y')}}</td>
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
                    <div class="tab-pane fade" id="account-wishlist" role="tabpanel" aria-labelledby="account-wishlist-tab">
                        <div class="myaccount-wishlist">
                            <h4 class="small-title text-center">Список со желби</h4>
                            @if(count($wishlist_items) > 0)
                            <table class="shop_table cart wishlist_table_nr" data-pagination="no" data-per-page="5" data-page="1" data-id="" data-token="">
                                <tbody>
                                    @foreach($wishlist_items as $wi)
                                    <tr wish-list-row="{{$wi->id}}">
                                        <td class="product-remove">
                                            <div>
                                                <a data-remove-from-wish-list value="{{$wi->id}}" class="remove remove_from_wishlist" title="Remove this product">×</a>
                                            </div>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="">
                                                <img width="73" height="84" src="{{$wi->image}}" class="attachment-shop_thumbnail wp-post-image" alt="amofw-5635"> </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="">{{$wi->title}}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">{{$wi->price}} МКД</span>
                                        </td>
                                        <td class="product-add-to-cart">
                                            <!-- Date added -->
                                            <!-- Add to cart button -->
                                            <a href="" rel="nofollow" data-add-to-cart value="{{$wi->id}}" data-product_sku="" data-quantity="1" class="button product_added add_to_cart_button product_type_simple add_to_cart button alt"> Add to Cart</a>
                                            <!-- Change wishlist -->
                                            <!-- Remove from wishlist -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            @else
                            <h5 class="pt-30 text-center">Немате ниеден производ во списокот со желби</h5>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop