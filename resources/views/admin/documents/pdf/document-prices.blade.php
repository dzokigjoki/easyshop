<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
$dimenzija = $_GET['dimenzija'];

switch ($dimenzija) {
    case "dimenzija_1":
        $page_width = '176mm;'; //max 210mm;
        $product_label_size = 'width:88mm; height:54mm;';
        $size_title = 'height: 17mm; max-height: 17mm;';
        $size_desc = 'height: 14mm; max-height: 14mm;';
        $font_size = '11px';
        $font_size_title = '22px';
        $font_size_cena = '16px';
        $rows_per_page = 5;
        break;
    case "dimenzija_2":
        $page_width = '210mm;';
        $product_label_size = 'width:40mm; height:54mm;';
        $size_title = 'height: 15mm; max-height: 15mm;';
        $size_desc = 'height: 16mm; max-height: 16mm;';
        $font_size = '8px';
        $font_size_title = '14px';
        $font_size_cena = '11px';
        $rows_per_page = 5;
        break;
    case "dimenzija_3":
        $page_width = '176mm;';
        $product_label_size = 'width:88mm; height:49mm;';
        $size_title = 'height: 15mm; max-height: 15mm;';
        $size_desc = 'height: 12mm; max-height: 12mm;';
        $font_size = '11px';
        $font_size_title = '22px';
        $font_size_cena = '16px';
        $rows_per_page = 5;
        break;
    case "dimenzija_4":
        $page_width = '176mm;';
        $product_label_size = 'width:88mm; height:49mm;';
        $size_title = 'height: 15mm; max-height: 15mm;';
        $size_desc = 'height: 12mm; max-height: 12mm;';
        $font_size = '11px';
        $font_size_title = '22px';
        $font_size_cena = '16px';
        $rows_per_page = 5;
        break;
    default:
        $page_width = '176mm;';
        $product_label_size = 'width:88mm; height:49mm;';
        $size_title = 'height: 15mm; max-height: 15mm;';
        $size_desc = 'height: 12mm; max-height: 12mm;';
        $font_size = '11px';
        $font_size_title = '22px';
        $font_size_cena = '16px';
        $rows_per_page = 5;
        break;
}
?>

<style>
    body{
        font-family: calibri, arial;
        font-size: {{$font_size}};
        margin:0;
        padding:0;
    }
    @page
    {
        size: auto;
        margin: 5mm 0mm 0mm 0mm;
    }
</style>

{{--<div style="height:2mm;"></div>--}}
<table style="width:{{$page_width}}; padding:0px; margin:0px;">
@for($c = 0; $c < $quantity; $c++)
    <?php $i=1; ?>
    @foreach($productsChunk as $chunk)

            <tr><?php $j=0; ?>
                @foreach($chunk as $product)


                    <td style="border: 1px solid black; overflow: hidden; vertical-align: top; {{$product_label_size}}">
                        <table width="100%">
                            <tr><td width="100%" align="left">Шифра: {{$product->unit_code}}</td></tr>
                            <tr><th width="100%" align="left" style="{{$size_title}} display: block; vertical-align: top; font-size: {{$font_size_title}}; line-height: {{$font_size_title}}; font-weight: bold;">{{$product->title}}</th></tr>
                            <tr><td width="100%" align="left" style="{{$size_desc}} display: block; vertical-align: top; overflow: hidden;">{{$product->short_description}}</td></tr>
                            <tr>
                                <td width="100%" align="left" style="vertical-align: bottom;">
                                    <span style="float: right; font-size: {{$font_size_title}}; font-weight: bold; text-align: right;">
                                        @if(!is_null($product->discount))
                                            <span style="font-size: {{$font_size_cena}}; text-decoration: line-through;">{{number_format($product->price_retail_1,0,",",".") }} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            <br>
                                            {{number_format($product->discount,0,",",".")}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        @else
                                            {{number_format($product->price_retail_1,0,",",".") }} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        @endif
                                    </span>
                                    Гаранција: {{$product->warranty_months}} месеци
                                    <br>
                                    @if($product->importer)
                                    Увозник: {{$product->importer->name}}
                                    @endif
                                    <br>
                                    Потекло: {{$product->country}}
                                </td>
                            </tr>
                        </table>
                    </td>
                    <?php $j++; ?>
                @endforeach
                <?php while($j++<5){ echo '<td>&nbsp;</td>'; } ?>
            </tr>

        <?php if($i++ == $rows_per_page){ $i=1; ?>
            </table>
            <div style="page-break-after:always"></div>
            {{--<div style="height:2mm;"></div>--}}
            <table style="width:{{$page_width}}; padding:0px; margin:0px;">
        <?php } ?>


    @endforeach
@endfor
</table>




        <?php if(0){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title></title>
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
        .product {
            border: 1px solid #333;
            width: 300px;
            height: 200px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 15px;
            position: relative;
        }

        .product-code {
            font-size: 20px;
        }
        .product-name {
            padding: 0;
            margin: 0;
            line-height: 22px;
            font-size: 22px;
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        .product-desc {
            height: 70px;
            overflow: hidden;
        }

        .product-price {
            text-align: right;
            font-size: 24px;
            font-weight: bold;
        }
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        .clearfix { display: inline-block; }
        /* start commented backslash hack \*/
        * html .clearfix { height: 1%; }
        .clearfix { display: block; }
        /* close commented backslash hack */
    </style>
</head>
<body>
<div class="container">



    <table>
    @foreach($productsChunk as $chunk)
        <tr>
            @foreach($chunk as $product)
            <td>
                <div class="product">
                    <div class="product-code">Шифра: {{$product->unit_code}}</div>
                    <h1 class="product-name">{{$product->title}}</h1>
                    <div>Гаранција: {{$product->warranty_months}} месеци</div>
                    @if(!is_null($product->importer))
                    <div>Увозник: {{$product->importer->name}} ({{$product->importer->getCountry->country_name}})</div>
                    @endif
                    <div class="product-desc">{{$product->short_description}}</div>
                    <div class="product-price">{{$product->price_retail_1}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</div>
                    @if(!is_null($product->discount))
                        <div>Нова цена: {{$product->discount}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</div>
                    @endif
                </div>
            </td>
            @endforeach
        </tr>
    @endforeach
    </table>

</div>
</body>
</html>
<?php } ?>