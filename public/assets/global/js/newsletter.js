(function () {
    var SELECTORS = {
        BUTTON_NEWSLETTER_CHECK: '[button-newsletter-check]',
    };
    var Newsletter = {
        init: function () {

            this.newsletter= null;
            $(document).ready(this.handleDocumentReady.bind(this));
        },

        handleDocumentReady: function () {
            $(document).on('click','body '+ SELECTORS.BUTTON_NEWSLETTER_CHECK,this.handleNewsletterCheck.bind(this));
        },

        handleNewsletterCheck: function(e) {
            e.preventDefault();
            var newsletter = $("#newsletter").attr('value');
            if (!!newsletter) {
                this.newsletter= newsletter;
            }
            $.ajax({
                type: 'post',
                url: '/newsletter/check',
                data: {
                    mail: this.newsletter
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    $('[data-newsletter-check]').html(data.newsletter_response);
                }.bind(this)
            })
        }
    };
    Newsletter.init();
})();