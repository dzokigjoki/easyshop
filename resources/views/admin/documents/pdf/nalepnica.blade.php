<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
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
            font-size: 13px;
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
            text-align: right;
            font-size: 12px;
            font-weight: normal;
        }

        .invoice-table tbody tr td {
            background: #f9f9f9;
            padding: 5px;
            line-height: 1;
            vertical-align: middle;
            text-align: left;
            font-size: 12px;
            letter-spacing: -1px;
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

        td {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">

    <?php    $result = DB::table('settings')->get();    ?>



    <?php 
      $from_data = json_decode($document->document_json);
     $from_data = $from_data->userBilling;
    ?>

  
    <div class="container">
        <table style="width: 100%">
            <tr>
                <td>
                    Испраќач: {{ \EasyShop\Models\AdminSettings::getField('titlepage')}}
                </td>
                @if(config( 'clients.'. config( 'app.client')) == 'mymoda')
                <td>
                    <strong>Пакет</strong>: Тежина 1.00кг
                </td>
                @endif
            </tr>
            <tr>
                <td>Тел: {{\EasyShop\Models\AdminSettings::getField('telephone')}}
            <br>
            <strong>Цена</strong> {{ number_format($document->price_delivery,2,",",".") }} ден.
                <br>
                <strong>Откуп</strong> {{ number_format($sums['sum_vat'],2,",",".") }} ден.
                <br>
                <strong>Вкупно</strong>   {{ number_format($sums['sum_vat'] + $document->price_delivery,2,",",".") }} ден.

                </td>
                <td>
                    <strong>Цена</strong> {{ number_format($document->price_delivery, 2,",",".") }} ден.
                    <br>
                    <strong>Откуп</strong> {{ number_format($sums['sum_vat'],2,",",".") }} ден.
                    <br>
                    <strong>Вкупно</strong>   {{ number_format($sums['sum_vat'] + $document->price_delivery,2,",",".") }} ден.
                </td>
            </tr>
            <tr>
                <td><strong>Примач</strong> 
                <br>
                <span>
                    {{$from_data->first_name}} {{$from_data->last_name}}
                    <br>
                    <?php $city = EasyShop\Models\City::find($from_data->city_id);?>
                    {{$city->city_name}}
                    <br>
                    {{$from_data->address}}
                    <br>
                    {{$from_data->phone}}
                </span>
                </td>
                <td>
                    <img src="{{public_path('assets/admin/easyshop/'.config( 'app.client').'/logo.png')}}" alt="logo" width="100"/>

                </td>
            </tr>

        </table>
    </div>
</body>
</html>