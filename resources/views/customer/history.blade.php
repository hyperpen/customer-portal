@extends('layouts.customer')

@section('title', 'RideSync - Booking History')

@section('content')

<div class="w-full max-w-[1650px] mx-auto">

    {{-- ===================================================== --}}
    {{-- FLASH MESSAGES --}}
    {{-- ===================================================== --}}

    @if(session('success'))
        <div
            class="mb-6
                   rounded-xl
                   border
                   border-green-400/30
                   bg-green-500/10
                   px-5 py-4
                   text-green-300"
        >
            {{ session('success') }}
        </div>
    @endif


    @if(session('error'))
        <div
            class="mb-6
                   rounded-xl
                   border
                   border-red-400/30
                   bg-red-500/10
                   px-5 py-4
                   text-red-300"
        >
            {{ session('error') }}
        </div>
    @endif



    {{-- ===================================================== --}}
    {{-- PAGE HEADER --}}
    {{-- ===================================================== --}}

    <section
        class="relative
               mb-10
               pl-5
               sm:pl-6"
    >

        <div
            class="absolute
                   left-0
                   top-0
                   w-3
                   h-3
                   border-l-2
                   border-t-2
                   border-cyan-400"
        ></div>


        <div
            class="absolute
                   left-0
                   bottom-0
                   w-3
                   h-3
                   border-l-2
                   border-b-2
                   border-cyan-400"
        ></div>


        <h2
            class="text-3xl
                   sm:text-4xl
                   font-bold
                   uppercase
                   tracking-[0.06em]
                   text-white"
        >
            Booking History
        </h2>


        <div
            class="flex
                   items-center
                   gap-5
                   mt-2"
        >

            <p
                class="text-sm
                       sm:text-base
                       text-slate-400"
            >
                View and manage your previous service bookings.
            </p>


            <div
                class="hidden
                       lg:flex
                       items-center
                       gap-1
                       flex-1
                       max-w-[200px]"
            >

                <span
                    class="flex-1
                           h-[1px]
                           bg-slate-700"
                ></span>

                <span
                    class="w-2
                           h-1
                           bg-cyan-400
                           -skew-x-[30deg]"
                ></span>

                <span
                    class="w-2
                           h-1
                           bg-cyan-400
                           -skew-x-[30deg]"
                ></span>

                <span
                    class="w-2
                           h-1
                           bg-cyan-400
                           -skew-x-[30deg]"
                ></span>

                <span
                    class="w-2
                           h-1
                           bg-cyan-400
                           -skew-x-[30deg]"
                ></span>

            </div>

        </div>

    </section>



    {{-- ===================================================== --}}
    {{-- HISTORY TABLE --}}
    {{-- ===================================================== --}}

    <section
        class="relative
               rounded-2xl
               border
               border-cyan-400/60
               bg-[#04101a]/95
               overflow-hidden
               shadow-[0_0_30px_rgba(34,211,238,0.05)]"
    >

        {{-- CORNERS --}}
        <span
            class="absolute
                   bottom-3
                   left-3
                   w-7
                   h-7
                   border-l
                   border-b
                   border-cyan-300"
        ></span>

        <span
            class="absolute
                   bottom-3
                   right-3
                   w-7
                   h-7
                   border-r
                   border-b
                   border-cyan-300"
        ></span>


        @if(count($bookings) > 0)

            <div class="overflow-x-auto">

                <table class="w-full min-w-[1150px]">

                    {{-- TABLE HEADER --}}
                    <thead>

                        <tr
                            class="border-b
                                   border-cyan-400/30
                                   bg-cyan-400/[0.025]
                                   text-left"
                        >

                            <th
                                class="px-7
                                       py-6
                                       text-sm
                                       font-semibold
                                       uppercase
                                       tracking-widest
                                       text-cyan-300"
                            >
                                Booking ID
                            </th>


                            <th
                                class="px-7
                                       py-6
                                       text-sm
                                       font-semibold
                                       uppercase
                                       tracking-widest
                                       text-cyan-300"
                            >
                                Motorcycle
                            </th>


                            <th
                                class="px-7
                                       py-6
                                       text-sm
                                       font-semibold
                                       uppercase
                                       tracking-widest
                                       text-cyan-300"
                            >
                                Service
                            </th>


                            <th
                                class="px-7
                                       py-6
                                       text-sm
                                       font-semibold
                                       uppercase
                                       tracking-widest
                                       text-cyan-300"
                            >
                                Date
                            </th>


                            <th
                                class="px-7
                                       py-6
                                       text-sm
                                       font-semibold
                                       uppercase
                                       tracking-widest
                                       text-cyan-300"
                            >
                                Status
                            </th>


                            <th
                                class="px-7
                                       py-6
                                       text-sm
                                       font-semibold
                                       uppercase
                                       tracking-widest
                                       text-cyan-300"
                            >
                                Actions
                            </th>

                        </tr>

                    </thead>


                    {{-- TABLE BODY --}}
                    <tbody>

                        @foreach(
                            collect($bookings)
                                ->sortByDesc('created_at')
                            as $booking
                        )

                            <tr
                                class="border-b
                                       border-cyan-400/10
                                       last:border-b-0
                                       transition
                                       hover:bg-cyan-400/[0.025]"
                            >

                                {{-- BOOKING ID --}}
                                <td class="px-7 py-6">

                                    <p
                                        class="font-bold
                                               text-white"
                                    >
                                        #{{ $booking['id'] }}
                                    </p>

                                </td>


                                {{-- MOTORCYCLE --}}
                                <td class="px-7 py-6">

                                    <div
                                        class="flex
                                               items-center
                                               gap-4"
                                    >

                                        <div
                                            class="flex
                                                   h-11
                                                   w-11
                                                   shrink-0
                                                   items-center
                                                   justify-center
                                                   rounded-lg
                                                   border
                                                   border-cyan-400/40
                                                   bg-cyan-400/5
                                                   text-cyan-300"
                                        >
                                            🏍️
                                        </div>


                                        <p
                                            class="font-semibold
                                                   text-slate-200"
                                        >
                                            {{ $booking['motorcycle'] }}
                                        </p>

                                    </div>

                                </td>


                                {{-- SERVICE --}}
                                <td
                                    class="px-7
                                           py-6
                                           text-slate-400"
                                >
                                    {{ $booking['service'] }}
                                </td>


                                {{-- DATE --}}
                                <td
                                    class="px-7
                                           py-6
                                           text-slate-400"
                                >
                                    {{ $booking['date'] }}

                                    @if(!empty($booking['time']))
                                        <p
                                            class="mt-1
                                                   text-xs
                                                   text-slate-600"
                                        >
                                            {{ $booking['time'] }}
                                        </p>
                                    @endif
                                </td>


                                {{-- STATUS --}}
                                <td class="px-7 py-6">

                                    @if(
                                        ($booking['status'] ?? '')
                                        === 'Cancelled'
                                    )

                                        <span
                                            class="inline-flex
                                                   rounded-full
                                                   border
                                                   border-red-400/60
                                                   bg-red-500/10
                                                   px-4
                                                   py-2
                                                   text-xs
                                                   font-semibold
                                                   uppercase
                                                   tracking-wide
                                                   text-red-300"
                                        >
                                            Cancelled
                                        </span>

                                    @elseif(
                                        ($booking['status'] ?? '')
                                        === 'Completed'
                                    )

                                        <span
                                            class="inline-flex
                                                   rounded-full
                                                   border
                                                   border-green-400/60
                                                   bg-green-500/10
                                                   px-4
                                                   py-2
                                                   text-xs
                                                   font-semibold
                                                   uppercase
                                                   tracking-wide
                                                   text-green-300"
                                        >
                                            Completed
                                        </span>

                                    @else

                                        <span
                                            class="inline-flex
                                                   rounded-full
                                                   border
                                                   border-blue-400/60
                                                   bg-blue-500/10
                                                   px-4
                                                   py-2
                                                   text-xs
                                                   font-semibold
                                                   uppercase
                                                   tracking-wide
                                                   text-blue-300"
                                        >
                                            {{ $booking['status'] }}
                                        </span>

                                    @endif

                                </td>


                                {{-- ACTIONS --}}
                                <td class="px-7 py-6">

                                    @if(
                                        ($booking['status'] ?? '')
                                        !== 'Cancelled'
                                        &&
                                        ($booking['status'] ?? '')
                                        !== 'Completed'
                                    )

                                        <div
                                            class="flex
                                                   items-center
                                                   gap-3"
                                        >

                                            {{-- EDIT --}}
                                            <a
                                                href="{{
                                                    route(
                                                        'customer.booking.edit',
                                                        $booking['id']
                                                    )
                                                }}"
                                                class="inline-flex
                                                       items-center
                                                       justify-center
                                                       rounded-lg
                                                       border
                                                       border-cyan-400/60
                                                       bg-cyan-400/5
                                                       px-4
                                                       py-2
                                                       text-xs
                                                       font-bold
                                                       uppercase
                                                       tracking-wide
                                                       text-cyan-300
                                                       transition
                                                       hover:bg-cyan-400
                                                       hover:text-[#04101a]"
                                            >
                                                Edit
                                            </a>


                                            {{-- CANCEL --}}
                                            <form
                                                method="POST"
                                                action="{{
                                                    route(
                                                        'customer.booking.cancel',
                                                        $booking['id']
                                                    )
                                                }}"
                                                onsubmit="
                                                    return confirm(
                                                        'Are you sure you want to cancel this booking?'
                                                    );
                                                "
                                            >

                                                @csrf
                                                @method('PATCH')


                                                <button
                                                    type="submit"
                                                    class="inline-flex
                                                           items-center
                                                           justify-center
                                                           rounded-lg
                                                           border
                                                           border-red-400/60
                                                           bg-red-500/5
                                                           px-4
                                                           py-2
                                                           text-xs
                                                           font-bold
                                                           uppercase
                                                           tracking-wide
                                                           text-red-300
                                                           transition
                                                           hover:bg-red-500
                                                           hover:text-white"
                                                >
                                                    Cancel
                                                </button>

                                            </form>

                                        </div>

                                    @else

                                        <span
                                            class="text-sm
                                                   text-slate-600"
                                        >
                                            No actions
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- EMPTY STATE --}}
            <div
                class="flex
                       min-h-[350px]
                       flex-col
                       items-center
                       justify-center
                       px-6
                       text-center"
            >

                <div
                    class="mb-5
                           flex
                           h-16
                           w-16
                           items-center
                           justify-center
                           rounded-full
                           border
                           border-cyan-400/30
                           bg-cyan-400/5
                           text-3xl"
                >
                    📋
                </div>


                <h3
                    class="text-xl
                           font-semibold
                           text-white"
                >
                    No Booking History
                </h3>


                <p
                    class="mt-2
                           text-slate-500"
                >
                    Your service bookings will appear here.
                </p>


                <a
                    href="{{ route('customer.booking') }}"
                    class="mt-6
                           rounded-lg
                           border
                           border-cyan-400
                           bg-cyan-400/5
                           px-6
                           py-3
                           font-semibold
                           text-cyan-300
                           transition
                           hover:bg-cyan-400
                           hover:text-[#04101a]"
                >
                    Book a Service
                </a>

            </div>

        @endif

    </section>

</div>

@endsection