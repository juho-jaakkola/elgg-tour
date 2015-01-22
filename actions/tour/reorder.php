<?php

$guids = get_input('guids');

$entities = new ElggBatch('elgg_get_entities', array(
	'type' => 'object',
	'subtype' => \Tour\Stop::SUBTYPE,
	'limit' => false,
));

$count = 0;
foreach ($entities as $entity) {
	$position = array_search($entity->guid, $guids);

	if ($position !== false) {
		$entity->order = $position;
		$count++;
	}
}

system_message(elgg_echo('tour:action:reorder:success', array($count)));
forward(REFERER);
