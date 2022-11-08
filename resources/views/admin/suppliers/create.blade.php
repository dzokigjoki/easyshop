@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="page-content-inner row">
        <form method="post" action="{{URL::to('admin/suppliers/store')}}" enctype="multipart/form-data">
            <input type="hidden" name="supplier_id" value="{{$supplier_id}}">
            {{csrf_field()}}

            <div class="portlet light col-md-12">
                <div class="portlet-title">
                    <div class="caption">
                        @if($supplier_id > 0)
                        <i class="fa fa-shopping-cart"></i>Измени податоци за добавувач
                        @else
                        <i class="fa fa-shopping-cart"></i>Нов Добавувач
                        @endif

                    </div>
                    <div class="actions btn-set">
                        <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Компанија:</label>
                        <div class="col-md-8 @if($errors->has('company_name')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Име" name="company_name" value="{{ old('company_name', $client->company_name) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Контакт лице:</label>
                        <div class="col-md-8 @if($errors->has('contact_lice')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Контакт лице" name="contact_lice" value="{{ old('contact_lice', $client->contact_lice) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">ЕДБ:</label>
                        <div class="col-md-8 @if($errors->has('contact_lice')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="ЕДБ" name="edb" value="{{ old('edb', $client->edb) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Матичен број:</label>
                        <div class="col-md-8 @if($errors->has('maticen')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Матичен број" name="maticen" value="{{ old('maticen', $client->maticen) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Жиро сметка:</label>
                        <div class="col-md-8 @if($errors->has('ziro_smetka')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Жиро сметка" name="ziro_smetka" value="{{ old('ziro_smetka', $client->ziro_smetka) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Банка:</label>
                        <div class="col-md-8 @if($errors->has('banka')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Име" name="banka" value="{{ old('banka', $client->banka) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Адреса:</label>
                        <div class="col-md-8 @if($errors->has('address')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Адреса" name="address" value="{{ old('address', $client->address) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">

                        <label class="col-md-4 control-label">Телефон:</label>
                        <div class="col-md-8 @if($errors->has('phone')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Телефон" name="phone" value="{{ old('phone', $client->phone) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Мобилен телефон:</label>
                        <div class="col-md-8 @if($errors->has('mobile')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Мобилен телефон" name="mobile" value="{{ old('mobile', $client->mobile) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Главна слика
                        </label>
                        <div class="col-md-8">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    @if(!empty($client->image))
                                    <img src="{{asset('uploads/suppliers')}}/{{$client->id}}/md_{{$client->image}}" />
                                    @else
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Избери слика </span>
                                        <span class="fileinput-exists"> Промени </span>
                                        <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Избриши </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Емаил:</label>
                        <div class="col-md-8  @if($errors->has('email')) has-error  @endif">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input name="email" type="email" class="form-control" placeholder="Емаил" value="{{ old('email', $client->email) }}"> </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Држава:</label>
                        <div class="col-md-8">
                            <select id="country_id" class="form-control select2" name="country_id">
                                @foreach($country as $co)
                                <option @if($client->country_id == $co->id) selected @endif value="{{$co->id}}">{{$co->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="country_other form-group col-md-12" style="display:none">
                        <label class="col-md-4 control-label">Останати држави:</label>
                        <div class="col-md-8 @if($errors->has('country_other')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Останати држави" name="country_other" value="{{ old('country_other', $client->country_other) }}">
                        </div>
                    </div>
                    <div id="mkd_gradovi" class="form-group col-md-12" style="@if($client->country_id != 1) display:none @endif">
                        <label class="col-md-4 control-label">Град:</label>
                        <div class="col-md-8">
                            <select id="city_id" class="form-control select2" name="city_id">
                                @foreach($city as $cy)
                                <option @if($client->city_id == $cy->id) selected @endif value="{{$cy->id}}">{{$cy->city_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 city_other" style="@if($client->country_id == 1) display:none @endif">
                        <label class="col-md-4 control-label">Град:</label>
                        <div class="col-md-8 @if($errors->has('city_other')) has-error  @endif">
                            <input id="city_other" type="text" class="form-control" placeholder="Останати градови" name="city_other" value="{{ old('city_other', $client->city_other) }}">
                        </div>
                    </div>

                    <div style="@if($client->country_id == 1) display:none @endif" class="postenski form-group col-md-12">
                        <label class="col-md-4 control-label">Поштенски код:</label>
                        <div class="col-md-8 @if($errors->has('zip_other')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Поштенски код" name="zip_other" value="{{ old('zip_other', $client->zip_other) }}">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Веб сајт:</label>
                        <div class="col-md-8 @if($errors->has('web')) has-error  @endif">
                            <input type="text" class="form-control" placeholder="Веб сајт" name="web" value="{{ old('web', $client->web) }}">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Забелешка:</label>
                        <div class="col-md-8 @if($errors->has('note')) has-error  @endif">
                            <textarea type="text" class="form-control" placeholder="Забелешка" name="note">{{ old('note', $client->note) }} </textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-4 control-label">Тип:</label>
                        <div class="col-md-8 @if($errors->has('type')) has-error  @endif">
                            <select name="type" id="type" class="form-control select2">

                                <option @if($client->type == 'company') selected @endif value="company">Компанија</option>
                                <option @if($client->type == 'person') selected @endif value="person">Физичко лице</option>
                            </select>

                        </div>
                    </div>

                </div>
                <div class="col-md-12" style="border-top: 1px solid #eee;border-radius: 2px 2px 0 0; margin-bottom: 10px;padding-top:12px;text-align:right">
                    <div class="actions btn-set">
                        <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="from_url" value="{{$from_url}}" />
        </form>
    </div>
</div>

@stop
@section('scripts')
<script src="/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#city_id").select2();
        $("#country_id").select2();
        $("#type").select2();

        $("#city_id").on('change', function() {
            var selected_city = $("#city_id :selected").val();

            if (selected_city == '35') {
                $(".city_other").show();
                $(".postenski").show();
            } else {
                $(".city_other").hide();
                $(".postenski").hide();
            }
        });

        $("#country_id").on('change', function() {
            var selected_country = $("#country_id :selected").val();
            if (selected_country == '62') {
                $("#mkd_gradovi").hide();
                $(".country_other").show();
                $(".city_other").show();
                $(".postenski").show();
            } else if (selected_country == '1') {
                $("#mkd_gradovi").show();
                $(".country_other").hide();
                $(".city_other").hide();
                $(".postenski").hide();
            } else {
                $("#mkd_gradovi").hide();
                $(".country_other").hide();
                $(".city_other").show();
                $(".postenski").show();
            }
        });

    });
</script>
@stop