@extends('layouts.customer')

@section('title', 'RideSync - Edit Booking')

@section('content')

<div
    class="w-full
           max-w-[1400px]
           mx-auto"
>

    {{-- PAGE HEADER --}}
    <section
        class="relative
               mb-10
               pl-5"
    >

        <span
            class="absolute
                   left-0
                   top-0
                   w-3
                   h-3
                   border-l-2
                   border-t-2
                   border-cyan-400"
        ></span>

        <span
            class="absolute
                   left-0
                   bottom-0
                   w-3
                   h-3
                   border-l-2
                   border-b-2
                   border-cyan-400"
        ></span>


        <h2
            class="text-3xl
                   sm:text-4xl
                   font-bold
                   uppercase
                   tracking-[0.06em]
                   text-white"
        >
            Edit Booking
        </h2>


        <p
            class="mt-2
                   text-slate-400"
        >
            Update your motorcycle service appointment.
        </p>

    </section>



    {{-- ERRORS --}}
    @if($errors->any())

        <div
            class="mb-6
                   rounded-xl
                   border
                   border-red-400/30
                   bg-red-500/10
                   px-6
                   py-4"
        >

            <ul
                class="list-disc
                       space-y-1
                       pl-5
                       text-red-300"
            >

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- FORM CARD --}}
    <section
        class="relative
               rounded-2xl
               border
               border-cyan-400/60
               bg-[#04101a]/95
               p-7
               sm:p-9"
    >

        <div
            class="mb-8
                   border-b
                   border-cyan-400/20
                   pb-6"
        >

            <h3
                class="text-2xl
                       font-bold
                       uppercase
                       tracking-wide
                       text-cyan-300"
            >
                Booking {{ $booking['id'] }}
            </h3>

            <p
                class="mt-1
                       text-slate-500"
            >
                Modify your appointment information below.
            </p>

        </div>


        <form
            method="POST"
            action="{{
                route(
                    'customer.booking.update',
                    $booking['id']
                )
            }}"
        >

            @csrf
            @method('PUT')


            <div
                class="grid
                       grid-cols-1
                       lg:grid-cols-2
                       gap-7"
            >

                {{-- MOTORCYCLE --}}
                <div>

                    <label
                        class="mb-3
                               block
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Motorcycle
                    </label>


                    <input
                        type="text"
                        name="motorcycle"
                        value="{{
                            old(
                                'motorcycle',
                                $booking['motorcycle']
                            )
                        }}"
                        class="w-full
                               rounded-xl
                               border
                               border-cyan-400/30
                               bg-[#061522]
                               px-5
                               py-4
                               text-white
                               outline-none
                               focus:border-cyan-400"
                    >

                </div>


                {{-- SERVICE --}}
                <div>

                    <label
                        class="mb-3
                               block
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
                               rounded-xl
                               border
                               border-cyan-400/30
                               bg-[#061522]
                               px-5
                               py-4
                               text-white
                               outline-none
                               focus:border-cyan-400"
                    >

                        @php
                            $knownServices = [
                                'Oil Change',
                                'Preventive Maintenance',
                                'Brake Service',
                                'Tire Service',
                                'Engine Checkup',
                                'Electrical Repair',
                            ];

                            $currentService =
                                old(
                                    'service',
                                    in_array(
                                        $booking['service'],
                                        $knownServices
                                    )
                                        ? $booking['service']
                                        : 'Other'
                                );
                        @endphp


                        <option value="">
                            Select service
                        </option>


                        @foreach($knownServices as $service)

                            <option
                                value="{{ $service }}"
                                {{
                                    $currentService === $service
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ $service }}
                            </option>

                        @endforeach


                        <option
                            value="Other"
                            {{
                                $currentService === 'Other'
                                    ? 'selected'
                                    : ''
                            }}
                        >
                            Other
                        </option>

                    </select>

                </div>



                {{-- OTHER SERVICE --}}
                <div
                    id="otherServiceContainer"
                    class="lg:col-span-2
                           {{
                               $currentService === 'Other'
                                   ? ''
                                   : 'hidden'
                           }}"
                >

                    <label
                        class="mb-3
                               block
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Specify Service
                    </label>


                    <input
                        id="other_service"
                        type="text"
                        name="other_service"
                        value="{{
                            old(
                                'other_service',
                                $currentService === 'Other'
                                    ? $booking['service']
                                    : ''
                            )
                        }}"
                        placeholder="Enter specific service"
                        class="w-full
                               rounded-xl
                               border
                               border-cyan-400/30
                               bg-[#061522]
                               px-5
                               py-4
                               text-white
                               outline-none
                               focus:border-cyan-400"
                    >

                </div>



                {{-- DATE --}}
                <div>

                    <label
                        class="mb-3
                               block
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Preferred Date
                    </label>


                    <input
                        type="date"
                        name="date"
                        value="{{
                            old(
                                'date',
                                date(
                                    'Y-m-d',
                                    strtotime($booking['date'])
                                )
                            )
                        }}"
                        min="{{ now()->format('Y-m-d') }}"
                        class="w-full
                               rounded-xl
                               border
                               border-cyan-400/30
                               bg-[#061522]
                               px-5
                               py-4
                               text-white
                               outline-none
                               focus:border-cyan-400"
                    >

                </div>



                {{-- TIME --}}
                <div>

                    <label
                        class="mb-3
                               block
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Preferred Time
                    </label>


                    <select
                        name="time"
                        class="w-full
                               rounded-xl
                               border
                               border-cyan-400/30
                               bg-[#061522]
                               px-5
                               py-4
                               text-white
                               outline-none
                               focus:border-cyan-400"
                    >

                        @foreach([
                            '08:00 AM',
                            '09:00 AM',
                            '10:00 AM',
                            '11:00 AM',
                            '01:00 PM',
                            '02:00 PM',
                            '03:00 PM',
                            '04:00 PM',
                        ] as $time)

                            <option
                                value="{{ $time }}"
                                {{
                                    old(
                                        'time',
                                        $booking['time'] ?? ''
                                    ) === $time
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ $time }}
                            </option>

                        @endforeach

                    </select>

                </div>



                {{-- NOTES --}}
                <div class="lg:col-span-2">

                    <label
                        class="mb-3
                               block
                               font-semibold
                               uppercase
                               text-slate-300"
                    >
                        Additional Notes
                    </label>


                    <textarea
                        name="notes"
                        rows="5"
                        class="w-full
                               resize-none
                               rounded-xl
                               border
                               border-cyan-400/30
                               bg-[#061522]
                               px-5
                               py-4
                               text-white
                               outline-none
                               focus:border-cyan-400"
                    >{{ old(
                        'notes',
                        $booking['notes'] ?? ''
                    ) }}</textarea>

                </div>

            </div>



            {{-- BUTTONS --}}
            <div
                class="mt-8
                       flex
                       justify-end
                       gap-4"
            >

                <a
                    href="{{ route('customer.history') }}"
                    class="rounded-xl
                           border
                           border-slate-500
                           px-6
                           py-3
                           font-semibold
                           text-slate-300
                           transition
                           hover:bg-slate-700/30"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="rounded-xl
                           border
                           border-cyan-400
                           bg-cyan-400/10
                           px-7
                           py-3
                           font-bold
                           uppercase
                           tracking-wide
                           text-cyan-300
                           transition
                           hover:bg-cyan-400
                           hover:text-[#04101a]"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </section>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const service =
        document.getElementById('service');

    const container =
        document.getElementById(
            'otherServiceContainer'
        );

    const input =
        document.getElementById(
            'other_service'
        );


    function toggleOtherService() {

        if (service.value === 'Other') {

            container.classList.remove('hidden');

            input.required = true;

        } else {

            container.classList.add('hidden');

            input.required = false;

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