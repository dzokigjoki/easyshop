@extends('clients.betajewels.layouts.default')
@section('content')


    <section class="main-featured-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <i class="color-black fs-30" class="fa fa-cart-arrow-down"></i>
                    <div>
                        <h2 class="color-black"><strong>{{trans('betajewels.emptyCart')}}</strong></h2>
                        <br>
                        <a href="{{route('home')}}">
                            <button id="start-shopping" class="customBtn" type="submit">
                                {{trans('betajewels.startShopping')}}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection