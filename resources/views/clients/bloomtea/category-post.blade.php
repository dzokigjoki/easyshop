@extends('clients.bloomtea.layouts.default')
@section('content')

        <div class="container" id="mobile-product">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 m-rl-auto p-b-80">
                    <!-- detail blog -->
                    <div class="p-b-50">
                        <div class="wrap-pic-w" style="text-align: center;">
                            @if($category->image)
                                <img style="width: 30%;" src="{{\ImagesHelper::getCategoryImage($category)}}">
                            @endif
                        </div>
                            {!! $category->description !!}
                    </div>
                </div>
            </div>
        </div>
        {{--</div>--}}



@endsection
