@extends('clients.peletcentar.layouts.default')

@section('content')
    <div class="page_wrapper">
        <div class="container">
            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul style="margin-bottom: 0px !important;" class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$blog->title}}</li>

            </ul>
            <br>
        </div>
    </div>
    <div class="page_wrapper">

        <div class="container"><br>
            <div class="title-bg">
                <h3 style="text-align: left;" class="title">{{$blog->title}}</h3>
            </div>
            <br>
            <br>
            {{-- @if($blog->image)
                <div class="col-md-10 col-md-offset-1">
                    <img style="margin-right: 40px; margin-top: 23px;" src="{{\ImagesHelper::getBlogImage($blog, NULL, 'md_')}}" alt="{{$blog->title}}"
                         class="xsAlign panel panel-default" align="left"/>
                    <p style="padding-right:30px;"></p>
                        {!! $blog->description !!}
                </div>
            @else --}}
                <div class="title-desc">
                    <div class="row">
                        <div class="col-md-12">
                            {!!  $blog->description !!}
                        </div>

                    </div>
                </div>
            {{-- @endif --}}
        </div>
    </div>

@endsection