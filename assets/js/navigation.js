/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens
 * 
 */
( function() {
	const mobileNavToggle = document.getElementById( 'mobileNavToggle' );
	// const mobileNavWrap = document.getElementById( 'mobileNavWrap' );


	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	mobileNavToggle.addEventListener( 'click', function() {
		document.body.classList.toggle( 'mobile-navigation-open' );
	} );

	const tagsNavToggle = document.querySelector('.tags-nav__label');
    if ( tagsNavToggle ) {
        tagsNavToggle.addEventListener( 'click', function() {
            tagsNavToggle.parentElement.classList.toggle( '--active' );
        } );
    }

}() );

