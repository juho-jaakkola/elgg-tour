/**
 *
 */
define(function(require) {
    var elgg = require("elgg");
    var $ = require("jquery");

	$('#tour-start').click(function(e){
		$("#tour-outline").joyride({
			autoStart: true,
			postStepCallback: function (index, tip) {
				if (index == 2) {
					$(this).joyride('set_li', false, 1);
				}
			},
			modal: true,
			expose: true
	    });

	    e.preventDefault();
    });
});
