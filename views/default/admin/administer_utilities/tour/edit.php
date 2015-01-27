<?php

$guid = get_input('guid');

$entity = get_entity($guid);

if (!$entity instanceof \Tour\Page) {
	register_error('tour:not_found');
	forward(REFERER);
}

$form_helper = new \Tour\Page\Form;
$form_vars = $form_helper->prepare($entity);

echo elgg_view_form('tour_page/save', array(), $form_vars);
