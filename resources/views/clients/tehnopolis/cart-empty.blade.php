@extends('clients.tehnopolis.layouts.default')
@section('content')
    <div class="secondary_page_wrapper">

        <div class="container" style="text-align: center">
            <div style="font-size: 24px;text-align: center;margin-bottom: 40px;padding-top: 40px;"> Вашата кошничка е празна.</div>
            <a class="btn btn-danger" href="{{route('home')}}">
                <i style="font-size: 24px;" class="fa fa-shopping-cart"> </i>
                &nbsp;
                &nbsp;
                <span style="cursor: pointer;">Започни со купување</span>
            </a>
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END SIDEBAR & CONTENT -->


@endsection