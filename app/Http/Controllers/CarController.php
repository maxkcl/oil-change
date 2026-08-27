<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # Validates the form inputs, ensuring they follow all requirements.
        $validated = $request->validate(
            [
            'odometer' => ['required', 'numeric', 'gte:previous_oil_change_odometer', 'min:0'],
            'previous_oil_change_date' => ['required', 'date', 'before:today'],
            'previous_oil_change_odometer' => ['required', 'numeric', 'min:0']
            ],
            # Error messages
            [
                'odometer.gte' => 'The current odometer must be greater than or equal to the previous odometer value.',
                'odometer.min' => 'The odometer must be a positive integer.',
                'previous_oil_change_date.before:today' => 'The date must be a valid date in the past.',
                'previous_oil_change_odometer.min' => 'The odometer must be a positive integer.'
            ]
        );

        # Calculates whether an oil change is due and stores as a boolean.
        # Odometer greater than Previous Odometer + 5000 km  |OR| Previous Oil Change Date is further away than 6 months ago.
        $validated['oil_change_needed'] = ($validated['odometer'] > $validated['previous_oil_change_odometer'] + 5000) 
            || ($validated['previous_oil_change_date'] < now()->subMonths(6));

        # Create the car in the database.
        $car = Car::create([
            'odometer' => $validated['odometer'],
            'previous_oil_change_date' => $validated['previous_oil_change_date'],
            'previous_oil_change_odometer' => $validated['previous_oil_change_odometer'],
            'oil_change_needed' => $validated['oil_change_needed']
        ]);

        # Redirects the user to the results page showing route.
        return redirect()->route('result.show', $car);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        # Calculates booleans to find the reason the car may be due for an oil change.
        # Used for results page conditional subtitles
        $six_months = Carbon::parse($car->previous_oil_change_date)->addMonths(6)->isPast();
        $five_thousand_km = $car->odometer > $car->previous_oil_change_odometer + 5000;

        # Opens results page and passes in car and calculated parameters.
        return view('result.show', compact('car', 'six_months', 'five_thousand_km'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
