<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Addresses;
use App\Http\Requests\CreateAddressesRequest;
use App\Http\Requests\UpdateAddressesRequest;
use Illuminate\Http\Request;

use App\Persons;


class AddressesController extends Controller {

	/**
	 * Display a listing of addresses
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index($personId)
    {
        $addresses = Addresses::with('persons')->where('persons_id',$personId)->get();

		return view('addresses.index', compact('addresses', 'personId'));
	}

	/**
	 * Show the form for creating a new addresses
	 *
     * @return \Illuminate\View\View
	 */
	public function create($personId)
	{
	    $persons = Persons::pluck('name', 'id')->prepend('Please select', 0);

	    
	    return view('addresses.create', compact('persons','personId'));
	}

	/**
	 * Store a newly created addresses in storage.
	 *
     * @param CreateAddressesRequest|Request $request
	 */
	public function store(CreateAddressesRequest $request)
	{
	    
		$ret = Addresses::create($request->all());

		return redirect()->route('addresses.index',$ret->persons_id);
	}

	/**
	 * Show the form for editing the specified addresses.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$addresses = Addresses::find($id);
	    $persons = Persons::pluck('name', 'id')->prepend('Please select', 0);

	    
		return view('addresses.edit', compact('addresses', 'persons'));
	}

	/**
	 * Update the specified addresses in storage.
     * @param UpdateAddressesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAddressesRequest $request)
	{
		$addresses = Addresses::findOrFail($id);

        

		$addresses->update($request->all());

		return redirect()->route('addresses.index',$addresses->persons_id);
	}

	/**
	 * Remove the specified addresses from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Addresses::destroy($id);

		return redirect()->route('addresses.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Addresses::destroy($toDelete);
        } else {
            Addresses::whereNotNull('id')->delete();
        }

        return redirect()->route('addresses.index');
    }

}
