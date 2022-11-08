<!-- - - - - - - - - - - - - - Our brands - - - - - - - - - - - - - - - - -->

<section class="section_offset home_brands">

    <h3 class="offset_title">Брендови</h3>

    <!-- - - - - - - - - - - - - - Carousel of brands - - - - - - - - - - - - - - - - -->

    <div class="manufacturers theme_box">
        <div class="row">

        @foreach($manufacturers as $manufacturer)
            <div class="col-xs-3">
                <a class="manufacturer-link" href="{{route('manufacturer', [$manufacturer->id])}}">
                    {{$manufacturer->name}}
                </a>
            </div>
        @endforeach
        </div>

    </div><!--/ .owl_carousel-->

    <!-- - - - - - - - - - - - - - End of carousel of brands - - - - - - - - - - - - - - - - -->

</section><!--/ .section_offset.animated.transparent-->

<!-- - - - - - - - - - - - - - End our brands - - - - - - - - - - - - - - - - -->