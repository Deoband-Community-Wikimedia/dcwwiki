( function( api ) {

	// Extends our custom "event-management" section.
	api.sectionConstructor['event-management'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );