/**
 * Draggable info text reordering
 */
define(function(require) {
    var elgg = require("elgg");
    var $ = require("jquery");
	var guid = elgg.get_page_owner_guid();

	/**
	 * Request the server to save the current order
	 *
	 * @param {Object} e
	 */
	var reorderItems = function(e) {
		var guids = [];

		$('.elgg-item-object-tour_stop').each(function(k, e) {
			var id = $(this).attr('id');
			var guid = id.replace('elgg-object-', '');

			guids.push(guid);
		});

		elgg.action('tour_page/reorder', {
			data: {
				guid: guid,
				guids: guids,
			}
		});
	};

	$('.elgg-list-entity-tour').sortable({
		items:                '.elgg-item-object-tour_stop',
		handle:               '.elgg-icon-drag-arrow',
		forcePlaceholderSize: true,
		placeholder:          'elgg-widget-placeholder',
		opacity:              0.8,
		revert:               500,
		stop:                 reorderItems
	});
});
