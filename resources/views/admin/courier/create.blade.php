@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="page-content-inner">
        <form method="post" action="{{route('admin.couriers.store')}}">
            <div class="portlet light col-md-12">
                <div class="portlet-title">
                    <div class="caption">
                        @if(isset($courier))
                        <i class="fa fa-user"></i>Измени податоци за курир </div>
                    @else
                    <i class="fa fa-user"></i>Нов курир
                </div>
                @endif
                <div class="actions btn-set">
                    <a class="btn btn-secondary-outline" href="{{route('admin.couriers')}}">Назад</a>
                    <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                            class="fa fa-check"></i> Зачувај</button>
                </div>
            </div>
            <div class="portlet-body">
                {{csrf_field()}}
                <div class="col-md-8 ">
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Име на службата:</label>
                        <div class="col-md-8 @if($errors->has('name')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Име" name="name"
                                value="{{ old('name', $courier->name) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Api Token:</label>
                        <div class="col-md-8 @if($errors->has('api_token')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Api Token" name="api_token"
                                value="{{ old('api_token', $courier->api_token) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Емаил:</label>
                        <div class="col-md-8  @if($errors->has('email')) has-error  @endif">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input name="email" type="email" class="form-control" placeholder="Емаил"
                                    value="{{ old('email', $courier->email) }}"> </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Телефон:</label>
                        <div class="col-md-8 @if($errors->has('phone')) has-error  @endif">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Телефон" name="phone"
                                    value="{{ old('phone', $courier->phone) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Коментар:</label>
                        <div class="col-md-8 @if($errors->has('note')) has-error  @endif">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                <textarea type="text" class="form-control" rows="8" name="note"
                                    value="{{ old('note', $courier->note) }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"
                    style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">
                    <div class="actions btn-set">
                        <a class="btn btn-secondary-outline" href="{{route('admin.couriers')}}">Назад</a>
                        <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                class="fa fa-check"></i> Зачувај</button>
                    </div>
                </div>
                @if(isset($courier) && isset($courier->id))
                <input type="hidden" name="courier_id" value="{{ $courier->id }}">
                @endif
            </div>
    </div>
    </form>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
</script>
@stop