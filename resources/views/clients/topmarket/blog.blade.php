@extends('clients.topmarket.layouts.default')

@section('content')

    <div class="page_wrapper">

        <div class="container"><br>
            <div class="title-bg">
                <h3 class="title">{{$blog->title}}</h3>
            </div>
            <br>
            @if($blog->image)
                <div class="col-md-12">
                    <div class="col-md-6">
                        {!! $blog->description !!}
                    </div>
                    <div class="col-md-6">
                        <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'md_')}}" alt="{{$blog->title}}"
                             class="panel panel-default"/>
                    </div>
                </div>
            @else
                <div class="title-desc">
                    <div class="row">
                        <div class="col-md-12">
                            {!!  $blog->description !!}
                        </div>

                    </div>
                </div>
            @endif
        </div>


@endsection