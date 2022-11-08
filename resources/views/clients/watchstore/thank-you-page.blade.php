@extends('clients.watchstore.layouts.default')
@section('content')
    <section class="main-featured-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <i style="color:black; font-size:300px;" class="fa fa-shopping-cart"></i>
                    <div>
                        <h2 style="color:black;"><strong>{{trans('global.messages.success_order')}}</strong></h2>
                        <br>
                        <a href="{{route('home')}}">
                            <button style="color:white; width:auto; padding: 10px 30px; margin:0 auto; border:none;" class="customBtn" type="submit">
                                {{trans('global.messages.thank_you_for_ordering')}}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection