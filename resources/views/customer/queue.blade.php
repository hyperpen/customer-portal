@extends('layouts.customer')

@section('title', 'RideSync - Queue Number')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-8 text-center">

        <h2 class="text-3xl font-bold">
            Queue Number
        </h2>

        <p class="text-gray-500 mt-2">
            Check your current position in the service queue.
        </p>

    </div>


    <div
        class="bg-white
               border border-gray-200
               rounded-2xl
               p-6 sm:p-10
               text-center">


        <p class="text-sm text-gray-400">
            Your Queue Number
        </p>


        <h1
            class="text-7xl
                   sm:text-8xl
                   font-bold
                   text-orange-500
                   mt-3">

            {{ $activeBooking['queue'] }}

        </h1>


        <div class="border-t my-8"></div>


        <p class="text-gray-500">
            Currently serving
        </p>


        <p class="text-3xl font-bold mt-2">
            #{{ $currentServing }}
        </p>


        <div
            class="mt-8
                   bg-orange-50
                   rounded-xl
                   p-6">

            <p class="text-sm text-orange-600">
                Estimated waiting time
            </p>

            <p
                class="text-3xl
                       font-bold
                       text-orange-600
                       mt-2">

                {{ $waitingTime }} mins

            </p>

        </div>


        <div class="mt-6 text-left bg-gray-50 rounded-xl p-5">

            <p class="text-xs text-gray-400">
                Current booking
            </p>

            <p class="font-semibold mt-1">
                #{{ $activeBooking['id'] }}
            </p>

            <p class="text-sm text-gray-500 mt-1">
                {{ $activeBooking['motorcycle'] }} -
                {{ $activeBooking['service'] }}
            </p>

        </div>

    </div>

</div>

@endsection