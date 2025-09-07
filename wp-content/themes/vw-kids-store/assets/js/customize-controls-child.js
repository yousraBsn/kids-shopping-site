( function( api ) {

	// Extends our custom "vw-kids-store" section.
	api.sectionConstructor['vw-kids-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );