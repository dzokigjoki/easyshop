@extends('clients.topmarket.layouts.default')
@section('content')


    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="secondary_page_wrapper">
        <div class="container">
            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
         <Br>
            <div class="row">
                <main class="col-md-12 col-sm-12">
                    @foreach($posts as $post)
                        <div class="col-sm-6 col-md-4">
                            <div class="post has-post-thumbnail">
                                <div class="title-block">
                                    <div class="post-img">
                                        <a href="{{route('blog',[$post->id,$post->url])}}"><img class="panel panel-default" src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}" alt=""></a>
                                    </div>
                                    <div class="post-title">
                                        <h2><a href="{{route('blog',[$post->id,$post->url])}}">{{$post->title}}</a></h2>
                                    </div>

                                </div>
                                <div class="description" style="min-height: 100px;">
                                    {!! $post->short_description !!}
                                </div>

                                {{--<div class="optional-block">--}}
                                {{--<div class="post-link-more">--}}
                                {{--<a href="{{route('blog',[$post->id,$post->url])}}" class="btn btn-underline">Види повеќе</a>--}}
                                {{--</div>--}}

                                {{--</div>--}}
                            </div>
                        </div>
                    @endforeach
                    <!-- - - - - - - - - - - - - - Products - - - - - - - - - - - - - - - - -->
                    {{--<div class="section_offset">--}}
                        {{--<div>--}}
                            {{--@include('clients.tehnopolis.partials.categories.list-posts')--}}
                        {{--</div>--}}

                    {{--</div>--}}



                    <footer class="bottom_box on_the_sides manufacturers-pagination">
                        {{$posts->links()}}
                    </footer>

                    <!-- - - - - - - - - - - - - - End of products - - - - - - - - - - - - - - - - -->

                </main>

            </div><!--/ .row -->

        </div><!--/ .container-->

    </div><!--/ .page_wrapper-->

@endsection