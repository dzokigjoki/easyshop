(function () {
  var SELECTORS = {
    BUTTON_COUPON_CHECK: "[button-coupon-check]",
  };
  var Coupon = {
    init: function () {
      this.promo_code = null;
      $(document).ready(this.handleDocumentReady.bind(this));
    },

    handleDocumentReady: function () {
      $(document).on(
        "click",
        "body " + SELECTORS.BUTTON_COUPON_CHECK,
        this.handleCouponCheck.bind(this)
      );
    },

    handleCouponCheck: function (e) {
      e.preventDefault();
      var promo_code = $("#promo_code").val();
      var old_first_name = $("#FirstName").val();
      var old_last_name = $("#LastName").val();
      var old_email = $("#Email").val();
      var old_phone = $("#Telephone").val();
      var old_country = $("#Country").val();
      var old_city = $("#City").val();
      var old_address = $("#Address").val();
      var old_comment = $("#confirm_comment").val();
      var old_delivery_type = $("#type_delivery").val();
      var old_paymentType = $("input[name='paymentType']:checked").val();

      sessionStorage.setItem("coupon_checked", true);
      sessionStorage.setItem("old_first_name", old_first_name);
      sessionStorage.setItem("old_last_name", old_last_name);
      sessionStorage.setItem("old_email", old_email);
      sessionStorage.setItem("old_phone", old_phone);
      sessionStorage.setItem("old_country", old_country);
      sessionStorage.setItem("old_city", old_city);
      sessionStorage.setItem("old_address", old_address);
      sessionStorage.setItem("old_comment", old_comment);
      sessionStorage.setItem("old_delivery_type", old_delivery_type);
      sessionStorage.setItem("old_paymentType", old_paymentType);

      if (!!promo_code) {
        this.promo_code = promo_code;
      }
      $.ajax({
        type: "post",
        url: $('meta[name="locale"]').attr('content') + "cart/promocode",
        data: {
          coupon: this.promo_code,
        },
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
          $("[data-coupon-check]").html(data.promo_code_status);
          sessionStorage.setItem("promo_code", data.promo_code_status);
          setTimeout(function() {
            location.reload();
        }, 1500);
        }.bind(this),
      });
    },
  };
  Coupon.init();
})();
