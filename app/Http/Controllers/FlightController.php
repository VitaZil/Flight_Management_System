<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlightController extends Controller
{
    public function index(): View
    {
        $flights = Flight::all();

//      dd($flights);
//        $airports = $flights->load('depairport', 'arrairport');
//       dd($airports->relation()->exists());
        return view('flights/index', ['flights' => $flights]);
    }

    public function create(): View
    {
        $airports = Airport::all();

        return view('flights/create', ['airports' => $airports]);
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'departure_time' => 'required',
            'depairport' => 'required',
            'arrival_time' => 'required',
            'arrairport' => 'required',
            'seats' => 'required'
        ]);

        Flight::create($formFields);

        return redirect('/flights')->with('message', 'Flight created successfully!');
    }

    public function edit(Flight $flight): View
    {
        $airports = Airport::all();

        return view('flights/edit', ['flight' => $flight, 'airports' => $airports]);
    }

    public function update(Request $request, Flight $flight, Log $log): RedirectResponse
    {
        $formFields = [
            'departure_time' => $request['departure_time'],
            'depairport' => $request['depairport'],
            'arrival_time' => $request['arrival_time'],
            'arrairport' => $request['arrairport'],
            'seats' => $request['seats']
        ];

        $flight->update($formFields);

        $log->create([
            'flight_id' => $flight->id,
            'departure_time' => $request['departure_time'],
            'depairport' => $request['depairport'],
            'arrival_time' => $request['arrival_time'],
            'arrairport' => $request['arrairport'],
            'seats' => $request['seats']
        ]);

        return redirect('/flights')->with('message', 'Flight updated successfully!');
    }

    public function destroy(Flight $flight): RedirectResponse
    {
        $flight->delete();

        return redirect('/flights')->with('message', 'Flight deleted successfully!');
    }
}
