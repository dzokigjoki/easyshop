@extends('layouts.admin')
@section('content')


<link rel="stylesheet" href="{{url_assets('/in_design_studio/css/plugins/jquery-ui.min.css')}}">
<link rel="stylesheet" href="/assets/in_design_studio/js/fancy-product-designer/css/FancyProductDesigner-all.min.css">

<div class="portlet light col-md-12">
  <div class="portlet-title">
    <div class="caption">
      <span class="caption-subject font-blue-soft bold uppercase">Достапни дизајни за {{$record->title}}</span>
    </div>
    <input type="hidden" id="design_id">
    <input type="hidden" id="filename">
  </div>
  <div class="page-content-inner">
    <div class="form-body">
      <form method="POST" action="{{route('admin.article.available-design.option')}}">
        {{ csrf_field() }}
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label for="">
              Опција по која ќе се филтрираат дизајните
            </label>
            <br>
            <input type="hidden" name="product_id" id="product_id" value="{{$record->id}}">
            <select name="product-option" id="product-option">
              @foreach($record->options as $option)
              <option @if($option->id == $record->option_id)
                selected
                @endif
                value="{{$option->id}}">{{$option->name}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Зачувај</button>
        </div>




        <br>
      </form>




      <div class="col-sm-12 col-xs-12">
        <div class="form-group">
          Поставете го вашиот дизајн базиран на опцијата за филтер
          <label for="design-to-upload"></label>
          <br><br>
          @if(!is_null($record->selectedOptionValues))
          <select name="selected-option-values" id="selected-option-values">
            @foreach($record->selectedOptionValues as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach

          </select>
          @endif
          <input type="hidden" name="product_id" value="{{ $record->id }}">
          <input type="file" id="design-to-upload">
          <br>
          <button class="btn btn-primary" id="upload">Прикачи</button>
          <br>
          <table class="table table-bordered">
            @foreach($availableDesigns as $design)
            <tr>
              <td><img src='/uploads/predefined_designs/{{ $record->id }}/{{ $design->filename }}' style="width: 50px"
                  alt=""></td>
              <td>{{$design->value->name}}</td>
              <td><button class="btn btn-primary" name="edit-design" data-filename="{{$design->filename}}"
                  id="{{$design->id}}">Едитирај</button></td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="col-sm-12 col-xs-12">
        <div id="clothing-designer"
          class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left">
        </div>
      </div>

      <button class="btn btn-primary" style="display:none" id="save-design">Зачувај</button>
    </div>
  </div>
</div>

@stop

@section('scripts')
<script>
  $("#product-option").select2();
                $("#selected-option-values").select2();
                $("#upload").click(function(e){
                e.preventDefault();
                var fd = new FormData();
                var image = $('#design-to-upload')[0].files[0];
                fd.append('image', image);
                fd.append('product_id', $("#product_id").val());
                fd.append('value_id', $("#selected-option-values").val());

                $.ajax({
                url: '/admin/articles/available-designs',
                type: 'POST',
                // mimeType: "multipart/form-data",
                processData: false,
                dataType:'JSON',
                contentType: false,
                cache: false,
                data: fd,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                location.reload();
                }
                });




                })

</script>


<script src="{{url_assets('/in_design_studio/js/plugins/jquery-ui.min.js')}}"></script>
<script src="/assets/in_design_studio/js/fancy-product-designer/js/fabric.min.js"></script>
<script src="/assets/in_design_studio/js/fancy-product-designer/js/FancyProductDesigner-all.min.js"></script>
{{-- <script src="/assets/in_design_studio/js/fancy-product-designer/js/fpd.js"></script> --}}


<script>
  $(document).ready(function(){
    var productId = $("#product_id").val();
    var designId = null;
    var fileName = null;

    $("[name='edit-design'").on('click', function(el) {
      $("#save-design").show();
      designId = $(this).attr('id');
      fileName = $(this).attr('data-filename');

      $("#design_id").val(designId);
      $("#filename").val(fileName);

      var $yourDesigner = $('#clothing-designer'),
      pluginOpts = {
      productsJSON: '/products/' + productId + '/design-attributes-json/' + $(this).attr('id'),

    
    designsJSON: '/assets/in_design_studio/js/fancy-product-designer/designs.json',
    langJSON: '/assets/in_design_studio/js/fancy-product-designer/lang/default.json',
    editorMode: false,
    smartGuides: true,
    fonts: [{
        name: 'Helvetica'
      },
      {
        name: 'Times New Roman'
      },
      {
        name: 'Pacifico',
        url: 'Enter_URL_To_Pacifico_TTF'
      },
      {
        name: 'Arial'
      },
      {
        name: 'Lobster',
        url: 'google'
      }
    ],
    customTextParameters: {
      colors: true,
      removable: true,
      resizable: true,
      draggable: true,
      rotatable: true,
      autoCenter: true,
      boundingBoxMode: 'clipping',
      boundingBox: 'base'
    },
    customImageParameters: {
      draggable: true,
      removable: true,
      resizable: true,
      rotatable: true,
      colors: '#000',
      autoCenter: true,
      boundingBox: "Base"
    },
    actions: {
      'top': ['download', 'print', 'snap', 'preview-lightbox'],
      'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code', 'ruler'],
      'bottom': ['undo', 'redo'],
      'left': ['manage-layers', 'info', 'save', 'load']
    }
  },

  yourDesigner = new FancyProductDesigner($yourDesigner, pluginOpts);

//print button
$('#print-button').click(function () {
  yourDesigner.print();
  return false;
});


$("#json-test").click(function () {
  // console.log(yourDesigner.getProduct());
})

//create an image
$('#image-button').click(function () {
  var image = yourDesigner.createImage();
  return false;
});

//checkout button with getProduct()
$('#checkout-button').click(function () {
  var product = yourDesigner.getProduct();
  return false;
});

//event handler when the price is changing
$yourDesigner.on('priceChange', function (evt, price, currentPrice) {
  $('#thsirt-price').text(currentPrice);
});

//save image on webserver
$('#save-image-php').click(function () {
  yourDesigner.getProductDataURL(function (dataURL) {
    // $.post("php/save_image.php", {
    //   base64_image: dataURL
    // });
    // console.log(dataURL);
  });

});

//send image via mail
$('#send-image-mail-php').click(function () {

  yourDesigner.getProductDataURL(function (dataURL) {
    $.post("php/send_image_via_mail.php", {
      base64_image: dataURL
    });
  });
});

$("#save-design").click(function(e){
    var json = yourDesigner.getProduct(onlyEditableElements = true, customizationRequired = true);
    e.preventDefault();
    var productId = $("#product_id").val();
    var designId = $("#design_id").val();
    var fileName = $("#filename").val();

    
    $.ajax({
                url: '/admin/articles/update-design',
                type: 'POST',
                mimeType: "multipart/form-data",
                data: {
                  // productId: productId,
                  designId: designId,
                  // fileName: fileName,
                  json: json
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                  // $("#successful-upload").html('<label><i class="fa fa-check" style="color:0CF574; margin-right: 10px;"></i> Успешно прикачен дизајн</label><br>');
                  // $("#uploaded-design-image").attr('src', '/uploads/customUploads/' + data.filename);
                  // $("#uploaded-design-filename").val(data.filename);
                  // $("#prikaci").hide();
                  // $("#add-to-cart").show();
                }
              });

  })
  });




    })





</script>



@stop