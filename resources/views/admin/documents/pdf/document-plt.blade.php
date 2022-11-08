
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>{{$documentName}} {{$document->document_number}}</title>
    <style>
        @page {
            margin: 40px;
        }
        body {
            margin:0;
            padding: 0;
            color: #333;
            font-family: "dejavu sans";
            font-size: 12px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .invoice-company {
            width: 100%;
            font-size: 14px;
            border-collapse: collapse;
            border-spacing: 0;

        }
        .invoice-company td {
            width: 50%;
            line-height: 1;
            letter-spacing: -1px;
        }
        .invoice-company td.first.name {
            font-size: 14px;
        }
        .invoice-company td.second {
            text-align: right;
        }
        .invoice-company td.second.name {
            font-size: 14px;
        }
        .logo-wrapper {
            text-align: center;
            padding: 20px 0 40px 0;
            font-weight: bold;
            font-size: 26px;
            position: fixed;
            bottom: 50px;
        }

        .text-divider {
            padding: 10px 0;

        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }
        .invoice-table thead {
            background: #399AAC;
            color: #fff;
        }
        .invoice-table thead tr {
            border: none;
        }
        .invoice-table thead tr th {
            vertical-align: middle;
            border-bottom: 1px solid #dddddd;
            padding: 6px 8px;
            line-height: 1;
            text-align: center;
            font-size: 11px;
            font-weight: normal;
        }

        .invoice-table tbody tr td {
            background: #f9f9f9;
            padding: 5px;
            line-height: 1;
            vertical-align: middle;
            text-align: left;
            font-size: 11px;
        }
        .invoice-table tbody tr td.no-bg {
            background: transparent;
        }
        .invoice-table tbody tr td.red-bg {
            background: #399AAC;
            color: #fff;
        }
        .invoice-id {
            font-size: 24px;
            text-align: center;
            padding: 60px 0px 10px 0px;
            letter-spacing: -1px;
        }
        .invoice-id span {
            padding-bottom: 5px;
        }
        .invoice-item td {
            border: 1px solid #ccc;
            padding-right: 8px;
        }
        .invoice-date-services {
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: -1px;
            font-size: 14px;
        }
        .total {
            text-align: right;
        }
        .vat-disclaimer {
            text-align: right;
            font-size: 12px;
            padding-top: 15px;
            letter-spacing: -1px;
            padding-right: 12px;
        }
        .signature {
            width: 182px;
            font-size: 12px;
            letter-spacing: -1px;
            font-style: italic;
            border-top: 2px solid #333;
        }

        /*.footer {*/
        /*padding-top: 60px;*/
        /*}*/
        .footer {
            position: fixed;
            left: 0px;
            bottom: -40px; right: 0px;
            height: 70px;
            text-align: center;
            letter-spacing: -1px;
            color: #999;
            font-size: 12px;
        }
        .footer .first {
            font-size: 14px;
        }
        .payment-terms {
            padding: 15px 0;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">

    <table class="invoice-company">
        <tbody>
        <tr>
            <td class="first">До:</td>
            <td class="second">Од:</td>
        </tr>
        <tr>
            <td class="first name">
                <strong>
                    @if(!empty($to_data->company_name))  {{$to_data->company_name}} @else {{$to_data->first_name}} {{$to_data->last_name}} @endif
                </strong>
            </td>
            <td class="second name">
	            <strong>
                    @if(!empty($from_data->company_name))  {{$from_data->company_name}} @else {{$from_data->first_name}} {{$from_data->last_name}} @endif
	            </strong>
            </td>
        </tr>
        <tr>
            <td class="first">{{$to_data->address}}</td>
            <td class="second">{{$from_data->address}}</td>
        </tr>
        <tr>
            <td class="first">{{$to_data->city_name}}</td>
            <td class="second">@if(!empty($from_data->city_other)) {{$from_data->city_other}} @else{{$from_data->city_name}}@endif</td>
        </tr>
        <tr>
            <td class="first">{{$to_data->country_name}}</td>
            <td class="second">{{$from_data->country_name}}</td>
        </tr>
        <tr>
            <td class="first">&nbsp;</td>
            <td class="second">&nbsp;</td>
        </tr>
        <tr>
            <td class="first">Датум: {{ date('d.m.Y', strtotime($document->document_date)) }}</td>
            <td class="second" style="font-weight: bold;">Образец "ПЛТ"</td>
        </tr>
        <tr>
            <td class="first"></td>
            <td class="second"></td>
        </tr>
        </tbody>
    </table>



    <div class="invoice-id">
        <span>
            Приемен лист во трговија на мало бр: {{$document->document_number}}
        </span>
    </div>
    <table class="invoice-table">
        <thead>
        <tr>
            <th rowspan="2" style="width: 10px;">Р.<br>бр.</th>
            <th rowspan="2">Назив на стоките</th>
            <th rowspan="2" style="width: 10px;">Е.м.</th>
            <th rowspan="2" style="width: 10px;">Кол.</th>
            <th colspan="2">Набавна вредност<br>на стоките</th>
            <th rowspan="2">ДДВ при<br>набавка</th>
            <th colspan="3">Продажна вредност<br>на стоките</th>
            <th rowspan="2">Вкупно<br>ДДВ во<br>продажна<br>вредност</th>
        </tr>
        <tr>
            <th>Ед. цена</th>
            <th>Износ<br>(4х5)</th>
            <th style="width: 10px;">Пропи<br>шана</th>
            <th>Ед. цена</th>
            <th>Износ<br>(4х9)</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
        </tr>
        </thead>

        <tbody>
        <?php $count=1; $vk_nabavna_iznos=0; $vk_ddv_nabavna_iznos=0; $vk_prodazna_iznos=0; $vk_ddv_prodazna_iznos=0;  ?>
        @foreach($document_items as $di)
            <tr class="invoice-item">
                <td style="text-align: right;">{{ $count++ }}</td>
                <td>{{$di->unit_code}} - {{$di->item_name}}</td>
                <td>пар</td>
                <td style="text-align: right;">{{ $di->quantity }}</td>
                <td style="text-align: right;">{{ number_format($di->price_no_vat,2,",",".") }}</td>
                <td style="text-align: right;">{{ number_format($di->sum_no_vat,2,",",".") }}</td><?php $vk_nabavna_iznos+=$di->sum_no_vat; ?>
                <td style="text-align: right;">{{ number_format(($di->sum_vat - $di->sum_no_vat),2,",",".") }}</td><?php $vk_ddv_nabavna_iznos+=($di->sum_vat - $di->sum_no_vat); ?>
                <td style="text-align: right;">{{ $di->vat }}%</td>
                <td style="text-align: right;">{{ number_format($di->original_price,2,",",".") }}</td>
                <td style="text-align: right;">{{ number_format($di->original_sum_vat,2,",",".") }}</td><?php $vk_prodazna_iznos+=$di->original_sum_vat; ?>
                <td style="text-align: right;">{{ number_format(($di->original_sum_vat - $di->original_sum_no_vat),2,",",".") }}</td><?php $vk_ddv_prodazna_iznos+=($di->original_sum_vat - $di->original_sum_no_vat); ?>
            </tr>

        @endforeach
            <tr class="invoice-item" style="font-weight: bold;">
                <td></td>
                <td>Вкупно</td>
                <td></td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;">{{ number_format($vk_nabavna_iznos,2,",",".") }}</td>
                <td style="text-align: right;">{{ number_format($vk_ddv_nabavna_iznos,2,",",".") }}</td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;"></td>
                <td style="text-align: right;">{{ number_format($vk_prodazna_iznos,2,",",".") }}</td>
                <td style="text-align: right;">{{ number_format($vk_ddv_prodazna_iznos,2,",",".") }}</td>
            </tr>


        </tbody>
    </table>


        

    <div style="padding-top: 100px;" class="clearfix">
        <div class="signature text-center" style="float: right;">Потпис на овластено лице</div>
        <div style="float: right; text-align: right; margin-right: 100px;">МП</div>

    </div>




    <div class="logo-wrapper">
        <img src="{{public_path('assets/images/poweredBy.png')}}" alt="EasyShop.mk" width="150"/>
    </div>
</div>
</body>
</html>