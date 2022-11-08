<meta charset="utf-8">
@if(isset($metaTags) && isset($metaTags['firstPage']))
@if(!empty($metaTags['meta_string_homepage']))
<title>{{ $metaTags['meta_string_homepage'] }}</title>
    @else
<title>{{ \EasyShop\Models\AdminSettings::getField('titlepage')}}</title>
    @endif
@elseif(isset($metaTags) && isset($metaTags['title']))
<title>{{isset($metaTags) && isset($metaTags['title']) ? $metaTags['title'] : config( 'app.client') }} :: {{ \EasyShop\Models\AdminSettings::getField('titlepage')}}</title>
@endif

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

{{-- <meta content="Genera Development" name="author"> --}}

@if(config( 'app.client') == 'shopathome')
<meta content='Kinderlend' name="description">
@else
<meta content="{{ isset($metaTags) && isset($metaTags['description']) ? $metaTags['description'] : config( 'app.client') }}" name="description">
@endif

<meta content="{{ detectUrlLang() }}" name="locale">

@if(config( 'app.client') == 'shopathome')
<meta content="Kinderlend" name="keywords">
@else
<meta content="{{ isset($metaTags) && isset($metaTags['keywords']) ? $metaTags['keywords'] : config( 'app.client') }}" name="keywords">
@endif

{{-- FAVICON --}}
@include('clients._partials.favicon')

@if (\EasyShop\Models\AdminSettings::getField('googleVerification'))
<meta name="google-site-verification" content="{{ \EasyShop\Models\AdminSettings::getField('googleVerification') }}" />
@endif
{{--<meta property="og:site_name" content=">--}}
<meta property="og:title" content="{{ isset($metaTags) && isset($metaTags['title']) ? $metaTags['title'] : config( 'app.client') }}">
<meta property="og:description" content="{{ isset($metaTags) && isset($metaTags['description']) ? $metaTags['description'] : config( 'app.client') }}">
@if (isset($metaTags) && isset($metaTags['product'])) 
<meta property="og:type" content="product">
@else  
<meta property="og:type" content="website">
@endif
@if (isset($metaTags) && isset($metaTags['image']))
<meta property="og:image" content="{{$metaTags['image']}}">
@else
<meta property="og:image" content="{{url('/assets/fb/'.config( 'app.client').'/logo.png')}}">
@endif
<meta property="og:url" content="{{url()->full()}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="fb:app_id" content="302184056577324" />
@if (isset($metaTags) && isset($metaTags['product']))
<meta property="product:original_price:amount"   content="{{ isset($metaTags) && isset($metaTags['original_price_amount']) ? $metaTags['original_price_amount'] : config( 'app.client') }}" />
<meta property="product:original_price:currency" content="{{ $metaTags['currency'] }}" />
<meta property="product:price:amount"            content="{{ isset($metaTags) && isset($metaTags['product_price_amount']) ? $metaTags['product_price_amount'] : config( 'app.client') }}" />
<meta property="product:price:currency"          content="{{ $metaTags['currency'] }}" />
<meta property="product:shipping_cost:amount"    content="{{ isset($metaTags) && isset($metaTags['shipping_cost_amount']) ? $metaTags['shipping_cost_amount'] : config( 'app.client') }}" />
<meta property="product:shipping_cost:currency"  content="{{ $metaTags['currency'] }}" />
<meta property="product:sale_price:amount"       content="{{ isset($metaTags) && isset($metaTags['product_sale_amount']) ? $metaTags['product_sale_amount'] : config( 'app.client') }}" />
<meta property="product:sale_price:currency"     content="{{ $metaTags['currency'] }}" />
@endif
@if (\EasyShop\Models\AdminSettings::getField('googleAnalytics'))
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', "{{ \EasyShop\Models\AdminSettings::getField('googleAnalytics') }}", 'auto');
ga('send', 'pageview');
</script>
@endif