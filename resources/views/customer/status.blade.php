@extends('layouts.customer')

@section('title', 'RideSync - Track Status')

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
            Track Status
        </h2>


        <div class="flex items-center gap-5 mt-2">

            <p class="text-sm sm:text-base text-slate-400">
                Monitor the progress of your motorcycle service.
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
    <!-- MAIN CARD -->
    <!-- ===================================================== -->

    <section
        class="
            relative
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


        <div class="relative p-6 sm:p-8">


            <!-- ================================================= -->
            <!-- BOOKING HEADER -->
            <!-- ================================================= -->

            <div
                class="
                    flex
                    flex-col
                    sm:flex-row
                    sm:items-start
                    sm:justify-between
                    gap-5
                    mb-7
                "
            >

                <div>

                    <p
                        class="
                            text-xs
                            sm:text-sm
                            uppercase
                            tracking-wider
                            text-slate-400
                        "
                    >
                        Booking ID
                    </p>


                    <div
                        class="
                            flex
                            flex-wrap
                            items-center
                            gap-3
                            mt-2
                        "
                    >

                        <h3
                            class="
                                text-2xl
                                sm:text-3xl
                                font-bold
                                text-white
                            "
                        >
                            #{{ $activeBooking['id'] }}
                        </h3>


                        <span
                            class="
                                px-4
                                py-1.5
                                rounded-full
                                border
                                border-cyan-400/50
                                bg-cyan-400/5
                                text-cyan-300
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wide
                            "
                        >
                            Queue #{{ $activeBooking['queue'] }}
                        </span>

                    </div>

                </div>


                <span
                    class="
                        self-start
                        px-5
                        py-2
                        rounded-full
                        border
                        border-green-400
                        bg-green-400/5
                        text-green-300
                        text-xs
                        sm:text-sm
                        font-semibold
                        uppercase
                        tracking-wide
                        shadow-[0_0_12px_rgba(74,222,128,.15)]
                    "
                >
                    {{ $activeBooking['status'] }}
                </span>

            </div>



            <!-- ================================================= -->
            <!-- MOTORCYCLE INFO -->
            <!-- ================================================= -->

            <div
                class="
                    p-5
                    sm:p-6
                    rounded-xl
                    border
                    border-slate-500/60
                    bg-[#061522]
                    flex
                    flex-col
                    sm:flex-row
                    items-start
                    sm:items-center
                    gap-5
                    mb-9
                "
            >

                <div
                    class="
                        w-24
                        h-24
                        shrink-0
                        rounded-lg
                        border
                        border-cyan-400/60
                        bg-[#04111d]
                        text-cyan-300
                        flex
                        items-center
                        justify-center
                        shadow-[inset_0_0_20px_rgba(34,211,238,.05)]
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 64 64"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2.4"
                        class="w-14 h-14"
                    >
                        <circle cx="16" cy="45" r="9" />
                        <circle cx="49" cy="45" r="9" />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="
                                M16 45
                                l10-15
                                h12
                                l6 15
                                M26 30
                                l7 15
                                M33 45
                                h16
                                M27 30
                                l-4-7
                                h-7
                                M42 24
                                h7
                                M38 30
                                l4-6
                            "
                        />
                    </svg>

                </div>


                <div>

                    <h4
                        class="
                            text-xl
                            sm:text-2xl
                            font-bold
                            uppercase
                            tracking-wide
                            text-white
                        "
                    >
                        {{ $activeBooking['motorcycle'] }}
                    </h4>


                    <p class="mt-1 text-base sm:text-lg text-cyan-300">
                        {{ $activeBooking['service'] }}
                    </p>


                    <p
                        class="
                            mt-2
                            flex
                            items-center
                            gap-2
                            text-sm
                            text-slate-400
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="w-4 h-4"
                        >
                            <rect x="3" y="5" width="18" height="16" rx="2" />
                            <path d="M7 3v4 M17 3v4 M3 10h18" />
                        </svg>

                        {{ $activeBooking['date'] }}

                    </p>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- SERVICE PROGRESS -->
            <!-- ================================================= -->

            <div>

                <div class="flex items-center gap-4 mb-8">

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
                        Service Progress
                    </h3>


                    <div class="flex gap-1">
                        <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                        <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                        <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                        <span class="w-2 h-1 bg-cyan-400 -skew-x-[30deg]"></span>
                    </div>

                </div>



                <div class="relative max-w-5xl pl-1">


                    <!-- LINE -->

                    <div
                        class="
                            absolute
                            left-[23px]
                            top-7
                            bottom-7
                            w-[2px]
                            bg-gradient-to-b
                            from-blue-500
                            via-green-400
                            to-slate-700
                        "
                    ></div>



                    <!-- STEP 1 -->

                    <div class="relative flex items-center gap-5 mb-8">

                        <div
                            class="
                                relative
                                z-10
                                w-11
                                h-11
                                shrink-0
                                rounded-full
                                bg-blue-600
                                border-2
                                border-blue-300
                                text-white
                                flex
                                items-center
                                justify-center
                                text-xl
                                font-bold
                                shadow-[0_0_16px_rgba(59,130,246,.9)]
                            "
                        >
                            ✓
                        </div>


                        <div
                            class="
                                flex-1
                                sm:flex
                                sm:items-start
                                sm:justify-between
                                sm:gap-6
                            "
                        >

                            <div>

                                <p
                                    class="
                                        font-semibold
                                        uppercase
                                        tracking-wide
                                        text-white
                                    "
                                >
                                    Booking Confirmed
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Your booking has been confirmed.
                                </p>

                            </div>


                            <span class="mt-2 sm:mt-0 text-sm text-cyan-400 whitespace-nowrap">
                                09:15 AM
                            </span>

                        </div>

                    </div>



                    <!-- STEP 2 -->

                    <div class="relative flex items-center gap-5 mb-8">

                        <div
                            class="
                                relative
                                z-10
                                w-11
                                h-11
                                shrink-0
                                rounded-full
                                bg-blue-600
                                border-2
                                border-blue-300
                                text-white
                                flex
                                items-center
                                justify-center
                                text-xl
                                font-bold
                                shadow-[0_0_16px_rgba(59,130,246,.9)]
                            "
                        >
                            ✓
                        </div>


                        <div
                            class="
                                flex-1
                                sm:flex
                                sm:items-start
                                sm:justify-between
                                sm:gap-6
                            "
                        >

                            <div>

                                <p
                                    class="
                                        font-semibold
                                        uppercase
                                        tracking-wide
                                        text-white
                                    "
                                >
                                    Motorcycle Received
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Your motorcycle is at the service center.
                                </p>

                            </div>


                            <span class="mt-2 sm:mt-0 text-sm text-cyan-400 whitespace-nowrap">
                                09:45 AM
                            </span>

                        </div>

                    </div>



                    <!-- STEP 3 -->

                    <div class="relative flex items-center gap-5 mb-8">

                        <div
                            class="
                                relative
                                z-10
                                w-11
                                h-11
                                shrink-0
                                rounded-full
                                border-2
                                border-green-300
                                bg-green-400/15
                                text-green-300
                                flex
                                items-center
                                justify-center
                                shadow-[0_0_18px_rgba(74,222,128,.85)]
                            "
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                class="w-5 h-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="
                                        M14.7 6.3
                                        a4 4 0 01-5 5
                                        L4 17
                                        a2 2 0 003 3
                                        l5.7-5.7
                                        a4 4 0 005-5
                                        l-3 3
                                        -3-3
                                        3-3z
                                    "
                                />
                            </svg>

                        </div>


                        <div
                            class="
                                flex-1
                                sm:flex
                                sm:items-start
                                sm:justify-between
                                sm:gap-6
                            "
                        >

                            <div>

                                <p
                                    class="
                                        font-semibold
                                        uppercase
                                        tracking-wide
                                        text-green-300
                                    "
                                >
                                    Repair In Progress
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    The mechanic is currently working on your motorcycle.
                                </p>

                            </div>


                            <span class="mt-2 sm:mt-0 text-sm text-green-400 whitespace-nowrap">
                                10:20 AM
                            </span>

                        </div>

                    </div>



                    <!-- STEP 4 -->

                    <div class="relative flex items-center gap-5 mb-8">

                        <div
                            class="
                                relative
                                z-10
                                w-11
                                h-11
                                shrink-0
                                rounded-full
                                border
                                border-slate-500
                                bg-[#06121e]
                                text-slate-500
                                flex
                                items-center
                                justify-center
                                text-sm
                                tracking-widest
                            "
                        >
                            •••
                        </div>


                        <div
                            class="
                                flex-1
                                sm:flex
                                sm:items-start
                                sm:justify-between
                                sm:gap-6
                            "
                        >

                            <div>

                                <p
                                    class="
                                        font-semibold
                                        uppercase
                                        tracking-wide
                                        text-slate-500
                                    "
                                >
                                    Service Almost Done
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    Final checks and quality inspection.
                                </p>

                            </div>


                            <span class="mt-2 sm:mt-0 text-sm text-slate-500 whitespace-nowrap">
                                --:--
                            </span>

                        </div>

                    </div>



                    <!-- STEP 5 -->

                    <div class="relative flex items-center gap-5">

                        <div
                            class="
                                relative
                                z-10
                                w-11
                                h-11
                                shrink-0
                                rounded-full
                                border
                                border-slate-500
                                bg-[#06121e]
                                text-slate-500
                                flex
                                items-center
                                justify-center
                                text-sm
                                tracking-widest
                            "
                        >
                            •••
                        </div>


                        <div
                            class="
                                flex-1
                                sm:flex
                                sm:items-start
                                sm:justify-between
                                sm:gap-6
                            "
                        >

                            <div>

                                <p
                                    class="
                                        font-semibold
                                        uppercase
                                        tracking-wide
                                        text-slate-500
                                    "
                                >
                                    Ready For Pickup
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    Your motorcycle will be ready soon.
                                </p>

                            </div>


                            <span class="mt-2 sm:mt-0 text-sm text-slate-500 whitespace-nowrap">
                                --:--
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection