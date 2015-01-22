<?php

$entities = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => \Tour\Stop::SUBTYPE,
	// TODO
	//'metadata_name_value_pairs' => array(),
));

$stops = '';
foreach ($entities as $entity) {
	$stops .= elgg_view('tour/stop', array('entity' => $entity));
}

echo "<ol hidden id=\"tour-outline\">$stops</ol>";
