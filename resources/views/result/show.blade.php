<x-layout>
    <x-slot:title>
        Result
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8" style="margin-bottom: 2%">{{ $car->oil_change_needed ? 'You need an oil change.' : 'You don\'t need an oil change.' }}</h1>

        @if ($five_thousand_km)
            <h3 class="text-1xl font-semibold mt-8" style="margin-top: 1%">It's been over 5000 km since your last oil change.</h3>
        @endif

        @if ($six_months)
            <h3 class="text-1xl font-semibold mt-8" style="margin-top: 1%">It's been over 6 months since your last oil change.</h3>
        @endif

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <p>Current Odometer: <b>{{ $car->odometer }} km</b></p>
                <p>Date of previous oil change: <b>{{ $car->previous_oil_change_date }}</b></p>
                <p>Odometer on date of previous oil change: <b>{{ $car->previous_oil_change_odometer }} km</b></p>
            </div>
        </div>
    </div>
</x-layout>