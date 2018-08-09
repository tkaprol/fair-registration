<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Http\Request;

class JsonExpoHallsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$halls = DB::table('halls')->where('expo','=',$id)->get();

		$return = [];


		// adding each expos to the map
		foreach ($halls as $hall){

			$return[] = [
				'hall_id' => $hall->id,
				'name' => $hall->name,
				'booked' => $hall->booked,
				'user' => $hall->user,
				'coordinates' => json_decode($hall->polygon),
				'price' => $hall->price,
				'contact' => $hall->contact,
				'mail' => $hall->email,
				'logo' => $hall->logo,
				'documents' => $hall->documents
			];

		}
		return response()->json($return);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
