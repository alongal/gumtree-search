<?php namespace App\Http\Controllers;

use App\Filter;
use App\Http\Requests;
use App\Http\Requests\CreateFilterRequest;
use Illuminate\Http\Response;


class FiltersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $filters = Filter::all();

		return response()->json(['data' => $filters], 200);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFilterRequest $request
     * @return Response
     */
	public function store(CreateFilterRequest $request)
	{
		$values = $request->only(['name']);

        Filter::create($values);
        
        return response()->json(['message' => 'Filter correctly added'], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$filter = Filter::find($id);

        if (!$filter) {
            return response()->json(['message' => 'This filter does not exist'], 404);
        }

        return response()->json(['data' => $filter], 200);
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
