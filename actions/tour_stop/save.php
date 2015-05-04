<?php

$guid = get_input('guid');
$container_guid = get_input('container_guid');

$container = get_entity($container_guid);

if (!$container instanceof \Tour\Page) {
	register_error(elgg_echo('tour:error:page_not_found'));
	forward(REFERER);
}

if (!$container->canEdit()) {
	register_error(elgg_echo('tour:error:unauthorized'));
	forward(REFERER);
}

if ($guid) {
	$entity = get_entity($guid);

	if (!$entity instanceof \Tour\Stop) {
		register_error(elgg_echo('tour:error:stop_not_found'));
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
	$entity->order = 999;
}

$entity->container_guid = $container->guid;
$entity->title = get_input('title');
$entity->description = get_input('description');
$entity->target = get_input('target');
$entity->access_id = $container->access_id;

if (!$entity->save()) {
	register_error(elgg_echo('tour:action:save:error'));
	forward(REFERER);
}

system_message(elgg_echo('tour:action:save:success'));
forward($container->getURL());
