/**
 *
 */
define(function(require) {
	var elgg = require("elgg");
	var $ = require("jquery");

	var link = $('#tour-start');
	var library = link.attr('data-library');

	// Remove site URL to get the path
	var path = window.location.href.replace(elgg.get_site_url(), '');

	// Get the first page segment of the path
	var page = path.split('/')[0];

	link.click(function(e) {
		e.preventDefault();

		require([library], function(lib) {
			elgg.get({
				url: 'tour/data',
				data: {'page': page},
				success: function(data) {
					if (library == 'hopscotch') {
						var data = jQuery.parseJSON(data);

						lib.startTour(data);
					} else {
						$('body').append(data);

						$("#tour-outline").joyride({
							autoStart: true,
							modal: true,
							expose: true
						});
					}
				}
			});
		});
	});
});

