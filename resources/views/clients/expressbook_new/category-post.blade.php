@extends('clients.expressbook_new.layouts.default')
@section('content')

    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark">{{ $category->title }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $category->title }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->

    <div class="contact-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $category->description !!}
                </div>
            </div>
        </div>
    </div>

@endsection
