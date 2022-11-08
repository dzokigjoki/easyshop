@extends('clients.tehnopolis.layouts.default')
@section('content')
    <h2 class="product-head">{{$category->title}}</h2>
    <div class="row">

    @foreach($categoriesChunked as $subcategories)
        <!-- - - - - - - - - - - - - - Subcategory - - - - - - - - - - - - - - - - -->
        @foreach($subcategories as $subcategory)
            <div class="col-md-3 col-sm-6">
                <div class="product-col">
                    <div class="image">
                        <a href="{{route('category', [$subcategory->id, $subcategory->url])}}">
                            @if(!empty($subcategory->image))
                                <img data-src="/uploads/category/{{$subcategory->image}}" alt="{{$subcategory->title}}" class="img-responsive product-img"/>
                            @else
                                <img src="/assets/tehnopolis/images/no-image.jpg" alt="{{$subcategory->title}}" class="img-responsive"/>
                            @endif
                        </a>
                    </div>
                    <div class="caption">
                        <h4 class="subcategory-item-heading-constraint">
                            <a href="{{route('category', [$subcategory->id, $subcategory->url])}}">{{$subcategory->title}}</a>
                        </h4>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
    </div>
@stop
