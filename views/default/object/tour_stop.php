<?php

$entity = elgg_extract('entity', $vars);

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'tour_stop',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$content = <<<HTML
	<ul>
		<li>Page: {$entity->page}</li>
		<li>Target: {$entity->target}</li>
		<li>Order: {$entity->order}</li>
	</ul>
HTML;

$params = array(
	'entity' => $entity,
	'title' => $entity->title,
	'subtitle' => $content,
	'metadata' => $metadata,
	'content' => $entity->description,
);
$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);

$drag_handle = elgg_view_icon('drag-arrow');

echo elgg_view_image_block($drag_handle, $list_body);
