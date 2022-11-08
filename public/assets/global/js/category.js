var items,
  currentPage,
  params,
  itemsPerPage = 3,
  blockAjax = false;

$('[role="search"]').on("submit", function (event) {
  event.preventDefault();

  var text = $(this).find("input").text();
  var path = "/search/" + text;

  $.ajax({
    type: "post",
    url: path,
    success: function (data) {},
    error: function (data) {},
  });
});

function lazyLoadImages() {
  [].forEach.call(document.querySelectorAll("img[data-src]"), function (img) {
    img.setAttribute("src", img.getAttribute("data-src"));
    img.onload = function () {
      img.removeAttribute("data-src");
    };
  });
}

(function (ES) {
  var SELECTORS = {
    ADD_TO_CART_BUTTON: "[data-category-add-to-cart]",
    SHOPPING_CART: "[data-shopping-cart]",
    ATTRIBUTE: "[data-attribute]",

    PRICE_SLIDER: "[data-price-slider]",
    PRICE_FROM: ".irs-from",
    PRICE_TO: ".irs-to",
    SORT: "[data-sort]",
    PAGE: "[data-page]",
    PER_PAGE: "[data-per-page]",
    PRODUCTS_LIST: "[data-products-list]",
  };

  /**
   * @type {Object}
   */
  var State = {
    priceFrom: 0,
    priceTo: 0,
    sort: "",
    page: null,
  };

  var Category = {
    init: function () {
      $(document).ready(this.handleDocumentReady.bind(this));
    },

    /**
     *
     */
    handleDocumentReady: function () {
      lazyLoadImages();

      $(document).on(
        "click",
        SELECTORS.ADD_TO_CART_BUTTON,
        this.handleAddToCartClick.bind(this)
      );
      $(SELECTORS.ATTRIBUTE).change(
        function () {
          this.getArticles(true);
        }.bind(this)
      );
      $(SELECTORS.SORT).on("change", this.getArticles.bind(this));
      $(SELECTORS.PER_PAGE).on("change", this.getArticles.bind(this));
      $(SELECTORS.PRODUCTS_LIST).on(
        "click",
        SELECTORS.PAGE,
        function (e) {
          e.preventDefault();
          State.page = $(e.currentTarget).data("page");
          this.getArticles();
        }.bind(this)
      );

      // price slider
      $(SELECTORS.PRICE_SLIDER).ionRangeSlider({
        min: parseInt(ES.categories.sliderMin, 10),
        max: parseInt(ES.categories.sliderMax, 10),
        from:
          ES.categories.filters.priceFrom !== null
            ? parseInt(ES.categories.filters.priceFrom, 10)
            : parseInt(ES.categories.sliderMin, 10),
        to:
          ES.categories.filters.priceTo !== null
            ? parseInt(ES.categories.filters.priceTo, 10)
            : parseInt(ES.categories.sliderMax, 10),
        type: "double",
        //prefix: "",
        prettify: false,
        hasGrid: false,
        onFinish: function (data) {
          State.priceFrom = data.fromNumber;
          State.priceTo = data.toNumber;
          this.getArticles(true);
        }.bind(this),
      });

      State.priceFrom = parseInt(ES.categories.sliderMin, 10);
      State.priceTo = parseInt(ES.categories.sliderMax, 10);
      State.page = ES.categories.filters.page;
    },

    /**
     *
     * @param e
     * @returns {boolean}
     */
    handleAddToCartClick: function (e) {
      e.preventDefault();

      var $target = $(e.currentTarget);

      if ($target.attr("disabled")) {
        return false;
      }

      $target.attr("disabled", "disabled");

      var productId = $target.data("id");
      var productSlug = $target.data("slug");
      var quantity = 1;

      $.ajax({
        type: "post",
        url: $('meta[name="locale"]').attr('content') + "cart/add",
        data: {
          pid: productId,
          pslug: productSlug,
          pquantity: quantity,
        },
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      })
        .done(function (data) {
          $("#shoppingCart").html(data);
          $("#shoppingCartMobile").html(data);
          toastr.success("Производот е успешно додаден во кошничката");
        })
        .always(function () {
          $target.removeAttr("disabled");
        });
    },

    /**
     *
     */
    getArticles: function (resetPage) {
      if (blockAjax) return;

      blockAjax = true;

      State.sort = $(SELECTORS.SORT).val();
      State.limit = $(SELECTORS.PER_PAGE).val();

      // Get attributes
      var attributes = [];
      $(SELECTORS.ATTRIBUTE).each(function (i, e) {
        if ($(e).is(":checked")) {
          attributes.push($(e).data("filter-id") + "_" + $(e).data("id"));
        }
      });

      State.attr = attributes.join(",");

      if (!!resetPage) {
        State.page = 1;
      }

      // build query string
      var qStr = [];
      for (var o in State) {
        qStr.push(o + "=" + State[o]);
      }
      qStr = "?" + qStr.join("&");

      $.ajax({
        type: "POST",
        url: $('meta[name="locale"]').attr('content') + "c-filters",
        data: {
          id: ES.categories.categoryId,
          priceFrom: State.priceFrom,
          priceTo: State.priceTo,
          attr: State.attr,
          sort: State.sort,
          limit: State.limit,
          page: State.page,
        },
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      })
        .done(function (data) {
          $(SELECTORS.PRODUCTS_LIST).html(data);
          window.history.pushState({}, "", qStr);
          $("html, body").animate({ scrollTop: 0 }, 300);

          lazyLoadImages();
        })
        .always(function () {
          blockAjax = false;
        });
    },
  };

  Category.init();
})(window.ES);
