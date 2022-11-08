var Articles = (function(){
        var SELECTORS = {
            ARTICLES_TABLE: '[articles-table]'
        };
        var Articles = {
            init: function() {
                $(document).ready(this.handleDocumentReady.bind(this));
            },
            handleDocumentReady: function() {
                this.initArticlesTable();
            },

            initArticlesTable: function() {
   
                window.ddt = $(SELECTORS.ARTICLES_TABLE).dataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": '../../product/warehouseCountDatatable',
                        "type": "GET",
                       "data": function ( d ) {
                        return $.extend( {}, d, {                               
                               "product_id": $("#product_id").val()                               
                             } );
                       }
                    },
                    "language": {
                        url: EsConfig.routes.datatableLanguage
                    },
                    buttons: [],
                    lengthMenu:  [ 10, 25, 50, 75, 100 ], 
                    "pageLength": 50                    
                });
            }
        };
        return Articles;
    })();

    Articles.init();
