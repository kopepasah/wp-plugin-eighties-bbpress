( function( $ ) {

	$( document ).ready( function() {
		/* Use backticks instead of <code> for the Code button in the editor */
		if ( typeof( edButtons ) !== 'undefined' ) {
			edButtons[110] = new QTags.TagButton( 'code', 'code', '`', '`', 'c' );
			QTags._buttonsInit();
		}
	});

} )( jQuery );