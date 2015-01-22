<?php

$target = get_input('target', null);

echo $target;

$form_vars = array(
	'target' => $target,
	'description' => null,
);

echo elgg_view_form('tour/save', array(), $form_vars);
