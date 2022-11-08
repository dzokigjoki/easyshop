@extends('clients.'.config( 'app.theme').'.layouts.default')
@section('content')
@if(config( 'app.theme') === 'matica')
<div style="background: #fff">
    <picture style="width: 100%">
        <source srcset="{{url_assets('/matica/img/banners/404NotFound.jpg')}}" media="(min-width: 600px)" style="width: 100%"/>
        <img src="{{url_assets('/matica/img/banners/404Error1x1.jpg')}}" style="width: 100%" />
    </picture>
</div>
@else
<div style="font-size:120px;text-align: center;margin-top: 80px;font-weight: bold;line-height: 1;">404</div>
<div style="font-size: 40px;text-align: center;margin-top: 20px;padding-bottom: 60px;font-weight: bold;line-height: 1;">Страната не е пронајдена!</div>
@endif
@endsection
