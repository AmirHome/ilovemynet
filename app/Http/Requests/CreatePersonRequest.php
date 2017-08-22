<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonRequest extends FormRequest {

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
            'name' => 'required', 
            'birthday' => 'required', 
            'gender' => 'required', 
            'address' => 'required', 
            'post_code' => 'required', 
            'city_name' => 'required', 
            'country_name' => 'required', 
            
		];
	}
}