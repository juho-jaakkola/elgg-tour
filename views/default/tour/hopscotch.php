<?php
/**
 * Provides JSON object for the Hopscotch javascript library
 *
 * The plugin will use the contents of the JSON object to display a
 * feature tour for the user.
 *
 * Example output:
 *   {
 *     id: "welcome_tour",
 *     steps: [
 *       {
 *         target: "header",
 *         placement: "bottom",
 *         title: "This is the navigation menu",
 *         content: "Use the links here to get around on our site!"
 *       },
 *       {
 *         target: "profile-pic",
 *         placement: "right",
 *         title: "Your profile picture",
 *         content: "Upload a profile picture here."
 *       }
 *     ]
 *   }
 */

$entities = elgg_extract('stops', $vars);

$tour = new stdClass();
$tour->id = 'hopscotch-tour'; // TODO Why is does Hopscotch require this?

// Internationalization
$tour->i18n = array(
	'nextBtn' => elgg_echo('next'),
	'prevBtn' => elgg_echo('previous'),
	'doneBtn' => elgg_echo('done'),
	'closeTooltip' => elgg_echo('close'),
);

$tour->steps = array();
foreach ($entities as $entity) {

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

	$stop = new stdClass();
	$stop->title = $title;
	$stop->target = $entity->target;
	$stop->content = elgg_view('output/longtext', array(
		'value' => $content,
	));
	$stop->placement = $entity->placement;

	$tour->steps[] = $stop;
}

echo json_encode($tour);
