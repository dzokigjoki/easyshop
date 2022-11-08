@extends('clients.dobra_voda.layouts.default')
@section('content')
<style>

.image_50{

    width: 50%;
    margin: auto;
}
</style>
<div class="content-container pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="posts masonry text-center" data-layout="masonry" data-masonry-column="3">
                                <div class="posts-wrap masonry-wrap posts-layout-masonry row">
                                    @foreach($categoriesChunked as $categoriesRows)
                                    @foreach ($categoriesRows as $item)
                                    @if($item->parent == $category->id)
                                    <article class="masonry-item col-md-4 col-sm-6 hentry">
                                        <div class="hentry-wrap">
                                            <div class="entry-featured pb-10">
                                                <a href="{{route('category', [$item->id, $item->url])}}">
                                                    @if($item->image)
                                                    <img class="image_50" src="/uploads/category/{{$item->image}}"
                                                        alt="{{$item->title}}">
                                                    @else
                                                    <img width="300" height="300"
                                                        src="https://via.placeholder.com/300x300"/>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="entry-info">
                                                <div class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="{{route('category', [$item->id, $item->url])}}">{{ $item->title }}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop