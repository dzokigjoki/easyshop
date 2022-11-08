@extends('clients.yeppeuda.layouts.default')
@section('content')
<style>
    p {
        padding-bottom: 9px;
    }
</style>
<div class="content-wrapper oh">

    <!-- Single Product -->
    <section class="section-wrap pt-40 single-product">
        <div class="container-fluid semi-fluid">
            <div class="row">
                <div class="col-12">
                    {!! $category->description !!}
                </div>
            </div>
        </div>
    </section>

</div>
@endsection