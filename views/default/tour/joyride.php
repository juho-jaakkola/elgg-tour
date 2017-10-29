<?php
/**
 * Provides an ordered HTML list for the Joyride javascript library
 *
 * The plugin will use the list elements to display a feature tour for the user.
 *
 * Example output:
 *   <ol id="chooseID">
 *     <li data-id="newHeader">Tip content...</li>
 *     <li>Tip content...</li>
 *     <li data-class="parent-element-class" data-options="tipLocation:top;tipAnimation:fade" data-button="Second Button">Content...</li>
 *     <li data-id="parentElementID" class="custom-class">Content...</li>
 *   </ol>
 */

$entities = elgg_extract('stops', $vars);

$stops = '';
foreach ($entities as $entity) {
	$prefix = substr($entity->target, 0, 1);
	$target = substr($entity->target, 1);

	$type = ($prefix == '.') ? 'class' : 'id';

	$title_key = "tour:title:{$entity->guid}";
	$content_key = "tour:body:{$entity->guid}";

	if (elgg_language_key_exists($title_key)) {
		$title = elgg_echo($title_key);
	} else {
		$title = $entity->title;
	}

	if (elgg_language_key_exists($content_key)) {
		$content = elgg_echo($content_key);
	} else {
		$content = $entity->description;
	}

	$description = elgg_view('output/longtext', array(
		'value' => $content,
	));

	$stops .= elgg_format_element('li',
		array(
			"data-$type" => $target,
			'data-options' => "tipLocation: {$entity->placement};",
		),
		"<h3>{$title}</h3>{$description}"
	);
}

echo "<ol hidden id=\"tour-outline\">$stops</ol>";
