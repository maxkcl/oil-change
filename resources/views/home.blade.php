<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Oil Change Checker</h1>

        <!-- Form -->
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/cars">
                    @csrf

                    <p style="margin-left: 1%; margin-bottom: 2%">Current Odometer</p>
                    <div class="form-control w-full" style="margin-bottom: 2.5%">
                        <input 
                            type="number"
                            name="odometer"
                            placeholder="Current Odometer"
                            class="input textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            required
                        ></input>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <p style="margin-left: 1%; margin-bottom: 2%">Date of Previous Oil Change</p>
                    <div class="form-control w-full" style="margin-bottom: 2.5%">
                        <input
                            type="date"
                            name="previous_oil_change_date"
                            placeholder="Date of Previous Oil Change"
                            class="input textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            required
                        ></input>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <p style="margin-left: 1%; margin-bottom: 2%">Odometer at Previous Oil Change</p>
                    <div class="form-control w-full">
                        <input
                            type="number"
                            name="previous_oil_change_odometer"
                            placeholder="Odometer at Previous Oil Change"
                            class="input textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            required
                        ></input>

                        @error('message')
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