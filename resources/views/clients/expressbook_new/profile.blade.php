@extends('clients.expressbook_new.layouts.default')

@section('content')



    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark text-capitalize">Мој Профил</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Moj Профил</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->
    <!-- product tab start -->

    <div class="my-account pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title text-capitalize mb-30 pb-25">Мој Профил</h3>
                </div>
                <!-- My Account Tab Menu Start -->
                <div class="col-lg-3 col-12 mb-30">
                    <div class="myaccount-tab-menu nav" role="tablist">
                        <a href="#account-info" data-toggle="tab" class="active"><i class="fa fa-user"></i>
                            Мој Профил</a>
                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Нарачки</a>
                        <a href="#download" data-toggle="tab"><i class="fas fa-heart"></i> Листа на Желби</a>












                        <a href="{{route('auth.logout.get')}}"><i class="fas fa-sign-out-alt"></i> Одјава</a>
                    </div>
                </div>
                <!-- My Account Tab Menu End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-9 col-12 mb-30">
                    <div class="tab-content" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="dashboad" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Dashboard</h3>

                                <div class="welcome mb-20">
                                    <p>
                                        Hello, <strong>Alex Tuntuni</strong> (If Not
                                        <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)
                                    </p>
                                </div>

                                <p class="mb-0">
                                    Од вашата табла на профилот, ќе можете лесно да проверите &amp; да ги
                                    погледнете вашите неодамнешни нарачани производи, да ги менаџирате
                                    вашите адреси за испораки и сметки, како и да ги едитирате своите
                                    податоци на профилот.
                                </p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Нарачки</h3>
                                @if (count($order_data) > 0)

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Нарачка</th>
                                                    <th>Датум</th>
                                                    <th>Производи</th>
                                                    <th>Цена</th>
                                                </tr>

                                            </thead>

                                            <tbody>
                                                @foreach ($order_data as $row)
                                                    <tr>
                                                        <td style="vertical-align: middle">{{ $row->document_number }}</td>
                                                        <td style="vertical-align: middle">
                                                            @if (isset($row->created_at))
                                                                {{ $row->created_at->format('d.m.Y') }}@endif
                                                        </td>
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
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="download" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Листа на желби</h3>
                                @if (count($wishlist_items) > 0)

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Слика</th>
                                                    <th>Име</th>
                                                    <th>Цена</th>
                                                    <th>Акции</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wishlist_items as $row)

                                                    <tr>
                                                        <td style="vertical-align: middle"><img src="{{ $row->image }}"
                                                                alt=""></td>
                                                        <td style="vertical-align: middle">{{ $row->title }}</td>
                                                        <td style="vertical-align: middle">
                                                            {{ EasyShop\Models\Product::getPriceRetail1($row, true, 0) }}
                                                            МКД</td>
                                                        <td style="vertical-align: center">
                                                            <div class="row justify-content-center"">

                                                        <button data-add-to-cart value=" {{ $row->id }}"
                                                                class="pro-btn mr-10 mr-mob-0" tabindex="0">
                                                                <i class="icon-basket"></i>
                                                                </button>


                                                                <button data-remove-from-wish-list
                                                                    value="{{ $row->id }}" class="pro-btn"
                                                                    tabindex="0">
                                                                    <i class="icon-trash"></i>
                                                                </button>

                                                            </div>


                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h5 class="pt-30 text-center">Немате ниеден продукт во листата на желби</h5>
                                @endif
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Payment Method</h3>

                                <p class="saved-message">
                                    You Can't Saved Your Payment Method yet.
                                </p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Billing Address</h3>

                                <address>
                                    <p><strong>Alex Tuntuni</strong></p>
                                    <p>
                                        1355 Market St, Suite 900 <br />
                                        San Francisco, CA 94103
                                    </p>
                                    <p>Mobile: (123) 456-7890</p>
                                </address>

                                <a href="#" class="ht-btn black-btn d-inline-block edit-address-btn"><i
                                        class="fa fa-edit"></i>Edit Address</a>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Детали за профил</h3>

                                <div class="account-details-form">
                                    <form action="{{ route('profiles.store') }}" method="post">




                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-firstname">Вашето име <span class="required">*</span></label>
                                                <input id="account-details-firstname" name="first_name" placeholder="Име"
                                                    type="text" value="{{ old('first_name', $client->first_name) }}"
                                                    required />
                                            </div>

                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-lastname">Вашето презиме <span class="required">*</span></label>
                                                <input id="account-details-lastname" name="last_name" placeholder="Презиме"
                                                    type="text" value="{{ old('last_name', $client->last_name) }}"
                                                    required />
                                            </div>

                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-email">Вашата е-пошта <span class="required">*</span></label>
                                                <input id="display-name" name="email" placeholder="е-пошта" type="email"
                                                    value="{{ old('email', $client->email) }}" required />
                                            </div>
                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-firstname">Пол</label>
                                                <select name="gender" class="border-radius-none form-control select2"
                                                    name="">
                                                    <option @if (isset($client->gender) && $client->gender == 'male') selected @endif value="male">Машко</option>
                                                    <option @if (isset($client->gender) && $client->gender == 'female') selected @endif value="female">Женско
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-email">Телефонски број <span class="required">*</span></label>

                                                <input name="phone" placeholder="Телефонски број" type="text"
                                                    value="{{ old('phone', $client->phone) }}" required />
                                            </div>
                                            <div class="col-lg-6 col-12 mb-30">
                                                <label> Префериран начин на плаќање:</label>
                                                <select class="border-radius-none form-control select2"
                                                    name="nacin_plakanje">
                                                    <option @if (isset($client->nacin_plakanje) && $client->nacin_plakanje == 'karticka') selected @endif value="karticka">Картичка
                                                    </option>
                                                    <option @if (isset($client->nacin_plakanje) && $client->nacin_plakanje == 'gotovo') selected @endif value="gotovo">Готовина
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-12 mb-30">
                                                <h4>Адреса на живеење</h4>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-adress">Адреса <span class="required">*</span></label>
                                                <input id="current-pwd" placeholder="Адреса" name="address" type="text"
                                                    required value="{{ old('address', $client->address) }}" />
                                            </div>

                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-city">Град <span class="required">*</span></label>
                                                <select style="width: 100%" id="city_id"
                                                    class="border-radius-none form-control select2" name="city_id">
                                                    @foreach ($cities as $cy)
                                                        <option @if (isset($client->city_id) && $client->city_id == $cy->id) selected @endif
                                                            value="{{ $cy->id }}">{{ $cy->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 mb-30">
                                                <h4>Адреса на испорака</h4>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-adress">Адреса <span class="required">*</span></label>
                                                <input id="current-pwd" name="address_shiping" placeholder="Адреса"
                                                    type="text" value="{{ old('address_shiping', $client->address_shiping) }}" />
                                            </div>

                                            <div class="col-lg-6 col-12 mb-30">
                                                <label for="account-details-lastname">Град <span class="required">*</span></label>
                                                <select id="city_id_shipping" class="border-radius-none form-control"
                                                    style="width:100%;" name="city_id_shipping">
                                                    @foreach ($cities as $cy)
                                                        <option @if (isset($client->city_id) && $client->city_id == $cy->id) selected @endif
                                                            value="{{ $cy->id }}">{{ $cy->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 mb-30">
                                                <h4>Промена на лозинка</h4>
                                            </div>
                                            <div class="col-12 mb-30">
                                                <label for="account-details-adress">Моментална Лозинка (оставете празно
                                                    место доколку нема промени)</label>
                                                <input id="current-pwd" name="old_password" placeholder="Моментална лозинка"
                                                    type="password" />
                                            </div>

                                            <div class="col-lg-12 col-12 mb-30">
                                                <label for="account-details-lastname">Нова Лозинка (оставете празно место
                                                    доколку нема промени)</label>
                                                <input id="new-pwd" name="new_password" placeholder="Нова лозинка"
                                                    type="password" />
                                            </div>
                                            <div class="col-lg-12 col-12 mb-30">
                                                <label for="account-details-lastname">Потврда на нова лозинка</label>
                                                <input id="new-pwd" name="new_password_confirmation"
                                                    placeholder="Потврда на нова лозинка" type="password" />
                                            </div>



                                            <div class="col-12">
                                                <button class="btn btn-dark btn--md">Зачувај Промени</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                    </div>
                </div>
                <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
    <!-- product tab end -->


@stop
