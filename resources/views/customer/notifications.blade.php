@extends('layouts.customer')

@section('title', 'RideSync - Notifications')

@section('content')

@php
    $unreadCount = collect($notifications)
        ->where('read', false)
        ->count();
@endphp


<div class="w-full max-w-[1560px] mx-auto">

    {{-- HEADER --}}
    <section
        class="
            relative
            mb-10
            pl-5
            sm:pl-6
        "
    >

        <span
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
        ></span>

        <span
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
        ></span>


        <div
            class="
                flex
                flex-col
                gap-5
                lg:flex-row
                lg:items-end
                lg:justify-between
            "
        >

            <div>

                <h2
                    class="
                        text-3xl
                        sm:text-4xl
                        font-bold
                        uppercase
                        tracking-[0.06em]
                        text-white
                    "
                >
                    Notifications
                </h2>


                <p
                    class="
                        mt-2
                        text-sm
                        sm:text-base
                        text-slate-400
                    "
                >
                    Stay updated with your RideSync account and service activity.
                </p>

            </div>


            @if($unreadCount > 0)

                <form
                    action="{{ route('customer.notifications.read') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="
                            inline-flex
                            items-center
                            justify-center
                            gap-2
                            rounded-xl
                            border
                            border-green-400/50
                            bg-green-400/5
                            px-5
                            py-3
                            text-sm
                            font-semibold
                            uppercase
                            tracking-wide
                            text-green-300
                            transition
                            hover:bg-green-400/10
                        "
                    >
                        ✓ Mark All Read
                    </button>

                </form>

            @endif

        </div>

    </section>



    {{-- SUMMARY --}}
    <div
        class="
            grid
            grid-cols-1
            sm:grid-cols-3
            gap-4
            mb-7
        "
    >

        <div
            class="
                rounded-2xl
                border
                border-cyan-400/30
                bg-[#04101a]/95
                px-5
                py-5
            "
        >
            <p class="text-xs uppercase tracking-[0.18em] text-slate-500">
                Total
            </p>

            <p class="mt-2 text-3xl font-black text-white">
                {{ count($notifications) }}
            </p>
        </div>


        <div
            class="
                rounded-2xl
                border
                border-green-400/30
                bg-green-400/[0.04]
                px-5
                py-5
            "
        >
            <p class="text-xs uppercase tracking-[0.18em] text-slate-500">
                Unread
            </p>

            <p class="mt-2 text-3xl font-black text-green-300">
                {{ $unreadCount }}
            </p>
        </div>


        <div
            class="
                rounded-2xl
                border
                border-cyan-400/30
                bg-[#04101a]/95
                px-5
                py-5
            "
        >
            <p class="text-xs uppercase tracking-[0.18em] text-slate-500">
                Status
            </p>

            <p
                class="
                    mt-2
                    text-lg
                    font-bold
                    {{ $unreadCount > 0
                        ? 'text-cyan-300'
                        : 'text-green-300'
                    }}
                "
            >
                {{
                    $unreadCount > 0
                        ? 'Needs Attention'
                        : 'All Caught Up'
                }}
            </p>
        </div>

    </div>



    {{-- NOTIFICATION LIST --}}
    <section
        class="
            relative
            overflow-hidden
            rounded-2xl
            border
            border-cyan-400/50
            bg-[#04101a]/95
        "
    >

        <div
            class="
                border-b
                border-cyan-400/15
                px-6
                sm:px-8
                py-5
            "
        >

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
                Recent Activity
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Latest updates from your bookings and account.
            </p>

        </div>


        @forelse($notifications as $notification)

            @php
                $type =
                    $notification['type']
                    ?? 'info';

                $isRead =
                    $notification['read']
                    ?? false;

                $time =
                    isset($notification['created_at'])
                        ? \Carbon\Carbon::createFromTimestamp(
                            $notification['created_at']
                        )->diffForHumans()
                        : '';

                $icon = match($type) {
                    'success' => '✓',
                    'danger' => '×',
                    default => 'i',
                };

                $iconClasses = match($type) {
                    'success' =>
                        'border-green-400/40 bg-green-400/10 text-green-300',

                    'danger' =>
                        'border-red-400/40 bg-red-400/10 text-red-300',

                    default =>
                        'border-cyan-400/40 bg-cyan-400/10 text-cyan-300',
                };
            @endphp


            <div
                class="
                    relative
                    border-b
                    border-cyan-400/10
                    px-6
                    sm:px-8
                    py-6
                    last:border-b-0

                    {{ !$isRead
                        ? 'bg-cyan-400/[0.035]'
                        : ''
                    }}
                "
            >

                <div class="flex items-start gap-4">

                    <div
                        class="
                            w-12
                            h-12
                            shrink-0
                            rounded-full
                            border
                            flex
                            items-center
                            justify-center
                            font-bold
                            {{ $iconClasses }}
                        "
                    >
                        {{ $icon }}
                    </div>


                    <div class="flex-1">

                        <div
                            class="
                                flex
                                flex-col
                                gap-2
                                sm:flex-row
                                sm:items-start
                                sm:justify-between
                            "
                        >

                            <div>

                                <div class="flex items-center gap-3">

                                    <h4 class="font-bold text-white">
                                        {{
                                            $notification['title']
                                            ?? 'Notification'
                                        }}
                                    </h4>


                                    @if(!$isRead)

                                        <span
                                            class="
                                                rounded-full
                                                border
                                                border-green-400/40
                                                bg-green-400/10
                                                px-2
                                                py-0.5
                                                text-[10px]
                                                font-bold
                                                uppercase
                                                text-green-300
                                            "
                                        >
                                            New
                                        </span>

                                    @endif

                                </div>


                                <p
                                    class="
                                        mt-2
                                        text-sm
                                        leading-6
                                        text-slate-400
                                    "
                                >
                                    {{
                                        $notification['message']
                                        ?? ''
                                    }}
                                </p>

                            </div>


                            <span class="text-xs text-slate-600">
                                {{ $time }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


        @empty

            <div
                class="
                    min-h-[350px]
                    flex
                    flex-col
                    items-center
                    justify-center
                    text-center
                    px-6
                "
            >

                <div
                    class="
                        w-20
                        h-20
                        rounded-full
                        border
                        border-cyan-400/30
                        bg-cyan-400/5
                        flex
                        items-center
                        justify-center
                        text-cyan-300
                        mb-5
                    "
                >
                    🔔
                </div>


                <h3
                    class="
                        text-xl
                        font-bold
                        text-white
                    "
                >
                    No Notifications Yet
                </h3>


                <p
                    class="
                        mt-2
                        text-sm
                        text-slate-500
                    "
                >
                    Booking updates and account activity will appear here.
                </p>

            </div>

        @endforelse

    </section>

</div>

@endsection