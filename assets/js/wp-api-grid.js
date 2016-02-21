/*! WP API Grid - v0.1.0
 * http://wordpress.org/plugins
 * Copyright (c) 2016; * Licensed GPLv2+ */
/*! WP API Grid - v0.1.0
 * http://wordpress.org/plugins
 * Copyright (c) 2016; * Licensed GPLv2+ */
;( function( window, $, undefined ) {
	'use strict';

	var $grid = $( '.api-image-gallery-container' ),
		template = _.template( '<img class="grid-image" src="<%- data.source_url %>">' );

		$grid.masonry( {
			itemSelector: '.grid-image',
			percentPosition: true
		} );

	var loadTen = function( promise ) {
		return promise.done( function( models ) {

			_.each( models, function( model ) {
				$grid.append( template( { data: model } ) );
			} );

			$grid.imagesLoaded().progress( function() {
				$grid.masonry( 'reloadItems' );
				$grid.masonry( 'layout' );
			} );

		} );
	};

	wp.api.loadPromise.done( function() {
		var media = new wp.api.collections.Media();
		loadTen( media.fetch() ).done( function() {
			var $lastimage;

			var lastImageCheck = function() {
				$lastimage = $grid.find( '.grid-image' ).last();
				if( 0 !== $lastimage.filter( ':onScreen' ).length ) {
					console.log( media.state );
					if ( media.state.currentPage === media.state.totalPages ) {

						// Cancel the interval.
						clearInterval( checkForLastInterval );
					} else {

						// Load some more!
						$grid.masonry().masonry('reloadItems');
						loadTen( media.more() );
					}

				}

			};

			// Wait until the last item is visible, then load more.
			var checkForLastInterval = setInterval( lastImageCheck, 500 );

		} );
	} );

} )( this, jQuery );
