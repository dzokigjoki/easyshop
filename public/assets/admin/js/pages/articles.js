var ArticleModule = (function () {
  var SELECTORS = {
    ARTICLE_TITLE: '#title',
    ARTICLE_TITLE_LANG2: '#title_lang2',
    ARTICLE_META_TITLE: '#meta_title',
    ARTICLE_META_TITLE_LANG2: '#meta_title_lang2',
    ARTICLE_URL: '#url',
    ARTICLE_URL_LANG2: '#url_lang2',
  };

  var ArticleModule = {
    /**
     *
     */
    init: function () {
      $(document).ready(this.handleDocumentReady.bind(this));
    },

    /**
     *
     */
    handleDocumentReady: function () {
      $('body').on('click', 'span.remove_image', function () {
        var image_id = $(this).attr('id');
        image_id = image_id.split('_');
        image_id = image_id[1];
        $.get(window.location.origin + '/admin/articles/removeImage', {
          image_id: image_id,
        }).done(function (data) {
          if (data.success == 1) {
            $('#image_row_' + image_id).remove();
          }
        });
      });

      $('.summernote').summernote({
        callbacks: {
          onPaste: function (e) {
            var bufferText = (
              (e.originalEvent || e).clipboardData || window.clipboardData
            ).getData('Text');

            e.preventDefault();
            document.execCommand('insertText', false, bufferText);
          },

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
          url: '/admin/articles/uploadRedactor',
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
          url: '/admin/articles/removeRedactor',
          cache: false,
          success: function (resp) {},
        });
      }

      $('.select2-button-multiselect-value').select2({
        placeholder: 'Избери...',
        allowClear: true,
      });

      $('#type, #vat,#variation').select2({
        placeholder: 'Избери...',
        allowClear: false,
      });

      $('#short_description,#description').on(
        'change keyup paste mouseup',
        function () {
          var text = $('#short_description').val() + $('#description').val();
          $('#meta_description').text(text);
        }
      );

      $('#article_cat').on('change', function (e) {
        var html = '<div class="form-body">';
        var selected_cat = $('#article_cat').val();
        var product_id = $('#product_id').val();
        $.get(window.location.origin + '/admin/articles/attributes', {
          'categories[]': selected_cat,
          product_id: product_id,
        }).done(function (data) {
          $.each(data.article_att, function (index, value) {
            console.log(value);
            console.log(value[0].values);
            html = html + '<div class="form-group">';
            html =
              html +
              '<label class="col-md-4 col-md-offset-1">' +
              value[0].name +
              ':</label>';
            if (value.length > 1) {
              html =
                html +
                '<label class="col-md-4 col-md-offset-2">' +
                value[1].name +
                ':</label>';
            } else {
              html =
                html +
                '<label class="col-md-4 col-md-offset-2"> &nbsp; </label>';
            }
            html = html + '<div class="col-md-4 col-md-offset-1">';
            html =
              html +
              '<select class="att_select2 select2-multiple select2-button-multiselect-value" multiple name="filter[' +
              value[0].filter_id +
              '][]" class="select2-multiple select2-button-multiselect-value" >';
            html = html + '<option value="">Избери</option>';
            $.each(value[0].values, function (filterAttrId, filterAttrValue) {
              filterAttrId = parseInt(filterAttrId, 10);
              if (jQuery.inArray(filterAttrId, value[0].selected) !== -1)
                html =
                  html +
                  '<option selected value="' +
                  filterAttrId +
                  '">' +
                  filterAttrValue +
                  '</option>';
              else
                html =
                  html +
                  '<option value="' +
                  filterAttrId +
                  '">' +
                  filterAttrValue +
                  '</option>';
            });

            html = html + '</select></div>';

            if (value.length > 1) {
              html = html + ' <div class="col-md-4 col-md-offset-2">';
              html =
                html +
                '<select class="att_select2" name="filter[' +
                value[1].filter_id +
                '][]" class="select2-multiple select2-button-multiselect-value" multiple >';
              html = html + '<option value="">Избери</option>';
              $.each(value[1].values, function (filterAttrId, filterAttrValue) {
                filterAttrId = parseInt(filterAttrId, 10);
                if (jQuery.inArray(filterAttrId, value[1].selected) !== -1)
                  html =
                    html +
                    '<option selected value="' +
                    filterAttrId +
                    '">' +
                    filterAttrValue +
                    '</option>';
                else
                  html =
                    html +
                    '<option value="' +
                    filterAttrId +
                    '">' +
                    filterAttrValue +
                    '</option>';
              });
              html = html + '</select></div>';
            } else {
              html = html + '<div class="col-md-4 col-md-offset-2"></div>';
            }

            html = html + '</div>';
          });
          html = html + '</div></div>';
          $('#tab_attributes').html(html);
          $('.att_select2').select2({ placeholder: 'Избери...' });
        });
      });

      $('#article_cat').trigger('change');

      $(SELECTORS.ARTICLE_TITLE).on('keyup', function () {
        var text = $(this).val();
        var $metaTitle = $(SELECTORS.ARTICLE_META_TITLE);
        var $url = $(SELECTORS.ARTICLE_URL);
        var slug;

        $metaTitle.val(text);

        // URL slug
        slug = GlobalModule.replaceSlug(text);
        $url.val(slug);
      });

      $(SELECTORS.ARTICLE_TITLE_LANG2).on('keyup', function () {
        var text = $(this).val();
        var $metaTitle = $(SELECTORS.ARTICLE_META_TITLE_LANG2);
        var $url = $(SELECTORS.ARTICLE_URL_LANG2);
        var slug;

        $metaTitle.val(text);

        // URL slug
        slug = GlobalModule.replaceSlug(text);
        $url.val(slug);
      });
    },
  };

  return ArticleModule;
})();

ArticleModule.init();
