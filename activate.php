<?php
/**
 * Register classes
 */

if (get_subtype_id('object', \Tour\Stop::SUBTYPE)) {
	update_subtype('object', \Tour\Stop::SUBTYPE, 'Tour\Stop');
} else {
	add_subtype('object', \Tour\Stop::SUBTYPE, 'Tour\Stop');
}
