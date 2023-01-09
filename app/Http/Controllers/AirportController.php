<?php

namespace App\Http\Controllers;

use App\Models\Airport;

class AirportController extends Controller
{
    public function index()
    {
        $airports = Airport::latest()->filter(request('search'))->paginate(5);

        return view('airports.index', ['airports' => $airports]);
    }
}
