<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @vite('resources/css/app.css')

    <title>
        @yield('title', 'RideSync')
    </title>
</head>


<body
    class="
        min-h-screen
        bg-[#020711]
        text-slate-200
        overflow-x-hidden
    "
>

    @php
        $navbarNotifications = session('notifications', []);

        $unreadNotificationCount = collect($navbarNotifications)
            ->filter(function ($notification) {
                return !($notification['read'] ?? false);
            })
            ->count();
    @endphp


    <!-- ===================================================== -->
    <!-- BACKGROUND -->
    <!-- ===================================================== -->

    <div
        class="
            fixed
            inset-0
            -z-30
            bg-[#020711]
        "
    ></div>


    <!-- CYAN GLOW -->

    <div
        class="
            fixed
            -z-20
            top-[-200px]
            left-[-200px]
            w-[700px]
            h-[700px]
            rounded-full
            bg-cyan-500/5
            blur-[150px]
            pointer-events-none
        "
    ></div>


    <!-- BLUE GLOW -->

    <div
        class="
            fixed
            -z-20
            top-0
            right-[-200px]
            w-[850px]
            h-[850px]
            rounded-full
            bg-blue-600/10
            blur-[180px]
            pointer-events-none
        "
    ></div>


    <!-- GRID -->

    <div
        class="
            fixed
            inset-0
            -z-10
            pointer-events-none
            opacity-[0.025]
        "
        style="
            background-image:
                linear-gradient(
                    rgba(34,211,238,.6) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(34,211,238,.6) 1px,
                    transparent 1px
                );

            background-size: 48px 48px;
        "
    ></div>



    <!-- ===================================================== -->
    <!-- NAVBAR -->
    <!-- ===================================================== -->

    <header
        class="
            sticky
            top-0
            z-50
            bg-[#020812]/95
            backdrop-blur-xl
            border-b
            border-cyan-400/20
            shadow-[0_10px_35px_rgba(0,0,0,0.5)]
        "
    >

        <!-- FUTURISTIC TOP LINE -->

        <div
            class="
                absolute
                top-0
                left-0
                right-0
                h-[1px]
                bg-gradient-to-r
                from-transparent
                via-cyan-400/40
                to-transparent
            "
        ></div>


        <div
            class="
                max-w-[1750px]
                mx-auto
                px-6
                sm:px-8
                lg:px-10
                2xl:px-12
            "
        >

            <div
                class="
                    min-h-[100px]
                    flex
                    items-center
                    justify-between
                    gap-5
                "
            >


                <!-- ================================================= -->
                <!-- LOGO -->
                <!-- ================================================= -->

                <a
                    href="{{ route('customer.dashboard') }}"
                    class="
                        flex
                        items-center
                        gap-4
                        shrink-0
                    "
                >

                    <div
                        class="
                            relative
                            w-16
                            h-16
                            rounded-xl
                            border
                            border-cyan-400/40
                            bg-cyan-500/5
                            flex
                            items-center
                            justify-center
                            shadow-[0_0_22px_rgba(34,211,238,.12)]
                        "
                    >

                        <span
                            class="
                                absolute
                                top-1
                                left-1
                                w-3
                                h-3
                                border-l
                                border-t
                                border-cyan-300
                            "
                        ></span>

                        <span
                            class="
                                absolute
                                bottom-1
                                right-1
                                w-3
                                h-3
                                border-r
                                border-b
                                border-cyan-300
                            "
                        ></span>


                        <img
                            src="{{ asset('images/gaimdev-logo.png') }}"
                            alt="GAIMDEV Logo"
                            class="
                                relative
                                w-14
                                h-14
                                object-contain
                                drop-shadow-[0_0_10px_rgba(34,211,238,.5)]
                            "
                        >

                    </div>


                    <div class="hidden sm:block">

                        <h1
                            class="
                                text-2xl
                                lg:text-[28px]
                                font-bold
                                text-white
                                leading-none
                                tracking-wide
                            "
                        >
                            RideSync
                        </h1>

                        <p
                            class="
                                mt-2
                                text-[11px]
                                lg:text-xs
                                text-cyan-400
                                uppercase
                                tracking-[0.18em]
                            "
                        >
                            Customer Portal
                        </p>

                    </div>

                </a>



                <!-- ================================================= -->
                <!-- DESKTOP NAVIGATION -->
                <!-- ================================================= -->

                <nav
                    class="
                        hidden
                        xl:flex
                        flex-1
                        items-center
                        justify-center
                        gap-4
                    "
                >


                    <!-- DASHBOARD -->

                    <a
                        href="{{ route('customer.dashboard') }}"
                        class="
                            relative
                            flex
                            items-center
                            gap-3
                            px-6
                            py-[18px]
                            rounded-lg
                            text-[15px]
                            font-medium
                            transition-all
                            duration-300

                            {{ request()->routeIs('customer.dashboard')
                                ? 'bg-cyan-400/10 text-white border border-cyan-400/40 shadow-[0_0_18px_rgba(34,211,238,.12)]'
                                : 'text-slate-300 border border-transparent hover:text-cyan-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            class="
                                w-6
                                h-6

                                {{ request()->routeIs('customer.dashboard')
                                    ? 'text-cyan-400'
                                    : 'text-slate-400'
                                }}
                            "
                        >
                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                        </svg>


                        <span>
                            Dashboard
                        </span>


                        @if(request()->routeIs('customer.dashboard'))

                            <span
                                class="
                                    absolute
                                    left-5
                                    right-5
                                    -bottom-[1px]
                                    h-[2px]
                                    bg-cyan-400
                                    shadow-[0_0_12px_#22d3ee]
                                "
                            ></span>

                        @endif

                    </a>



                    <!-- SERVICE BOOKING -->

                    <a
                        href="{{ route('customer.booking') }}"
                        class="
                            relative
                            flex
                            items-center
                            gap-3
                            px-6
                            py-[18px]
                            rounded-lg
                            text-[15px]
                            font-medium
                            transition-all
                            duration-300

                            {{ request()->routeIs('customer.booking')
                                ? 'bg-cyan-400/10 text-white border border-cyan-400/40 shadow-[0_0_18px_rgba(34,211,238,.12)]'
                                : 'text-slate-300 border border-transparent hover:text-cyan-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="
                                w-6
                                h-6

                                {{ request()->routeIs('customer.booking')
                                    ? 'text-cyan-400'
                                    : 'text-slate-400'
                                }}
                            "
                        >
                            <rect
                                x="3"
                                y="5"
                                width="18"
                                height="16"
                                rx="2"
                            />

                            <path d="M7 3v4 M17 3v4 M3 10h18"/>
                        </svg>


                        <span>
                            Service Booking
                        </span>


                        @if(request()->routeIs('customer.booking'))

                            <span
                                class="
                                    absolute
                                    left-5
                                    right-5
                                    -bottom-[1px]
                                    h-[2px]
                                    bg-cyan-400
                                    shadow-[0_0_12px_#22d3ee]
                                "
                            ></span>

                        @endif

                    </a>



                    <!-- TRACK STATUS -->

                    <a
                        href="{{ route('customer.status') }}"
                        class="
                            relative
                            flex
                            items-center
                            gap-3
                            px-6
                            py-[18px]
                            rounded-lg
                            text-[15px]
                            font-medium
                            transition-all
                            duration-300

                            {{ request()->routeIs('customer.status')
                                ? 'bg-cyan-400/10 text-white border border-cyan-400/40 shadow-[0_0_18px_rgba(34,211,238,.12)]'
                                : 'text-slate-300 border border-transparent hover:text-cyan-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="
                                w-6
                                h-6

                                {{ request()->routeIs('customer.status')
                                    ? 'text-cyan-400'
                                    : 'text-slate-400'
                                }}
                            "
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="
                                    M12 21
                                    s7-5.25 7-12
                                    a7 7 0 10-14 0
                                    c0 6.75 7 12 7 12z
                                "
                            />

                            <circle
                                cx="12"
                                cy="9"
                                r="2.5"
                            />
                        </svg>


                        <span>
                            Track Status
                        </span>


                        @if(request()->routeIs('customer.status'))

                            <span
                                class="
                                    absolute
                                    left-5
                                    right-5
                                    -bottom-[1px]
                                    h-[2px]
                                    bg-cyan-400
                                    shadow-[0_0_12px_#22d3ee]
                                "
                            ></span>

                        @endif

                    </a>



                    <!-- BOOKING HISTORY -->

                    <a
                        href="{{ route('customer.history') }}"
                        class="
                            relative
                            flex
                            items-center
                            gap-3
                            px-6
                            py-[18px]
                            rounded-lg
                            text-[15px]
                            font-medium
                            transition-all
                            duration-300

                            {{ request()->routeIs('customer.history')
                                ? 'bg-cyan-400/10 text-white border border-cyan-400/40 shadow-[0_0_18px_rgba(34,211,238,.12)]'
                                : 'text-slate-300 border border-transparent hover:text-cyan-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="
                                w-6
                                h-6

                                {{ request()->routeIs('customer.history')
                                    ? 'text-cyan-400'
                                    : 'text-slate-400'
                                }}
                            "
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />

                            <path
                                stroke-linecap="round"
                                d="M12 7v5l3 2"
                            />
                        </svg>


                        <span>
                            Booking History
                        </span>


                        @if(request()->routeIs('customer.history'))

                            <span
                                class="
                                    absolute
                                    left-5
                                    right-5
                                    -bottom-[1px]
                                    h-[2px]
                                    bg-cyan-400
                                    shadow-[0_0_12px_#22d3ee]
                                "
                            ></span>

                        @endif

                    </a>

                </nav>



                <!-- ================================================= -->
                <!-- RIGHT SIDE -->
                <!-- ================================================= -->

                <div
                    class="
                        flex
                        items-center
                        gap-4
                        shrink-0
                    "
                >


                    <!-- MOBILE BUTTON -->

                    <button
                        type="button"
                        onclick="toggleMobileMenu()"
                        class="
                            xl:hidden
                            w-11
                            h-11
                            rounded-lg
                            border
                            border-cyan-400/30
                            bg-cyan-400/5
                            text-cyan-300
                            flex
                            items-center
                            justify-center
                        "
                    >

                        <span
                            id="menuIcon"
                            class="text-xl"
                        >
                            ☰
                        </span>

                    </button>



                    <!-- NOTIFICATION -->

                    <a
                        href="{{ route('customer.notifications') }}"
                        class="
                            relative
                            z-10
                            hidden
                            sm:flex
                            w-14
                            h-14
                            items-center
                            justify-center
                            border-l
                            border-r
                            border-cyan-400/10
                            text-slate-300
                            hover:text-cyan-300
                            hover:bg-cyan-400/5
                            transition
                            cursor-pointer
                            pointer-events-auto
                        "
                        title="Notifications"
                        aria-label="Notifications"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            class="w-7 h-7 pointer-events-none"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="
                                    M18 8
                                    a6 6 0 10-12 0
                                    c0 7-3 7-3 9
                                    h18
                                    c0-2-3-2-3-9
                                "
                            />

                            <path
                                stroke-linecap="round"
                                d="M10 21h4"
                            />

                        </svg>


                        @if(($unreadNotificationCount ?? 0) > 0)

                            <span
                                class="
                                    pointer-events-none
                                    absolute
                                    top-[5px]
                                    right-[6px]
                                    min-w-5
                                    h-5
                                    px-1
                                    rounded-full
                                    bg-green-400
                                    text-[#02111c]
                                    text-[10px]
                                    font-black
                                    flex
                                    items-center
                                    justify-center
                                    shadow-[0_0_10px_rgba(74,222,128,.8)]
                                "
                            >
                                {{
                                    ($unreadNotificationCount ?? 0) > 9
                                        ? '9+'
                                        : ($unreadNotificationCount ?? 0)
                                }}
                            </span>

                        @endif

                    </a>



                    <!-- PROFILE -->

                    <div class="relative">

                        <button
                            type="button"
                            onclick="toggleProfile()"
                            class="
                                flex
                                items-center
                                gap-3
                                px-2
                                py-2
                                rounded-xl
                                hover:bg-cyan-400/5
                                transition
                            "
                        >


                            <!-- PROFILE ICON -->

                            <div
                                class="
                                    w-14
                                    h-14
                                    rounded-full
                                    border
                                    border-cyan-400/50
                                    bg-cyan-400/5
                                    text-cyan-300
                                    flex
                                    items-center
                                    justify-center
                                    shadow-[0_0_15px_rgba(34,211,238,.1)]
                                "
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.7"
                                    stroke="currentColor"
                                    class="w-7 h-7"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="
                                            M15.75 6.75
                                            a3.75 3.75 0 11-7.5 0
                                            3.75 3.75 0 017.5 0z

                                            M4.5 20.25
                                            a7.5 7.5 0 0115 0
                                        "
                                    />

                                </svg>

                            </div>



                            <!-- NAME -->

                            <div
                                class="
                                    hidden
                                    md:block
                                    text-left
                                "
                            >

                                <p
                                    class="
                                        text-[15px]
                                        font-semibold
                                        text-white
                                    "
                                >
                                    {{ session('profile.name', 'Customer') }}
                                </p>

                                <p
                                    class="
                                        mt-1
                                        text-xs
                                        text-slate-500
                                    "
                                >
                                    My Account
                                </p>

                            </div>



                            <!-- ARROW -->

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                                class="
                                    hidden
                                    md:block
                                    w-4
                                    h-4
                                    ml-2
                                    text-slate-400
                                "
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 9l6 6 6-6"
                                />

                            </svg>

                        </button>



                        <!-- ================================================= -->
                        <!-- PROFILE DROPDOWN -->
                        <!-- ================================================= -->

                        <div
                            id="profileMenu"
                            class="
                                hidden
                                absolute
                                right-0
                                mt-3
                                w-56
                                overflow-hidden
                                rounded-xl
                                bg-[#06111d]
                                border
                                border-cyan-400/20
                                shadow-[0_20px_45px_rgba(0,0,0,.75)]
                            "
                        >

                            <div
                                class="
                                    px-5
                                    py-4
                                    border-b
                                    border-cyan-400/10
                                "
                            >

                                <p
                                    class="
                                        text-sm
                                        text-white
                                        font-semibold
                                    "
                                >
                                    {{ session('profile.name', 'Customer') }}
                                </p>

                                <p
                                    class="
                                        mt-1
                                        text-xs
                                        text-slate-500
                                    "
                                >
                                    Customer Account
                                </p>

                            </div>



                            <!-- MY PROFILE -->

                            <a
                                href="{{ route('customer.profile') }}"
                                class="
                                    flex
                                    items-center
                                    gap-3
                                    px-5
                                    py-4
                                    text-sm
                                    text-slate-300
                                    hover:text-cyan-300
                                    hover:bg-cyan-400/5
                                    transition
                                "
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.7"
                                    stroke="currentColor"
                                    class="w-5 h-5"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="
                                            M15.75 6.75
                                            a3.75 3.75 0 11-7.5 0
                                            3.75 3.75 0 017.5 0z

                                            M4.5 20.25
                                            a7.5 7.5 0 0115 0
                                        "
                                    />

                                </svg>

                                <span>
                                    My Profile
                                </span>

                            </a>



                            <!-- LOGOUT -->

                            <form
                                action="{{ route('customer.logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="
                                        w-full
                                        flex
                                        items-center
                                        gap-3
                                        px-5
                                        py-4
                                        text-sm
                                        text-red-400
                                        hover:bg-red-500/5
                                        text-left
                                        transition
                                    "
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.7"
                                        stroke="currentColor"
                                        class="w-5 h-5"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="
                                                M10 17l5-5-5-5

                                                M15 12H3

                                                M13 5
                                                V4
                                                a2 2 0 012-2h4
                                                a2 2 0 012 2v16
                                                a2 2 0 01-2 2h-4
                                                a2 2 0 01-2-2v-1
                                            "
                                        />

                                    </svg>

                                    Logout

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- MOBILE NAV -->
            <!-- ================================================= -->

            <div
                id="mobileMenu"
                class="
                    hidden
                    xl:hidden
                    pb-5
                "
            >

                <nav
                    class="
                        border-t
                        border-cyan-400/10
                        pt-4
                        flex
                        flex-col
                        gap-2
                    "
                >

                    <a
                        href="{{ route('customer.dashboard') }}"
                        class="
                            px-5
                            py-3
                            rounded-lg
                            text-sm
                            transition

                            {{ request()->routeIs('customer.dashboard')
                                ? 'bg-cyan-400/10 text-cyan-300 border border-cyan-400/30'
                                : 'text-slate-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >
                        Dashboard
                    </a>


                    <a
                        href="{{ route('customer.booking') }}"
                        class="
                            px-5
                            py-3
                            rounded-lg
                            text-sm
                            transition

                            {{ request()->routeIs('customer.booking')
                                ? 'bg-cyan-400/10 text-cyan-300 border border-cyan-400/30'
                                : 'text-slate-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >
                        Service Booking
                    </a>


                    <a
                        href="{{ route('customer.status') }}"
                        class="
                            px-5
                            py-3
                            rounded-lg
                            text-sm
                            transition

                            {{ request()->routeIs('customer.status')
                                ? 'bg-cyan-400/10 text-cyan-300 border border-cyan-400/30'
                                : 'text-slate-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >
                        Track Status
                    </a>


                    <a
                        href="{{ route('customer.history') }}"
                        class="
                            px-5
                            py-3
                            rounded-lg
                            text-sm
                            transition

                            {{ request()->routeIs('customer.history')
                                ? 'bg-cyan-400/10 text-cyan-300 border border-cyan-400/30'
                                : 'text-slate-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >
                        Booking History
                    </a>


                    <a
                        href="{{ route('customer.notifications') }}"
                        class="
                            px-5
                            py-3
                            rounded-lg
                            text-sm
                            transition

                            {{ request()->routeIs('customer.notifications')
                                ? 'bg-cyan-400/10 text-cyan-300 border border-cyan-400/30'
                                : 'text-slate-300 hover:bg-cyan-400/5'
                            }}
                        "
                    >
                        Notifications

                        @if(($unreadNotificationCount ?? 0) > 0)

                            <span
                                class="
                                    ml-2
                                    inline-flex
                                    min-w-5
                                    h-5
                                    px-1
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-green-400
                                    text-[#02111c]
                                    text-[10px]
                                    font-bold
                                "
                            >
                                {{
                                    ($unreadNotificationCount ?? 0) > 9
                                        ? '9+'
                                        : ($unreadNotificationCount ?? 0)
                                }}
                            </span>

                        @endif
                    </a>


                </nav>

            </div>

        </div>

    </header>



    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main
        class="
            max-w-[1750px]
            mx-auto

            px-6
            sm:px-8
            lg:px-10
            2xl:px-12

            py-8
            lg:py-10
        "
    >


        <!-- ================================================= -->
        <!-- SUCCESS -->
        <!-- ================================================= -->

        @if(session('success'))

            <div
                class="
                    mb-6
                    px-5
                    py-4
                    rounded-xl
                    bg-green-500/10
                    border
                    border-green-400/30
                    text-green-300
                "
            >
                {{ session('success') }}
            </div>

        @endif



        <!-- ================================================= -->
        <!-- ERRORS -->
        <!-- ================================================= -->

        @if($errors->any())

            <div
                class="
                    mb-6
                    px-5
                    py-4
                    rounded-xl
                    bg-red-500/10
                    border
                    border-red-400/30
                    text-red-300
                "
            >

                <ul
                    class="
                        list-disc
                        ml-5
                        text-sm
                    "
                >

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- ================================================= -->
        <!-- PAGE CONTENT -->
        <!-- ================================================= -->

        @yield('content')

    </main>



    <!-- ===================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ===================================================== -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | PROFILE MENU
        |--------------------------------------------------------------------------
        */

        function toggleProfile()
        {
            const profileMenu =
                document.getElementById('profileMenu');

            profileMenu.classList.toggle('hidden');
        }



        /*
        |--------------------------------------------------------------------------
        | MOBILE MENU
        |--------------------------------------------------------------------------
        */

        function toggleMobileMenu()
        {
            const menu =
                document.getElementById('mobileMenu');

            const icon =
                document.getElementById('menuIcon');


            menu.classList.toggle('hidden');


            icon.textContent =
                menu.classList.contains('hidden')
                    ? '☰'
                    : '✕';
        }



        /*
        |--------------------------------------------------------------------------
        | CLOSE PROFILE WHEN CLICKING OUTSIDE
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'click',
            function(event)
            {

                const profileMenu =
                    document.getElementById('profileMenu');


                const profileButton =
                    event.target.closest(
                        '[onclick="toggleProfile()"]'
                    );


                if (
                    !profileButton &&
                    !event.target.closest('#profileMenu')
                )
                {
                    profileMenu.classList.add('hidden');
                }

            }
        );

    </script>

</body>

</html>