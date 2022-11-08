@extends('clients.hotspot.layouts.default')
@section('content')
@section('style')
<link href="{{url_assets('/hotspot/css/blog.css')}}" rel="stylesheet">
@stop
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <h1>Новости</h1>
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <!-- /widget -->
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-md-6">
                        <article class="blog">
                            <figure>
                                <a href="{{ route('blog', [$blog->id, $blog->url]) }}">
                                    <img src="{{ \ImagesHelper::getBlogImage($blog) }}" alt="{{ $blog->title }}">
                                    <div class="preview"><span>Прочитај повеќе</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <small>{{ date('M d, Y', strtotime($blog->publish_at)) }}</small>
                                <h2><a href="{{ route('blog', [$blog->id, $blog->url]) }}">{{ $blog->title }}</a></h2>
                                <p>{{ $blog->short_description }}</p>
                            </div>
                        </article>
                        <!-- /article -->
                    </div>
                    <!-- /col -->
                    @endforeach
                </div>
                <!-- /row -->

                <div class="pagination__wrapper no_border add_bottom_30">
                    <ul class="pagination">
                        <li>{{$blogs->links()}}</li>
                    </ul>
                </div>

                {{-- <div class="pagination__wrapper no_border add_bottom_30">
                    <ul class="pagination">
                        <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
                        <li>
                            <a href="#0" class="active">1</a>
                        </li>
                        <li>
                            <a href="#0">2</a>
                        </li>
                        <li>
                            <a href="#0">3</a>
                        </li>
                        <li>
                            <a href="#0">4</a>
                        </li>
                        <li><a href="#0" class="next" title="next page">&#10095;</a></li>
                    </ul>
                </div> --}}
                <!-- /pagination -->

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