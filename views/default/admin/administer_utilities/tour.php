<?php

elgg_register_menu_item('title', array(
	'name' => 'tour_add',
	'href' => 'admin/administer_utilities/tour/add',
	'text' => elgg_echo('tour:add'),
	'link_class' => 'elgg-button elgg-button-action',
));

echo elgg_list_entities(array(
	'type' => 'object',
	'subtype' => \Tour\Page::SUBTYPE,
	'no_results' => elgg_echo('tour:no_results'),
));
