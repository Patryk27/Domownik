<?php

/**
 * Creates translation for enumerated data (eg. data given to the HTML's 'select' node).
 * For example usage, see models.
 * @param string[] $items
 * @param string $translationKey
 * @return string[]
 */
function map_translation(array $items, string $translationKey): array {
	$result = [];

	foreach ($items as $item) {
		$result[$item] = __(sprintf($translationKey, $item));
	}

	return $result;
}