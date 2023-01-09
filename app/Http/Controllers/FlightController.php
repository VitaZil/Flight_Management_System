<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Log;
use DateTimeZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlightController extends Controller
{
    public function index(): View
    {
        $flights = Flight::all();

        $timezones = DateTimeZone::listIdentifiers();

        return view('flights.index', ['flights' => $flights, 'timezones' => $timezones]);
    }

    public function show(Flight $flight): View
    {
        $timezones = DateTimeZone::listIdentifiers();

        return view('flights.show', ['flight' => $flight, 'timezones' => $timezones]);
    }

    public function create(): View
    {
        $airports = Airport::all();

        $timezones = DateTimeZone::listIdentifiers();

        return view('flights.create', ['airports' => $airports, 'timezones' => $timezones]);
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'departure_time' => 'required',
            'depairport' => 'required',
            'arrival_time' => 'required',
            'arrairport' => 'required',
            'timezone' => 'required',
            'seats' => 'required'
        ]);

        Flight::create($formFields);

        return redirect('/flights')->with('message', 'Flight created successfully!');
    }

    public function edit(Flight $flight): View
    {
        $airports = Airport::all();
        $timezones = DateTimeZone::listIdentifiers();

        return view('flights.edit', ['flight' => $flight, 'airports' => $airports, 'timezones' => $timezones]);
    }

    public function update(Request $request, Flight $flight, Log $log): RedirectResponse
    {
        $formFields = [
            'departure_time' => $request['departure_time'],
            'depairport' => $request['depairport'],
            'arrival_time' => $request['arrival_time'],
            'arrairport' => $request['arrairport'],
            'timezone' => $request['timezone'],
            'seats' => $request['seats']
        ];

        $flight->update($formFields);

        $log->create([
            'flight_id' => $flight->id,
            'departure_time' => $request['departure_time'],
            'depairport' => $request['depairport'],
            'arrival_time' => $request['arrival_time'],
            'arrairport' => $request['arrairport'],
            'timezone' => $request['timezone'],
            'seats' => $request['seats']
        ]);

        return redirect('/flights')->with('message', 'Flight updated successfully!');
    }

    public function destroy(Flight $flight): RedirectResponse
    {
        $flight->delete();

        return redirect('/flights')->with('message', 'Flight deleted successfully!');
    }

    public function filter(Request $request): View
    {
        $flights = Flight::all();
        $newFlight = new Flight;
        $newTimeZoneFlights = [];

        foreach ($flights as $flight) {
            $departureTime = $newFlight->calculateTime($flight->departure_time, $flight->timezone, $request['newtimezone']);
            $arrivalTime = $newFlight->calculateTime($flight->arrival_time, $flight->timezone, $request['newtimezone']);

            $flight->departure_time = $departureTime;
            $flight->arrival_time = $arrivalTime;
            $flight->timezone = $request['newtimezone'];

            $newTimeZoneFlights[] = $flight;
        }

        $timezones = DateTimeZone::listIdentifiers();

        return view('flights.index', ['flights' => $newTimeZoneFlights, 'timezones' => $timezones]);
    }

    public function time(Flight $flight, Request $request): View
    {
        $newFlight = new Flight;

        $departureTime = $newFlight->calculateTime($flight->departure_time, $flight->timezone, $request['newtimezone']);
        $arrivalTime = $newFlight->calculateTime($flight->arrival_time, $flight->timezone, $request['newtimezone']);

        return view('flights.show', [
            'flight' => $flight,
            'departureTime' => $departureTime,
            'arrivalTime' => $arrivalTime,
            'chosenTimeZone' => $request['newtimezone']
        ]);
    }
}
