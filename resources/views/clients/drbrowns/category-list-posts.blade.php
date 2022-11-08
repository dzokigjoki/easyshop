@extends('clients.drbrowns.layouts.default')
@section('content')
    <link rel='stylesheet' href='{{ url_assets('/drbrowns/css/listPosts.css?v=2') }}'/>
    <div style="padding-top:0px;" id="container">
        <main>
            <section id="content">
                <section id="modular_content">
                    <!-- Full Width Editor -->
                    <div class="full_width_editor text_light" style="background-color: #1481bd;">
                        <div class="inside">
                            <p style="margin-bottom: 0; padding-top: 10px; padding-bottom: 20px; font-size: 32px; text-align: center;">
                                <strong>
                                    Совети
                                </strong>
                            </p>
                        </div>
                    </div>
                    <!-- CTA Boxes -->
                    @foreach($posts->chunk(3) as $postChunk)
                    <div class="cta_boxes boxes_3">
                        @foreach ($postChunk as $post)
                            <a href="{{route('blog', [$post->id, $post->url])}}"
                           class="cta_box"
                           style="background-image: url({{\ImagesHelper::getBlogImage($post, NULL, 'lg_')}})">
                                <div class="inside">
                                <h2>
                                    <strong>
                                        {{$post->title}}
                                    </strong>
                                </h2>
                                <img src="{{ url_assets('/drbrowns/images/icon_plus.png') }}"/>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endforeach
                </section>
            </section>
        </main>
    </div> <!-- close container -->
@endsection
