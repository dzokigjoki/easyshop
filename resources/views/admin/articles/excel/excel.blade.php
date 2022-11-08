<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <table>


        <tr>
            <th>
                ID
            </th>
            <th>
                Име
            </th>
            <th>
                Баркод
            </th>
            <th>
                Цена
            </th>
            <th>
                Бренд
            </th>
            <th>
                Подкатегорија
            </th>
            <th>
                Категорија
            </th>
        </tr>
        @foreach($products as $p)
        <tr>

            <td>{{$p['id']}}</td>
            <td>{{$p['title']}}</td>
            <?php
             $barcode = strval($p['sku']);
             $barcode_1 = substr($barcode,0,-6);
             $barcode_2 = substr($barcode,7);
             $barcode = $barcode_1.$barcode_2;
             ?>
            <td>{{$barcode}}</td>
            <td>{{$p['price_retail_1']}}</td>
            <td>
                @foreach($p['categories'] as $pc)
                @if($pc['parent'] == 13)
                {{$pc['title']}}
                @break
                @endif
                @endforeach
            </td>
            <td>
                @foreach($p['categories'] as $pc)
                @if($pc['parent'] != 13)
                {{$pc['title']}}
                <?php $pc_id = $pc['parent'] ?>
                @break
                @endif
                @endforeach
            </td>
            <td>
                @foreach($categories as $c)
                @if($c['id'] == $pc_id)
                {{$c['title']}}
                @break
                @endif
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>