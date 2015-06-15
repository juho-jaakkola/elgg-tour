<?php

$guid = get_input('guid');

if ($guid) {
	$entity = get_entity($guid);

	if (!$entity instanceof \Tour\Page) {
		register_error(elgg_echo('tour:error:notfound'));
		forward(REFERER);
	}

	if (!$entity->canEdit()) {
		register_error(elgg_echo('tour:error:unauthorized'));
		forward(REFERER);
	}
} else {
	$site = elgg_get_site_entity();

	$entity = new \Tour\Page;
	$entity->owner_guid = $site->guid;
	$entity->container_guid = $site->guid;
}

$page = get_input('page');

// Make sure we have the request URI instead of full URL
$page = str_replace(elgg_get_site_url(), '', $page);

$entity->title = get_input('title');
$entity->description = get_input('description');
$entity->page = $page;
$entity->access_id = get_input('access_id');

if (!$entity->save()) {
	register_error(elgg_echo('tour:action:save:error'));
	forward(REFERER);
}

system_message(elgg_echo('tour:action:save:success'));
forward("admin/administer_utilities/tour/view?guid={$entity->guid}");
