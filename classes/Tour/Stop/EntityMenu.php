<?php

namespace Tour\Stop;

use ElggMenuItem;

class EntityMenu {
	/**
	 * Set up entity menu for tour_stop objects
	 *
	 * @param string $hook   'register'
	 * @param string $type   'menu:entity'
	 * @param array  $menu   Array of ElggMenuItem objects
	 * @param array  $params Menu parameter
	 * @return array $menu   Array of ElggMenuItem objects
	 */
	public function setUp($hook, $type, $menu, $params) {
		$handler = elgg_extract('handler', $params);

		if (\Tour\Stop::SUBTYPE != $handler) {
			return $menu;
		}

		$entity = $params['entity'];

		$allowed = array('access', 'edit', 'delete');

		foreach ($menu as $key => $item) {
			// Remove all unnecessary menu items
			if (!in_array($item->getName(), $allowed)) {
				unset($menu[$key]);
				continue;
			}

			// Set custom URL for editing page
			if ($item->getName() === 'edit') {
				$item->setHref("admin/administer_utilities/tour/stop/edit?guid={$entity->guid}");
			}
		}

		return $menu;
	}
}
