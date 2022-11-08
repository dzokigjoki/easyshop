@extends('clients.kliknikupi.layouts.default')
@section('content')
    <div class="breadcrumb" style="padding-bottom: 0">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Дома</a></li>
                <li><a href="#">{{$blog->title}}</a></li>
            </ul>
        </div>
    </div>
    <div class="container offset-0">
        <div class="row">
            <!-- col-center -->
            <div class="col-md-10 col-md-offset-1">
                <div class="content">
                    <h2>{{$blog->title}}</h2>

                    @if($blog->image)
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'md_')}}" alt="{{$blog->title}}" style="width: 100%;"/>
                            </div>
                        </div>
                    @endif
                    <span style="text-align: justify">{!! $blog->description !!}</span>
                </div>
            </div>
        </div>
    </div>

@endsection