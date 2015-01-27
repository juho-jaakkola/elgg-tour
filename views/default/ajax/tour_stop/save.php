<?php

$attrs = get_input('attrs');

$attr_options = array();
foreach ($attrs as $key => $value) {
	$attr_options[$value] = $value;
}

$form_vars = array(
	'attrs' => $attr_options,
	'description' => null,
);

echo elgg_view_form('tour_stop/save', array(), $form_vars);
