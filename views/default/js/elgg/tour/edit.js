/**
 *
 */
define(function(require) {
		var elgg = require("elgg");
		var $ = require("jquery");

		$('[id]').css('border', '1px dashed red');
		//$('[class]').css('border', '1px dashed orange');

/*
		prevElement = null;
		document.addEventListener('mousemove',
		    function(e){
		        var elem = e.target || e.srcElement;
		        if (prevElement!= null) {prevElement.classList.remove("mouseOn");}
		        elem.classList.add("mouseOn");
		        prevElement = elem;
		    },true);
*/
		var background = null;
		var prevElement = null;

		$('*').hover(function(e) {
			var elem = e.target || e.srcElement;

			if (background == null) {
				background = $(elem).css('background-color');
			}

			if (prevElement != null) {
				// Return original style to the previous element
				$(prevElement).css('background-color', background);

				background = $(elem).css('background-color');
			}

			// Set custom style to the current element
			$(elem).css({'background-color': "red"});

			prevElement = elem;
			//console.log(background);
		});

		$('[id]').click(function(e) {
			var id = $(this).attr('id');
			//console.log(id);

			var href = elgg.get_site_url() + 'ajax/view/ajax/tour/save?target=' + id;

			$.colorbox({href: href});

			e.preventDefault();

			return false;
		});
/*
		// Get the form using ajax ajax/view/core/ajax/edit_comment
		var getForm = elgg.ajax('ajax/view/ajax/discussion/reply/edit?guid=' + this.guid, {
			success: function(html) {
				// Add the form to DOM
				that.$item.find('.elgg-body').first().append(html);

				that.showForm();

				var $form = that.getForm();

				$form.find('.elgg-button-cancel').on('click', function () {
					that.hideForm();
					return false;
				});

				// save
				$form.on('submit', function () {
					that.submitForm();
					return false;
				});
			}
		});
*/
});
