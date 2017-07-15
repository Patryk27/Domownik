<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest
	extends FormRequest {

	/**
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * @return array
	 */
	public function rules() {
		return [
			'login' => 'required',
			'password' => 'required',
		];
	}

	/**
	 * @return array
	 */
	public function messages() {
		return __('requests/user/login.validation');
	}

}