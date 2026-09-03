@extends('layouts.customer')

@section('title', 'RideSync - Service Booking')

@section('content')

<div class="max-w-[1560px]">

    <!-- ===================================================== -->
    <!-- PAGE HEADER -->
    <!-- ===================================================== -->

    <section class="relative mb-10 pl-5 sm:pl-6">

        <div
            class="
                absolute
                left-0
                top-0
                w-3
                h-3
                border-l-2
                border-t-2
                border-cyan-400
            "
        ></div>

        <div
            class="
                absolute
                left-0
                bottom-0
                w-3
                h-3
                border-l-2
                border-b-2
                border-cyan-400
            "
        ></div>

        <h2
            class="
                text-2xl
                sm:text-3xl
                lg:text-4xl
                font-bold
                uppercase
                tracking-[0.06em]
                text-white
            "
        >
            Service Booking
        </h2>

        <div class="flex items-center gap-5 mt-2">

            <p class="text-sm sm:text-base text-slate-400">
                Book a motorcycle service appointment.
            </p>

            <div class="hidden lg:flex items-center gap-1 flex-1 max-w-[180px]">
                <span class="flex-1 h-[1px] bg-slate-700"></span>
                <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
            </div>

        </div>

    </section>



    <!-- ===================================================== -->
    <!-- BOOKING PANEL -->
    <!-- ===================================================== -->

    <section
        class="
            relative
            max-w-5xl
            rounded-2xl
            border
            border-cyan-400/60
            bg-[#04101a]/95
            shadow-[0_0_30px_rgba(34,211,238,.08)]
            overflow-hidden
        "
    >

        <!-- CORNERS -->

        <span class="absolute top-3 left-3 w-7 h-7 border-l border-t border-cyan-300"></span>
        <span class="absolute top-3 right-3 w-7 h-7 border-r border-t border-cyan-300"></span>
        <span class="absolute bottom-3 left-3 w-7 h-7 border-l border-b border-cyan-300"></span>
        <span class="absolute bottom-3 right-3 w-7 h-7 border-r border-b border-cyan-300"></span>


        <div class="relative p-6 sm:p-8 lg:p-10">

            <!-- FORM TITLE -->

            <div
                class="
                    mb-8
                    pb-5
                    border-b
                    border-cyan-400/10
                "
            >

                <div class="flex items-center gap-3">

                    <div
                        class="
                            w-11
                            h-11
                            rounded-lg
                            border
                            border-cyan-400/40
                            bg-cyan-400/5
                            text-cyan-300
                            flex
                            items-center
                            justify-center
                        "
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 3v2M18 3v2M4 8h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"
                            />
                        </svg>
                    </div>

                    <div>
                        <h3
                            class="
                                text-lg
                                sm:text-xl
                                font-bold
                                uppercase
                                tracking-wider
                                text-cyan-300
                            "
                        >
                            Appointment Details
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Complete the information below to schedule your service.
                        </p>
                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- FORM -->
            <!-- ================================================= -->

            <form
                action="{{ route('customer.booking.store') }}"
                method="POST"
                class="space-y-7"
            >

                @csrf



                <!-- CUSTOMER NAME + CONTACT -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- CUSTOMER NAME -->

                    <div>

                        <label
                            for="customer_name"
                            class="
                                block
                                mb-2
                                text-sm
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-300
                            "
                        >
                            Customer Name
                        </label>

                        <input
                            type="text"
                            id="customer_name"
                            name="customer_name"
                            value="{{ old('customer_name', session('profile.name')) }}"
                            placeholder="Enter your name"
                            required
                            class="
                                w-full
                                px-4
                                py-3.5
                                rounded-lg
                                border
                                border-cyan-400/20
                                bg-[#061522]
                                text-white
                                placeholder-slate-600
                                outline-none
                                transition
                                focus:border-cyan-400
                                focus:ring-1
                                focus:ring-cyan-400
                                focus:shadow-[0_0_15px_rgba(34,211,238,.12)]
                            "
                        >

                    </div>


                    <!-- CONTACT -->

                    <div>

                        <label
                            for="contact_number"
                            class="
                                block
                                mb-2
                                text-sm
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-300
                            "
                        >
                            Contact Number
                        </label>

                        <input
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number') }}"
                            placeholder="Enter contact number"
                            required
                            class="
                                w-full
                                px-4
                                py-3.5
                                rounded-lg
                                border
                                border-cyan-400/20
                                bg-[#061522]
                                text-white
                                placeholder-slate-600
                                outline-none
                                transition
                                focus:border-cyan-400
                                focus:ring-1
                                focus:ring-cyan-400
                                focus:shadow-[0_0_15px_rgba(34,211,238,.12)]
                            "
                        >

                    </div>

                </div>



                <!-- MOTORCYCLE + SERVICE -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- MOTORCYCLE -->

                    <div>

                        <label
                            for="motorcycle"
                            class="
                                block
                                mb-2
                                text-sm
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-300
                            "
                        >
                            Motorcycle
                        </label>

                        <select
                            id="motorcycle"
                            name="motorcycle"
                            onchange="toggleOtherMotorcycle()"
                            required
                            class="
                                w-full
                                px-4
                                py-3.5
                                rounded-lg
                                border
                                border-cyan-400/20
                                bg-[#061522]
                                text-slate-200
                                outline-none
                                transition
                                focus:border-cyan-400
                                focus:ring-1
                                focus:ring-cyan-400
                            "
                        >

                            <option value="" class="bg-[#061522]">
                                Select motorcycle
                            </option>

                            <option
                                value="Honda Click 160"
                                {{ old('motorcycle') == 'Honda Click 160' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Honda Click 160
                            </option>

                            <option
                                value="Yamaha Mio"
                                {{ old('motorcycle') == 'Yamaha Mio' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Yamaha Mio
                            </option>

                            <option
                                value="Honda ADV 160"
                                {{ old('motorcycle') == 'Honda ADV 160' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Honda ADV 160
                            </option>

                            <option
                                value="Yamaha NMAX"
                                {{ old('motorcycle') == 'Yamaha NMAX' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Yamaha NMAX
                            </option>

                            <option
                                value="Other"
                                {{ old('motorcycle') == 'Other' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Other
                            </option>

                        </select>

                    </div>


                    <!-- SERVICE -->

                    <div>

                        <label
                            for="service_type"
                            class="
                                block
                                mb-2
                                text-sm
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-300
                            "
                        >
                            Service Type
                        </label>

                        <select
                            id="service_type"
                            name="service_type"
                            required
                            class="
                                w-full
                                px-4
                                py-3.5
                                rounded-lg
                                border
                                border-cyan-400/20
                                bg-[#061522]
                                text-slate-200
                                outline-none
                                transition
                                focus:border-cyan-400
                                focus:ring-1
                                focus:ring-cyan-400
                            "
                        >

                            <option value="" class="bg-[#061522]">
                                Select service
                            </option>

                            <option
                                value="Change Oil"
                                {{ old('service_type') == 'Change Oil' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Change Oil
                            </option>

                            <option
                                value="Brake Service"
                                {{ old('service_type') == 'Brake Service' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Brake Service
                            </option>

                            <option
                                value="Tire Service"
                                {{ old('service_type') == 'Tire Service' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Tire Service
                            </option>

                            <option
                                value="Engine Check"
                                {{ old('service_type') == 'Engine Check' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Engine Check
                            </option>

                            <option
                                value="General Maintenance"
                                {{ old('service_type') == 'General Maintenance' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                General Maintenance
                            </option>

                            <option
                                value="Other"
                                {{ old('service_type') == 'Other' ? 'selected' : '' }}
                                class="bg-[#061522]"
                            >
                                Other
                            </option>

                        </select>

                    </div>

                </div>



                <!-- OTHER MOTORCYCLE -->

                <div
                    id="otherMotorcycleContainer"
                    class="{{ old('motorcycle') == 'Other' ? '' : 'hidden' }}"
                >

                    <label
                        for="other_motorcycle"
                        class="
                            block
                            mb-2
                            text-sm
                            font-semibold
                            uppercase
                            tracking-wide
                            text-slate-300
                        "
                    >
                        Specify Motorcycle
                    </label>

                    <input
                        type="text"
                        id="other_motorcycle"
                        name="other_motorcycle"
                        value="{{ old('other_motorcycle') }}"
                        placeholder="Example: Rusi Macho 175"
                        {{ old('motorcycle') == 'Other' ? 'required' : '' }}
                        class="
                            w-full
                            px-4
                            py-3.5
                            rounded-lg
                            border
                            border-cyan-400/20
                            bg-[#061522]
                            text-white
                            placeholder-slate-600
                            outline-none
                            transition
                            focus:border-cyan-400
                            focus:ring-1
                            focus:ring-cyan-400
                        "
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        Please enter the exact motorcycle model.
                    </p>

                </div>



                <!-- DATE + TIME -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- DATE -->

                    <div>

                        <label
                            for="booking_date"
                            class="
                                block
                                mb-2
                                text-sm
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-300
                            "
                        >
                            Preferred Date
                        </label>

                        <input
                            type="date"
                            id="booking_date"
                            name="booking_date"
                            value="{{ old('booking_date') }}"
                            min="{{ date('Y-m-d') }}"
                            required
                            class="
                                w-full
                                px-4
                                py-3.5
                                rounded-lg
                                border
                                border-cyan-400/20
                                bg-[#061522]
                                text-slate-200
                                outline-none
                                transition
                                focus:border-cyan-400
                                focus:ring-1
                                focus:ring-cyan-400
                            "
                        >

                    </div>


                    <!-- TIME -->

                    <div>

                        <label
                            for="booking_time"
                            class="
                                block
                                mb-2
                                text-sm
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-300
                            "
                        >
                            Preferred Time
                        </label>

                        <select
                            id="booking_time"
                            name="booking_time"
                            required
                            class="
                                w-full
                                px-4
                                py-3.5
                                rounded-lg
                                border
                                border-cyan-400/20
                                bg-[#061522]
                                text-slate-200
                                outline-none
                                transition
                                focus:border-cyan-400
                                focus:ring-1
                                focus:ring-cyan-400
                            "
                        >

                            <option value="" class="bg-[#061522]">
                                Select time
                            </option>

                            <option value="08:00 AM" class="bg-[#061522]">
                                08:00 AM
                            </option>

                            <option value="09:00 AM" class="bg-[#061522]">
                                09:00 AM
                            </option>

                            <option value="10:00 AM" class="bg-[#061522]">
                                10:00 AM
                            </option>

                            <option value="11:00 AM" class="bg-[#061522]">
                                11:00 AM
                            </option>

                            <option value="01:00 PM" class="bg-[#061522]">
                                01:00 PM
                            </option>

                            <option value="02:00 PM" class="bg-[#061522]">
                                02:00 PM
                            </option>

                            <option value="03:00 PM" class="bg-[#061522]">
                                03:00 PM
                            </option>

                            <option value="04:00 PM" class="bg-[#061522]">
                                04:00 PM
                            </option>

                        </select>

                    </div>

                </div>



                <!-- NOTES -->

                <div>

                    <label
                        for="notes"
                        class="
                            block
                            mb-2
                            text-sm
                            font-semibold
                            uppercase
                            tracking-wide
                            text-slate-300
                        "
                    >
                        Additional Notes
                    </label>

                    <textarea
                        id="notes"
                        name="notes"
                        rows="5"
                        placeholder="Describe any additional concerns or requests..."
                        class="
                            w-full
                            px-4
                            py-3.5
                            rounded-lg
                            border
                            border-cyan-400/20
                            bg-[#061522]
                            text-white
                            placeholder-slate-600
                            resize-none
                            outline-none
                            transition
                            focus:border-cyan-400
                            focus:ring-1
                            focus:ring-cyan-400
                            focus:shadow-[0_0_15px_rgba(34,211,238,.12)]
                        "
                    >{{ old('notes') }}</textarea>

                </div>



                <!-- ================================================= -->
                <!-- BUTTONS -->
                <!-- ================================================= -->

                <div
                    class="
                        flex
                        flex-col
                        sm:flex-row
                        gap-4
                        pt-4
                        border-t
                        border-cyan-400/10
                    "
                >

                    <button
                        type="submit"
                        class="
                            inline-flex
                            items-center
                            justify-center
                            gap-2
                            px-7
                            py-3.5
                            rounded-lg
                            border
                            border-green-400
                            bg-green-400/10
                            text-green-300
                            font-semibold
                            uppercase
                            tracking-wide
                            transition-all
                            hover:bg-green-400/15
                            hover:shadow-[0_0_20px_rgba(74,222,128,.22)]
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="w-5 h-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 5v14M5 12h14"
                            />
                        </svg>

                        Book Service

                    </button>


                    <a
                        href="{{ route('customer.dashboard') }}"
                        class="
                            inline-flex
                            items-center
                            justify-center
                            px-7
                            py-3.5
                            rounded-lg
                            border
                            border-slate-600
                            bg-slate-500/5
                            text-slate-300
                            font-semibold
                            uppercase
                            tracking-wide
                            transition
                            hover:border-cyan-400/40
                            hover:text-cyan-300
                            hover:bg-cyan-400/5
                        "
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </section>

</div>



<!-- ===================================================== -->
<!-- JAVASCRIPT -->
<!-- ===================================================== -->

<script>

    function toggleOtherMotorcycle()
    {
        const motorcycle =
            document.getElementById('motorcycle');

        const otherContainer =
            document.getElementById('otherMotorcycleContainer');

        const otherInput =
            document.getElementById('other_motorcycle');


        if (motorcycle.value === 'Other')
        {
            otherContainer.classList.remove('hidden');

            otherInput.required = true;
        }
        else
        {
            otherContainer.classList.add('hidden');

            otherInput.required = false;
        }
    }


    document.addEventListener(
        'DOMContentLoaded',
        function()
        {
            toggleOtherMotorcycle();
        }
    );

</script>

@endsection