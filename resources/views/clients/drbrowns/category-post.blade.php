@extends('clients.drbrowns.layouts.default')
@section('content')
    <div class="page-banner" style="background-repeat: no-repeat;background-position: center top; background-image: url('images/temp-images/banner.jpg'); background-size: cover;">
        <div class="container fadeInLeft ">
            <h2 style="text-align: center;" class="page-title">{{$category->title}}</h2>
        </div>
    </div>
    <!-- start of page content -->
    @if(Request::segment(3) != 'nagradi')
        <div class="container fade-in-up">
            <div class="row">
                @if($category->image)
                    <div class="main col-md-12" role="main">
                        <!-- Post -->
                        <article class="blog-post clearfix format-gallery has-post-thumbnail hentry category-recipes post_format-post-format-gallery">

                            <div class="slider-gallery-type-post">
                                <a data-imagelightbox="gallery" href="images/temp-images/home-blog-img.jpg" title="" >
                                    <img class="product-img" src="{{\ImagesHelper::getBlogImage($category)}}"
                                         style="height: auto; width: 100%;" alt=""/>
                                </a>
                            </div>
                        </article>
                    </div>
                @endif
                <div class="main col-md-12">
                    <article>
                        <div class="entry-content">
                            <p>{!! $category->description !!} </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    @else
        <div>
            <div class="row">
                @if($category->image)
                    <div class="main col-md-12" role="main">
                        <!-- Post -->
                        <article class="blog-post clearfix format-gallery has-post-thumbnail hentry category-recipes post_format-post-format-gallery">

                            <div class="slider-gallery-type-post">
                                <a data-imagelightbox="gallery" href="images/temp-images/home-blog-img.jpg" title="" >
                                    <img class="product-img" src="{{\ImagesHelper::getBlogImage($category)}}"
                                         style="height: auto; width: 100%;" alt=""/>
                                </a>
                            </div>
                        </article>
                    </div>
                @endif
                <div class="main col-md-12">
                    <article>
                        <div class="entry-content">
                            <p>{!! $category->description !!} </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    @endif
    <!-- end of page content -->
    {{--{!! $category->description !!}--}}
@endsection