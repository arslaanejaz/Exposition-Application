<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Repositories\Eloquent\Location;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            array_map(function($location) {
                return $location->serialize();
            }, $this->location->all()->all()),
            200
        );
    }
}
