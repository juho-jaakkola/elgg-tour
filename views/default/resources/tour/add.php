<?php

$form_helper = new \Tour\Form;
$form_vars = $form_helper->prepare();

$form = elgg_view_form('tour/save', array(), $form_vars);

$params = array(
	'title' => elgg_echo('tour:title:edit', array($target)),
	'filter' => false,
	'content' => $form,
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);