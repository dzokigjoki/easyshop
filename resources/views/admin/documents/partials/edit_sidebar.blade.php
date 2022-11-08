<?php
$my_user_global = Auth::user();
?>

{{-- Show the Print and Send email buttons for all documents that are not in preparation --}}

@if ($document_data->status !== 'podgotovka')
<div class="col-md-2">
        @if(Auth::user()->hasRole('admin') && $document_type =='priemnica' && \EasyShop\Models\AdminSettings::getField('fixCeni'))
            <a target="_blank" class="btn btn-block default blue" href="{{URL::to('admin/document/nabavniceniFix')}}/{{$document_id}}" style="margin-bottom: 1em;"><i class="fa"></i> Корекција на <br/>набавни цени </a>
        @endif
        @if( ($document_type =='faktura' && $document_data->status == 'ispratena') || ( $document_type =='fiskalna' && $document_data->status == 'ispratena') || ( $document_type =='ostanato' && $document_data->status == 'ispratena') )
            <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <form method="post" action="{{URL::to('admin/generate/ispratnica')}}" >
                    <input type="submit" class="btn btn-block default blue" name="kreiraj_ispratnica" value="Креирај испратница"></input>
                    <input type="hidden" name="document_id" value="{{$document_id}}">
                    {{csrf_field()}}
                </form>
            </div>
            </div>
        @endif
        @if( ($document_type =='profaktura' && $document_data->status == 'generirana') )
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                <form method="post" action="{{URL::to('admin/generate/ispratnica')}}" >
                    <input type="submit" class="btn btn-block default blue" name="kreiraj_ispratnica" value="Креирај испратница"></input>
                    <input type="hidden" name="document_id" value="{{$document_id}}">
                    {{csrf_field()}}
                </form>
                <form method="post" action="{{URL::to('admin/generate/faktura')}}" >
                    <input type="submit" class="btn btn-block default blue" name="kreiraj_faktura" value="Креирај фактура"></input>
                    <input type="hidden" name="document_id" value="{{$document_id}}">
                    {{csrf_field()}}
                </form>
                <form method="post" action="{{URL::to('admin/generate/fiskalna')}}" >
                    <input type="submit" class="btn btn-block default blue" name="kreiraj_fiskalna" value="Креирај фискална"></input>
                    <input type="hidden" name="document_id" value="{{$document_id}}">
                    {{csrf_field()}}
                </form>
                <form method="post" action="{{URL::to('admin/generate/ostanato')}}" >
                    <input type="submit" class="btn btn-block default blue" name="kreiraj_ostanato" value="Креирај останато"></input>
                    <input type="hidden" name="document_id" value="{{$document_id}}">
                    {{csrf_field()}}
                </form>
            </div>
            </div>
        @endif
        @if( ($document_type =='narachka' && $document_data->status == 'generirana') )
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <form method="post" action="{{URL::to('admin/generate/profaktura')}}" >
                        <input type="submit" class="btn btn-block default blue" name="kreiraj_profaktura" value="Креирај профактура"></input>
                        <input type="hidden" name="document_id" value="{{$document_id}}">
                        {{csrf_field()}}
                    </form>
                    <form method="post" action="{{URL::to('admin/generate/faktura')}}" >
                        <input type="submit" class="btn btn-block default blue" name="kreiraj_faktura" value="Креирај фактура"></input>
                        <input type="hidden" name="document_id" value="{{$document_id}}">
                        {{csrf_field()}}
                    </form>
                    {{--<form method="post" action="{{URL::to('admin/generate/fiskalna')}}" >--}}
                        {{--<input type="submit" class="btn btn-block default blue" name="kreiraj_fiskalna" value="Креирај фискална"></input>--}}
                        {{--<input type="hidden" name="document_id" value="{{$document_id}}">--}}
                        {{--{{csrf_field()}}--}}
                    {{--</form>--}}
                    <form method="post" action="{{URL::to('admin/generate/ostanato')}}" >
                        <input type="submit" class="btn btn-block default blue" name="kreiraj_ostanato" value="Креирај останато"></input>
                        <input type="hidden" name="document_id" value="{{$document_id}}">
                        {{csrf_field()}}
                    </form>
                    <form method="post" action="{{URL::to('admin/generate/ispratnica')}}" >
                        <input type="submit" class="btn btn-block default blue" name="kreiraj_ispratnica" value="Креирај испратница"></input>
                        <input type="hidden" name="document_id" value="{{$document_id}}">
                        {{csrf_field()}}
                    </form>
                    <form method="post" action="{{URL::to('admin/generate/rezervacija')}}" >
                        <input type="submit" class="btn btn-block default blue" name="kreiraj_rezervacija" value="Креирај резервација"></input>
                        <input type="hidden" name="document_id" value="{{$document_id}}">
                        {{csrf_field()}}
                    </form>
                </div>
            </div>

        @endif
        @if( ($document_type =='rezervacija' && $document_data->status == 'generirana') )

            <form method="post" action="{{URL::to('admin/generate/ispratnica')}}" >
                <input type="submit" class="btn btn-block default blue" name="kreiraj_ispratnica" value="Креирај испратница"></input>
                <input type="hidden" name="document_id" value="{{$document_id}}">
                {{csrf_field()}}
            </form>
        @endif
    <div style="text-align:center">
        <a target="_blank" class="btn btn-block default blue" href="{{URL::to('/admin/document')}}/{{$document_type}}/print/{{$document_id}}" style="margin-bottom: 1em;"><i class="fa fa-file-pdf-o"></i> Превземи PDF </a>
       @if(\EasyShop\Models\AdminSettings::getField('nalepnica'))
        <a target="_blank" class="btn btn-block default blue" href="{{URL::to('/admin/document')}}/nalepnica/print/{{$document_id}}" style="margin-bottom: 1em;"><i class="fa fa-file-pdf-o"></i> Превземи <br> налепница </a>
        @endif

        {{-- Za vlez se pecati plt dokument --}}
        @if($document_type === \EasyShop\Models\Document::TYPE_VLEZ)
            @if($my_user_global->canDo('magacin_vlez_izlez_plt_print'))
                <a target="_blank" class="btn btn-block default blue" href="{{URL::to('/admin/document')}}/{{$document_type}}/print/{{$document_id}}?document=plt" style="margin-bottom: 1em;"><i class="fa fa-file-pdf-o"></i> Превземи ПЛТ </a>
            @endif
        @endif
        <button class="btn btn-block default blue" style="margin-bottom: 1em;"><i class="fa fa-envelope-o"></i> Испрати маил </button>
        @if($document_type === \EasyShop\Models\Document::TYPE_VLEZ)
        {{--Пешатење на цени од документ--}}
            <form target="_blank" method="GET" action="{{route('admin.article.instock.print')}}">
                <input type="hidden" name="document_id" value="{{$document_data->id}}"/>
                <input type="hidden" name="document_type" value="{{$document_data->type}}"/>
                <button target="_blank" class="btn btn-block default blue">Печати цени</button>
                <select name="dimenzija" class="select2" style="width: 100%">
                    <option value="dimenzija_1">Димензија 1</option>
                    <option value="dimenzija_2">Димензија 2</option>
                    <option value="dimenzija_3">Димензија 3</option>
                    <option value="dimenzija_4">Димензија 4</option>
                </select>
            </form>
        @endif

        {{--  @if(config( 'app.client') == 'herline' && \EasyShop\Courier::getCourierName($document_data->courier_id) == "Falcon Logistics")
                <a target="_blank" class="btn btn-block default blue" href="{{URL::to('/admin/document')}}/addresslists/{{$document_id}}/{{ $document_data->courier_id }}" style="margin-bottom: 1em;"><i class="fa fa-file-pdf-o"></i> Адресна листа </a>

        @endif  --}}


        <div class="row" style="margin-top:20px">
            <div class="col-md-12">
            @if(isset($related_ispratnica))
            <p>Испратница <br/> <a href="{{URL::to('/admin/document/ispratnica/edit')}}/{{$related_ispratnica->id}}">{{$related_ispratnica->document_number}}</a></p>
            @endif
            @if(isset($related_povratnica))
            <p>Повратница <br/> <a href="{{URL::to('/admin/document/povratnica/edit')}}/{{$related_povratnica->id}}">{{$related_povratnica->document_number}}</a></p>
            @endif
            @if(isset($related_naracka))
            <p>Нарачка <br/> <a href="{{URL::to('/admin/document/narachka/edit')}}/{{$related_naracka->id}}">{{$related_naracka->document_number}}</a></p>
            @endif
            @if(isset($related_profaktura))
            <p>Профактура <br/> <a href="{{URL::to('/admin/document/profaktura/edit')}}/{{$related_profaktura->id}}">{{$related_profaktura->document_number}}</a></p>
            @endif
            @if(isset($related_faktura))
            <p>Фактура <br/> <a href="{{URL::to('/admin/document/faktura/edit')}}/{{$related_faktura->id}}">{{$related_faktura->document_number}}</a></p>
            @endif
            @if(isset($related_rezervacija))
            <p>Резервација <br/> <a href="{{URL::to('/admin/document/rezervacija/edit')}}/{{$related_rezervacija->id}}">{{$related_rezervacija->document_number}}</a></p>
            @endif
            @if(isset($related_fiskalna))
            <p>Фискална <br/> <a href="{{URL::to('/admin/document/fiskalna/edit')}}/{{$related_fiskalna->id}}">{{$related_fiskalna->document_number}}</a></p>
            @endif
            </div> 
        </div>
    </div>
</div>
@endif
