<?php

namespace Tour;

use ElggObject;

/**
 *
 */
class Stop extends ElggObject {
	const SUBTYPE = 'tour_stop';

	/**
	 * Set subtype
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = self::SUBTYPE;
	}
}
