<?php

namespace Tour;

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
			'page' => null,
		);

		if ($entity) {
			foreach ($fields as $name => $value) {
				$fields[$name] = $entity->$name;
			}
		}

		if (elgg_is_sticky_form('tour_stop')) {
			// TODO
		}

		return $fields;
	}
}
