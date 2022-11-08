<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
<tr>
    <th>Реден број</th>
    <th>Број документ</th>
    <th>Датум</th>
    <th>Износ</th>
    <th>ДДВ</th>
    <th>Нето</th>
    <th>Tracking</th>
    <th>Влезен документ</th>
</tr>
<?php $reden_broj = 1; ?>
@foreach($docs as $doc)
<?php
    $sum_vat    = $doc->other_data['sum_vat'];
    $sum_no_vat = $doc->other_data['sum_no_vat'];
    $vat        = $sum_vat - $sum_no_vat;
?>
<tr>
    <td>{{$reden_broj++}}</td>
    <td>{{$doc->document_number}}</td>
    <td>{{$doc->maturity_date}}</td>
    <td>{{$sum_vat}}</td>
    <td>{{$vat}}</td>
    <td>{{$sum_no_vat }}</td>
    <td>{{$doc->tracking_code}}</td>
    <td>{{$doc->vlezen_document}}</td>
</tr>
@endforeach
</table>

</body>
</html>