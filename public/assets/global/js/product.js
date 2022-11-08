(function () {

    var SELECTORS = {
        ADD_TO_CART_BUTTON: '[data-add-to-cart]',
        PRODUCT_QUANTITY: '[data-product-quantity]',
        SHOPPING_CART: '[data-shopping-cart]',
        PRODUCT_VARIATION: '[data-product-variation]',
        CUSTOM_ADD_TO_CART_BUTTON: '[data-custom-add-to-cart]',
        CAKE_DESIGN_ADD_TO_CART: '[data-cake-design-add-to-cart]',
        STANDARD_CAKE_ADD_TO_CART: '[data-standard-cake-add-to-cart]'
    };

    var Product = {
        init: function () {
            this.productId = null;
            this.productSlug = null;

            var paramsList = window.location.pathname.split('\/');
            if (paramsList.length > 1) {
                this.productId = paramsList[2];
                this.productSlug = paramsList[3];
            }
            $(document).ready(this.handleDocumentReady.bind(this));
        },

        handleDocumentReady: function () {
            $(document).on('click', 'body ' + SELECTORS.ADD_TO_CART_BUTTON, this.handleAddToCartClick.bind(this));
            $(document).on('click', 'body ' + SELECTORS.CUSTOM_ADD_TO_CART_BUTTON, this.handleCustomAddToCartClick.bind(this));
            $(document).on('click', 'body ' + SELECTORS.CAKE_DESIGN_ADD_TO_CART, this.handleCustomAddToTortiCartClick.bind(this));
            $(document).on('click', 'body ' + SELECTORS.STANDARD_CAKE_ADD_TO_CART, this.handleStandardAddToTortiCartClick.bind(this));
            $(document).on('click', ".zoomContainer", function () {
                $("#swipebox-overlay").remove();
            })
        },
        handleCustomAddToTortiCartClick: function (e) {
            this.handleAddToCartClick(e, window.design);
        },
        handleStandardAddToTortiCartClick: function (e) {
            var additional = window.predefinedCake;
            this.handleAddToCartClick(e, additional);
        },

        handleAddToCartClick: function (e, additional) {
            e.preventDefault();
            var quantity = $(SELECTORS.PRODUCT_QUANTITY).val();
            var variation = [];

            if (window.ES.client === 'herline') {

                if ($(e.currentTarget).data('bundle')) {
                    quantity = 1;
                    var isBundle = 1;
                }
                var broj_varijacii = $('input[name="broj_varijacii"]').val();

                for (var i = 0; i < 10; i++) {
                    var value = $('input[name="variation_' + i + '"]:checked').val();
                    if (value) {
                        variation.push(value);
                    }
                }
                if (variation.length != broj_varijacii) {
                    toastr.info('Ве молиме одберете големина');
                    return;
                }
            } else if (window.ES.client === 'matica') {
                if ($("#bundle_number").val()) {
                    var bundle_items = [];
                    var bundle_input = $("input[name='bundle[]']:checked").map(function () {
                        return $(this).val();
                    }).get();


                    if (bundle_input.length != $("#bundle_number").val()) {
                        toastr.info('Ве молиме одберете ' + $("#bundle_number").val() + ' книги од пакетот.');
                        return;
                    } else {
                        bundle_items.push(bundle_input);
                        console.log(bundle_items);
                    }
                }
            }else if(window.ES.client === 'barbakan'){
               var pdesc = $("[data-product-description]").val();
            } else {
                if ((window.ES.client === 'mymoda') && ($(window).width() >= 1025)) {
                    var counter = 0;
                    $('input[name="variations[]"]:checked').each(function () {
                        counter++;
                    });
                    var broj_varijacii = $('input[name="broj_varijacii"]').val();
                    $('select[name="variations[]"]').each(function () {
                        var text = $(this).children("option").filter(":selected").text();
                        var value = $(this).val();
                        if (value != null)
                            counter++;
                    });
                    if (counter != broj_varijacii) {
                        toastr.info('Ве молиме одберете ги сите детали за прозиводот');
                        return;
                    }

                }

                $('input[name="variations[]"]:checked').each(function () {
                    // var text = $(this).children("input").filter(":checked").text();
                    var value = $(this).val();
                    variation.push(value);
                });


                $('select[name="variations[]"]').each(function () {
                    var text = $(this).children("option").filter(":selected").text();
                    var value = $(this).val();
                    variation.push(value);
                });
            }

            if (quantity == undefined || ($(e.currentTarget).data("tester") == true)) {
                quantity = 1;
            }
            

            var productId = $(e.currentTarget).attr('value');
            if (!!productId) {
                this.productId = productId;
            }

            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }

            variation = variation.filter(function (v) {
                return !!v && !isNaN(v);
            }).filter(onlyUnique);


            $.ajax({
              type: 'post',
              url: '/en/' + 'cart/add',
              data: {
                pid: this.productId,
                pslug: this.productSlug,
                pquantity: quantity,
                pvariation: variation,
                additional: additional,
                isBundle: isBundle,
                bundle_items: bundle_items,
                pdesc: pdesc,   
              },
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              },
              success: function (data) {
                switch (data.status) {
                  case 'product_exists':
                    toastr.info('Артиклот веќе е додаден во кошничката.');
                    return;

                  case 'product_no_stock':
                    toastr.info('Артиклот го нема на залиха.');
                    return;
                }

                if (typeof fbq !== 'undefined') {
                  fbq('track', 'AddToCart', {
                    value: data.price,
                    currency: window.ES.facebook_pixels_currency,
                    content_ids: [this.productId],
                    content_type: 'product',
                    content_name: data.title,
                    contents: [
                      {
                        id: this.productId,
                        quantity: quantity,
                        item_price: data.price,
                      },
                    ],
                  });
                }

                $('#shoppingCart').html(data.html);
                $('#shoppingCartMobile').html(data);

                if ($('[data-amount]').length) {
                  $('[data-amount]').attr('data-amount', data.totalProducts);
                }
                if ($('[data-amount-value]').length) {
                  $('[data-amount-value]').text(data.totalProducts);
                }
                if ($('[data-cart-total-price]').length) {
                  $('[ data-cart-total-price]').text(data.totalPrice);
                }
                $('#cart-total-price').html($('#temp_totalprice_cart').val());
                $('#cart-total-quan').html($('#temp_totalquan_cart').val());
                if ($('#direct_buy').val()) {
                  setTimeout(function () {
                    window.location = '/cart';
                  }, 200);
                }
                if (data.isTester) {
                  window.location = '/cart';
                }
                toastr.success(window.ES.toastr.addToCartSucess);
              }.bind(this),
            });
        },





        handleCustomAddToCartClick: function (e) {
            e.preventDefault();
            var query = '';
            $('select[name="options[]"]').each(function (index) {
                if (index == $('select[name="options[]"]').length - 1) {
                    query += $(this).val();
                } else {
                    query += $(this).val() + ',';
                }
            });


            var customDesignDescription = null;

            var customDesignUpload = null;

            var designSelection = null;

            var pluginDesignUpload = null;


            if ($("#custom-design-description").val()) {
                customDesignDescription = $("#custom-design-description").val();
            } else if ($("#custom-design-upload").val()) {
                customDesignUpload = $("#uploaded-design-filename").val();
            } else if ($("#plugin-design-filename").val()) {
                pluginDesignUpload = $("#plugin-design-filename").val();
            } else if ($("input[name = 'design-selection']").val()) {
                var design = document.getElementsByName('design-selection');
                for (var i = 0; i < design.length; i++) {
                    if (design[i].checked) {
                        designSelection = design[i].value;
                    }
                }
            }


            query += "-" + $('select[name="quantity"').val();

            var productId = $("#product-id").val();
            console.log({
                productId: productId,
                query: query,
                customDesignDescription: customDesignDescription,
                customDesignUpload: customDesignUpload,
                designSelection: designSelection,
                pluginDesignUpload: pluginDesignUpload
            })
            $.ajax({
                url: '/cart/product-add',
                type: 'POST',
                mimeType: "multipart/form-data",
                data: {
                    productId: productId,
                    query: query,
                    customDesignDescription: customDesignDescription,
                    customDesignUpload: customDesignUpload,
                    designSelection: designSelection,
                    pluginDesignUpload: pluginDesignUpload
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {

                    $('#shoppingCart').html(data.html);
                    $('#shoppingCartMobile').html(data);

                    // if ($('[data-amount]').length) {
                    //     $('[data-amount]').attr('data-amount', data.totalProducts);
                    // }
                    // if ($('[data-amount-value]').length) {
                    //     $('[data-amount-value]').text(data.totalProducts);
                    // }
                    // if ($('[data-cart-total-price]').length) {
                    //     $('[ data-cart-total-price]').text(data.totalPrice);
                    // }

                    $("#cart-total-price").html($("#temp_totalprice_cart").val());
                    $("#cart-total-quan").html($("#temp_totalquan_cart").val());


                    toastr.success(window.ES.toastr.addToCartSucess);

                }.bind(this)
            });
        }





    }

    Product.init();
})();