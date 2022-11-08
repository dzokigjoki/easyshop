@extends('clients.topprodukti.layouts.default')
@section('content')
<h1 class="title">{{$category->title}}</h1>
<h3 class="subtitle">Подкатегории</h3>
<div class="category-list-thumb row">
<div id="content" class="col-sm-12">
@foreach($categoriesChunked as $rows)
<div class="row">
    @foreach($rows as $row)
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
         <a href="{{URL::to('/c')}}/{{$row->id}}/{{$row->url}}">
            @if(!empty($row->image))
            <img src="{{$row->image}}" alt="{{$row->title}}" />
            @else
            <img src="{{URL::to('/')}}/assets/topprodukti/image/no_image.jpg" alt="{{$row->title}}" />
            @endif
         </a>
         <a href="{{URL::to('/c')}}/{{$row->id}}/{{$row->url}}">
            {{$row->title}}
         </a>
    </div>
    @endforeach
</div>
@endforeach
</div>
</div>
@stop