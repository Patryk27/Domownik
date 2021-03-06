<?php

return [
	'validation' => [
		// @todo add missing messages
		'value_range_to.greater_than_field' => 'Górna widełka wartości musi być większa niż dolna.',
	],

	'messages' => [
		'stored' => 'Transakcja została utworzona.',
		'updated' => 'Transakcja została zaktualizowana.',
		'deleted' => 'Transakcja została usunięta.',
	],

	'prompts' => [
		'delete' => '<p>Czy na pewno chcesz usunąć tę transakcję?</p>Tej operacji <b>nie można</b> cofnąć.',
	],
];