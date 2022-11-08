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

            @if($i == 0)
                <div class="table_row">
                    @endif

                        <!-- - - - - - - - - - - - - - Posts - - - - - - - - - - - - - - - - -->

                    <div class="table_cell">

                        <div class="product_item">

                            <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->

                            <div class="image_wrap">

                                <img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}">

                                <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->

                                <div class="actions_wrap">

                                    <div class="centered_buttons">

                                        <a href="{{route('blog', [$post->id, $post->url])}}" class="button_green middle_btn add_to_cart">Повеќе</a>

                                    </div><!--/ .centered_buttons -->

                                </div><!--/ .actions_wrap-->

                                <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

                            </div><!--/. image_wrap-->

                            <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->

                            <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->

                            <div class="description">

                                <a href="{{route('blog', [$post->id, $post->url])}}">{{$post->title}}</a>

                                <div class="clearfix product_info">


                                </div>

                            </div>

                            <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->

                        </div><!--/ .product_item-->

                    </div>

                    <!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->
                    <?php $i++; ?>
                    @if($i == 5)
                </div><!--/ .table_row -->
                <?php $i = 0; ?>
            @endif
        @endforeach
    @endif
</div>