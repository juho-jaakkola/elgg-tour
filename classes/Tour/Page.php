<?php

namespace Tour;

use ElggObject;

/**
 *
 */
class Page extends ElggObject {
	const SUBTYPE = 'tour_page';

	/**
	 * Set subtype
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = self::SUBTYPE;
	}

	/**
	 * Get URL of the tour page
	 *
	 * @return string
	 */
	public function getURL() {
		return "admin/administer_utilities/tour/view?guid={$this->guid}";
	}
}
