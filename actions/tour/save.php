<?php

$guid = get_input('guid');

if ($guid) {
	$entity = get_entity($guid);

	if (!$entity instanceof \Tour\Stop) {
		register_error(elgg_echo('tour:error:notfound'));
		forward(REFERER);
	}

	if (!$entity->canEdit()) {
		register_error(elgg_echo('tour:error:unauthorized'));
		forward(REFERER);
	}
} else {
	$site = elgg_get_site_entity();

	$entity = new \Tour\Stop;
	$entity->owner_guid = $site->guid;
	$entity->container_guid = $site->guid;
}

$page = get_input('page');

// Make sure we have the request URI instead of full URL
$page = preg_replace(elgg_get_site_url(), '', $href);

$entity->title = get_input('description');
$entity->description = get_input('description');
$entity->page = $page;
$entity->target = get_input('target');
$entity->access_id = get_input('access_id');

if (!$entity->save()) {
	register_error(elgg_echo('tour:action:save:error'));
	forward(REFERER);
}

system_message(elgg_echo('tour:action:save:success'));
forward($page);

/*
$stops = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'tour_stop',
	'metadata_name_value_pairs',
));

if ($stops) {
	$entity = array_pop($stops);
}
*/