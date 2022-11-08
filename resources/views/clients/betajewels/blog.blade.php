@extends('clients.betajewels.layouts.default')
@section('content')

<style>
    h3 {
        font-family: "Roboto Condensed" !important;
    }
    .blog-heading {
        border-bottom: #F7C777 !important;
    }
</style>


    <div style="padding: 30px 0 30px;" class="product-list-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="blog-heading">
                        <h3>{{$blog->title}}</h3>
                    </div>
                    <div class="blog">
                        @if($blog->image)
                            <div class="blog-img">
                                <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}" alt="{{$blog->title}}" style="height:auto; width:100%;" class="img-responsive"/>
                            </div>
                        @endif
                        <div class="blog-down-text text-justify">
                            <p>{!! $blog->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection