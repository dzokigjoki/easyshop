<aside class="ps-widget--sidebar ps-widget--filter price-slider">
    <div class="ps-widget__header">
        <h3>Цена</h3>
    </div>
    <input type="text" data-price-slider="">
</aside>

{{--@foreach($filters as $filter)--}}

    {{--<aside class="ps-widget--sidebar ps-widget--category">--}}
        {{--<div class="ps-widget__header">--}}
            {{--<h3>{{$filter->name}}</h3>--}}
        {{--</div>--}}
        {{--<div class="ps-widget__content">--}}
            {{--<ul class="ps-list--checked">--}}
                {{--@foreach($filter->attributes as $attribute)--}}
                    {{--<li>--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" data-attribute="" data-id="{{$attribute->id}}">--}}
                            {{--{{$attribute->value}}--}}
                        {{--</label>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</aside>--}}

{{--@endforeach--}}

<aside class="ps-widget--sidebar ps-widget--filter ok-btn-wrap">
    <button class="close-filters">OK</button>
</aside>