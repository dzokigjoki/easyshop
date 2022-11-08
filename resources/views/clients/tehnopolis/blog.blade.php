@extends('clients.tehnopolis.layouts.default')

@section('content')

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->


    <div class="container">

        <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

        <ul class="breadcrumb">

            <li><a href="{{route('home')}}">Дома</a></li>
            <li>{{$blog->title}}</li>

        </ul>

        <section class="section_offset">

            <h1>{{$blog->title}}</h1>

            <!-- - - - - - - - - - - - - - Entry - - - - - - - - - - - - - - - - -->
            @if($blog->image)
                 <img style="padding-right:20px;" align="left" class="img img-responsive" src="{{\ImagesHelper::getBlogImage($blog)}}" alt="{{$blog->title}}">
            @endif
            <article class="entry single">

                {!! $blog->description !!}

            </article>

        </section>


    </div><!--/ .container-->

    <!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->

@stop
@section('scripts')
@stop