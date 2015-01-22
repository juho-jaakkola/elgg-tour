<?php
/**
 * Edit form for tour content
 */

$target_label = elgg_echo('tour:target');
$target_input = elgg_view('input/text', array(
	'name' => 'target',
	'value' => $vars['target'],
));

$page_label = elgg_echo('tour:page');
$page_input = elgg_view('input/text', array(
	'name' => 'page',
	'value' => $vars['page'],
));

$desc_label = elgg_echo('description');
$desc_input = elgg_view('input/longtext', array(
	'name' => 'description',
	'value' => $vars['description'],
));

$context_input = elgg_view('input/radio', array(
	'name' => 'context',
	'options' => array(
		elgg_echo('tour:context:1') => 'all',
		elgg_echo('tour:context:2') => 'current',
		elgg_echo('tour:context:3') => 'current_and_subpages',
		elgg_echo('tour:context:4') => 'current_and_all_subpages',
	),
	//'value' => $vars['context'],
));

$access_label = elgg_echo('access');
$access_input = elgg_view('input/access', array(
	'name' => 'access_id',
	'value' => $vars['access_id'],
));

$guid_input = elgg_view('input/hidden', array(
	'name' => 'guid',
	'value' => $vars['guid'],
));

$submit_input = elgg_view('input/submit', array(
	'value' => elgg_echo('save'),
));

echo <<<HTML
	<div>
		<label>$target_label</label>
		$target_input
	</div>
	<div>
		<label>$page_label</label>
		$page_input
	</div>
	<div>
		$context_input
	</div>
	<div>
		<label>$desc_label</label>
		$desc_input
	</div>
	<div>
		<label>$access_label</label>
		$access_input
	</div>
	<div>
		$guid_input
		$submit_input
	</div>
HTML;
