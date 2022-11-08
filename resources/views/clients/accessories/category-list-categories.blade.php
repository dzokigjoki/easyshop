@extends('clients.accessories.layouts.default')
@section('content')
<style>
    .category-padding{
        padding: 0 20px 0px !important;
    }
</style>
<div class="hiraola-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                    </div>
                </div> --}}
                <div class="shop-product-wrap grid gridview-3 row">
                    @foreach($categoriesChunked as $categoriesRows)
                        @foreach ($categoriesRows as $item)
                            <div class="col-lg-4">
                                <div class="slide-item">
                                    <div class="single_product">
                                       
                                        <div class="hiraola-product_content category-padding">
                                            <div class="product-desc_info">
                                                <h2><a class="product-name" href="{{route('category', [$item->id, $item->url])}}l">{{$item->title}}</a></h2>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection