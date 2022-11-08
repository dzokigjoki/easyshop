@extends('clients.clothes.layouts.default')
@section('content')
<style>
    .pt-0{
        padding-top: 0px !important;
    }
</style>
<div class="main pl-30 pr-30 pt-0  pb-50-politika">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-xs-12">
                    <br>
                    <h1>{{$blog->title}}</h1>
                    <br>
                    <div class="content-page">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop