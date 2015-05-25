/*( function( $ ) {
	'use strict';

	var
		$blog = $( '#blog' ),
		$blogWidget = $( '#blog_affixed' ),
		$about = $( '#about' ),
		$aboutWidget = $( '#affixed' ),
		$frontend = $( '#frontend' ),
		$backend = $( '#backend' ),
		settings = {
			offset : {
				top : $about.outerHeight() + $aboutWidget.outerHeight() - ( $blogWidget.outerHeight() / 2 ),
				bottom : $about.outerHeight() + $blog.outerHeight() + $frontend.outerHeight() + $backend.outerHeight()
			}
		}
	;
console.log( 'affixing blog widget top to: ', settings.offset.top );
console.log( 'affixing blog widget bottom to: ', settings.offset.bottom );
console.log( '#about height = ', $about.outerHeight() );
console.log( '#blog height = ', $blog.outerHeight() );
console.log( '#frontend height = ', $frontend.outerHeight() );
console.log( '#backend height = ', $backend.outerHeight() );
	$( '#blog_affixed' ).affix( settings );
} )( jQuery );*/