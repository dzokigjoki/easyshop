var BlogModule = (function () {
  var SELECTORS = {
    BLOG_TITLE: '#title',
    BLOG_META_TITLE: '#meta_title',
    BLOG_URL: '#url',
    BLOG_TITLE_LANG2: '#title_lang2',
    BLOG_META_TITLE_LANG2: '#meta_title_lang2',
    BLOG_URL_LANG2: '#url_lang2',
  };

  var BlogModule = {
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
          url: '/admin/blog/uploadRedactor',
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
          url: '/admin/blog/removeRedactor',
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

      $(SELECTORS.BLOG_TITLE).on('keyup', function () {
        var text = $(this).val();
        var $metaTitle = $(SELECTORS.BLOG_META_TITLE);
        var $url = $(SELECTORS.BLOG_URL);
        var slug;

        $metaTitle.val(text);

        // URL slug
        slug = GlobalModule.replaceSlug(text);
        $url.val(slug);
      });
      $(SELECTORS.BLOG_TITLE_LANG2).on('keyup', function () {
        var text = $(this).val();
        var $metaTitle = $(SELECTORS.BLOG_META_TITLE_LANG2);
        var $url = $(SELECTORS.BLOG_URL_LANG2);
        var slug;

        $metaTitle.val(text);

        // URL slug
        slug = GlobalModule.replaceSlug(text);
        $url.val(slug);
      });
    },
  };

  return BlogModule;
})();

BlogModule.init();
