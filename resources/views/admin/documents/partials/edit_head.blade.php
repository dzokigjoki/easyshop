<div class="portlet-title">
    <div class="caption">
        <i class="fa fa-file-text-o font-dark"></i>
        <span class="caption-subject font-dark bold uppercase"> {{ $document_type_show }}
            <span class="label label-lg label-info"
                style="font-size: 20px;margin-left: 5px;">{{ $document_data->document_number }}</span>
        </span>
        <p class="hidden-xs"><span data-pk="{{ $document_data->id }}"
                class="docdate_class editable editable-click">{{ date('d.m.Y H:i:s', strtotime($document_data->document_date)) }}</span>
        </p>
    </div>
    <div style="padding-left: 15px;" class="btn-group pull-right">
        @if ($document_data->type != 'vlez')
            <button id="doc_status_button" data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-lg" @if ($document_data->type == 'rezervacija' && $document_data->paid == 'platena') disabled @endif>{{ $document_status_show }} <span
                    class="caret"></span></button>
            <ul class="dropdown-menu">
                <?php $i = 0; ?>
                @foreach ($documentStatus_select as $key => $value)
                    <li style="@if ($document_data->status == $key) display:none @endif">
                        <a id="status_{{ $key }}" class="document_statuschange">{{ $value }}</a>
                    </li>
                    @if (($document_data->status == 'ispratena' || $document_data->status == 'generirana') && $i == 0)
                        <li>
                            <a id="status_stornirana" class="document_statuschange">Сторнирана</a>
                        </li>
                    @endif
                    <?php $i = $i + 1; ?>
                @endforeach
            </ul>
        @endif
    </div>
    @if (auth()->user()->canDo('admin'))
        <div class="btn-group pull-right">
            @if ($document_data->type != 'vlez')
                <button id="doc_paidstatus_button" data-toggle="dropdown"
                    class="btn btn-success dropdown-toggle btn-lg">{{ $document_paidstatus_show }} <span
                        class="caret"></span></button>
                <ul class="dropdown-menu">
                    <?php $i = 0; ?>
                    @foreach ($paiddocumentStatus_select as $key => $value)
                        <li style="@if ($document_data->status == $key) display:none @endif">
                            <a id="paidstatus_{{ $key }}"
                                class="document_paidstatuschange">{{ $value }}</a>
                        </li>
                        <?php $i = $i + 1; ?>


                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</div>
