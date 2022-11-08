@extends('layouts.admin')
@section('content')
<div class="content">
<div class="page-content-inner">
<form method="post" action="{{URL::to('admin/roles/store')}}">
    <div class="portlet light col-md-12">
        <div class="portlet-title">        
        <div class="caption">
        @if($role_id > 0 )
             <i class="fa fa-user"></i>Измени податоци за role </div>
        @else
            <i class="fa fa-user"></i>Нов Role </div>
        @endif
            <div class="actions btn-set">
                <a class="btn btn-secondary-outline" href="{{route('admin.roles')}}">Назад</a>
                <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i class="fa fa-check"></i> Зачувај</button>
            </div>
        </div>
        <div class="portlet-body">
        {{csrf_field()}}
      
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label">Role name:</label>
            <div class="col-md-4">
                <input name="role_name" type="text"  class="form-control" @if(isset($role)) value="{{$role->name}}"  @endif >
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-2 control-label">Permissions:</label>
            <div class="col-md-10">
            
            </div>
        </div>
        <?php $menu_array = []; ?>
        @foreach($permissions as $key=>$perm)
            @if(!in_array($key, $menu_array))
                 <div class="form-group col-md-12">
                <?php $menu_array[] = $key; ?>
                    <label class="col-md-2 control-label" style="text-decoration: italic;font-weight: bold;">{{$key}}:</label>
                    <div class="col-md-10">
                        
                    </div>
                </div>
            @endif
            @foreach($perm as $kp=>$p)
            <div class="form-group col-md-12">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <input type="checkbox" name="permissions[]" value="{{$p->id}}" @if(isset($rolePerm_array) && in_array($p->id,$rolePerm_array)) checked  @endif>{{$p->display_name}}</input> 
                    </div>
            </div>
            @endforeach
        @endforeach
<input type="hidden" name="role_id" value="{{$role_id}}">
</form>
</div>
</div>
@stop
@section('scripts')

@stop
