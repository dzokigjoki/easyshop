@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="page-content-inner row">
            <form method="post" action="{{ route('admin.importers.store') }}">
                <input type="hidden" name="importer_id" value="{{$importer_id}}">
                {{csrf_field()}}

                <div class="portlet light col-md-12">
                    <div class="portlet-title">
                        <div class="caption">
                            @if($importer_id > 0)
                                <i class="fa fa-shopping-cart"></i>Измени податоци за увозник
                            @else
                                <i class="fa fa-shopping-cart"></i>Нов Увозник
                            @endif

                        </div>
                        <div class="actions btn-set">
                            <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                        class="fa fa-check"></i> Зачувај
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label">Компанија:</label>

                            <div class="col-md-8 @if($errors->has('name')) has-error  @endif">
                                <input type="text" class="form-control" placeholder="Име" name="name"
                                       value="{{ old('name', $importer->name) }}">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 control-label">Држава:</label>

                            <div class="col-md-8">
                                <select id="country_id" class="form-control select2" name="country_id">
                                    @foreach($countries as $co)
                                        <option @if($importer->country_id == $co->id) selected
                                                                                    @endif value="{{$co->id}}">{{$co->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12"
                             style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">
                            <div class="actions btn-set">
                                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                            class="fa fa-check"></i> Зачувај
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#country_id").select2();
        });
    </script>
@stop