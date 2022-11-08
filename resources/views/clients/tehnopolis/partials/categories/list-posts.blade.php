<div class="table_layout" id="products_container">
    @if(count($posts) == 0)
        <section class="theme_box">
            <p>
                Нема артикли за овој производител
            </p>
        </section>
    @else
        <?php $i = 0; ?>
        @foreach($posts as $post)
                <div class="col-md-3 col-sm-6">
                    <div class="product-col">
                        <div class="image">
                            <a href="{{route('blog', [$post->id, $post->url])}}">
                                @if(!empty($post->image))
                                    <img class="img img-responsive" src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}">
                                @else
                                    <img src="/assets/tehnopolis/images/no-image.jpg" alt="{{$post->title}}" class="img-responsive"/>
                                @endif
                            </a>
                        </div>
                        <div class="caption">
                            <h4 class="subcategory-item-heading-constraint">
                                <a href="{{route('blog', [$post->id, $post->url])}}">{{$post->title}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
        @endforeach
    @endif
</div>