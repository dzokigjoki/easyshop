var CategoryModule = (function () {
  var SELECTORS = {
    CATEGORY_TITLE: '#title',
    CATEGORY_META_TITLE: '#meta_title',
    CATEGORY_DESCRIPTION: '#description',
    CATEGORY_META_DESCRIPTION: '#meta_description',
    CATEGORY_URL: '#url',
    CATEGORY_TITLE_LANG2: '#title_lang2',
    CATEGORY_META_TITLE_LANG2: '#meta_title_lang2',
    CATEGORY_DESCRIPTION_LANG2: '#description_lang2',
    CATEGORY_META_DESCRIPTION_LANG2: '#meta_description_lang2',
    CATEGORY_URL_LANG2: '#url_lang2',
    PARENT_CATEGORY: '[parent-category]',
    CATEGORY_NESTED_LIST: '[category-nested-list]',
    CATEGORY_NESTED_REMOVE_BUTTON: '[dd-item-delete]',
  };

  var CategoryModule = {
    /**
     *
     */
    init: function () {
      $(document).ready(this.handleDocumentReady.bind(this));
    },

    /**
     *
     */
    showHideDeleteCategory: function () {
      var $listItems = $(SELECTORS.CATEGORY_NESTED_LIST).find('li.dd-item');
      $listItems.each(function (index, el) {
        var $el = $(el);
        if ($el.children('ol.dd-list').length) {
          $el.children('.dd3-content').find('.dd-item-delete').hide();
        } else {
          $el.children('.dd3-content').find('.dd-item-delete').show();
        }
      });
    },

    handleRemoveCategory: function () {
      return window.confirm('Дали сте сигурни?');
    },

    /**
     *
     */
    handleDocumentReady: function () {
      this.showHideDeleteCategory();

      $('.summernote').summernote({
        callbacks: {
          onImageUpload: function (file) {
            uploadSNImage(file[0]);
          },

          onMediaDelete: function (target) {
            deleteFile(target[0].src);
          },
        },
      });

      function uploadSNImage(image) {
        var data = new FormData();
        data.append('file', image);
        $.ajax({
          url: '/admin/categories/uploadRedactor',
          cache: false,
          contentType: false,
          processData: false,
          data: data,
          type: 'post',
          success: function (data) {
            var image = $('<img>').attr('src', data.url);

            $('.summernote').summernote('insertNode', image[0]);
          },
          error: function (data) {},
        });
      }

      function deleteFile(src) {
        $.ajax({
          data: { src: src },
          type: 'POST',
          url: '/admin/categories/removeRedactor',
          cache: false,
          success: function (resp) {},
        });
      }

      $('.select2').select2({
        placeholder: 'Избери...',
        allowClear: true,
      });

      var $parentSelect = $(SELECTORS.PARENT_CATEGORY).select2({
        placeholder: '-- Избери категорија --',
        allowClear: true,
      });

      // Make categories list nestable
      $(SELECTORS.CATEGORY_NESTED_LIST)
        .nestable({
          noDragClass: 'dd-nodrag',
        })
        .on(
          'beforeDragEnd',
          function (event, item, source, destination, position, feedback) {
            // If you need to persist list items order if changes, you need to comment the next line
            // if (source[0] === destination[0]) { feedback.abort = true; return; }

            feedback.abort = !window.confirm(
              'Дали сакате да ги зачувате промените?'
            );
          }
        )
        .on(
          'dragEnd',
          function (event, item, source, destination, position) {
            // Make an ajax request to persist move on database
            // here you can pass item-id, source-id, destination-id and position index to the server
            // ....

            var currentItem = $(item).attr('data-id');
            var itemParent = $(item).parent().parent().attr('data-id');
            var $items = $(item).closest('ol.dd-list').children('li');
            var positions = [];

            $items.each(function (index, elem) {
              positions.push({
                id: $(elem).data('id'),
                position: index,
              });
            });

            $.ajax({
              url: ES.baseUrl + EsConfig.routes.categoriesReorder,
              method: 'POST',
              data: {
                currentItem: currentItem,
                itemParent: itemParent,
                positions: positions,
              },
            })
              .done(function (data, textStatus, jqXHR) {
                console.log(data);
                if (data.status === 'success') {
                  App.alert({
                    message: 'Категориите се успешно снимени.',
                    closeInSeconds: 5,
                  });
                } else {
                  var check = window.confirm(
                    'Продуктите од категоријата родител ќе се префрлат во новата категорија'
                  );
                  if (check) {
                    $.ajax({
                      url: ES.baseUrl + EsConfig.routes.categoriesReorder,
                      method: 'POST',
                      data: {
                        currentItem: currentItem,
                        itemParent: itemParent,
                        positions: positions,
                        force: 1,
                      },
                    }).done(function (data, textStatus, jqXHR) {});
                  }
                }
              })
              .fail(function (jqXHR, textStatus, errorThrown) {})
              .always(
                function () {
                  this.showHideDeleteCategory();
                }.bind(this)
              );
          }.bind(this)
        );

      // If meta description is empty, put the value from description
      $(SELECTORS.CATEGORY_DESCRIPTION).on('blur', function () {
        var text = $(SELECTORS.CATEGORY_DESCRIPTION).val();
        var $metaDescription = $(SELECTORS.CATEGORY_META_DESCRIPTION);
        if (!$metaDescription.val().length) {
          $metaDescription.val(text);
        }
      });

      // If meta title is empty, put the value from title
      $(SELECTORS.CATEGORY_TITLE).on('keyup', function () {
        var text = $(this).val();
        var $metaTitle = $(SELECTORS.CATEGORY_META_TITLE);
        var $url = $(SELECTORS.CATEGORY_URL);
        var slug;

        //if (!$metaTitle.val().length) {
        $metaTitle.val(text);
        //}

        // URL slug
        slug = GlobalModule.replaceSlug(text);
        //if (!$url.val().length) {
        $url.val(slug);
        //}
      });
      $(SELECTORS.CATEGORY_TITLE_LANG2).on('keyup', function () {
        var text = $(this).val();
        var $metaTitle = $(SELECTORS.CATEGORY_META_TITLE_LANG2);
        var $url = $(SELECTORS.CATEGORY_URL_LANG2);
        var slug;

        //if (!$metaTitle.val().length) {
        $metaTitle.val(text);
        //}

        // URL slug
        slug = GlobalModule.replaceSlug(text);
        //if (!$url.val().length) {
        $url.val(slug);
        //}
      });

      $(SELECTORS.CATEGORY_NESTED_LIST).on(
        'click',
        SELECTORS.CATEGORY_NESTED_REMOVE_BUTTON,
        this.handleRemoveCategory.bind(this)
      );
    },
  };

  return CategoryModule;
})();

CategoryModule.init();
