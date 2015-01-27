<?php

$form_helper = new \Tour\Page\Form;
$form_vars = $form_helper->prepare();

echo elgg_view_form('tour_page/save', array(), $form_vars);
