@extends('clients.mymoda.layouts.default')
@section('content')
<main class="ps-main">
    <div class="container">
        <div class="ps-blog">
            <div class="ps-blog__posts">
                <article class="ps-post--primary">
                    <div class="ps-post__content">
                        <h4 class="ps-post__title"><a href="#">{{ $category->title }}</a></h4>
                    </div>
                </article>
            </div>

            <div class="ps-post--single">
                <div class="ps-post__content">
                    <div class="ps-content">
                        <p class="ps-highlight">
                            {!! $category->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop