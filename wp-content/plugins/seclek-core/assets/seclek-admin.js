// this is a basic change function, you can improve it.
;(function ( $, window, document, undefined ) {
  'use strict';

    $(document).ready( function() {

        $('#page_template').change( function() {
            switch( $( this ).val() ) {

                case 'tpl-fullwidth.php':
					$('#_page_information').show();
					$('#cs-tab-page_layout_info').hide();
					$('.cs-nav > ul > li:first-child').hide();
                break;

                case 'tpl-blank-page.php':
                    $('#_page_information').hide();
                break;

                default:
					$('#_page_information').show();
					$('.cs-nav > ul > li:first-child').show();
                break;
            }

        }).change();

    });

})( jQuery, window, document );