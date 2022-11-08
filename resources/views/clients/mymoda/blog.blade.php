@extends('clients.mymoda.layouts.default')
@section('content')

<main class="ps-main">
  <div class="container">
    <div class="ps-blog">
      <div class="ps-post--single">
        <h1>{{$blog->title}}</h1>
      </div>
      <div class="ps-post__content">
        <p> {!! $blog->description !!}</p>
      </div>
    </div>
  </div>

</main>


@stop