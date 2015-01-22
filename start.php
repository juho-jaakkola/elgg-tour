<?php
/**
 * Plugin for managing and displaying feature tours
 */

elgg_register_event_handler('init', 'system', 'tour_init');

/**
 * Initialize the plugin.
 */
function tour_init() {
	elgg_register_css('joyride', '/mod/tour/vendors/joyride/joyride-2.1.css');
	elgg_register_js('joyride', '/mod/tour/vendors/joyride/jquery.joyride-2.1.js');

	elgg_load_js('joyride');
	elgg_load_css('joyride');

	elgg_require_js('elgg/tour/display');
	//elgg_require_js('elgg/tour/edit');

	elgg_register_ajax_view('ajax/tour/save');

	elgg_extend_view('page/elements/footer', 'tour/outline');

	elgg_extend_view('css/elgg', 'css/tour');
	elgg_extend_view('css/admin', 'css/tour_admin');

	elgg_register_action('tour/save', __DIR__ . '/actions/tour/save.php', 'admin');
	elgg_register_action('tour/reorder', __DIR__ . '/actions/tour/reorder.php', 'admin');
	elgg_register_action('tour_stop/delete', __DIR__ . '/actions/tour/delete.php', 'admin');

	elgg_register_page_handler('tour', 'tour_page_handler');
	elgg_register_page_handler('tour_stop', 'tour_page_handler'); // For convenience

	elgg_register_admin_menu_item('administer', 'tour', 'administer_utilities');

	elgg_register_menu_item('topbar', array(
		'name' => 'tour',
		'href' => '',
		'text' => elgg_echo('tour:start'),
		'id' => 'tour-start',
		'section' => 'alt',
	));
}

/**
 * Tour page handler
 *
 * @param array $page
 */
function tour_page_handler($page) {

	switch ($page[0]) {
		case 'edit':
			set_input('guid', $page[1]);
			echo elgg_view('resources/tour/edit');
			break;
		case 'add':
			echo elgg_view('resources/tour/add');
			break;
	}

	return true;
}
