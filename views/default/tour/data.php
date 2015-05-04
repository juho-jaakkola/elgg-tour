<?php
/**
 * Provide tour data for the client
 *
 * Returns either JSON for the Hopscotch library or an ordered
 * HTML list for the Joyride library.
 */

$page = get_input('page');

$pages = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => \Tour\Page::SUBTYPE,
	'metadata_name_value_pairs' => array(
		array(
			'name' => 'page',
			'value' => $page,
		),
	),
	'limit' => false,
));

$stops = array();

if ($pages) {
	$page_guid = $pages[0]->guid;

	$stops = elgg_get_entities_from_metadata(array(
		'type' => 'object',
		'subtype' => \Tour\Stop::SUBTYPE,
		'container_guid' => $page_guid,
		'order_by_metadata' => array(
			'name' => 'order',
			'direction' => 'ASC',
			'as' => 'integer',
		),
		'order_by' => 'e.time_created ASC',
		'limit' => false,
	));
}

$js_lib = elgg_get_plugin_setting('js_library', 'tour');

// TODO Is it possible to cache the results to disk?
echo elgg_view("tour/{$js_lib}", array('stops' => $stops));
