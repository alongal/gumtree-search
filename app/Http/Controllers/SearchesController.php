<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSearchRequest;
use App\Search;
use Illuminate\Support\Facades\Response;

class SearchesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $searches = Search::all();

        return response()->json(['data' => $searches], 200);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSearchRequest $request
     * @return Response
     */
	public function store(CreateSearchRequest $request)
	{
		// Get the request values
        $values = $request->only(['name']);

        // Add a Search name in the database
        Search::create($values);

        // Return a success response
        return response()->json(['message' => 'Search correctly added'], 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $search = Search::find($id);

        if (!$search) {
            return response()->json(['message' => 'This search record does not exist'], 404);
        }

        return response()->json(['data' => $search], 200);
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
