@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="page-content-inner">
        <div class="portlet light col-md-12">
            <div class="portlet-title">
                <div class="caption">
                    Попис
                </div>
                <div class="actions btn-set">
                    <button class="btn btn-success" id="zacuvaj" name="zacuvaj" value="zacuvaj"><i
                            class="fa fa-check"></i>
                        Зачувај</button>
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-group col-md-12">
                    <div class="row">
                        <label class="col-md-2 control-label">Партнер:</label>
                        <div class="col-md-4">
                            <select name="partner" id="partner" class="form-control select2">
                                <option value="">Избери партнер</option>
                                @foreach($partners as $partner)
                                <option value="{{$partner->id}}">
                                    {{$partner->first_name}} {{$partner->last_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="col-md-2 control-label">Датум:</label>
                        <div class="col-md-4">
                            <div class="input-group input-large date-picker input-daterange" data-date="10.11.2012"
                                data-date-format="dd.mm.yyyy" data-date-week-start="1">
                                <input id="review-date" disabled="true" type="text" class="form-control"
                                    name="new_from">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <table class="table" style="display:none" id="stock-table">
                                <thead>
                                    <th>Производ</th>
                                    <th>Количина</th>
                                </thead>
                                <tbody id="stock">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <table class="table" style="display:none" id="review-table">
                                <thead>
                                    <th>Производ</th>
                                    <th>Количина</th>
                                    <th>Затекната количина</th>
                                    <th>Разлика</th>
                                </thead>
                                <tbody id="review">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="display:none" id="result-label">
                        <label class="alert alert-success">Успешно зачуван попис</label>
                    </div>
                    <div class="row" style="display:none" id="invoice-button">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    $(document).ready(function(){
        $(".select2").select2();
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });


        $("#partner").on('change', function(){
            $.ajax({
            type: "GET",
            data: {
                partner: $("#partner").val()
            },  
            url: 'partner-stock',
            success: function(res) 
            {
                $("#stock-table").show();

                res.forEach(element => {
                    
                    $("#stock").append('<tr><td>' + element.product.title + '</td><td>' + element.quantity + '</td></tr>');
                })
            }
        });
            $("#review-date").attr('disabled', false);
        });

        $("#review-date").on('change', function(){
            $.ajax({
            type: "GET",
            data: {
                partner: $("#partner").val(),
                date: $("#review-date").val()
            },  
            url: 'partner-review-ajax',
            success: function(res) 
            {
                
                $("#review").empty();
                $("#stock-table").hide();
                $("#review-table").show();
                
                let items = res.records; 

                if(!!res.document){
                    $("#invoice-button").append('<a class="btn btn-sm btn-info blue-soft" href="document/faktura/edit/' + res.document +  '"" data-container="body" data-placement="top" data-original-title="Превземи PDF">'
                        + '<i class="fa fa-file"></i> Види фактура</a>');
                        $("#invoice-button").show();
                }

                items.forEach(element => {      
                    if(!!element.new){ 
                    $("#review-table").append('<tr><td name="product_id[]" data-product="' + element.product.id + '">' + element.product.title + '</td><td><input name="quantity[]" class="form-control" type="number" readonly data-quantity value="' + element.quantity + '"></td><td><input class="form-control" max="' + element.quantity + '" min="'  + 0 + '" data-after-review-quantity name="after-review-quantity[]" type="number" value="'  + element.after_review_quantity + '"></td><td><input readonly class="form-control" value="' + 0 + '" name="difference[]" data-difference/></td></tr>');
                    } else {
                    $("#review-table").append('<tr><td>' + element.product.title + '</td><td><input class="form-control" type="number" readonly data-quantity value="' + element.quantity + '"></td><td><input class="form-control" readonly data-after-review-quantity type="number" value="'  + element.after_review_quantity + '"></td><td><label class="form-control" data-difference>' + element.difference + '</label></tr>');
                    }
                })
                    
                $("[data-after-review-quantity]").on('change', function() {
                    let difference = $(this).closest('tr').find('[data-quantity]').val() - $(this).closest('tr').find('[data-after-review-quantity]').val();
                    $(this).closest('tr').find('[data-difference]').val(difference);
                })
            }
        });
        })
        
        $("#zacuvaj").on('click', function() {
            let array = [];
            let rows = $("#review").find('tr');
            for(let i = 0; i < rows.length; i++){
                $productId = $(rows[i]).find('[data-product]').data('product');
                $quantity = $(rows[i]).find('[data-quantity]').val();
                $afterReviewQuantity = $(rows[i]).find('[data-after-review-quantity]').val();
                $difference = $(rows[i]).find('[data-difference]').val();
                let obj = {
                    product_id: $productId,
                    quantity: $quantity,
                    after_review_quantity: $afterReviewQuantity,
                    difference: $difference
                }
                array.push(obj);
            }

            $.ajax({
                type: "POST",
                url: 'create-invoice-from-partner-review',
                data: {
                partner: $("#partner").val(),
                quantity: $("#quantity").val(),
                reviewed_at: $("#review-date").val(),
                array: array,
            },  
            success: function(res) {
                $("#result-label").show();
                window.location.href = res;
            }
            })

        })
    });
</script>
@stop