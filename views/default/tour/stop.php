<?php
/**
 * Render a single tour item
 */

$entity = elgg_extract('entity', $vars);

$prefix = substr($entity->target, 0, 1);
$target = substr($entity->target, 1);

$type = ($prefix == '.') ? 'class' : 'id';

echo <<<HTML
	<li data-$type="{$target}"><h3>{$entity->title}</h3>{$entity->description}</li>
HTML;

/*
Examples:

<li data-id="notifier-popup-link" data-options="tipLocation: bottom;"><p>Notifier 1</p></li>
<li data-class="elgg-menu-item-notifier"><p>Notifier 2</p></li>
<li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida purus eget libero scelerisque dignissim. Pellentesque sagittis quam nibh, quis accumsan erat malesuada et. Etiam imperdiet eros non tristique ornare. Praesent in dolor erat. Pellentesque malesuada rutrum augue a accumsan. Phasellus nisi turpis, accumsan at eleifend eget, pretium nec tortor. Pellentesque vehicula metus varius arcu facilisis sagittis. In porta augue eget leo sollicitudin posuere. Curabitur euismod nulla vitae lacus efficitur, nec porta felis sodales. Cras sit amet ex eget magna cursus venenatis eget sed elit. Nullam tellus massa, venenatis et consequat sed, viverra sit amet lacus. Proin id leo vel est porta fringilla. Curabitur egestas quam sed cursus congue.</p></li>
<li data-class="elgg-menu-item-blog" data-options="tipLocation:top;tipAnimation:fade" data-button="Second Button"><p>Blogs! Throusands of them!</p></li>
<li data-id="chat-preview-link" class="custom-class">Content 3...</li>
<li data-class="elgg-menu-item-video"><p>Here be videos</p></li>
<li><h2>Fini!</h2></li>
*/