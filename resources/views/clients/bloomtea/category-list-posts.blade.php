@extends('clients.bloomtea.layouts.default')
@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url({{ url_assets('/bloomtea/images/tea-leaves.jpg') }});">
                <div class="container">
                    <div class="txt-center p-t-160 p-b-165">
                        <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                            {{$category->title}}
                        </h2>

                        <span class="txt-m-201 cl0 flex-c-m flex-w">
					<span>

					</span>
				</span>
                    </div>
                </div>
    </section>
    <section class="bg0 p-t-100 p-b-95">
        <div class="container">

            <div class="row">
            @foreach($posts as $post)

                <div class="col-sm-6 col-md-4 p-b-45">
                    <div>
                        <a href="{{route('blog',[$post->id,$post->url])}}" class="wrap-pic-w hov4 how-pos5-parent">
                         <img src="{{\ImagesHelper::getBlogImage($post)}}" />


                        </a>

                        <div class="p-t-28">
                            <h4 class="p-b-10">
                                <a href="{{route('blog',[$post->id,$post->url])}}" class="txt-m-109 cl3 hov-cl10 trans-04">
                                  {{$post->title}}
                                </a>
                            </h4>

                            <p class="txt-s-101 cl6 p-b-18">
                               {!! $post->short_description !!}  </p>

                            <div class="how-line2 p-l-40">
                                <a href="{{route('blog',[$post->id,$post->url])}}" class="txt-s-105 cl9 hov-cl10 trans-04">
                                    Види повеќе
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                @endforeach
            </div>
        </div>
    </section>


@endsection