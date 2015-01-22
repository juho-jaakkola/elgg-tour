<?php

$entity = elgg_extract('entity', $vars);

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'tour_stop',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$content = $entity->description . "<p>{$entity->page}</p><p>{$entity->target}</p>";

$params = array(
	'entity' => $entity,
	'metadata' => $metadata,
	'content' => $content,
);
$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block('', $list_body);
