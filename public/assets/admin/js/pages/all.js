var AllPagesModule = (function(window, undefined) {



    var AllPagesModule = {

        blockUI: true,

        init: function() {
            $(document).ready(this.handleDocumentReady.bind(this));
        },

        handleDocumentReady: function() {

            // Show loading message on ajax request
            $(document).ajaxStart(function() {
                if (this.blockUI) {
                    App.blockUI({animate: true});
                }
            }.bind(this)).ajaxStop(function() {
                App.unblockUI();
            });

            // Set the token for every ajax request
            $.ajaxPrefilter(function( options, originalOptions, xhr ) {
                var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
                }
            });
        }
    };

    return AllPagesModule;
})(window);

AllPagesModule.init();