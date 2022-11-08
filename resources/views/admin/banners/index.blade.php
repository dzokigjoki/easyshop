@extends('layouts.admin')

@section('content')
<div class="page-content-inner">

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green bold uppercase">Листа на Банери</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-success" href="{{ route('admin.banners.new') }}"><i class="fa fa-plus"></i>Нов
                            Банер</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table articles-table="" class="table table-striped table-bordered table-hover order-column">
                        <thead>
                            <tr role="row" class="heading">
                                <th class="col-md-3">Тип</th>
                                <th class="col-md-3">Налов</th>
                                <th class="col-md-2">Категорија</th>
                                <th class="col-md-2">Главна слика</th>
                                <th class="col-md-2">Мобилна слика</th>
                                <th class="col-md-2">Линк</th>
                                <th class="col-md-2">Активен</th>
                                <th class="col-md-2">Акција</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $("[articles-table]").on('click','[data-banner-delete]',function () {
                let $this = $(this);
                let banner_id = $this.attr('data-id');
                swal({
                        title: "Дали сте сигурни?",
                        text: "Бришење на банер",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Да",
                        cancelButtonText: "Не",
                        closeOnConfirm: true,
                        closeOnCancel: true,
                        // reverseButtons: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {

                            $.ajax({
                                url: 'banners/delete/' + banner_id,
                                type: 'get',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (data) {
                                    window.location.href = "/admin/banners";
                                }
                            });
                        }
                    })
            });
        $('[articles-table]').DataTable({
            'processing': true,
            'serverSide': true,
            "ajax": '{{route('admin.banners.ajax')}}',
            "columns": [
                {
                    "data": "type"
                },
                {
                    "data": "title"
                },
                {
                    "data": 'Category',
                    name: 'category',
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "image"
                },
                {
                    "data": "mobile_image"
                },
                {
                    "data": "url"
                },
                {
                    "data": 'active'
                },
                {
                    "data": 'Action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            "pageLength": 50,
            "responsive": true,
            language: {
                processing: '<i style="color: #19A689;" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            },
            "deferRender": true
        });
    });
</script>
@stop