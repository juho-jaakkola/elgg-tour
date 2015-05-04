<?php

$library_label = elgg_echo('tour:setting:library');
$library_desc = elgg_echo('tour:setting:library:desc');
$library_input = elgg_view('input/dropdown', array(
	'name' => 'params[js_library]',
	'options_values' => array(
		'hopscotch' => 'Hopscotch',
		'joyride' => 'Joyride',
	),
	'value' => $vars['entity']->js_library,
));

echo <<<HTML
	<div>
		<label>
			$library_label
			$library_input
		</label>
		<div class="">$library_desc</div>
	</div>
HTML;
