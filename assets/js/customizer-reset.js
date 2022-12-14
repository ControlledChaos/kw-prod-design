/* global jQuery, KWPD_CustomizerReset, ajaxurl, wp */

jQuery(function ($) {

    var $container = $( '#customize-header-actions' );


    var $button = $( '<input type="submit" name="ccp-reset" id="ccp-reset" class="button-secondary button">' )
        .attr( 'value', KWPD_CustomizerReset.reset )
        .css({
            'float'        : 'right',
            'margin-right' : '10px',
            'margin-top'   : '9px'
        });

    $button.on( 'click', function (event) {
        event.preventDefault();

        var data = {
            wp_customize : 'on',
            action       : 'customizer_reset',
            nonce        : KWPD_CustomizerReset.nonce.reset
        };

        var r = confirm( KWPD_CustomizerReset.confirm );

        if ( ! r ) return;

        $button.attr( 'disabled', 'disabled' );

        $.post( ajaxurl, data, function () {
            wp.customize.state( 'saved' ).set( true );
            location.reload();
        });
    });

    $container.append( $button );
});
