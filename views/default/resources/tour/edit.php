<?php

$guid = get_input('guid');

$entity = get_entity($guid);

if (!$entity instanceof \Tour\Stop) {
	register_error(elgg_echo('tour:error:notfound'));
	forward(REFERER);
}

$form_helper = new \Tour\Form;
$form_vars = $form_helper->prepare($entity);

$target = get_input('target');

$form = elgg_view_form('tour/save', array(), $form_vars);

//$href = current_page_url();
//$form['target'] = $target;
//$form['href'] = $href;

$params = array(
	'title' => elgg_echo('tour:title:edit', array($target)),
	'filter' => false,
	'content' => $form,
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);