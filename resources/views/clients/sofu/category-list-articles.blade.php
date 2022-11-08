@extends('clients.sofu.layouts.default')
@section('content')


<section class="page-banner">
    <h2 class="text-center page-title">{{ $category->title }}</h2>
</section>
<section id="main-container" class="main-container pt_35">
    <div class="row">
        <div class="col-md-10 col-sm-9 main-content main-right">
            <div data-products-list="" class="products">

                @include('clients.sofu.partials.category-products-list')
            </div>

        </div>
        <div style="padding-left: 0; padding-right: 0;" class="col-md-2 col-sm-3 sidebar">
            @include('clients.sofu.category-list-article-leftSide')
        </div>
    </div>
</section>

@stop


@section('scripts')
<script>
    $(document).ready(function() {

        $(".filter_name").click(function() {
            
            $(this).siblings('ul').toggleClass('filters_show');
        });
        $('.irs-diapason').css({
            'background': '#bda47d',
            'height': '3px'
        });
        $('.irs-line').css({
            'height': '3px'
        });

        $('.from').css({
            'background': 'black',
            'width': '3px',
            'border-radius': '0',
            'height': '13px',
            'height': '13px'
        });

        $('.to').css({
            'background': 'black',
            'width': '3px',
            'border-radius': '0',
            'margin-left': '13px',
            'height': '13px'
        });
        
    });
</script>
@stop