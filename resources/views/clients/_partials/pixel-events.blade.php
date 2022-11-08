@if(isset($facebook_pixels))
    @if (session('pixel'))
        @if(!auth()->check() || !auth()->user()->hasAnyRole())
        <script>
            fbq('track', 'Purchase', {
                value: parseFloat('{{ session('pixel') }}'),
                currency: '{{$facebook_pixels_currency}}',
                content_ids: {!! session('productIds') !!},
                content_type: 'product'
            });
        </script>
        @endif
    @endif

    @if (isset($pageName) && $pageName == 'page-product')
        <script>
            fbq('track', 'ViewContent', {
                value: parseFloat('{{\EasyShop\Models\Product::getPriceRetail1($product)}}'),
                currency: '{{$facebook_pixels_currency}}',
                content_category: '{{ $firstCategoryTitle }}',
                content_name: '{{$product->title}}',
                content_type: 'product',
                content_ids: [{{$product->id}}]
            });
        </script>
    @endif

    @if (isset($pageName) && $pageName == 'page-cart' && $totalPrice > 0)
        <script>
            fbq('track', 'InitiateCheckout', {
                value: parseFloat('{{$totalPrice}}'),
                currency: '{{$facebook_pixels_currency}}',
                content_ids: {!! $contentIds !!},
                content_type: 'product',
                contents: {!! $contents !!},
                num_items: parseInt('{{ $totalQuantity}}', 10),
            });
        </script>
    @endif
    @if (isset($pageName) && $pageName == 'search')
        <script>
            fbq('track', 'Search', {
                search_string: '{{$search}}'
            });
        </script>
    @endif
@endif