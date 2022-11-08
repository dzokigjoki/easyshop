var Cart = (function () {
  //http://davidwalsh.name/javascript-debounce-function
  function debounce(func, wait, immediate) {
    var timeout;
    return function () {
      var context = this,
        args = arguments;
      var later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  var Cart = {
    init: function () {
      $(document).ready(this.handleDocumentReady.bind(this));
    },

    handleDocumentReady: function () {
      // On Product Variation change
      $("[table-product-variation]").on("change", function () {
        var productId = $(this).data("id");
        var variationId = parseInt($(this).data("variation"), 10);
        var newVariationId = parseInt($(this).val(), 10);
        var cartIndex = $(this).data("cart-index");

        $.ajax({
          type: "post",
          url: "cart/update",
          data: {
            formData: $("[wform]").serialize(),
            id: productId,
            variation: variationId,
            newVariation: newVariationId,
            cartIndex: cartIndex,
            changeVariation: true,
          },
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        })
          .done(function () {
            window.location.reload();
          })
          .fail(function () {
            toastr.error("Продуктот не постои.");
          });
      });

      /**
       * Change product quantity
       *
       * @returns {boolean}
       */
      function changeQuantity(e) {
        var productId = $(this).data("id");
        var variationId = $(this).data("variation");
        var quantity = parseInt($(this).val(), 10);
        var cartIndex = $(this).data("cart-index");

        if (!productId) {
          return false;
        }
        
        if ($(e.currentTarget).data("tester") == true) {
          quantity = 1;
        }
        $.ajax({
          type: "post",
          url: "cart/update",
          data: {
            formData: $("[data-form]").serialize(),
            id: productId,
            quantity: quantity,
            variation: variationId,
            cartIndex: cartIndex,
          },
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        })
          .done(function () {
            window.location.reload();
          })
          .fail(function () {
            toastr.error("Продуктот не постои.");
          });
      }

      // On product quantity change

      $("[table-shopping-qty]").on("change", changeQuantity);
    },
  };

  return Cart;
})();

Cart.init();
