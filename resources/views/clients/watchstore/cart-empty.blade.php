@extends('clients.watchstore.layouts.default')
@section('content')
    <section class="main-featured-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <i style="color:black; font-size:300px;" class="fa fa-cart-arrow-down"></i>
                    <div>
                        <h2 style="color:black;"><strong>{{trans('watchstore.emptyCart')}}</strong></h2>
                        <br>
                        <a href="{{route('home')}}">
                            <button style="color:white; padding: 10px 30px; width:auto; margin:0 auto; border:none;" class="customBtn" type="submit">
                                {{trans('watchstore.startShopping')}}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection