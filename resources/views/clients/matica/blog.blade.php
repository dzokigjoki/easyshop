@extends('clients.matica.layouts.default')
@section('content')
@section('style')
<link href="{{url_assets('/matica/css/blog.css')}}" rel="stylesheet">
@stop
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <div class="singlepost">
                    <figure><img alt="{{ $blog->title }}" class="img-fluid" src="{{ \ImagesHelper::getBlogImage($blog, null, 'lg_') }}"></figure>
                    <h1>{{ $blog->title }}</h1>
                    <div class="postmeta">
                        <ul>
                            {{-- <li><a href="#"><i class="ti-folder"></i> Category</a></li> --}}
                            <li><i class="ti-calendar"></i> {{ date('d/m/Y', strtotime($blog->publish_at)) }}</li>
                            {{-- <li><a href="#"><i class="ti-user"></i> Admin</a></li> --}}
                        </ul>
                    </div>
                    <!-- /post meta -->
                    <div class="post-content">
                        {!! $blog->description !!}  
                    </div>
                    <!-- /post -->
                </div>
                <!-- /single-post -->

            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                @if(count($categories))
                <div class="widget">
                    <div class="widget-title">
                        <h4>Категории</h4>
                    </div>
                    <ul class="cats">
                        @foreach ($categories as $category)
                        <li><a href="{{ route('category', [$category->id, $category->url]) }}"> {{ $category->title }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- /widget -->

            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->
@stop