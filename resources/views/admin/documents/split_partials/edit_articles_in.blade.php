<form method="post" action="{{URL::to('admin/document/narachka/split')}}/{{$document_id}}">
{{csrf_field()}}
<input type="hidden" name="order_documentid" value="{{$document_id}}">
<div class="col-md-11" style="text-align: right">

<input type="submit" class="btn btn-success" style="margin-bottom: 10px;" name="submit" value="Подели нарачка">

</div>
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">Артикли во оваа {{$document_type_show}}</div>
    <div class="panel-body">
        <table articles-table class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th></th>
                <th> Артикл </th>
                <th> Кол. </th>
                <th> Eдинеч.  <br/> цена <br/> без ДДВ </th>
                <th> ДДВ</th>
                <th> Eдинеч. <br/> цена <br/>со ДДВ </th>
                <th>  Вкупен<br/>Износ <br/>со ДДВ </th>
                @if($document_data->status == 'podgotovka' && $document_type != 'vlez')
                    <th></th>
                @endif
            </tr>
            </thead>
        </table>
    </div>
</div>
</div>
</form>