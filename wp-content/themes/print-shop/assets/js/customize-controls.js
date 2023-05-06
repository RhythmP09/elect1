( function( api ) {

	// Extends our custom "print-shop" section.
	api.sectionConstructor['print-shop'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );