<?php

elgg_require_js('elgg/tour/reorder');

elgg_register_title_button('tour', 'add');

echo elgg_list_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'tour_stop',
	'order_by_metadata' => array(
		'name' => 'order',
		'direction' => 'ASC',
		'as' => 'integer',
	),
	'no_results' => elgg_echo('tour:no_results'),
	'list_class' => 'elgg-list-entity-tour',
));
