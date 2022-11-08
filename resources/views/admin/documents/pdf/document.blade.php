<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>{{$documentName}} {{$document->document_number}}</title>
    <style>
        .qrclass {
            border: 1px dashed white;
            text-align: center;
            margin-right: 3mm;
            margin-left: -3mm;
            margin-bottom: 0px;
            padding-top: 2mm;
            width: 44.6mm;
            height: 33.8mm;
            display: inline-block;
        }

        .qrclass>.caption {
            display: inline-block;
            bottom: 5px;
            font-weight: 900;
        }

        @page {
            margin: 40px;
        }

        body {
            margin: 0;
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
            bottom: -40px;
            right: 0px;
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
</head><body>
    <div class="container">
        
        <?php    $result = DB::table('settings')->get();    ?>
        <table class="invoice-company">
            <tbody>
                <tr>
                    <td class="first name">
                        @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                        \EasyShop\Models\Document::TYPE_VLEZ)
                        <strong><?php echo $result[0]->company_name; ?><br></strong>
                        @endif
                        @if(!empty($to_data))
                        @if($document->type === \EasyShop\Models\Document::TYPE_POVRATNICA)
                        Од:
                        @else
                        До:
                        @endif
                        <strong>

                            @if(!empty($to_data->company_name)) {{$to_data->company_name}} @else
                            {{$to_data->first_name}} {{$to_data->last_name}} @endif
                            @endif
                        </strong>
                    </td>
                    <td class="second name">
                        @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                        \EasyShop\Models\Document::TYPE_VLEZ)
                        <strong><?php echo $result[0]->company_name; ?><br></strong>
                        @endif
                        @if($document->type === \EasyShop\Models\Document::TYPE_POVRATNICA)
                        До:
                        @else
                        Од:
                        @endif
                        <strong>
                            @if(!empty($from_data))
                            @if(!empty($from_data->company_name)) {{$from_data->company_name}} @else
                            {{$from_data->first_name}} {{$from_data->last_name}} @endif
                            @endif
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td class="first"> @if(!empty($to_data)) {{$to_data->address}} @endif</td>
                    <td class="second"> @if(!empty($from_data)) {{$from_data->address}} @endif</td>
                </tr>
                <tr>
                    <td class="first">
                        @if(!empty($to_data))
                        @if(!empty($to_data->city_other)){{$to_data->zip_other}} {{$to_data->city_other}},
                        @else{{$to_data->zip}} {{$to_data->city_name}}, @endif
                        {{$to_data->country_name}}
                        @endif
                    </td>
                    <td class="second">
                        @if(!empty($from_data))
                        @if(!empty($from_data->city_other)){{$from_data->zip_other}} {{$from_data->city_other}},
                        @else{{$from_data->zip}} {{$from_data->city_name}}, @endif
                        {{$from_data->country_name}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="first">
                        @if($document->type != \EasyShop\Models\Document::TYPE_POVRATNICA)
                        {{$document->warehouse_title}}
                        @endif
                    </td>
                    <td class="second">
                        @if($document->type === \EasyShop\Models\Document::TYPE_POVRATNICA)
                        {{$document->warehouse_title}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="first">
                        <strong>Датум:</strong> {{ date('d.m.Y', strtotime($document->document_date)) }}
                        @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                        \EasyShop\Models\Document::TYPE_PROFAKTURA)
                        @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA)
                        <br><strong>Валута:</strong>
                        @elseif($document->type === \EasyShop\Models\Document::TYPE_PROFAKTURA)
                        <br><strong>Важност:</strong>
                        @endif
                        {{ date('d.m.Y', strtotime($document->maturity_date)) }}
                        @endif
                    </td>
                    <td class="second">
                        @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                        \EasyShop\Models\Document::TYPE_PROFAKTURA)
                        <?php
                        echo '<strong>ЕДБ:</strong> ' . $result[0]->company_vat_number . '<br>';
                        echo $result[0]->company_bank_name . ' ' . $result[0]->company_bank_account . '<br>';
                        if(!empty($result[0]->company_bank_name_2) && !empty($result[0]->company_bank_account_2))
                            echo $result[0]->company_bank_name_2 . ' ' . $result[0]->company_bank_account_2 . '<br>';
                        if(!empty($result[0]->company_bank_name_3) && !empty($result[0]->company_bank_account_3))
                            echo $result[0]->company_bank_name_3 . ' ' . $result[0]->company_bank_account_3 . '<br>';
                        if(!empty($result[0]->company_bank_name_4) && !empty($result[0]->company_bank_account_4))
                            echo $result[0]->company_bank_name_4 . ' ' . $result[0]->company_bank_account_4 . '<br>';
                    ?>
                        @else
                        <?php
                        echo 'ЕДБ: ' . $result[0]->company_vat_number;
                        //echo '<br>' . $result[0]->company_bank_name . ', ' . $result[0]->company_bank_account;
                    ?>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        @if(config( 'app.client') == 'herline' && !is_null($document->courier_tracking_id))
        <?php 
            $qrImage = base64_encode(QrCode::format('png')->errorCorrection('H')->size(200)->generate( $document->courier_tracking_id))
        ?>
        <div style="text-align: center; position: fixed; top: -15px; padding: 0 !important;">
            <img width="150" src="data:image/png;base64, {{ $qrImage }}" />
        </div>
        @endif
        <div class="invoice-id">
            <span>
                @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA && $documentName == "Фактура" && \EasyShop\Models\AdminSettings::getField('fakturaIspratnica'))
                Фактура / Испратница
                @elseif($document->type === \EasyShop\Models\Document::TYPE_IZLEZ)
                Препратница
                @elseif($document->type === \EasyShop\Models\Document::TYPE_VLEZ)
                @elseif($document->type === \EasyShop\Models\Document::TYPE_POVRATNICA_DOBAVUVAC)
                Повратница добавувач
                @else
                {{$documentName}}
                @endif
                бр: {{$document->document_number}}
            </span>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th @if($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA) style="width: 10px;"
                        @endif>#</th>
                    <th @if($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA) style="width: 50px;"
                        @endif>Шифра</th>
                    <th
                        style="@if(!($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA)) width: 40%; @endif text-align: left;">
                        Артикл</th>
                    <th @if($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA) style="width: 30px;"
                        @endif>Кол.</th>
                    <th @if ($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA &&
                        config( 'app.client')=="kopkompani") style="width: 30px;" @endif>Вкупно</th>

                    @if(!($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA))
                    <th>Eдинеч.<br>@if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))без ДДВ @else цена
                        @endif</th>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <th>Данок</th>
                    <th>Eдинеч.<br>со ДДВ</th>
                    @endif
                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                    \EasyShop\Models\Document::TYPE_PROFAKTURA)
                    <th>Рабат</th>
                    @endif
                    <th>Вкупно<br>@if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))со ДДВ@endif </th>
                    @endif

                </tr>
            </thead>

            <tbody>
                <?php $count=1; ?>
                @foreach($document_items as $di)
                <tr class="invoice-item">
                    <td style="text-align: right;">{{ $count++ }}</td>
                    <td>{{$di->unit_code}}</td>
                    <td>{{$di->item_name}}</td>
                    <td style="text-align: right;">{{ $di->quantity }}</td>
                    <td @if ($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA &&
                        config( 'app.client')=="kopkompani") style="width: 30px;" @endif>{{ $di->sum_vat }}</td>

                    @if(!($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA))

                    @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                    \EasyShop\Models\Document::TYPE_VLEZ)
                    <td style="text-align: right;">{{ number_format($di->original_price_no_vat,2,",",".") }}</td>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <td style="text-align: right;">{{ $di->vat }} %</td>
                    @endif
                    <td style="text-align: right;">{{ number_format($di->original_price,2,",",".") }}</td>
                    @else
                    <td style="text-align: right;">{{ number_format($di->price_no_vat,2,",",".") }}</td>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <td style="text-align: right;">{{ $di->vat }} %</td>
                    <td style="text-align: right;">{{ number_format($di->price,2,",",".") }}</td>
                    @endif
                    @endif


                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                    \EasyShop\Models\Document::TYPE_PROFAKTURA)
                    <td style="text-align: right;">{{ number_format($di->discount_type_value,0,",",".") }}
                        {{ $di->discount_type=='fixed'?'':'%'  }}</td>
                    @endif

                    @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                    \EasyShop\Models\Document::TYPE_VLEZ)
                    <td style="text-align: right;">{{ number_format($di->original_sum_vat,2,",",".") }}</td>
                    @else
                    <td style="text-align: right;">{{ number_format($di->sum_vat,2,",",".") }}</td>
                    @endif

                    @endif
                </tr>
                @endforeach
                @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                \EasyShop\Models\Document::TYPE_NARACHKA)
                @if(!empty($document->type_delivery))
                <tr class="invoice-item">
                    <td style="text-align: right;">{{ $count++ }}</td>
                    <td></td>
                    <td>{{$document->type_delivery}}</td>
                    <td style="text-align: right;">1</td>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <td style="text-align: right;">{{$document->price_delivery - $document->price_delivery * 0.18}}</td>
                    @else
                    <td style="text-align: right;">{{$document->price_delivery}}</td>
                    @endif
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <td style="text-align: right;">18 %</td>
                    @endif
                    <td style="text-align: right;">{{$document->price_delivery}}</td>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA)
                    <td style="text-align: right;">0 %</td>
                    @endif
                    <td style="text-align: right;">{{$document->price_delivery}}</td>
                    @endif
                </tr>
                @endif
                @endif
                @if(!($document->type === \EasyShop\Models\Document::TYPE_ISPRATNICA))
                <tr>
                    <td class="no-bg" colspan="8">Заклучно со реден број {{ $count-1 }}.</td>
                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                    \EasyShop\Models\Document::TYPE_PROFAKTURA)
                    <td class="no-bg">&nbsp;</td>
                    @endif
                </tr>
                <tr>
                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                    \EasyShop\Models\Document::TYPE_PROFAKTURA)
                    <td class="no-bg"></td>
                    @endif
                    <td class="no-bg"></td>
                    <td class="no-bg"></td>
                    <td class="no-bg"></td>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <td colspan="3" style="text-align: right;">Вкупно без ДДВ:</td>
                    <td colspan="2" style="text-align: right;">
                        @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                        \EasyShop\Models\Document::TYPE_VLEZ)
                        {{ number_format($sums['original_sum_no_vat'],2,",",".") }}
                        @else
                        @if(!empty($document->type_delivery))
                        {{ number_format(($sums['sum_no_vat']+($document->price_delivery - $document->price_delivery * 0.18)),2,",",".") }}
                        @else
                        {{ number_format($sums['sum_no_vat'],2,",",".") }}
                        @endif
                        @endif
                        ден.</td>
                    @endif
                </tr>
                <tr>
                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                    \EasyShop\Models\Document::TYPE_PROFAKTURA)
                    <td class="no-bg"></td>
                    @endif
                    <td class="no-bg"></td>
                    <td class="no-bg"></td>
                    <td class="no-bg"></td>
                    @if(!config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))
                    <td colspan="3" style="text-align: right;">ДДВ:</td>
                    <td colspan="2" style="text-align: right;">
                        @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                        \EasyShop\Models\Document::TYPE_VLEZ)
                        {{ number_format($sums['original_total_vat'],2,",",".") }}
                        @elseif(!empty($document->type_delivery))
                        {{ number_format($sums['total_vat'] + $document->price_delivery * 0.18,2,",",".") }}
                        @else
                        {{ number_format($sums['total_vat'],2,",",".") }}
                        @endif
                        ден.</td>
                    @endif
                </tr>
                <tr>
                    @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA || $document->type ===
                    \EasyShop\Models\Document::TYPE_PROFAKTURA)
                    <td class="no-bg"></td>
                    @endif
                    <td class="no-bg"></td>
                    <td class="no-bg"></td>
                    <td class="no-bg"></td>
                    <td colspan="2" style="text-align: right;"><strong>Вкупно:</strong></td>
                    <td colspan="3" style="text-align: right;"><strong>
                            @if($document->type === \EasyShop\Models\Document::TYPE_IZLEZ || $document->type ===
                            \EasyShop\Models\Document::TYPE_VLEZ)
                            {{ number_format($sums['original_sum_vat'],2,",",".") }}
                            @else
                            @if(!empty($document->type_delivery))
                            {{ number_format(($sums['sum_vat']+$document->price_delivery),2,",",".") }}
                            @else
                            {{ number_format($sums['sum_vat'],2,",",".") }}
                            @endif
                            @endif
                            ден.</strong></td>
                </tr>
                @endif
            </tbody>
        </table>

        @if(config( 'clients.'. config( 'app.client') .'.firma_bez_danok' ))

        <div style="">Напомена: Друштвото не е ДДВ обврзник!</div>

        @endif


        @if($document->type === \EasyShop\Models\Document::TYPE_FAKTURA)
        <div style="padding-top: 150px;" class="clearfix">
            <div style="margin-bottom: 40px;">За секое ненавремено плаќање пресметуваме законска затезна камата.</div>
            <div class="clearfix">
                <div style="float: left;width: 33.3%;">
                    <div class="signature text-center">Примил</div>
                </div>
                <div style="float: left;width: 33.3%;">
                    <div class="signature text-center">Издал</div>
                </div>
                <div style="float: left;width: 33.3%;">
                    <div class="signature text-center">Овластено лице за<br>потпишување на фактури</div>
                </div>
            </div>
        </div>
        @elseif($document->type != 'fiskalna')
        <div style="padding-top: 100px;" class="clearfix">
            <div class="signature text-center" style="float: left;">Издал</div>
            <div class="signature text-center" style="float: right;">Примил</div>

        </div>
        @endif


        @if($document->note)
        <div style="padding-top: 130px;" class="clearfix">
            <h4>Забелешка:</h4>
            <div>{!! nl2br($document->note) !!}</div>
        </div>
        @endif

        @if(config( 'app.client') == 'herline')
        <div style="bottom: 100px !important;" class="logo-wrapper">
            <img src="{{ public_path('/assets/admin/easyshop/herline/logo.png') }}" width="150" />
        </div>
        @else
        <div class="logo-wrapper">
            <img src="{{public_path('assets/images/poweredBy.png')}}" alt="EasyShop.mk" width="150" />
        </div>
        @endif
    </div>
</body></html>