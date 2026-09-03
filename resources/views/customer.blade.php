<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>RideSync - Customer Dashboard</title>
</head>

<body class="bg-gray-100 text-gray-800">


    <!-- ===================================================== -->
    <!-- TOP NAVBAR -->
    <!-- ===================================================== -->

    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="min-h-[74px] flex items-center justify-between gap-3">


                <!-- ================= LOGO / BRAND ================= -->

                <div class="flex items-center gap-3 shrink-0">

                    <!-- GAIMDEV LOGO -->

                    <img
                        src="/images/gaimdev-logo.png"
                        alt="GAIMDEV Logo"
                        class="w-11 h-11 sm:w-12 sm:h-12 object-contain"
                    >


                    <!-- SYSTEM NAME -->

                    <div>

                        <h1 class="text-base sm:text-xl font-bold text-gray-800">
                            RideSync
                        </h1>

                        <p class="text-[11px] sm:text-sm text-gray-400">
                            Customer Portal
                        </p>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- DESKTOP NAVIGATION -->
                <!-- ================================================= -->

                <nav class="hidden xl:flex items-center gap-1">


                    <!-- DASHBOARD -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               bg-blue-50
                               text-blue-600
                               font-semibold
                               text-sm
                               whitespace-nowrap">

                        Dashboard

                    </a>



                    <!-- SERVICE BOOKING -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition
                               whitespace-nowrap">

                        Service Booking

                    </a>



                    <!-- TRACK STATUS -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition
                               whitespace-nowrap">

                        Track Status

                    </a>



                    <!-- BOOKING HISTORY -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition
                               whitespace-nowrap">

                        Booking History

                    </a>



                    <!-- QUEUE NUMBER -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition
                               whitespace-nowrap">

                        Queue Number

                    </a>

                </nav>



                <!-- ================================================= -->
                <!-- RIGHT SIDE -->
                <!-- ================================================= -->

                <div class="flex items-center gap-2 sm:gap-4 ml-auto">


                    <!-- ================= MOBILE MENU ================= -->

                    <button
                        onclick="toggleMobileMenu()"
                        class="xl:hidden
                               w-10 h-10
                               flex items-center
                               justify-center
                               rounded-lg
                               hover:bg-gray-50
                               transition">

                        <span
                            id="menuIcon"
                            class="text-xl">

                            ☰

                        </span>

                    </button>



                    <!-- ================= NOTIFICATION ================= -->

                    <button
                        class="relative
                               w-9 h-9 sm:w-10 sm:h-10
                               flex items-center
                               justify-center
                               rounded-full
                               hover:bg-gray-50
                               transition">

                        <span class="text-lg sm:text-xl">
                            🔔
                        </span>


                        <!-- Notification Dot -->

                        <span
                            class="absolute
                                   top-0.5
                                   right-0.5
                                   w-2
                                   h-2
                                   sm:w-2.5
                                   sm:h-2.5
                                   bg-red-500
                                   rounded-full
                                   border-2
                                   border-white">
                        </span>

                    </button>



                    <!-- ================================================= -->
                    <!-- PROFILE -->
                    <!-- ================================================= -->

                    <div class="relative">


                        <!-- PROFILE BUTTON -->

                        <button
                            onclick="toggleProfile()"
                            class="flex items-center
                                   gap-2 sm:gap-3
                                   rounded-xl
                                   px-1 sm:px-2
                                   py-1.5
                                   hover:bg-gray-50
                                   transition">


                            <!-- PROFILE ICON -->

                            <div
                                class="w-9 h-9 sm:w-10 sm:h-10
                                       bg-blue-100
                                       rounded-full
                                       flex items-center
                                       justify-center">

                                👤

                            </div>


                            <!-- USER DETAILS -->

                            <div class="hidden md:block text-left">

                                <p class="text-sm font-semibold">
                                    Customer
                                </p>

                                <p class="text-xs text-gray-400">
                                    My Account
                                </p>

                            </div>


                            <!-- ARROW -->

                            <span class="hidden sm:block text-gray-400 text-xs">
                                ▼
                            </span>

                        </button>



                        <!-- ================================================= -->
                        <!-- PROFILE DROPDOWN -->
                        <!-- ================================================= -->

                        <div
                            id="profileMenu"
                            class="hidden
                                   absolute
                                   right-0
                                   mt-3
                                   w-48 sm:w-52
                                   bg-white
                                   rounded-xl
                                   shadow-xl
                                   border
                                   border-gray-100
                                   overflow-hidden">


                            <!-- MY PROFILE -->

                            <a
                                href="#"
                                class="flex items-center
                                       gap-3
                                       px-4 sm:px-5
                                       py-3.5 sm:py-4
                                       text-sm
                                       text-gray-700
                                       hover:bg-gray-50
                                       transition">

                                <span class="text-lg">
                                    👤
                                </span>

                                <span>
                                    My Profile
                                </span>

                            </a>


                            <!-- DIVIDER -->

                            <div class="border-t"></div>


                            <!-- LOGOUT -->

                            <a
                                href="#"
                                class="flex items-center
                                       gap-3
                                       px-4 sm:px-5
                                       py-3.5 sm:py-4
                                       text-sm
                                       text-red-500
                                       hover:bg-red-50
                                       transition">

                                <span class="text-lg">
                                    🚪
                                </span>

                                <span>
                                    Logout
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- MOBILE NAVIGATION -->
            <!-- ================================================= -->

            <div
                id="mobileMenu"
                class="hidden xl:hidden pb-4">

                <nav
                    class="flex flex-col gap-1
                           border-t border-gray-100
                           pt-3">


                    <!-- DASHBOARD -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               bg-blue-50
                               text-blue-600
                               font-semibold
                               text-sm">

                        Dashboard

                    </a>



                    <!-- SERVICE BOOKING -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition">

                        Service Booking

                    </a>



                    <!-- TRACK STATUS -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition">

                        Track Status

                    </a>



                    <!-- BOOKING HISTORY -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition">

                        Booking History

                    </a>



                    <!-- QUEUE NUMBER -->

                    <a
                        href="#"
                        class="px-4 py-3
                               rounded-xl
                               text-gray-700
                               hover:bg-gray-50
                               hover:text-blue-600
                               text-sm
                               font-medium
                               transition">

                        Queue Number

                    </a>

                </nav>

            </div>

        </div>

    </header>



    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">


        <!-- ================================================= -->
        <!-- WELCOME -->
        <!-- ================================================= -->

        <div class="mb-6 sm:mb-8">

            <h2
                class="text-2xl
                       sm:text-3xl
                       font-bold
                       text-gray-800">

                Good morning, Customer! 👋

            </h2>


            <p
                class="text-gray-500
                       mt-2
                       text-sm
                       sm:text-base">

                Welcome back. Here's what's happening with your motorcycle.

            </p>

        </div>



        <!-- ================================================= -->
        <!-- QUEUE NUMBER + CURRENT SERVICE -->
        <!-- ================================================= -->

        <div
            class="grid
                   grid-cols-1
                   xl:grid-cols-3
                   gap-5
                   sm:gap-6
                   mb-6 sm:mb-8">


            <!-- ================================================= -->
            <!-- QUEUE NUMBER -->
            <!-- ================================================= -->

            <div
                class="xl:col-span-1
                       bg-white
                       border
                       border-gray-200
                       rounded-2xl
                       p-5
                       sm:p-6
                       lg:p-7">


                <!-- HEADER -->

                <div class="flex justify-between items-start">


                    <div>

                        <h3
                            class="text-lg
                                   sm:text-xl
                                   font-bold">

                            Queue Number

                        </h3>


                        <p
                            class="text-xs
                                   sm:text-sm
                                   text-gray-400
                                   mt-1">

                            Today's queue

                        </p>

                    </div>


                    <span class="text-xl sm:text-2xl">
                        🎫
                    </span>

                </div>



                <!-- QUEUE NUMBER -->

                <div class="text-center py-6 sm:py-8">


                    <p class="text-sm text-gray-400">
                        Your Queue Number
                    </p>


                    <!-- QUEUE NUMBER -->

                    <h2
                        class="text-5xl
                               sm:text-6xl
                               font-bold
                               text-orange-500
                               mt-2">

                        08

                    </h2>


                    <!-- DIVIDER -->

                    <div
                        class="border-t
                               border-gray-100
                               my-5 sm:my-6">
                    </div>


                    <!-- CURRENT NUMBER -->

                    <p class="text-gray-500 text-sm">
                        Currently serving
                    </p>


                    <p
                        class="text-xl
                               sm:text-2xl
                               font-bold
                               text-gray-800
                               mt-1">

                        #06

                    </p>

                </div>



                <!-- WAITING TIME -->

                <div
                    class="bg-orange-50
                           rounded-xl
                           p-4
                           sm:p-5
                           text-center">


                    <p class="text-xs sm:text-sm text-orange-600">
                        Estimated waiting time
                    </p>


                    <p
                        class="text-xl
                               sm:text-2xl
                               font-bold
                               text-orange-600
                               mt-1">

                        20 mins

                    </p>

                </div>



                <!-- BUTTON -->

                <button
                    class="w-full
                           mt-4 sm:mt-5
                           py-3
                           sm:py-3.5
                           bg-orange-500
                           hover:bg-orange-600
                           text-white
                           rounded-xl
                           font-semibold
                           text-sm sm:text-base
                           transition">

                    View Queue Details

                </button>

            </div>



            <!-- ================================================= -->
            <!-- CURRENT SERVICE -->
            <!-- ================================================= -->

            <div
                class="xl:col-span-2
                       bg-white
                       border
                       border-gray-200
                       rounded-2xl
                       p-5
                       sm:p-6
                       lg:p-7">


                <!-- HEADER -->

                <div
                    class="flex
                           flex-col
                           sm:flex-row
                           sm:items-start
                           sm:justify-between
                           gap-3
                           mb-6 sm:mb-7">


                    <div>

                        <h3
                            class="text-lg
                                   sm:text-xl
                                   font-bold">

                            Current Service

                        </h3>


                        <p class="text-sm text-gray-400 mt-1">
                            Booking #RS-00125
                        </p>

                    </div>


                    <span
                        class="self-start
                               px-3 sm:px-4
                               py-1.5 sm:py-2
                               bg-yellow-100
                               text-yellow-700
                               text-xs
                               font-semibold
                               rounded-full">

                        In Progress

                    </span>

                </div>



                <!-- ================================================= -->
                <!-- MOTORCYCLE INFORMATION -->
                <!-- ================================================= -->

                <div
                    class="flex
                           flex-col
                           sm:flex-row
                           sm:items-center
                           gap-4 sm:gap-5
                           bg-gray-50
                           rounded-xl
                           p-4 sm:p-5
                           mb-6 sm:mb-7">


                    <!-- MOTORCYCLE ICON -->

                    <div
                        class="w-14 h-14
                               sm:w-16 sm:h-16
                               bg-blue-100
                               rounded-xl
                               flex
                               items-center
                               justify-center
                               text-2xl sm:text-3xl
                               shrink-0">

                        🏍️

                    </div>


                    <!-- DETAILS -->

                    <div>

                        <h4
                            class="text-base
                                   sm:text-lg
                                   font-bold">

                            Honda Click 160

                        </h4>


                        <p class="text-sm text-gray-500 mt-1">
                            Preventive Maintenance
                        </p>


                        <p class="text-xs text-gray-400 mt-1">
                            August 26, 2026
                        </p>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SERVICE PROGRESS -->
                <!-- ================================================= -->

                <h4
                    class="font-semibold
                           text-base
                           sm:text-lg
                           mb-5 sm:mb-6">

                    Service Progress

                </h4>



                <div class="relative">


                    <!-- PROGRESS LINE -->

                    <div
                        class="absolute
                               left-4
                               top-2
                               bottom-2
                               w-0.5
                               bg-gray-200">
                    </div>



                    <!-- ================================================= -->
                    <!-- STEP 1 -->
                    <!-- ================================================= -->

                    <div
                        class="relative
                               flex
                               items-start
                               gap-4 sm:gap-5
                               mb-6">


                        <!-- ICON -->

                        <div
                            class="w-8 h-8
                                   bg-blue-600
                                   text-white
                                   rounded-full
                                   flex
                                   items-center
                                   justify-center
                                   z-10
                                   text-sm
                                   shrink-0">

                            ✓

                        </div>


                        <!-- TEXT -->

                        <div class="min-w-0">

                            <p class="font-semibold text-gray-800">
                                Booking Confirmed
                            </p>

                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-gray-400
                                       mt-1">

                                Your booking has been confirmed

                            </p>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- STEP 2 -->
                    <!-- ================================================= -->

                    <div
                        class="relative
                               flex
                               items-start
                               gap-4 sm:gap-5
                               mb-6">


                        <!-- ICON -->

                        <div
                            class="w-8 h-8
                                   bg-blue-600
                                   text-white
                                   rounded-full
                                   flex
                                   items-center
                                   justify-center
                                   z-10
                                   text-sm
                                   shrink-0">

                            ✓

                        </div>


                        <!-- TEXT -->

                        <div class="min-w-0">

                            <p class="font-semibold text-gray-800">
                                Motorcycle Received
                            </p>

                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-gray-400
                                       mt-1">

                                Motorcycle is now at the service center

                            </p>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- STEP 3 -->
                    <!-- ================================================= -->

                    <div
                        class="relative
                               flex
                               items-start
                               gap-4 sm:gap-5
                               mb-6">


                        <!-- ICON -->

                        <div
                            class="w-8 h-8
                                   bg-yellow-500
                                   text-white
                                   rounded-full
                                   flex
                                   items-center
                                   justify-center
                                   z-10
                                   text-sm
                                   shrink-0">

                            🔧

                        </div>


                        <!-- TEXT -->

                        <div class="min-w-0">

                            <p class="font-semibold text-yellow-600">
                                Repair in Progress
                            </p>

                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-gray-400
                                       mt-1">

                                Mechanic is currently working on your motorcycle

                            </p>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- STEP 4 -->
                    <!-- ================================================= -->

                    <div
                        class="relative
                               flex
                               items-start
                               gap-4 sm:gap-5">


                        <!-- ICON -->

                        <div
                            class="w-8 h-8
                                   bg-gray-200
                                   text-gray-400
                                   rounded-full
                                   flex
                                   items-center
                                   justify-center
                                   z-10
                                   text-sm
                                   shrink-0">

                            4

                        </div>


                        <!-- TEXT -->

                        <div class="min-w-0">

                            <p class="font-semibold text-gray-400">
                                Completed
                            </p>

                            <p
                                class="text-xs
                                       sm:text-sm
                                       text-gray-400
                                       mt-1">

                                Waiting for service completion

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- ===================================================== -->
        <!-- QUICK ACTIONS -->
        <!-- ===================================================== -->

        <div
            class="grid
                   grid-cols-1
                   sm:grid-cols-2
                   xl:grid-cols-4
                   gap-5
                   sm:gap-6">


            <!-- ================================================= -->
            <!-- SERVICE BOOKING -->
            <!-- ================================================= -->

            <a
                href="#"
                class="bg-blue-600
                       text-white
                       rounded-2xl
                       p-5 sm:p-7
                       hover:bg-blue-700
                       transition
                       shadow-sm">


                <!-- ICON -->

                <div
                    class="w-12 h-12
                           sm:w-14 sm:h-14
                           bg-white/20
                           rounded-xl
                           flex
                           items-center
                           justify-center
                           text-xl sm:text-2xl
                           mb-5 sm:mb-6">

                    🔧

                </div>


                <!-- TITLE -->

                <h3
                    class="text-lg
                           sm:text-xl
                           font-bold">

                    Service Booking

                </h3>


                <!-- DESCRIPTION -->

                <p
                    class="text-blue-100
                           mt-2
                           text-sm sm:text-base">

                    Book a new motorcycle service

                </p>


                <!-- ACTION -->

                <div
                    class="mt-5 sm:mt-6
                           font-semibold
                           text-sm sm:text-base">

                    Book Now →

                </div>

            </a>



            <!-- ================================================= -->
            <!-- TRACK STATUS -->
            <!-- ================================================= -->

            <a
                href="#"
                class="bg-white
                       border
                       border-gray-200
                       rounded-2xl
                       p-5 sm:p-7
                       hover:shadow-md
                       transition">


                <!-- ICON -->

                <div
                    class="w-12 h-12
                           sm:w-14 sm:h-14
                           bg-green-100
                           text-green-600
                           rounded-xl
                           flex
                           items-center
                           justify-center
                           text-xl sm:text-2xl
                           mb-5 sm:mb-6">

                    📍

                </div>


                <!-- TITLE -->

                <h3
                    class="text-lg
                           sm:text-xl
                           font-bold">

                    Track Status

                </h3>


                <!-- DESCRIPTION -->

                <p
                    class="text-gray-500
                           mt-2
                           text-sm sm:text-base">

                    Check your motorcycle repair status

                </p>


                <!-- ACTION -->

                <div
                    class="mt-5 sm:mt-6
                           text-green-600
                           font-semibold
                           text-sm sm:text-base">

                    Track Now →

                </div>

            </a>



            <!-- ================================================= -->
            <!-- BOOKING HISTORY -->
            <!-- ================================================= -->

            <a
                href="#"
                class="bg-white
                       border
                       border-gray-200
                       rounded-2xl
                       p-5 sm:p-7
                       hover:shadow-md
                       transition">


                <!-- ICON -->

                <div
                    class="w-12 h-12
                           sm:w-14 sm:h-14
                           bg-purple-100
                           text-purple-600
                           rounded-xl
                           flex
                           items-center
                           justify-center
                           text-xl sm:text-2xl
                           mb-5 sm:mb-6">

                    📋

                </div>


                <!-- TITLE -->

                <h3
                    class="text-lg
                           sm:text-xl
                           font-bold">

                    Booking History

                </h3>


                <!-- DESCRIPTION -->

                <p
                    class="text-gray-500
                           mt-2
                           text-sm sm:text-base">

                    View your previous service bookings

                </p>


                <!-- ACTION -->

                <div
                    class="mt-5 sm:mt-6
                           text-purple-600
                           font-semibold
                           text-sm sm:text-base">

                    View History →

                </div>

            </a>



            <!-- ================================================= -->
            <!-- QUEUE NUMBER -->
            <!-- ================================================= -->

            <a
                href="#"
                class="bg-white
                       border
                       border-gray-200
                       rounded-2xl
                       p-5 sm:p-7
                       hover:shadow-md
                       transition">


                <!-- ICON -->

                <div
                    class="w-12 h-12
                           sm:w-14 sm:h-14
                           bg-orange-100
                           text-orange-600
                           rounded-xl
                           flex
                           items-center
                           justify-center
                           text-xl sm:text-2xl
                           mb-5 sm:mb-6">

                    🎫

                </div>


                <!-- TITLE -->

                <h3
                    class="text-lg
                           sm:text-xl
                           font-bold">

                    Queue Number

                </h3>


                <!-- DESCRIPTION -->

                <p
                    class="text-gray-500
                           mt-2
                           text-sm sm:text-base">

                    Check your current queue position

                </p>


                <!-- ACTION -->

                <div
                    class="mt-5 sm:mt-6
                           text-orange-600
                           font-semibold
                           text-sm sm:text-base">

                    View Queue →

                </div>

            </a>

        </div>

    </main>



    <!-- ===================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ===================================================== -->

    <script>


        /* ===================================================== */
        /* PROFILE DROPDOWN */
        /* ===================================================== */

        function toggleProfile()
        {
            const menu =
                document.getElementById("profileMenu");

            menu.classList.toggle("hidden");
        }



        /* ===================================================== */
        /* MOBILE MENU */
        /* ===================================================== */

        function toggleMobileMenu()
        {
            const menu =
                document.getElementById("mobileMenu");

            const icon =
                document.getElementById("menuIcon");


            menu.classList.toggle("hidden");


            if (menu.classList.contains("hidden"))
            {
                icon.textContent = "☰";
            }
            else
            {
                icon.textContent = "✕";
            }
        }



        /* ===================================================== */
        /* CLICK OUTSIDE */
        /* ===================================================== */

        document.addEventListener("click", function(event)
        {

            const profileMenu =
                document.getElementById("profileMenu");

            const mobileMenu =
                document.getElementById("mobileMenu");


            const profileButton =
                event.target.closest(
                    '[onclick="toggleProfile()"]'
                );


            const mobileButton =
                event.target.closest(
                    '[onclick="toggleMobileMenu()"]'
                );


            /* CLOSE PROFILE */

            if (
                !profileButton &&
                !event.target.closest("#profileMenu")
            )
            {
                profileMenu.classList.add("hidden");
            }


            /* CLOSE MOBILE MENU */

            if (
                !mobileButton &&
                !event.target.closest("#mobileMenu")
            )
            {
                mobileMenu.classList.add("hidden");

                document.getElementById(
                    "menuIcon"
                ).textContent = "☰";
            }

        });

    </script>


</body>

</html>