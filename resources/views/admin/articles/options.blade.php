@extends('layouts.admin')
@section('content')
<div class="portlet light col-md-12">
  <div class="portlet-title">
    <div class="caption">
      <span class="caption-subject font-blue-soft bold uppercase">Пакети за {{$record->title}}</span>
    </div>
  </div>
  <div class="page-content-inner">
    <div class="row">
      <form action="{{route('admin.article.options.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-4">

          @if(isset($packageRecord))
          <h3>Едитирање на пакет</h3>
          <input type="hidden" name="package_id" value="{{$packageRecord->id}}">
          @else
          <h3>Нов пакет</h3>

          @endif


          <hr>
          <div class="form-body">
            @foreach($record->options as $option)
            <div class="form-group">
              <label class="col-md-6 text-left">{{ $option->name }}</label>
              <div class="col-md-6">
                <select class="table-group-action-input form-control" name="values[]">
                  @foreach($option->values as $value)
                  <option value="{{$value->option_id}}_{{ $value->id }}"> {{ $value->name   }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @endforeach
            <input type="hidden" name="product_id" value="{{$record->id}}">
            <div class="form-group" style="padding-top: 100px;"></div>
            <div class="form-group">
              <label class="col-md-6">Количина</label>
              <div class="col-md-6">
                <input type="number" @if(isset($packageRecord)) value="{{$packageRecord['quantity']}}" @else value="100"
                  @endif class="form-control" name="quantity">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6">Цена</label>
              <div class="col-md-6">
                <input type="number" class="form-control" @if(isset($packageRecord)) value="{{$packageRecord['price']}}"
                  @else value="100" @endif name="price">
              </div>
            </div>
          </div>
          <br><br>
          <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Зачувај</button>
        </div>
      </form>

      <div class="col-md-6">
        <h3> Зачувани пакети</h3>
        <hr>
        @foreach($exportPackages as $package)
        <table class="table table-striped" 
          >
          <th>
            <a href="/admin/articles/option/{{ $record->id }}/packages/{{ $package['id'] }}">
              Едитирај
            </a>
          </th>
          <th></th>
          <tbody @if(isset($packageRecord) && $packageRecord->id ==
            $package['id'])
            style="border: 2px solid #4C87B9"
            @endif>
          @foreach($package as $k => $v)
          <tr>
            <td>{{$k}}</td>
            <td>{{$v}}</td>
          </tr>
          @endforeach
        </tbody>
        </table>
        @endforeach

      </div>
    </div>
  </div>
</div>
@stop