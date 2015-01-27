<?php

namespace Tour\Page;

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
			'page' => null,
		);

		if ($entity) {
			foreach ($fields as $name => $value) {
				$fields[$name] = $entity->$name;
			}
		}

		if (elgg_is_sticky_form('tour_page')) {
			// TODO
		}

		return $fields;
	}
}
