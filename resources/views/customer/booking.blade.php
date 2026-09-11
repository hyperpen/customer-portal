@extends('layouts.customer')

@section('title', 'RideSync - Service Booking')

@section('content')

<div class="w-full max-w-[1650px] mx-auto px-5 sm:px-8 lg:px-12 py-10">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div
            class="mb-7
                   rounded-2xl
                   border
                   border-emerald-500/30
                   bg-emerald-500/10
                   px-5 py-4
                   text-emerald-300"
        >
            {{ session('success') }}
        </div>
    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div
            class="mb-7
                   rounded-2xl
                   border
                   border-red-500/30
                   bg-red-500/10
                   px-6 py-5"
        >
            <ul class="list-disc pl-5 space-y-1 text-red-300">
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- PAGE TITLE --}}
    <div class="mb-10">

        <div class="flex items-start gap-4">

            <div
                class="mt-2
                       w-4 h-4
                       border-l-2
                       border-t-2
                       border-cyan-400"
            ></div>

            <div>

                <h1
                    class="text-4xl
                           lg:text-5xl
                           font-extrabold
                           tracking-wide
                           uppercase
                           text-white"
                >
                    Service Booking
                </h1>


                <div
                    class="mt-3
                           flex
                           items-center
                           gap-5"
                >

                    <p class="text-slate-400 text-lg">
                        Book a motorcycle service appointment.
                    </p>


                    <div
                        class="hidden
                               md:flex
                               items-center
                               gap-1"
                    >

                        <div
                            class="w-36
                                   h-[2px]
                                   bg-cyan-400/30"
                        ></div>

                        <div
                            class="w-4
                                   h-[4px]
                                   bg-cyan-400
                                   -skew-x-[30deg]"
                        ></div>

                        <div
                            class="w-4
                                   h-[4px]
                                   bg-cyan-400
                                   -skew-x-[30deg]"
                        ></div>

                        <div
                            class="w-4
                                   h-[4px]
                                   bg-cyan-400
                                   -skew-x-[30deg]"
                        ></div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- FORM CARD --}}
    <div
        class="w-full
               rounded-[28px]
               border
               border-cyan-500/40
               bg-[#03111d]/95
               px-6
               py-8
               sm:px-8
               lg:px-10
               xl:px-12"
    >

        {{-- CARD HEADER --}}
        <div
            class="flex
                   items-start
                   gap-4
                   border-b
                   border-cyan-500/20
                   pb-7
                   mb-8"
        >

            <div
                class="w-14 h-14
                       shrink-0
                       rounded-2xl
                       border
                       border-cyan-400/50
                       flex
                       items-center
                       justify-center
                       text-cyan-400"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10m-12 9h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v11a2 2 0 002 2z"
                    />
                </svg>

            </div>


            <div>

                <h2
                    class="text-2xl
                           lg:text-3xl
                           font-bold
                           tracking-wide
                           uppercase
                           text-cyan-300"
                >
                    Appointment Details
                </h2>

                <p
                    class="mt-1
                           text-slate-500"
                >
                    Complete the information below to schedule your service.
                </p>

            </div>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('customer.booking.store') }}"
            method="POST"
        >

            @csrf


            <div
                class="grid
                       grid-cols-1
                       lg:grid-cols-2
                       gap-x-8
                       gap-y-7"
            >

                {{-- CUSTOMER NAME --}}
                <div>
                    <label
                        for="customer_name"
                        class="block mb-3 font-semibold uppercase text-slate-300"
                    >
                        Customer Name
                    </label>

                    <input
                        id="customer_name"
                        type="text"
                        value="{{ $profile['name'] ?? 'Customer' }}"
                        readonly
                        tabindex="-1"
                        class="w-full cursor-not-allowed select-none rounded-2xl border border-cyan-500/20 bg-[#061522] px-5 py-4 text-slate-300 outline-none"
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        Based on your profile information.
                    </p>
                </div>


                {{-- CONTACT NUMBER --}}
                <div>
                    <label
                        for="contact_number"
                        class="block mb-3 font-semibold uppercase text-slate-300"
                    >
                        Contact Number
                    </label>

                    <input
                        id="contact_number"
                        type="text"
                        value="{{ $profile['phone'] ?? '0912 345 6789' }}"
                        readonly
                        tabindex="-1"
                        class="w-full cursor-not-allowed select-none rounded-2xl border border-cyan-500/20 bg-[#061522] px-5 py-4 text-slate-300 outline-none"
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        Based on your profile information.
                    </p>
                </div>


                {{-- MOTORCYCLE --}}
                <div>

                    <label
                        for="motorcycle"
                        class="block
                               mb-3
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Motorcycle
                    </label>


                    <input
                        id="motorcycle"
                        type="text"
                        name="motorcycle"
                        value="{{ old('motorcycle') }}"
                        placeholder="e.g. Honda Click 160"
                        class="w-full
                               rounded-2xl
                               border
                               border-cyan-500/30
                               bg-[#041826]
                               px-5 py-4
                               text-white
                               placeholder:text-slate-600
                               outline-none
                               transition
                               focus:border-cyan-400"
                    >

                </div>


                {{-- SERVICE TYPE --}}
                <div>

                    <label
                        for="service"
                        class="block
                               mb-3
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Service Type
                    </label>


                    <select
                        id="service"
                        name="service"
                        class="w-full
                               rounded-2xl
                               border
                               border-cyan-500/30
                               bg-[#041826]
                               px-5 py-4
                               text-white
                               outline-none
                               transition
                               focus:border-cyan-400"
                    >

                        <option value="">
                            Select service
                        </option>

                        <option
                            value="Oil Change"
                            {{ old('service') === 'Oil Change' ? 'selected' : '' }}
                        >
                            Oil Change
                        </option>

                        <option
                            value="Preventive Maintenance"
                            {{ old('service') === 'Preventive Maintenance' ? 'selected' : '' }}
                        >
                            Preventive Maintenance
                        </option>

                        <option
                            value="Brake Service"
                            {{ old('service') === 'Brake Service' ? 'selected' : '' }}
                        >
                            Brake Service
                        </option>

                        <option
                            value="Tire Service"
                            {{ old('service') === 'Tire Service' ? 'selected' : '' }}
                        >
                            Tire Service
                        </option>

                        <option
                            value="Engine Checkup"
                            {{ old('service') === 'Engine Checkup' ? 'selected' : '' }}
                        >
                            Engine Checkup
                        </option>

                        <option
                            value="Electrical Repair"
                            {{ old('service') === 'Electrical Repair' ? 'selected' : '' }}
                        >
                            Electrical Repair
                        </option>

                        <option
                            value="Other"
                            {{ old('service') === 'Other' ? 'selected' : '' }}
                        >
                            Other
                        </option>

                    </select>

                </div>


                {{-- OTHER SERVICE --}}
                <div
                    id="otherServiceContainer"
                    class="lg:col-span-2
                           {{ old('service') === 'Other' ? '' : 'hidden' }}"
                >

                    <label
                        for="other_service"
                        class="block
                               mb-3
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Specify Service Type
                    </label>


                    <input
                        id="other_service"
                        type="text"
                        name="other_service"
                        value="{{ old('other_service') }}"
                        placeholder="Enter the specific service you need"
                        class="w-full
                               rounded-2xl
                               border
                               border-cyan-500/30
                               bg-[#041826]
                               px-5 py-4
                               text-white
                               placeholder:text-slate-600
                               outline-none
                               transition
                               focus:border-cyan-400"
                    >


                    @error('other_service')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PREFERRED DATE --}}
                <div>

                    <label
                        for="date"
                        class="block
                               mb-3
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Preferred Date
                    </label>


                    <input
                        id="date"
                        type="date"
                        name="date"
                        value="{{ old('date') }}"
                        min="{{ now()->format('Y-m-d') }}"
                        class="w-full
                               rounded-2xl
                               border
                               border-cyan-500/30
                               bg-[#041826]
                               px-5 py-4
                               text-white
                               outline-none
                               transition
                               focus:border-cyan-400"
                    >

                </div>


                {{-- PREFERRED TIME --}}
                <div>

                    <label
                        for="time"
                        class="block
                               mb-3
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Preferred Time
                    </label>


                    <select
                        id="time"
                        name="time"
                        class="w-full
                               rounded-2xl
                               border
                               border-cyan-500/30
                               bg-[#041826]
                               px-5 py-4
                               text-white
                               outline-none
                               transition
                               focus:border-cyan-400"
                    >

                        <option value="">
                            Select time
                        </option>

                        <option
                            value="08:00 AM"
                            {{ old('time') === '08:00 AM' ? 'selected' : '' }}
                        >
                            08:00 AM
                        </option>

                        <option
                            value="09:00 AM"
                            {{ old('time') === '09:00 AM' ? 'selected' : '' }}
                        >
                            09:00 AM
                        </option>

                        <option
                            value="10:00 AM"
                            {{ old('time') === '10:00 AM' ? 'selected' : '' }}
                        >
                            10:00 AM
                        </option>

                        <option
                            value="11:00 AM"
                            {{ old('time') === '11:00 AM' ? 'selected' : '' }}
                        >
                            11:00 AM
                        </option>

                        <option
                            value="01:00 PM"
                            {{ old('time') === '01:00 PM' ? 'selected' : '' }}
                        >
                            01:00 PM
                        </option>

                        <option
                            value="02:00 PM"
                            {{ old('time') === '02:00 PM' ? 'selected' : '' }}
                        >
                            02:00 PM
                        </option>

                        <option
                            value="03:00 PM"
                            {{ old('time') === '03:00 PM' ? 'selected' : '' }}
                        >
                            03:00 PM
                        </option>

                        <option
                            value="04:00 PM"
                            {{ old('time') === '04:00 PM' ? 'selected' : '' }}
                        >
                            04:00 PM
                        </option>

                    </select>

                </div>


                {{-- ADDITIONAL NOTES --}}
                <div class="lg:col-span-2">

                    <label
                        for="notes"
                        class="block
                               mb-3
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Additional Notes
                    </label>


                    <textarea
                        id="notes"
                        name="notes"
                        rows="5"
                        placeholder="Describe any additional concerns or requests..."
                        class="w-full
                               resize-none
                               rounded-2xl
                               border
                               border-cyan-500/30
                               bg-[#041826]
                               px-5 py-4
                               text-white
                               placeholder:text-slate-600
                               outline-none
                               transition
                               focus:border-cyan-400"
                    >{{ old('notes') }}</textarea>

                </div>

            </div>


            {{-- SUBMIT --}}
            <div
                class="mt-9
                       flex
                       justify-end"
            >

                <button
                    type="submit"
                    class="rounded-2xl
                           border
                           border-cyan-400
                           bg-cyan-400/10
                           px-9 py-4
                           font-bold
                           uppercase
                           tracking-wide
                           text-cyan-300
                           transition
                           hover:bg-cyan-400
                           hover:text-[#02111c]"
                >
                    Submit Booking
                </button>

            </div>

        </form>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const service =
        document.getElementById('service');

    const otherServiceContainer =
        document.getElementById(
            'otherServiceContainer'
        );

    const otherServiceInput =
        document.getElementById(
            'other_service'
        );


    function toggleOtherService() {

        if (service.value === 'Other') {

            otherServiceContainer
                .classList
                .remove('hidden');

            otherServiceInput.required = true;

        } else {

            otherServiceContainer
                .classList
                .add('hidden');

            otherServiceInput.required = false;

            otherServiceInput.value = '';

        }

    }


    service.addEventListener(
        'change',
        toggleOtherService
    );


    toggleOtherService();

});
</script>

@endsection