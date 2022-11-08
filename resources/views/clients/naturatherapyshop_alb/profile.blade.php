@extends('clients.naturatherapyshop_alb.layouts.default')

@section('content')
<style>
    select {
        height: 44px !important;
        border: 1px solid #dedede !important;
        background-color: transparent !important;
        width: 100%;
        margin-bottom: 30px;
        font-size: 15px !important;
        padding: 0 16px !important;
        border-radius: 0 !important;
    }
</style>

<div class="row pt-50">
    <div class="col-lg-3">
        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">{!! trans('naturatherapy/global.profile') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">{!! trans('naturatherapy/global.orders') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="account-wishlist-tab" data-toggle="tab" href="#account-wishlist" role="tab" aria-controls="account-orders" aria-selected="false">{!! trans('naturatherapy/global.wishlist') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="account-logout-tab" href="{{ $urlLang }}logout" role="tab" aria-selected="false">{!! trans('naturatherapy/global.logout') !!}</a>
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
                                <label for="account-details-firstname">{!! trans('naturatherapy/global.your_name') !!}</label>
                                <input type="text" name="first_name" id="account-details-firstname" value="{{ old('first_name', $client->first_name) }}">
                            </div>
                            <div class="single-input single-input-half">
                                <label for="account-details-lastname">{!! trans('naturatherapy/global.your_lastname') !!}</label>
                                <input type="text" name="last_name" id="account-details-lastname" value="{{ old('last_name', $client->last_name) }}">
                            </div>
                            <div class="single-input single-input-half">
                                <label for="account-details-email">{!! trans('naturatherapy/global.your_email') !!}</label>
                                <div class="@if($errors->has('email')) has-error  @endif">
                                    <input disabled="" name="email" type="email" class="border-radius-none form-control" value="{{ old('email', $client->email) }}">
                                </div>
                            </div>
                            <div class="single-input single-input-half">
                                <label for="account-details-email">{!! trans('naturatherapy/global.gender') !!}</label>
                                <select name="gender" class="border-radius-none form-control select2" name="">
                                    <option @if(isset($client->gender) && $client->gender == 'male') selected
                                        @endif value="male">{!! trans('naturatherapy/global.male') !!}</option>
                                    <option @if(isset($client->gender) && $client->gender == 'female') selected
                                        @endif value="female">{!! trans('naturatherapy/global.female') !!}</option>
                                </select>
                            </div>
                            <div class="single-input single-input-half">
                                <label for="account-details-email">{!! trans('naturatherapy/global.phone_number') !!}</label>
                                <input type="text" name="phone" value="{{ old('phone', $client->phone) }}">
                            </div>
                            <div class="single-input single-input-half">
                                <label> {!! trans('naturatherapy/global.prefered_method') !!}</label>
                                <select class="border-radius-none form-control select2" name="nacin_plakanje">
                                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                        'Kartela') selected @endif value="karticka">{!! trans('naturatherapy/global.card') !!}</option>
                                    <option @if(isset($client->nacin_plakanje) && $client->nacin_plakanje ==
                                        'Para në dorë') selected @endif value="gotovo">{!! trans('naturatherapy/global.cash') !!}</option>
                                </select>
                            </div>
                            <div class="single-input">
                                <div class="user_address">{!! trans('naturatherapy/global.adress_live') !!}</div>
                            </div>
                            <div class="single-input single-input-half">
                                <label>{!! trans('naturatherapy/global.adress') !!}</label>
                                <div class="@if($errors->has('address')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control" name="address" value="{{ old('address', $client->address) }}">
                                </div>
                            </div>
                            <div class="single-input single-input-half">

                                <label>{!! trans('naturatherapy/global.city') !!}</label>
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
                                <label>{!! trans('naturatherapy/global.area') !!}</label>
                                <div class="@if($errors->has('address')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control" name="municipality" value="{{ old('municipality', $client->municipality) }}">
                                </div>
                            </div>
                            <div class="single-input">
                                <div class="user_address">{!! trans('naturatherapy/global.adress_shipping') !!}</div>
                            </div>
                            <div class="single-input single-input-half">
                                <label>{!! trans('naturatherapy/global.adress') !!}</label>
                                <div class="@if($errors->has('address_shiping')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control" name="address_shiping" value="{{ old('address_shiping', $client->address_shiping) }}">
                                </div>
                            </div>
                            <div class="single-input single-input-half">
                                <label>{!! trans('naturatherapy/global.city') !!}</label>
                                <div>


                                    <select id="city_id_shipping" class="border-radius-none form-control" style="width:100%;" name="city_id_shipping">
                                        <option selected value="27" data-name="Скопје" data-zip="1000">
                                            {!! trans('naturatherapy/global.skopje') !!}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="single-input single-input-half">
                                <label>{!! trans('naturatherapy/global.area') !!}</label>
                                <div class="@if($errors->has('address')) has-error  @endif">
                                    <input type="text" class="border-radius-none form-control" name="municipality_shipping" value="{{ old('municipality_shipping', $client->municipality_shipping) }}">
                                </div>
                            </div>
                            <div class="single-input">
                                <label for="account-details-oldpass">{!! trans('naturatherapy/global.moment_pasword') !!}</label>
                                <input type="password" name="old_password" id="account-details-oldpass">
                            </div>
                            <div class="single-input">
                                <label for="account-details-newpass">{!! trans('naturatherapy/global.new_password') !!}</label>
                                <input type="password" name="password" id="account-details-newpass">
                            </div>
                            <div class="single-input">
                                <label for="account-details-confpass">{!! trans('naturatherapy/global.confirm_password') !!}</label>
                                <input type="password" name="password_confirmation" id="account-details-confpass">
                            </div>
                            <div class="single-input">

                                <button type="submit" class="btn btn-lg btn_white btn-submit">{!! trans('naturatherapy/global.save') !!}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                <div class="myaccount-orders">
                    <h4 class="small-title text-center">{!! trans('naturatherapy/global.your_order') !!}</h4>
                    @if(count($order_data) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>{!! trans('naturatherapy/global.order') !!}</th>
                                    <th>{!! trans('naturatherapy/global.date') !!}</th>
                                    <th>{!! trans('naturatherapy/global.product') !!}</th>
                                    <th>{!! trans('naturatherapy/global.price') !!}</th>
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
                                        {{number_format((int)$total)}} LEK
                                        {{--@endforeach--}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @else
                    <h5 class="pt-30 text-center">{!! trans('naturatherapy/global.add_to_cart') !!}</h5>
                    @endif

                </div>
            </div>
            <div class="tab-pane fade" id="account-wishlist" role="tabpanel" aria-labelledby="account-wishlist-tab">
                <div class="myaccount-wishlist">
                    <h4 class="small-title text-center">{!! trans('naturatherapy/global.wishlist') !!}</h4>
                    @if(count($wishlist_items) > 0)
                    <table class="shop_table cart wishlist_table_nr" data-pagination="no" data-per-page="5" data-page="1" data-id="" data-token="">
                        <tbody>
                            @foreach($wishlist_items as $wi)
                            <tr wish-list-row="{{$wi->id}}">
                                <td class="product-remove">
                                    <div>
                                        <a data-remove-from-wish-list value="{{$wi->id}}" class="remove remove_from_wishlist" title="{!! trans('naturatherapy/global.no_order') !!}">×</a>
                                    </div>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="{{ $urlLang }}p/{{$wi->id}}/{{$wi->url}}">
                                        <img width="73" height="84" src="{{$wi->image}}" class="attachment-shop_thumbnail wp-post-image" alt="amofw-5635"> </a>
                                </td>
                                <td class="product-name">
                                    <a href="{{ $urlLang }}p/{{$wi->id}}/{{$wi->url}}">{{$wi->title}}</a>
                                </td>
                                <td class="product-price text-center price">
                                    @if( EasyShop\Models\Product::hasDiscount( $wi->discount ) )
                                    <?php
                                    $discount = EasyShop\Models\Product::getPriceRetail1($wi, false, 0);
                                    $discountPercentage = (($wi->price - $discount) / $wi->price) * 100;
                                    ?>
                                    <del>
                                        <span>{{number_format($wi->price, 0, ',', '.')}} LEK</span>
                                    </del>
                                    <ins>
                                        <span class="amount">{{$discount}} LEK</span>
                                    </ins>
                                    @else
                                    <ins>
                                        <span class="amount">{{number_format($wi->price, 0, ',', '.')}} LEK</span>
                                    </ins>
                                    @endif
                                </td>
                                <td class="product-add-to-cart">
                                    <!-- Date added -->
                                    <!-- Add to cart button -->

                                    <a rel="nofollow" data-add-to-cart value="{{$wi->id}}" data-product_sku="" data-quantity="1" class="btn btn-dark btn-lg add-to-cart"> <span> {!! trans('naturatherapy/global.buy') !!} </span> </a>
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
                    <h5 class="pt-30 text-center">{!! trans('naturatherapy/global.no_order_wishlist') !!}</h5>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $.urlParam = function(name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return results;
        }

        if ($.urlParam('wishlist')) {
            $("#account-details-tab").parent("li").removeClass("active");
            $("#account-wishlist-tab").parent("li").addClass("active");
            $("#account-details").removeClass("active");
            $("#account-wishlist").addClass("active");

        }
    });
</script>
@stop