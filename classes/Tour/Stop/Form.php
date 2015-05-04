<?php

namespace Tour\Stop;

class Form {
	/**
	 *
	 */
	public function prepare($entity = null) {
		// name => value
		$fields = array(
			'guid' => null,
			'title' => null,
			'description' => null,
			'owner_guid' => null,
			'container_guid' => null,
			'access_id' => ACCESS_PUBLIC,
			'target' => null,
			'placement' => null,
		);

		if ($entity) {
			foreach ($fields as $name => $value) {
				$fields[$name] = $entity->$name;
			}
		}

		if (elgg_is_sticky_form('tour_stop')) {
			// TODO
		}

		// TODO Use ElggBatch?
		$pages = elgg_get_entities(array(
			'type' => 'object',
			'subtype' => \Tour\Page::SUBTYPE,
			'limit' => false,
		));

		foreach ($pages as $page) {
			$fields['page_options'][$page->guid] = $page->title;
		}

		return $fields;
	}
}
