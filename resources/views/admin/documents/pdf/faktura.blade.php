<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Invoice</title>
    <style>
        @page {
            margin: 40px;
        }
        body {
            margin:0;
            padding: 0;
            color: #3C3E41;
            font-family: "dejavu sans";
            font-size: 14px;;
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
            line-height: 15px;
            letter-spacing: -1px;
        }
        .invoice-company td.first.name {
            font-size: 16px;
        }
        .invoice-company td.second {
            text-align: right;
        }
        .invoice-company td.second.name {
            font-size: 16px;
        }
        .logo-wrapper {
            text-align: center;
            padding: 20px 0 40px 0;
            font-weight: bold;
            font-size: 26px;
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
            background: #A82B2C;
            color: #fff;
        }
        .invoice-table thead tr {
            border: none;
        }
        .invoice-table thead tr th {
            vertical-align: middle;
            border-bottom: 2px solid #dddddd;
            padding: 8px;
            line-height: 1.42857143;
            text-align: left;
            font-size: 14px;
        }

        .invoice-table tbody tr td {
            background: #f9f9f9;
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            text-align: left;
            font-size: 14px;
        }
        .invoice-table tbody tr td.no-bg {
            background: transparent;
        }
        .invoice-table tbody tr td.red-bg {
            background: #A82B2C;
            color: #fff;
        }
        .invoice-id {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            padding: 60px 0px 10px 0px;
            letter-spacing: -1px;
        }
        .invoice-id span {
            border-bottom: 2px solid #A82B2C;
            padding-bottom: 5px;
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
            width: 225px;
            padding-top: 100px;
            font-size: 14px;
            letter-spacing: -1px;
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

    </style>
</head>
<body>

<div class="container">
    <div class="logo-wrapper">
        <img src="{{public_path('assets/img/logo_invoice.png')}}" alt="odocost.com" width="200"/>
        <div>Let us do your homework!</div>
    </div>


    <div style="text-align: right;padding: 15px 0;">Ljubljana, {{$invoice->date()->format('d F Y')}}</div>

    <table class="invoice-company">
        <tbody>
        <tr>
            <td class="first">To:</td>
            <td class="second">From:</td>
        </tr>
        <tr>
            <td class="first name"><strong>{{$company->name}}</strong></td>
            <td class="second name"><strong>OdoCost d.o.o.</strong></td>
        </tr>
        <tr>
            <td class="first">{{$company->address}}</td>
            <td class="second">Savska cesta 3</td>
        </tr>
        <tr>
            <td class="first">{{$company->postal_code}} {{$company->city}}</td>
            <td class="second">SI-1000 Ljubljana</td>
        </tr>
        <tr>
            <td class="first">{{$company->country ? $company->country->country_name : '' }}</td>
            <td class="second">Slovenia</td>
        </tr>
        <tr>
            <td class="first">TAX no: {{$company->vat_number}}</td>
            <td class="second">Tax no: 57388482</td>
        </tr>
        </tbody>
    </table>


    <div class="invoice-id">
        <span>INVOICE No: {{$invoice->id}}</span>
    </div>
    <div class="invoice-date-services">Period of services rendered {{$periodStart->format('d F Y')}} to {{$periodEnd->format('d F Y')}}</div>

    <table class="invoice-table">
        <thead>
        <tr>
            <th>Item</th>
            <th style="text-align: center;">Quantity</th>
            <th>Price</th>
            <th>VAT</th>
            <th>Sum</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{$invoice->planId}} subscription</td>
            <td style="text-align: center;">1</td>
            <td>{{$invoice->total()}}</td>
            <td>€ 0</td>
            <td>{{$invoice->total()}}</td>
        </tr>
        <tr>
            <td class="no-bg">&nbsp;</td>
            <td class="no-bg"></td>
            <td class="no-bg"></td>
            <td class="no-bg"></td>
            <td class="no-bg"></td>
        </tr>
        <tr>
            <td class="no-bg"></td>
            <td class="no-bg"></td>
            <td class="no-bg"></td>
            <td><strong>Total:</strong></td>
            <td><strong>{{$invoice->total()}}</strong></td>
        </tr>
        </tbody>
    </table>

    <div class="vat-disclaimer">VAT is not charged under Article 94, paragraph 1 of the VAT Act (ZDDV-1).</div>


    <div class="signature">Approved by: Esad Čeman</div>
    <div class="footer">
        <div class="first">Bank account opened at: SKB d.d.,&nbsp;&nbsp;&nbsp;IBAN: SI56 0316 1100 0041 018&nbsp;&nbsp;&nbsp;SWIFT: SKBASI2X</div>
        <div>The company is registered in the Companies Register with the District Court in Ljubljana.</div>
        <div>Company registration number: 6493653000. Share capital amounts to € 7,500.00.</div>
    </div>
</div>

</body>
</html>