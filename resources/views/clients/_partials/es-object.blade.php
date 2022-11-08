<script type="text/javascript">
    window.ES = window.ES || {};
    window.ES.client = '{{config( 'app.client')}}';
    window.ES.product = {
        currency: '{{\EasyShop\Models\AdminSettings::getField('currency')}}'
    };

    window.ES.categories = {
        sliderMin: '{{isset($sliderRange->min_price) ? $sliderRange->min_price : 0}}',
        sliderMax: '{{isset($sliderRange->max_price) ? $sliderRange->max_price : 0}}',
        categoryId: '{{isset($categoryId) ? $categoryId : null}}',
        filters: {!! isset($productFilters) ? json_encode($productFilters) : '{}' !!}
    };

    window.ES.toastr = {!! isset($translationsToastr) ? json_encode($translationsToastr) : '{}' !!};
</script>
     {{-- window.ES.facebook_pixels_currency = '{{$facebook_pixels_currency}}'; --}}
