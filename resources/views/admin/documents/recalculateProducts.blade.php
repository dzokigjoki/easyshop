@extends('layouts.admin')
@section('content')
<div class="content">
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
            @if(empty($soglasnost))
                <p>Дали сте сигурни дека сакате да ги рекалкулирате сите продукти?</p>
                <p> Оваа операција може да потрае. Продуктите ќе бидат избришани од магацините и ќе се презапишуваат документ по документ.</p>
                <a class="btn btn-sm btn-info blue-soft" href="?soglasnost=true&session_id={{$session_id}}&all={{$all}}&page={{$page}}"> СЕ СОГЛАСУВАМ </a>  
                <a href="/admin" class="btn btn-sm btn-danger" style="margin-left:2%;"> НЕ, ВРАТИ МЕ НАЗАД </a>
            @endif
            @if(empty($zavrseno) && !empty($soglasnost))
                <h4 style="color:red;font-weight:bold"> Ве молиме не го затворајте табот и browserot се додека не добиете порака дека е завршено </h4>
                <p>Oбработени се {{$page * $limit}} од {{$all}} документи</p>
            @endif
            @if(!empty($zavrseno))
                <h4 style="color:green;font-weight:bold"> Успешно завршено! Може да го затворите табот или да го исклучите  browserot</h4>
                <p>Oбработени се {{$page * $limit}} од {{$all}} документи</p>
            @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
@if(empty($zavrseno) && !empty($soglasnost))
<script>
var explode = function(){
    var url = "{{URL::to('/admin/documentOperation/fixProductQtyView')}}?session_id={{$session_id}}&all={{$all}}&page={{$page}}";
   console.log(url);
   window.location.href = url;
};
setTimeout(explode, 4000);
</script>
@endif
@endsection