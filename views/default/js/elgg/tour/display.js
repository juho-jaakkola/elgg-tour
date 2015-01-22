/**
 *
 */
define(function(require) {
    var elgg = require("elgg");
    var $ = require("jquery");

	$('#tour-start').click(function(e){
		$("#tour-outline").joyride({
			autoStart: true,
			modal: true,
			expose: true
	    });

	    e.preventDefault();
    });
});
