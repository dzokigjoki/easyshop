@extends('clients.drbrowns.layouts.default')
@section('content')
    <?php $i = 0; ?>
    <div class="container offset-0">
        <div class="row">
            <br>
            <br>

            @foreach($categoriesChunked as $categoriesRows)
                @foreach ($categoriesRows as $item)
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
                        <div style="height:289px; width:auto;" class="product">
                            <div class="product_inside">
                                <div class="col-xs-12 image-box" style="padding-bottom: 20px;">
                                    <a href="{{route('category', [$item->id, $item->url])}}">
                                        <img style="height:auto; width: 100%; max-height: 340px;" data-src="/uploads/category/{{$item->image}}" alt="">
                                    </a>
                                </div>

                                <h2 class="col-xs-12 title" style="text-align: center;">
                                    <a style="font-size:25px !important;" href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a>
                                </h2>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

            <br>
            <br>
        </div>

    </div>
    <br>
    <br><br>
    <br><br>
    <br><br>

@endsection
