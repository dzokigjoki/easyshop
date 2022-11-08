@extends('clients.dobra_voda.layouts.default')
@section('content')
<div class="content-container pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="posts masonry text-center" data-layout="masonry" data-masonry-column="3">
                                <div class="posts-wrap masonry-wrap posts-layout-masonry row">
                                    @foreach($categories as $item)
                                    @if(!isset($item['children']))
                                    <article class="masonry-item col-md-4 col-sm-6 hentry">
                                        <div class="hentry-wrap">
                                            <div class="entry-featured pb-10">
                                                <a href="{{route('category', [$item['id'], $item['url']])}}">
                                                    @if($item['image'])
                                                    <img src="/uploads/category/{{$item['image']}}" alt="{{$item['title']}}">
                                                    @else
                                                    <img width="300" height="300" src="https://via.placeholder.com/300x300" />
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="entry-info">
                                                <div class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{ $item['title'] }}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    @else
                                    @foreach($item['children'] as $item_child)
                                    <article class="masonry-item col-md-4 col-sm-6 hentry">
                                        <div class="hentry-wrap">
                                            <div class="entry-featured pb-10">
                                                <a href="{{route('category', [$item_child['id'], $item_child['url']])}}">
                                                    @if($item_child['image'])
                                                    <img src="/uploads/category/{{$item_child['image']}}" alt="{{$item_child['title']}}">
                                                    @else
                                                    <img width="300" height="300" src="https://via.placeholder.com/300x300" />
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="entry-info">
                                                <div class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="{{route('category', [$item_child['id'], $item_child['url']])}}">{{ $item_child['title'] }}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                    @endif
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