<?php

namespace App\Http\Requests\Budget\Transaction;

use App\Http\Requests\FormRequest;

abstract class SearchRequest
	extends FormRequest {

	/**
	 * @return array
	 */
	public function rules(): array {
		return [
			'dateFrom' => 'nullable|date',
			'dateTo' => 'nullable|date|after_or_equal:dateFrom',
			'count' => 'nullable',
			'name' => 'nullable',
		];
	}

	/**
	 * @return array
	 */
	public function messages(): array {
		return $this->getMessages('requests/budget/transaction/search');
	}

}