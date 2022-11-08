<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Забелешка</div>
        <div class="panel-body">
            <textarea id="note" class="form-control @if($errors->has('note')) has-error @endif" name="note">{!! old('note', $document_data->note) !!}</textarea>
        </div>
    </div>
</div>