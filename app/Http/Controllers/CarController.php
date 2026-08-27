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
        $validated = $request->validate([
            'odometer' => ['required', 'numeric', 'gte:previous_oil_change_odometer', 'gte:0'],
            'previous_oil_change_date' => ['required', 'date', 'before:today'],
            'previous_oil_change_odometer' => ['required', 'numeric', 'gte:0']
        ]);

        $validated['oil_change_needed'] = ($validated['odometer'] > $validated['previous_oil_change_odometer'] + 5000) 
            || ($validated['previous_oil_change_date'] <= now()->subMonths(6));

        $car = Car::create([
            'odometer' => $validated['odometer'],
            'previous_oil_change_date' => $validated['previous_oil_change_date'],
            'previous_oil_change_odometer' => $validated['previous_oil_change_odometer'],
            'oil_change_needed' => $validated['oil_change_needed']
        ]);

        return redirect()->route('result.show', $car);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $six_months = Carbon::parse($car->previous_oil_change_date)->addMonths(6)->isPast();
        $five_thousand_km = $car->odometer > $car->previous_oil_change_odometer + 5000;

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
