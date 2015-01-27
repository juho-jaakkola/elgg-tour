<?php

$entity = elgg_extract('entity', $vars);

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'tour_page',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$content = <<<HTML
	<ul>
		<li>Page: {$entity->page}</li>
	</ul>
HTML;

$title = elgg_view('output/url', array(
	'text' => $entity->title,
	'href' => $entity->getURL(),
));

$params = array(
	'entity' => $entity,
	'title' => $title,
	'subtitle' => $content,
	'metadata' => $metadata,
	'content' => $entity->description,
);
$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block('', $list_body);
