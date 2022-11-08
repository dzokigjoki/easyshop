<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title> Сервис {{$service->document_number}}</title>
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
            margin-top:2%;
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
            text-align: left;
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
    </style>
</head>
<body>
<div class="container">

    

    <?php    $result = DB::table('settings')->first();  ?>

    <table class="invoice-company">
        <tbody>
        <tr>
            <td class="first name">
                @if($client->first_name === 'Гостин')
                    Клиент: __________________________
                @else
                    {{$client->first_name}}
                    {{$client->last_name}}
                @endif
            </td>
            <td class="second name">
                {{$result->company_name}}
            </td>
        </tr>
        <tr>
            <td class="first">
            @if(!empty($client->address))
                {{$client->address}}
            @endif
            </td>
            <td class="second"></td>
        </tr>
        <tr>
            <td class="first">
                {{$client->city->zip}}
                {{$client->city->city_name}},
                {{$client->country->country_name}}
            </td>
            <td class="second">
            {{$result->company_address}} <br/>
                {{$result->company_city}},
                {{$result->company_country}}
            </td>
        </tr>
        <tr>
            <td class="first">{{$client->phone}}<br/>
                @if(!empty($service->contact_phone))
                Контакт телефон: {{$service->contact_phone}}
                @endif</td>
            <td class="second">&nbsp;</td>
        </tr>
        <tr>
            <td class="first">   
            <?php 
                $status_array = 
                [
                    'ПРИМЕН' => 'Примен на сервис',
                    'ЗАВРШЕН' => 'Завршен',
                    "НЕ МОЖЕ" => "НЕ МОЖЕ",
                    "НЕ САКА" => "НЕ САКА",
                    "ПРАТЕН ДМ" => "ПРАТЕН ДМ",
                    "ПРАТЕН АЕ" => "ПРАТЕН АЕ",
                    "ПРИМЕН РЕК" =>"ПРИМЕН РЕК",
                    "ЗАВРШЕН РЕК" =>"ЗАВРШЕН РЕК",
                    "НЕ МОЖЕ РЕК" => "НЕ МОЖЕ РЕК"
                ];

            ?>
                Предлог цена: {{$service->expected_price}}
                <br/>Статус: {{$status_array[$service->servis_status]}}
                @if(!empty($service->date_podignat))
                <br/>Датум подигнат: {{date('d.m.Y',strtotime($service->date_priem))}}
                @endif
            </td>
            <td class="second">
                Примил на сервис: {{ $accepted_by->first_name }} {{ $accepted_by->last_name }}
                {{--<br/>Сервисер: {{ $serviced_by->first_name }} {{ $serviced_by->last_name }}--}}
                @if(!empty($service->date_priem))
                <br/>Датум прием: {{date('d.m.Y',strtotime($service->date_priem))}}
                @endif
                @if(!empty($service->date_zavrsen))
                <br/>Датум завршен: {{date('d.m.Y',strtotime($service->date_priem))}}
                @endif                
            </td>
        </tr>
        </tbody>
    </table>



    <div class="invoice-id">
        <span>
                Сервис бр. {{$service->document_number}}
        </span>
    </div>
    <table class="invoice-table">
    <thead>
    <tr>
        <th  style="text-align:center">Производител</th>
        <th  style="text-align:center">Модел</th>
        <th  style="text-align:center">Сериски број</th>
        <th  style="text-align:center">Passcode</th>
    </tr>
    </thead>
    <tbody>
    		
        <tr>
            <td style="text-align:center">
                {{$service->name}}
            </td>
            <td  style="text-align:center">
                {{$service->model}}
            </td>
            <td  style="text-align:center">
                {{$service->serial_number}}
            </td>
            <td  style="text-align:center">
                {{$service->pass_code}}
            </td>
        </tr>
        </tbody>
    </table>
    @if(!empty($service->used_parts))
    <table class="invoice-table">
    <thead>
    <tr>
        <th style="text-algin:center">Искористени делови</th>        
    </tr>
    </thead>
    <tbody>
        <tr>            
            <td  style="">
                {!! nl2br(e($service->used_parts)) !!} 
            </td>
        </tr>
        </tbody>
    </table>
    @endif
    @if(!empty($service->known_problems))
    <table class="invoice-table">
    <thead>
    <tr>
        <th style="text-algin:center">Оштетувања</th>        
    </tr>
    </thead>
    <tbody>
        <tr>            
            <td  style="">
                {!! nl2br(e($service->known_problems)) !!} 
            </td>
        </tr>
        </tbody>
    </table>
    @endif
    @if(!empty($service->problems))
    <table class="invoice-table">
    <thead>
    <tr>
        <th style="text-algin:center">Дефекти</th>        
    </tr>
    </thead>
    <tbody>
        <tr>            
            <td  style="">
                {!! nl2br(e($service->problems)) !!} 
            </td>
        </tr>
        </tbody>
    </table>
    @endif
    @if(!empty($service->reclamation))
    <table class="invoice-table">
    <thead>
    <tr>
        <th style="text-algin:center">Рекламација</th>        
    </tr>
    </thead>
    <tbody>
        <tr>            
            <td  style="">
                {!! nl2br(e($service->reclamation)) !!} 
            </td>
        </tr>
        </tbody>
    </table>
    @endif
    @if(!empty($service->comment))
    <table class="invoice-table">
    <thead>
    <tr>
        <th style="text-algin:center">Забелешка</th>        
    </tr>
    </thead>
    <tbody>
        <tr>            
            <td  style="">
                {!! nl2br(e($service->comment)) !!} 
            </td>
        </tr>
        </tbody>
    </table>
    @endif
    <br><br><br><br>
    <p style="font-size: 10px;">
        Ги прифаќам долунаведените услови за поправка како и со описот на состојбата и сервисниот проблем.
        __________________________</p>

        <p style="margin-top: 25px; text-align: justify; font-size:8px; line-height: 9px;"><strong>Услови за поправка:</strong><br>
        Прифаќам дека наведените информации како и предлог цената се прелиминарни и може да дојде до промена на истите во текот на поправката. Сервисот не одговара за податоците кои ги има на уредот и не одговара за било какви загуби на истите како резултат на поправката. Исто така прифаќам дека сервисот не одговара за мемориски картички, СИМ картички, полначи, футроли, заштитни фолии и останати аксесоари оставени во сервисот. Прифаќам да ги платам трошоците за дијагностика во износ од 300 денари по уред, доколку се воспостави дека уредот не може или не ми одговара да го поправам. Прифаќам дека сум должен да ги знам сите лозинки и кориснички информации кои сум ги внел во уредот и сервисот не одговара за нивно отстранување.<br>
        Прифаќам дека сервисот гарантира за заменетите делови во траење од 1 месец од подигањето и не гарантира за ниеден друг незаменет (несервисиран) дел на уредот, за кои не издава никаква гаранција. Гаранцијата на поправката важи само доколку уредот правилно се користи, не е механички оштетен, не е потопен во било каква течност и се користел во нормални температурни услови.<br>
        Во случај на рекламација на поправката или на заменетиот дел, сервисот се обврзува во рок од 7 работни дена да го замени повторно или да ги врати средствата уплатени за сервисот, со приложена фискална сметка, според избор на сервисот.<br>
        Прифаќам уредот да се расходува од страна на сервисот доколку истиот не биде подигнат од моја страна 30 дена од датумот на оставање во сервисот.
        </p>

    <div class="logo-wrapper">
        <img src="{{public_path('assets/images/poweredBy.png')}}" alt="EasyShop.mk" width="150"/>
    </div>
</p>
</body>
</html>