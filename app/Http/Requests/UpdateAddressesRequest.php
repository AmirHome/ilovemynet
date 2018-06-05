<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressesRequest extends FormRequest {

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
	public function rules( \Illuminate\Http\Request $request)
	{
		return [
            'address' => 'required', 
            'post_code' => 'required|unique_with:addresses,persons_id,'.$request->segment(2), 
            'city_name' => 'required', 
            'country_name' => 'required', 
            'persons_id' => 'required', 
            
		];
	}
}
