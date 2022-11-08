@extends("clients.unlimited_shopping.layouts.default")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center pb-30 pt-30">
                <img src="/assets/global-store/images/empty-shopping-cart.png" alt="">
                <h2 class="mt-20">
                    {{trans('globalstore.orderSuccess')}}
                    <br>
                    {{trans('globalstore.backToHome')}}
                </h2>
                <br>
                <a href="{{route("home")}}" class="ps-btn ps-btn" >{{trans('globalstore.homepage')}}</a>
            </div>
        </div>
    </div>

@endsection