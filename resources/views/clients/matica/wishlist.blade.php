@extends('clients.matica.layouts.default')
@section('content')

<style>
    #empty {
        font-size: 18px;
    }
</style>

<main class="ps-main">
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="page_header">
                    <h2>Листа на желби</h2>
                </div>
                @if(count($products) > 0)
                <table class="table cart-list">
                    <tbody>
                        @foreach($products as $product)
                        <tr wish-list-row="{{$product->id}}">
                            <td class="text-center" style="vertical-align:middle">
                                <div class="thumb_cart">
                                    <a href="/p/{{$product->id}}/{{$product->url}}">
                                        <img class="img-fluid lazy" width="150"
                                            src="{{$product->image}}"
                                            data-src="{{$product->image}}"
                                            alt="{{$product->title}}">
                                    </a>
                                </div>
                            </td>
                            <td style="vertical-align:middle">
                                <div style="margin-bottom:25px;">
                                    <a href="/p/{{$product->id}}/{{$product->url}}">
                                        <h3>{{ $product->title }}</h3>
                                    </a>
                                </div>
                                <div class="hidden-xs" style="margin-bottom:25px;">
                                    {!! nl2br($product->short_description) !!}
                                </div>
                                @if(!is_null($product->price_discount))
                                <span class="new_price">{{number_format($product->price_discount, 0, ',', '.')}}
                                    мкд.</span>
                                <span class="old_price">{{number_format($product->price, 0, ',', '.')}} мкд.</span>
                                @else
                                <span class="new_price">{{number_format($product->price, 0, ',', '.')}} мкд.</span>
                                @endif
                            </td>
                            <td style="vertical-align:middle" class="options">
                                <a style="font-size:24px; display:block;" data-add-to-cart="" value="{{$product->id}}"
                                    class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Купи"><i
                                        class="ti-shopping-cart"></i></a>
                                <a style="font-size:24px; display:block;" data-toggle="tooltip" data-placement="left"
                                    value="{{ $product->id }}" data-remove-from-wish-list="" title="Избриши"><i
                                        class="ti-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <label id="empty">Вашата листа на желби е празна!</label>
                @endif
            </div>
        </div>
    </div>
</main>
@stop