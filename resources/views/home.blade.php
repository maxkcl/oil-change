<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Oil Change Checker</h1>

        <!-- Form -->
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/check">
                    @csrf

                    <p class="form_label">Current Odometer (km)</p>
                    <div class="form-control w-full" style="margin-bottom: 2.5%">
                        <input 
                            type="number"
                            name="odometer"
                            placeholder="Current Odometer"
                            class="input textarea-bordered w-full resize-none @error('odometer') input-error @enderror"
                            required
                        ></input>

                        @error('odometer')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <p class="form_label">Date of Previous Oil Change</p>
                    <div class="form-control w-full" style="margin-bottom: 2.5%">
                        <input
                            type="date"
                            name="previous_oil_change_date"
                            placeholder="Date of Previous Oil Change"
                            class="input textarea-bordered w-full resize-none @error('previous_oil_change_date') input-error @enderror"
                            required
                            max=""{{ now()->subDay()->format('Y-m-d') }}
                        ></input>

                        @error('previous_oil_change_date')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <p class="form_label">Odometer at Previous Oil Change (km)</p>
                    <div class="form-control w-full">
                        <input
                            type="number"
                            name="previous_oil_change_odometer"
                            placeholder="Odometer at Previous Oil Change"
                            class="input textarea-bordered w-full resize-none @error('previous_oil_change_odometer') input-error @enderror""
                            required
                        ></input>

                        @error('previous_oil_change_odometer')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>