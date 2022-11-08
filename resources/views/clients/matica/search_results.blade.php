@extends('clients.matica.layouts.default')
@section('style')
<link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{url_assets('/matica/css/listing.css')}}" rel="stylesheet">
<style>
.select2-container--default .select2-selection--single {
  border: 1px solid #dddddd;
  border-radius: 3px;
}
.select2-container .select2-selection--single {
  height: 38px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 38px;
  right: 10px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 38px;
}

.select2-container {
  width: 100% !important;
}
</style>
@stop
@section('content')
<main>
    <div id="stick_here"></div>
    <div class="toolbox elemento_stick">
      <div class="container text-center">
        {{-- <span class="listing_nbsp">&nbsp;</span> --}}
        <h4 class="relative">Пребарување по "{{ $search }}"</h4>
      </div>
    </div>
    <!-- /toolbox -->
    
    <div class="container margin_30">
      <form method="GET" action="{{route('search')}}" autocomplete="off">
        <div class="row pb-4">
          <div class="col-md-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Пребарувај книги"  name="search" value="{{ $search }}"/>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <select class="select2 form-control" name="search_manufacturer">
                <option value="" >-- Избери автор --</option>
                @foreach($manufacturers as $manufacturer)
                <option value="{{$manufacturer->id}}" {{$manufacturer->id == $search_manufacturer ? 'selected="selected"': ''}}>{{ $manufacturer->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <select class="select2 form-control" name="sort_by">
                <option value="title_asc" {{$order_by == 'title_asc' || empty($order_by) ? 'selected="selected"': ''}}>Име (A - Z)</option>
                <option value="title_desc" {{$order_by == 'title_desc' ? 'selected="selected"': ''}}>Име (Z - A)</option>
                <option value="price_asc" {{$order_by == 'price_asc' ? 'selected="selected"': ''}}>Цена растечка</option>
                <option value="price_desc" {{$order_by == 'price_desc' ? 'selected="selected"': ''}}>Цена опаѓачка</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <select class="select2 form-control" name="results_limit">
                <option value="24" {{$results_limit == 24 ? 'selected="selected"': ''}}>24</option>
                <option value="48" {{$results_limit == 48 ? 'selected="selected"': ''}}>48</option>
                <option value="72" {{$results_limit == 72 ? 'selected="selected"': ''}}>72</option>
                <option value="96" {{$results_limit == 96 ? 'selected="selected"': ''}}>96</option>
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <button class="btn_1 full-width cart">Пребарај</button>
          </div>
        </div>
      </form>
    
    <div class="row">
      <!-- /col -->
      <div class="col-lg-12">
        @include('clients.matica.partials.list-products', ['search' => true])
      </div>
    </div>
    <!-- /row -->			

    @if(count($products))
    <div class="pagination__wrapper no_border add_bottom_30">
      <ul class="pagination">
        <li>{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
      </ul>
    </div>
    @endif
    </div>
  <!-- /container -->
</main>
<!-- /main -->
@stop
@section('scripts')
<script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script>
   $(document).ready(function() {
      $(".select2").select2();
    });
</script>
@stop