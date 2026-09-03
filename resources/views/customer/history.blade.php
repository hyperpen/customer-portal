@extends('layouts.customer')

@section('title', 'RideSync - Booking History')

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
            Booking History
        </h2>

        <div class="flex items-center gap-5 mt-2">

            <p class="text-sm sm:text-base text-slate-400">
                View all your previous service bookings.
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
    <!-- HISTORY CARD -->
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


        @if(count($bookings) === 0)

            <div class="relative px-6 py-16 sm:py-20 text-center">

                <div
                    class="
                        mx-auto
                        w-20
                        h-20
                        rounded-full
                        border
                        border-cyan-400/40
                        bg-cyan-400/5
                        text-cyan-300
                        flex
                        items-center
                        justify-center
                        shadow-[0_0_25px_rgba(34,211,238,.12)]
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.6"
                        stroke="currentColor"
                        class="w-10 h-10"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5h6m-6 4h6m-6 4h4m-7 8h12a2 2 0 002-2V5a2 2 0 00-2-2H6a2 2 0 00-2 2v14a2 2 0 002 2z"
                        />
                    </svg>

                </div>


                <h3 class="mt-6 text-xl font-bold uppercase tracking-wide text-white">
                    No Bookings Yet
                </h3>


                <p class="mt-2 text-sm text-slate-400">
                    Your service bookings will appear here.
                </p>


                <a
                    href="{{ route('customer.booking') }}"
                    class="
                        inline-flex
                        items-center
                        justify-center
                        gap-2
                        mt-6
                        px-6
                        py-3
                        rounded-lg
                        border
                        border-cyan-300
                        bg-cyan-400/5
                        text-cyan-300
                        font-semibold
                        uppercase
                        tracking-wide
                        transition-all
                        hover:bg-cyan-400/10
                        hover:shadow-[0_0_20px_rgba(34,211,238,.25)]
                    "
                >
                    Book a Service
                </a>

            </div>

        @else

            <div class="relative overflow-x-auto">

                <table class="w-full min-w-[900px]">

                    <thead>

                        <tr
                            class="
                                border-b
                                border-cyan-400/20
                                bg-[#061522]
                                text-left
                            "
                        >

                            <th class="px-6 py-5 text-xs font-semibold uppercase tracking-[0.12em] text-cyan-300">
                                Booking ID
                            </th>

                            <th class="px-6 py-5 text-xs font-semibold uppercase tracking-[0.12em] text-cyan-300">
                                Motorcycle
                            </th>

                            <th class="px-6 py-5 text-xs font-semibold uppercase tracking-[0.12em] text-cyan-300">
                                Service
                            </th>

                            <th class="px-6 py-5 text-xs font-semibold uppercase tracking-[0.12em] text-cyan-300">
                                Date
                            </th>

                            <th class="px-6 py-5 text-xs font-semibold uppercase tracking-[0.12em] text-cyan-300">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach(array_reverse($bookings) as $booking)

                            <tr
                                class="
                                    border-b
                                    border-cyan-400/10
                                    last:border-b-0
                                    hover:bg-cyan-400/[0.03]
                                    transition
                                "
                            >

                                <td class="px-6 py-5">

                                    <span
                                        class="
                                            font-bold
                                            text-white
                                            tracking-wide
                                        "
                                    >
                                        #{{ $booking['id'] }}
                                    </span>

                                </td>


                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="
                                                w-10
                                                h-10
                                                rounded-lg
                                                border
                                                border-cyan-400/30
                                                bg-cyan-400/5
                                                flex
                                                items-center
                                                justify-center
                                                text-cyan-300
                                            "
                                        >
                                            🏍️
                                        </div>

                                        <span class="font-semibold text-slate-200">
                                            {{ $booking['motorcycle'] }}
                                        </span>

                                    </div>

                                </td>


                                <td class="px-6 py-5 text-slate-400">
                                    {{ $booking['service'] }}
                                </td>


                                <td class="px-6 py-5 text-slate-400">
                                    {{ $booking['date'] }}
                                </td>


                                <td class="px-6 py-5">

                                    @php
                                        $status = strtolower($booking['status'] ?? '');
                                    @endphp

                                    @if(str_contains($status, 'progress'))

                                        <span
                                            class="
                                                inline-flex
                                                px-4
                                                py-1.5
                                                rounded-full
                                                border
                                                border-green-400
                                                bg-green-400/5
                                                text-green-300
                                                text-xs
                                                font-semibold
                                                uppercase
                                                tracking-wide
                                                shadow-[0_0_10px_rgba(74,222,128,.12)]
                                            "
                                        >
                                            {{ $booking['status'] }}
                                        </span>

                                    @elseif(
                                        str_contains($status, 'completed') ||
                                        str_contains($status, 'ready')
                                    )

                                        <span
                                            class="
                                                inline-flex
                                                px-4
                                                py-1.5
                                                rounded-full
                                                border
                                                border-cyan-400
                                                bg-cyan-400/5
                                                text-cyan-300
                                                text-xs
                                                font-semibold
                                                uppercase
                                                tracking-wide
                                            "
                                        >
                                            {{ $booking['status'] }}
                                        </span>

                                    @else

                                        <span
                                            class="
                                                inline-flex
                                                px-4
                                                py-1.5
                                                rounded-full
                                                border
                                                border-blue-400/60
                                                bg-blue-400/5
                                                text-blue-300
                                                text-xs
                                                font-semibold
                                                uppercase
                                                tracking-wide
                                            "
                                        >
                                            {{ $booking['status'] }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </section>

</div>

@endsection