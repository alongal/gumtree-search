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
     * @param CreateFilterRequest $request
     * @param  int $id
     * @return Response
     */
	public function update(CreateFilterRequest $request, $id)
	{
        // Find the filter
        $filter = Filter::find($id);

        // Verify that exists
        if (!$filter) {
            return response()->json(['message' => 'This filter does not exists'], 404);
        }

        // Get properties
        $name = $request->get('name');

        // Update properties
        $filter->name = $name;

        // Update in database
        $filter->save();

        return response()->json(['message' => 'The filter has been updates'], 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // Find the filter
        $filter = Filter::find($id);

        // Verify that exists
        if (!$filter) {
            return response()->json(['message' => 'This filter does not exists'], 404);
        }

        $filter->delete();

        return response()->json(['message' => 'The filter has been deleted'], 201);
	}

}
