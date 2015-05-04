<?php
/**
 * Edit form for tour content
 */

$target_label = elgg_echo('tour:target');
$target_desc = elgg_echo('tour:target:desc');
$target_input = elgg_view('input/text', array(
	'name' => 'target',
	'value' => $vars['target'],
));

$attrs_input = '';
if ($vars['attrs']) {
	$attrs_input = elgg_view('input/radio', array(
		'name' => 'attrs',
		'options' => $vars['attrs'],
	));
}

$page_label = elgg_echo('tour:page');
$page_desc  = elgg_echo('tour:page:desc');
$page_input = elgg_view('input/dropdown', array(
	'name' => 'container_guid',
	'options_values' => $vars['page_options'],
	'value' => $vars['container_guid'],
));

$title_label = elgg_echo('title');
$title_input = elgg_view('input/text', array(
	'name' => 'title',
	'value' => $vars['title'],
));

$desc_label = elgg_echo('description');
$desc_input = elgg_view('input/longtext', array(
	'name' => 'description',
	'value' => $vars['description'],
));

$placement_label = elgg_echo('tour:placement');
$placement_input = elgg_view('input/radio', array(
	'name' => 'placement',
	'value' => $vars['placement'],
	'options' => array(
		elgg_echo('tour:left') => 'left',
		elgg_echo('tour:bottom') => 'bottom',
		elgg_echo('tour:right') => 'right',
		elgg_echo('tour:top') => 'top',
	),
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
		$attrs_input
		$target_input
		<span class="elgg-text-help">$target_desc</span>
	</div>
	<div>
		<label>$page_label</label>
		$page_input
		<span class="elgg-text-help">$page_desc</span>
	</div>
	<div>
		<label>$title_label</label>
		$title_input
	</div>
	<div>
		<label>$desc_label</label>
		$desc_input
	</div>
	<div>
		<label>$placement_label</label>
		$placement_input
	</div>
	<div>
		$guid_input
		$submit_input
	</div>
HTML;
