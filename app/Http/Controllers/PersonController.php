<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Person;
use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use Illuminate\Http\Request;

use App\Address;


class PersonController extends Controller {

	/**
	 * Display a listing of person
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $person = Person::with("address")->get();

		return view('person.index', compact('person'));
	}

	/**
	 * Show the form for creating a new person
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{    
        $gender = Person::$gender;

	    return view('person.create', compact("gender"));
	}

	/**
	 * Store a newly created person in storage.
	 *
     * @param CreatePersonRequest|Request $request
	 */
	public function store(CreatePersonRequest $request)
	{

		$personData = $request->only('name','birthday','gender');
		$addressData = $request->only('address','post_code','city_name','country_name');

		\DB::transaction(function() use($personData, $addressData){
			$addressID = Address::create($addressData);

			$personData['address_id'] = $addressID->id;
			Person::create($personData);
		});

		return redirect()->route('person.index');
	}

	/**
	 * Show the form for editing the specified person.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$person = Person::with('address')->find($id);
        $gender = Person::$gender;

		return view('person.edit', compact('person', "gender"));
	}

	/**
	 * Update the specified person in storage.
     * @param UpdatePersonRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePersonRequest $request)
	{
		$person = Person::findOrFail($id);

        
		$personData = $request->only('name','birthday','gender');
		$addressData = $request->only('address','post_code','city_name','country_name');

		\DB::transaction(function() use($person, $personData, $addressData){

			$person->update($personData);
			Address::find($person->address_id)->update($addressData);
		});


		return redirect()->route('person.index');
	}

	/**
	 * Remove the specified person from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		\DB::transaction(function() use($id){
			$person = Person::find($id);
			Person::destroy($id);

			Address::destroy($person->address_id);
		});

		return redirect()->route('person.index');
	}


}
