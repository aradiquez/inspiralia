/**
* jquery.bears-shortcodes.js
*
* Author: Bearsthemes
* Author URI: http://bearsthemes.com
* Email: bearsthemes@gmail.com
* Version: 1.0.0
*/

! ( function( $ ) {
	
	/**
	 * tbbs_shortcodes
	 *
	 */
	function tbbs_shortcodes() {
		this.init();
	}

	tbbs_shortcodes.prototype = {
		init: function() {
			/* #code */
			this.owlCarouselHandle();
		},
 		owlCarouselHandle: function() {
	 		$( '[data-bs-courousel-owl]' ).each( function() {
		 		var $this = $( this ),
		 			opts = $this.data( 'bs-courousel-owl' );

		 		try{ $this.owlCarousel( opts ); } 
		 		catch( err ) { console.log( err ); }
	 		} )
 		}
	};

	/* DOM Ready */
	$( function() {
		/* #code */
		new tbbs_shortcodes();
	} )
} )( jQuery )