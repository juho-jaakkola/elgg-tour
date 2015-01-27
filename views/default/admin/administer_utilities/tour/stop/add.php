<?php

$form_helper = new \Tour\Stop\Form;
$form_vars = $form_helper->prepare();

echo elgg_view_form('tour_stop/save', array(), $form_vars);
