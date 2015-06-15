<?php
/**
 * Displays all tour_stops within a single tour
 */

elgg_require_js('elgg/tour/reorder');

$guid = get_input('guid');

$entity = get_entity($guid);

// This makes the GUID avaible for javascript
elgg_set_page_owner_guid($guid);

elgg_register_menu_item('title', array(
	'name' => 'tour_stop_add',
	'href' => "admin/administer_utilities/tour/stop/add?container_guid=$guid",
	'text' => elgg_echo('tour:stop:add'),
	'link_class' => 'elgg-button elgg-button-action',
));

echo elgg_view_title($entity->title);

$url = elgg_normalize_url($entity->page);
echo elgg_view('output/longtext', array(
	'value' => elgg_echo('tour:page:title', array($url)),
	'class' => 'mvl',
));

echo elgg_list_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => \Tour\Stop::SUBTYPE,
	'container_guid' => $guid,
	'order_by_metadata' => array(
		'name' => 'order',
		'direction' => 'ASC',
		'as' => 'integer',
	),
	'order_by' => 'e.time_created ASC',
	'no_results' => elgg_echo('tour:stops:none'),
	'list_class' => 'elgg-list-entity-tour mvl',
));
