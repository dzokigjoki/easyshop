@extends('layouts.admin')



<style>
    td {
        padding: 0px !important;
    }

    input {
        width: 100%;
        height: 41px;
        border: none !important;
    }

</style>
@section('content')
    <div class="content">
        <div class="page-content-inner">
            <form id="formemediaplan" action="/admin/mediaplan/media_plan1" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="col-md-8"></div>



                            <table style="margin-top:50px; border: 0.5px solid #d5d5d5"
                                class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th style="border: 0.5px solid #d5d5d5">Час</th>
                                    <th style="border: 0.5px solid #d5d5d5">Реклама</th>
                                    <th style="border: 0.5px solid #d5d5d5">Минутажа</th>
                                    <th style="border: 0.5px solid #d5d5d5">Број на реклами</th>
                                </thead>
                                <tbody>

                                    @for ($i = 0; $i < 15; $i++)
                                        <tr>
                                            @for ($j = 0; $j < 4; $j++)
                                                <td style="border: 0.5px solid #d5d5d5">
                                                    <input name="input_{{ $i }}_{{ $j }}" value="@if(!empty($texts)){{ $texts[$i][$j] }}@endif">
                                                </td>
                                            @endfor
                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div style="padding-bottom: 20px;" class="row">
                    <div class="col-xs-12">
                        <a id="mediaplansubmit" class="btn btn-lg btn-info blue-soft pull-right">Зачувај</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $("#mediaplansubmit").on("click", function(){
                $("#formemediaplan").submit();
            })
        });
    </script>
@stop
