<?php

namespace App\Http\Controllers;

use Repositories\Eloquent\Location;

class HomeController extends Controller
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
        return view('home');
    }

    /**
     * Show Hall's Stages
     *
     * @return \Illuminate\Http\Response
     */
    public function expositionHallMap($locationId)
    {
        $location = $this->location->findOrFail($locationId);

        return view('hall/stand', compact('location'));
    }
}
