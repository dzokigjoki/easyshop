@extends('clients.matica.layouts.default')
@section('style')
<link href="{{url_assets('/matica/css/account.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
  <div class="container margin_30">
    <div class="page_header">
      <h1>Историја на нарачки</h1>
    </div>
    <div class="row" id="main-section">
      <div class="pt-25 col-lg-12 col-xs-12 ml-auto">
        <div class="box_account">
          <div class="form_container">
            <div class="order-details-area-wrap">
              <div class="order-details-table table-responsive">
                @if(count($order_data) > 0)
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>Нарачка</th>
                      <th>Статус</th>
                      <th>Датум</th>
                      <th>Производи</th>
                      <th>Цена</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order_data as $row)
                    @if(isset($row->document_number))
                    <tr class="cart-item">
                      <td style="vertical-align: middle">{{$row->document_number}}</td>
                      <td style="vertical-align: middle">
                        @if ($row->status == 'generirana')
                        <label class="order-label" style="padding:5px 15px; color:white; border-radius: 20px; background-color: #E7712A">
                          Генерирана</label>
                        @elseif ($row->status == 'ispratena')
                        <label class="order-label" style="padding:5px 15px; color:white; border-radius: 20px; background-color: #0096E8">
                          Испратена</label>
                        @elseif ($row->status == 'Dostavena' || $row->status == 'dostavena')
                        <label class="order-label" style="padding:5px 15px; color:white; border-radius: 20px; background-color: #3BDF40">
                          Доставена</label>
                        @elseif ($row->status == 'vratena')
                        <label class="order-label" style="padding:5px 15px; color:white; border-radius: 20px; background-color: #DF3B3B">
                          Вратена</label>
                        @elseif ($row->status == 'reklamacija')
                        <label class="order-label" style="padding:5px 15px; color:white; border-radius: 20px; background-color: #DF3B3B">
                          Рекламација</label>  
                        @elseif ($row->status == 'stornirana')
                        <label class="order-label" style="padding:5px 15px; color:white; border-radius: 20px; background-color: #969696">
                          Сторнирана</label>
                        @endif
                      </td>
                      <td style="vertical-align: middle">{{$row->created_at->format('d.m.Y')}}</td>
                      <td style="vertical-align: middle">@foreach($row->items as $i)
                        <strong class="flex-centered">
                          <img width="60" class="pr-15 img img-responsive"
                            src="{{\ImagesHelper::getProductImage($i->product, NULL, 'md_')}}" alt="">
                          {{$i->item_name}}<span style="font-size: 14px; margin-left: 5px;">x{{$i->quantity}}</span>
                        </strong>
                        <br> @endforeach</td>
                      <td style="vertical-align: middle">
                        <?php $total = 0; ?>
                        @foreach($row->items as $i)
                        <?php  $total += $i->sum_vat ?>
                        @endforeach
                        {{number_format((int)$total)}} ден.
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
                @else
                <div class="text-center ps-heading pb-35">Вашата историја на нарачки е празна.</div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection