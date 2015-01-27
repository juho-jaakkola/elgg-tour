<?php

$guid = get_input('guid');

$entity = get_entity($guid);

if (!$entity instanceof \Tour\Page) {
	register_error(elgg_echo('tour:not_found'));
	forward(REFERER);
}

if (!$entity->canEdit()) {
	register_error(elgg_echo('actionunaurhorized'));
	forward(REFERER);
}

if ($entity->delete()) {
	system_message(elgg_echo('tour:action:delete:success'));
} else {
	register_error(elgg_echo('tour:action:delete:error'));
}

forward(REFERER);
