@extends('clients.lilit.layouts.default')
@section('content')
    <div class="heading-container">
        <div class="container heading-standar">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li><span><a href="{{route('home')}}" class="home"><span>Home</span></a></span></li>
                    <li><span>{{$category->title}}</span></li>
                </ul>
            </div>
        </div>
    </div>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="row section-collection">
                        <div class="col-sm-12">
                            <div class="row inner">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <h2 class="text-center custom_heading">{{$category->title}}</h2>
                                    <div class="separator content_element separator_align_center sep_width_10 sep_border_width_2 sep_pos_align_center separator_no_text sep_color_black">
													<span class="sep_holder sep_holder_l">
														<span class="sep_line"></span>
													</span>
                                        <span class="sep_holder sep_holder_r">
														<span class="sep_line"></span>
													</span>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                                    <div class="shop columns-4">
                                        <ul class="products">
                                            @foreach($categoriesChunked as $categoriesRows)
                                                @foreach ($categoriesRows as $item)
                                        <li style="height:430px" class="product">
                                            <div class="product-container">
                                                <figure>
                                                    <div class="product-wrap">
                                                        <div class="product-images">
                                                            <div class="shop-loop-thumbnail">
                                                                <a class="overlay-link" href="{{route('category', [$item->id, $item->url])}}">
                                                                  @if($item->image)
                                                                    <img style="height: 350px !important;"
                                                                         data-src="/uploads/category/{{$item->image}}" class="img-responsive"
                                                                         alt="{{$item->title}}">
                                                                      @endif
                                                                </a>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <figcaption>
                                                        <div class="shop-loop-product-info">
                                                            <div style="margin-top:10px;" class="info-title">
                                                                <h3 style="font-size:20px;" class="product_title"><a href="{{route('product', [$item->id, $item->url])}}">{{$item->title}}</a></h3>
                                                            </div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </li>
                                                @endforeach
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection