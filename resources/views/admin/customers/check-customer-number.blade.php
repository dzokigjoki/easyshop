@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="page-content-inner">
            <form method="post" action="{{ URL::to('admin/customers/checkCustomerNumber') }}">
                <div class="portlet light col-md-12">
                    <div class="portlet-title">
                        <div class="caption">

                            <i class="fa fa-phone"></i> Провери телефонски број
                        </div>
                    </div>
                    <div class="portlet-body">
                        {{ csrf_field() }}
                        
                            <div class="form-group col-md-12">
                                <label class="col-md-2 control-label">Телефон:</label>
                                <div class="col-md-8 @if ($errors->has('phone')) has-error @endif">
                                    <input type="text" class="form-control" placeholder="Внесете телефонски број" name="phone"
                                        >
                                </div>
                                <div class="col-md-2">
                                  <button class="btn btn-success" name="zacuvaj" value="zacuvaj" type="submit"><i
                                    class="fa fa-check"></i> Провери</button>
                                </div>
                            </div>
                            @if(\Session::has('empty'))
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 style="padding: 15px" class="alert-danger text-center bold">{{ Session::get('empty') }}</h5>
                                </div>
                            </div>
                            @elseif(\Session::has('data'))
                            <?php
                             $user = \Session::get('data')['user'];
                             $created_by = \Session::get('data')['created_by'];
                              ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="text-center">Оператор</h3>
                                    <br>
                                    @if($created_by)


                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Име
                                                </th>
                                                <th>
                                                    Презиме
                                                </th>
                                                <th>
                                                    Е-пошта
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $created_by->first_name }}
                                                </td>
                                                <td>
                                                    {{ $created_by->last_name }}
                                                </td>
                                                <td>
                                                    {{ $created_by->email }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @else

                                    <h5 style="padding: 15px" class="alert-success text-center bold">Клиентот е слободен</h5>
                                    @endif
                                </div>
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-6">
                                    <h3 class="text-center">Клиент</h3>
                                    <br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Име
                                                </th>
                                                <th>
                                                    Презиме
                                                </th>
                                                <th>
                                                    Е-пошта
                                                </th>
                                                <th>
                                                    Лојалти поени
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $user->first_name }}
                                                </td>
                                                <td>
                                                    {{ $user->last_name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <th>
                                                    {{ $user->points }}
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {});
    </script>
@stop
