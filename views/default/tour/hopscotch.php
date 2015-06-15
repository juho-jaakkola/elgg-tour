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

$tour->steps = array();
foreach ($entities as $entity) {
	$stop = new stdClass();
	$stop->title = $entity->title;
	$stop->target = $entity->target;
	$stop->content = elgg_view('output/longtext', array(
		'value' => $entity->description,
	));
	$stop->placement = $entity->placement;

	$tour->steps[] = $stop;
}

echo json_encode($tour);
