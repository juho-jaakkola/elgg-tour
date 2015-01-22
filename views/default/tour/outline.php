<?php

$entities = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => \Tour\Stop::SUBTYPE,
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
