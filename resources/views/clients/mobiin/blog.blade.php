
@extends('clients.mobiin.layouts.default')

@section('content')
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-xs-12">
                    <h1>{{$blog->title}}</h1>
                    <div class="content-page">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection