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
	$location = $entity->placement;

	$type = ($prefix == '.') ? 'class' : 'id';

	$stops .= "<li data-options=\"tipLocation:{$location};\" data-$type=\"{$target}\"><h3>{$entity->title}</h3>{$entity->description}</li>";
}

echo "<ol hidden id=\"tour-outline\">$stops</ol>";
