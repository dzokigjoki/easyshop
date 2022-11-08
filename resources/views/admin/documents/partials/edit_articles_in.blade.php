@if($document_data->status != 'podgotovka')
<div class="col-md-12">
    <p>Магацин: {{$document_warehouse->title}}</p>
    <p>Тип на нарачка: {{ $document_data->type_of_order }}</p>
</div>
@endif
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
                        <th> Eдинеч. <br /> цена <br /> без ДДВ </th>
                        <th> ДДВ</th>
                        <th> Eдинеч. <br /> цена <br />со ДДВ </th>
                        <th> Вкупен<br />Износ <br />со ДДВ </th>
                        @if($document_type != 'vlez')
                        <th> Слика</th>
                        @endif
                        @if(config( 'app.client') == 'kopkompani')
                        <th> Локација </th>
                        @endif
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>