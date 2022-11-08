@extends('clients.david_kompjuteri.layouts.default')
@section('content')
    <div class="container pt-40">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills pb-20">
                    <li class="active">
                        <a href="#profile" data-toggle="tab">ПРОФИЛ</a>
                    </li>
                    <li><a href="#orders" data-toggle="tab">НАРАЧКИ</a>
                    </li>
                    <li><a href="#wishlist" data-toggle="tab">СПИСОК СО ЖЕЛБИ</a>
                    </li>
                    <li><a href="/logout">ОДЈАВА</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content clearfix">
            <div class="tab-pane active" id="profile">

                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('profiles.store') }}" method="post">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <label for="first_name"><strong>Вашето име*</strong> </label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $client->first_name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name"><strong>Вашето презиме*</strong></label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $client->last_name) }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email"><strong>Вашата е-пошта*</strong></label>
                            <input disabled name="email" type="email" class="email" value="{{ old('email', $client->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone"><strong>Вашиот Телефон*</strong></label>
                            <input type="text" name="phone" class="phone" value="{{ old('phone', $client->phone) }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="account-details-gender"><strong>Вашиот пол*</strong></label>
                            <select name="gender" class="account-details-gender">
                                <option value="male">Машко</option>
                                <option value="male">Женско</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="account-details-payment-method"><strong>Начин на плаќање*</strong></label>
                            <select name="payment" class="account-details-payment-method">
                                <option @if (isset($client->nacin_plakanje) && $client->nacin_plakanje == 'karticka') selected @endif value="karticka">Картичка</option>
                                <option @if (isset($client->nacin_plakanje) && $client->nacin_plakanje == 'gotovo') selected @endif value="gotovo">Готовина</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-5">
                            <p><i>Адреса на живеење:</i></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="address"><strong>Вашaта адреса*</strong> </label>
                            <input type="text" name="address" id="address" value="{{ old('address', $client->address) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="account-details-city"><strong>Вашиот град*</strong> </label>
                            <select name="city_id" class="account-details-city" required>
                                @foreach ($cities as $cy)
                                    <option @if (isset($client->city_id) && $client->city_id == $cy->id) selected
                                        @endif value="{{ $cy->id }}">{{ $cy->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="place"><strong>Вашaта населба*</strong> </label>
                            <input type="text" name="place" id="place" value="{{ old('place', $client->place) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-5">
                            <p><i>Промена на лозинка:</i></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="account-details-old-password"><strong>Вашaта моментална лозинка*</strong> </label>
                            <input type="password" name="old-password" id="account-details-old-password" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="account-details-new-password"><strong>Вашaта нова лозинка*</strong> </label>
                            <input type="password" name="new-password" id="account-details-new-password" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="account-details-confirm-new-password"><strong>Потврда на нова лозинка*</strong>
                            </label>
                            <input type="password" name="confirm-new-password" id="account-details-cofirm-new-password"
                                value="">
                        </div>
                        <div class="col-md-12 pb-20">
                            <button type="submit" class="btn btn-md btn-black text-white">Зачувај</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="tab-pane" id="orders">
                <h4 class="small-title text-center">Ваши нарачки</h4>
                @if (count($order_data) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>Нарачка</th>
                                    <th>Датум</th>
                                    <th>Производи</th>
                                    <th>Цена</th>
                                </tr>
                                 
                                @foreach ($order_data as $row)
                                    <tr class="cart-item">
                                        <td style="vertical-align: middle">{{ $row->document_number }}</td>
                                        <td style="vertical-align: middle">@if (isset($row->created_at)){{ $row->created_at->format('d.m.Y') }}@endif</td>
                                        <td style="vertical-align: middle">
                                            @foreach ($row->items as $i)
                                                <strong>{{ $i->item_name }}</strong> <span
                                                    style="font-size: 14px; margin-left: 5px;">x{{ $i->quantity }}</span><br>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align: center">
                                            <?php $total = 0; ?>
                                            @foreach ($row->items as $i)
                                                <?php $total += $i->sum_vat; ?>
                                            @endforeach
                                            {{ number_format((int) $total) }} ден.
                                            {{-- @endforeach --}}
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
            <div class="tab-pane" id="wishlist">
                
                    <h4 class="small-title text-center">Список со желби</h4>
                    @if (count($wishlist_items) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                 
                                @foreach ($wishlist_items as $wi)
                                <tr wish-list-row="{{ $wi->id }}">
                                    <td class="product-remove">
                                        <div>
                                            <a data-remove-from-wish-list value="{{ $wi->id }}"
                                                class="remove remove_from_wishlist" title="Remove this product">×</a>
                                        </div>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="/p/{{ $wi->id }}/{{ $wi->url }}">
                                            <img width="73" height="84" src="{{ $wi->image }}"
                                                class="attachment-shop_thumbnail wp-post-image" alt="amofw-5635"> </a>
                                    </td>
                                    <td class="product-name text-center ">
                                        <a href="/p/{{ $wi->id }}/{{ $wi->url }}">{{ $wi->title }}</a>
                                    </td>
                                    <td class="product-price text-center price">
                                        @if (EasyShop\Models\Product::hasDiscount($wi->discount))
                                            <?php
                                            $discount = EasyShop\Models\Product::getPriceRetail1($wi, false, 0);
                                            $discountPercentage = (($wi->price - $discount) / $wi->price) * 100;
                                            ?>
                                            <del>
                                                <span>{{ number_format($wi->price, 0, ',', '.') }} МКД</span>
                                            </del>
                                            <ins>
                                                <span class="amount">{{ $discount }}МКД</span>
                                            </ins>
                                        @else
                                            <ins>
                                                <span
                                                    class="amount">{{ number_format($wi->price, 0, ',', '.') }}
                                                    МКД</span>
                                            </ins>
                                        @endif
                                    </td>
                                    <td class="product-add-to-cart ">
                                        <!-- Date added -->
                                        <!-- Add to cart button -->

                                        <a rel="nofollow" data-add-to-cart value="{{ $wi->id }}"
                                            data-product_sku="" data-quantity="1"></a>
                                            <a class="btn btn-md btn-black "><span>Купи</span></a>
                                        <!-- Change wishlist -->
                                        <!-- Remove from wishlist -->
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






































































@stop
