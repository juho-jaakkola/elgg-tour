<?php
/**
 * Plugin for managing and displaying feature tours
 */

elgg_register_event_handler('init', 'system', 'tour_init');

/**
 * Initialize the plugin.
 */
function tour_init() {
	$js_lib = elgg_get_plugin_setting('js_library', 'tour');

	if ($js_lib == 'joyride') {
		elgg_register_css('joyride', '/mod/tour/vendors/joyride/joyride-2.1.css');
		elgg_load_css('joyride');

		elgg_define_js('joyride', array(
			'src' => '/mod/tour/vendors/joyride/jquery.joyride-2.1.js',
			'exports' => 'joyride',
		));
	} else {
		elgg_register_css('hopscotch', '/mod/tour/vendors/hopscotch/css/hopscotch.min.css');
		elgg_load_css('hopscotch');

		elgg_define_js('hopscotch', array(
			'src' => '/mod/tour/vendors/hopscotch/hopscotch.min.js',
			'exports' => 'hopscotch',
		));
	}

	elgg_require_js('elgg/tour/display');
	//elgg_require_js('elgg/tour/edit');

	elgg_register_ajax_view('ajax/tour_stop/save');

	elgg_extend_view('page/elements/footer', 'tour/outline');

	elgg_extend_view('css/elgg', 'css/tour');
	elgg_extend_view('css/admin', 'css/tour_admin');

	elgg_register_action('tour_page/save', __DIR__ . '/actions/tour_page/save.php', 'admin');
	elgg_register_action('tour_page/reorder', __DIR__ . '/actions/tour_page/reorder.php', 'admin');
	elgg_register_action('tour_page/delete', __DIR__ . '/actions/tour_page/delete.php', 'admin');
	elgg_register_action('tour_stop/save', __DIR__ . '/actions/tour_stop/save.php', 'admin');
	elgg_register_action('tour_stop/delete', __DIR__ . '/actions/tour_stop/delete.php', 'admin');

	elgg_register_page_handler('tour', 'tour_page_handler');
	elgg_register_page_handler('tour_stop', 'tour_page_handler'); // For convenience

	elgg_register_admin_menu_item('administer', 'tour', 'administer_utilities');

	elgg_register_menu_item('topbar', array(
		'name' => 'tour',
		'href' => '',
		'text' => elgg_echo('tour:start'),
		'id' => 'tour-start',
		'section' => 'alt',
		'data-library' => $js_lib,
	));

	elgg_register_plugin_hook_handler('register', 'menu:entity', array('Tour\Page\EntityMenu', 'setUp'));
	elgg_register_plugin_hook_handler('register', 'menu:entity', array('Tour\Stop\EntityMenu', 'setUp'));

	elgg_register_viewtype('json');
}

/**
 * Tour page handler
 *
 * @param array $page
 */
function tour_page_handler($page) {

	switch ($page[0]) {
		case 'data':
			echo elgg_view('tour/data');
			break;
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
