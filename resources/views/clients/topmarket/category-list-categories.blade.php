@extends('clients.topmarket.layouts.default')
@section('content')

    <div class="page_wrapper">
        <div class="container">
            <section class="section_offset">
                <br><br>
                <div class="title-bg">
                    <h3 class="title">{{$category->title}}</h3>
                </div>
                <div id="content">
                @foreach($categoriesChunked as $categoriesRows)
                    <!-- - - - - - - - - - - - - - Subcategory - - - - - - - - - - - - - - - - -->
                        @foreach ($categoriesRows as $item)
                            <div class="item item-hover">
                                <div class="item-image-wrapper">
                                    <figure class="item-image-container">
                                        <a href="{{route('category', [$item->id, $item->url])}}">
                                            <img src="{{\ImagesHelper::getCategoryImage($item,null,'lg_')}}" class="item-image">
                                            <img src="{{\ImagesHelper::getCategoryImage($item,null,'lg_')}}" class="item-image-hover"></a>
                                    </figure>

                                </div>
                                <!-- End .rating-container -->

                                <!-- End .item-action -->
                                <!-- End .item-meta-container -->
                                <div style="text-align: center">
                                    <h3 class="item-name">
                                        <a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a>
                                    </h3>
                                </div><!-- End .item-image-wrapper -->
                            </div>

                            <!-- - - - - - - - - - - - - - End of subcategory - - - - - - - - - - - - - - - - -->

                        @endforeach
                    @endforeach
                </div>

            </section>
        </div>
    </div>



@stop

