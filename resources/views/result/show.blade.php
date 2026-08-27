<x-layout>
    <x-slot:title>
        Result
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="whitetxt text-3xl font-bold mt-8" style="margin-bottom: 2%">{{ $car->oil_change_needed ? 'You are due for an oil change.' : 'You don\'t need an oil change yet.' }}</h1>

        @if ($five_thousand_km)
            <h3 class="whitetxt text-1xl font-semibold mt-8" style="margin-top: 1%">It's been over 5000 km since your last oil change.</h3>
        @endif

        @if ($six_months)
            <h3 class="whitetxt text-1xl font-semibold mt-8" style="margin-top: 1%">It's been over 6 months since your last oil change.</h3>
        @endif

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <p>Current Odometer: <b class="whitetxt">{{ $car->odometer }} km</b></p>
                <p>Date of previous oil change: <b class="whitetxt">{{ $car->previous_oil_change_date }}</b></p>
                <p>Odometer on date of previous oil change: <b class="whitetxt">{{ $car->previous_oil_change_odometer }} km</b></p>
            </div>
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a href="/" class="btn btn-primary btn-sm">Try Again</a>
        </div>
    </div>
</x-layout>