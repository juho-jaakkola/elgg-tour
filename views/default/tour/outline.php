<?php

// TODO Is there a core function for this?
$uri = get_input('__elgg_uri');
$parts = explode('/', $uri);
$page = $parts[0];

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

$page_guid = $pages[0]->guid;

$entities = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => \Tour\Stop::SUBTYPE,
	'container_guid' => $page_guid,
	'order_by_metadata' => array(
		'name' => 'order',
		'direction' => 'ASC',
		'as' => 'integer',
	),
	'limit' => false,
));

$stops = '';
foreach ($entities as $entity) {
	$stops .= elgg_view('tour/stop', array('entity' => $entity));
}

echo "<ol hidden id=\"tour-outline\">$stops</ol>";
