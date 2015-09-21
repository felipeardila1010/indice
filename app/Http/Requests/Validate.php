<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;

class Validate extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
		];
	}

}
