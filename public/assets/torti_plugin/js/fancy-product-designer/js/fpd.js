jQuery(document).ready(function () {

  $('.category-menu-list').hide();
  var productId = $("#product-id").val();
  var $yourDesigner = $('#clothing-designer'),
    pluginOpts = {
      productsJSON: '/products/attributes-json/' + productId,

      // productsJSON: '/assets/in_design_studio/js/fancy-product-designer/products.json', 
      designsJSON: '/assets/in_design_studio/js/fancy-product-designer/designs.json',
      langJSON: '/assets/in_design_studio/js/fancy-product-designer/lang/default.json',
      // stageWidth: 1200,
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
    console.log(yourDesigner.getProduct());
  })

  //create an image
  $('#image-button').click(function () {
    var image = yourDesigner.createImage();
    return false;
  });

  //checkout button with getProduct()
  $('#checkout-button').click(function () {
    var product = yourDesigner.getProduct();
    console.log(product);
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
      console.log(dataURL);
    });


    $("#test").click(function () {
      console.log('qweqwe');
      console.log(yourDesigner.getParameterKeys());
    })

  });

  //send image via mail
  $('#send-image-mail-php').click(function () {

    yourDesigner.getProductDataURL(function (dataURL) {
      $.post("php/send_image_via_mail.php", {
        base64_image: dataURL
      });
    });

  });

});