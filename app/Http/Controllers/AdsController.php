<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\AdManager;

use Illuminate\Http\Request;

class AdsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the ads from gumtree using the filtering/searching
        $ad = new AdManager();
        echo $ad->run();
	}
}
