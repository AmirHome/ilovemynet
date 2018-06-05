<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressesRequest extends FormRequest {

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
            'address' => 'required', 
            'post_code' => 'required|unique_with:addresses,persons_id,'.$this->addresses, 
            'city_name' => 'required', 
            'country_name' => 'required', 
            'persons_id' => 'required', 
            
		];
	}
}
