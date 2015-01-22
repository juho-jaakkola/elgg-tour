/**
 *
 */
define(function(require) {
	var elgg = require("elgg");
	var $ = require("jquery");

	var prevElement = null;
	var selecting = true;

	/**
	 * Highlight element when mouse hovers over it
	 *
	 * @param {Object} e The element being hovered on
	 */
	$('*').hover(function(e) {
		var elem = e.target || e.srcElement;

		if (prevElement != null) {
			// Return original style to the previous element
			$(prevElement).removeClass('elgg-tour-selecting');
		}

		if (selecting) {
			// Set custom style to the current element
			$(elem).addClass('elgg-tour-selecting');
		}

		prevElement = elem;
	});

	/**
	 * Open tour item form inside colorbox when user selects an item
	 *
	 * @param {Object} e The clicked element
	 */
	$('*').on('click', (function(e) {
		if (selecting === false) {
			return;
		}

		selecting = false;

		var elem = e.target;
		var attrs = getAttributes(elem);
		var href = elgg.get_site_url() + 'ajax/view/ajax/tour/save';

		$.colorbox({
			href: href,
			data: {
				attrs: attrs
			},
			onClosed: function() {
				selecting = true;
			},
			onComplete: function() {
				var selector = null;

				// Highlight the associated element when hovering radio options
				$('.elgg-input-radios label').hover(
					function(e) {
						selector = $(this).find('[name=attrs]').val();

						$(selector).addClass('elgg-tour-selecting');
					}, function(e) {
						$(selector).removeClass('elgg-tour-selecting');
					}
				);
			}
		});

		e.preventDefault();
		e.stopPropagation();
	}));

	/**
	 * Get id and classes of the element and its parent
	 *
	 * @param {Object} elem
	 * @return {Array} attrs
	 */
	function getAttributes(elem) {
		var attrs = [];

		// Get id of current element
		var id = $(elem).attr('id');
		if (id !== undefined) {
			attrs.push('#' + id);
		}

		// Get id of parent element
		var parentId = $(elem).parent().attr('id');
		if (parentId !== undefined) {
			attrs.push('#' + parentId);
		}

		// Get classes of current element
		var classes = $(elem).attr('class');
		if (classes !== undefined) {
			classes = classes.split(' ');

			$(classes).each(function(key, value) {
				attrs.push('.' + value);
			});
		}

		// Get classes of parent element
		var parentClasses = $(elem).parent().attr('class');
		if (parentClasses !== undefined) {
			classes = parentClasses.split(' ');

			$(classes).each(function(key, value) {
				attrs.push('.' + value);
			});
		}

		return attrs;
	}
});
