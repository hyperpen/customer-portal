@extends('layouts.customer')

@section('title', 'RideSync - My Profile')

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
            My Profile
        </h2>

        <div class="flex items-center gap-5 mt-2">

            <p class="text-sm sm:text-base text-slate-400">
                Manage your account information and personal details.
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
    <!-- PROFILE GRID -->
    <!-- ===================================================== -->

    <div
        class="
            grid
            grid-cols-1
            xl:grid-cols-[360px_minmax(0,1fr)]
            gap-8
        "
    >

        <!-- ================================================= -->
        <!-- PROFILE SUMMARY -->
        <!-- ================================================= -->

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

            <span class="absolute top-3 left-3 w-7 h-7 border-l border-t border-cyan-300"></span>
            <span class="absolute top-3 right-3 w-7 h-7 border-r border-t border-cyan-300"></span>
            <span class="absolute bottom-3 left-3 w-7 h-7 border-l border-b border-cyan-300"></span>
            <span class="absolute bottom-3 right-3 w-7 h-7 border-r border-b border-cyan-300"></span>


            <div class="relative p-7 text-center">

                <!-- AVATAR -->

                <div
                    class="
                        relative
                        mx-auto
                        w-32
                        h-32
                        rounded-full
                        flex
                        items-center
                        justify-center
                    "
                >

                    <div
                        class="
                            absolute
                            inset-0
                            rounded-full
                            border
                            border-cyan-400/30
                        "
                    ></div>

                    <div
                        class="
                            absolute
                            inset-3
                            rounded-full
                            border
                            border-cyan-400/20
                        "
                    ></div>

                    <div
                        class="
                            absolute
                            inset-5
                            rounded-full
                            bg-cyan-400/5
                            blur-lg
                        "
                    ></div>

                    <div
                        class="
                            relative
                            z-10
                            w-24
                            h-24
                            rounded-full
                            border-2
                            border-cyan-400
                            bg-[#061522]
                            text-cyan-300
                            flex
                            items-center
                            justify-center
                            shadow-[0_0_25px_rgba(34,211,238,.25)]
                        "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.6"
                            stroke="currentColor"
                            class="w-12 h-12"
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

                </div>


                <!-- NAME -->

                <h3
                    class="
                        mt-6
                        text-2xl
                        font-bold
                        text-white
                    "
                >
                    {{ $profile['name'] ?? session('profile.name', 'Customer') }}
                </h3>


                <p
                    class="
                        mt-1
                        text-sm
                        uppercase
                        tracking-[0.16em]
                        text-cyan-400
                    "
                >
                    Customer
                </p>


                <!-- DIVIDER -->

                <div class="flex items-center gap-2 my-7">

                    <span class="flex-1 h-[1px] bg-slate-700"></span>

                    <span
                        class="
                            w-10
                            h-[2px]
                            bg-cyan-400
                            shadow-[0_0_10px_#22d3ee]
                        "
                    ></span>

                    <span class="flex-1 h-[1px] bg-slate-700"></span>

                </div>


                <!-- ACCOUNT STATUS -->

                <div
                    class="
                        rounded-xl
                        border
                        border-green-400/30
                        bg-green-400/5
                        p-4
                    "
                >

                    <p
                        class="
                            text-xs
                            uppercase
                            tracking-wider
                            text-slate-500
                        "
                    >
                        Account Status
                    </p>

                    <div
                        class="
                            mt-2
                            flex
                            items-center
                            justify-center
                            gap-2
                            text-green-300
                            font-semibold
                        "
                    >

                        <span
                            class="
                                w-2.5
                                h-2.5
                                rounded-full
                                bg-green-400
                                shadow-[0_0_8px_#4ade80]
                            "
                        ></span>

                        Active

                    </div>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- PROFILE INFORMATION -->
        <!-- ================================================= -->

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

            <span class="absolute top-3 left-3 w-7 h-7 border-l border-t border-cyan-300"></span>
            <span class="absolute top-3 right-3 w-7 h-7 border-r border-t border-cyan-300"></span>
            <span class="absolute bottom-3 left-3 w-7 h-7 border-l border-b border-cyan-300"></span>
            <span class="absolute bottom-3 right-3 w-7 h-7 border-r border-b border-cyan-300"></span>


            <div class="relative p-6 sm:p-8 lg:p-10">

                <!-- HEADER -->

                <div
                    class="
                        flex
                        flex-col
                        sm:flex-row
                        sm:items-center
                        sm:justify-between
                        gap-4
                        pb-6
                        border-b
                        border-cyan-400/10
                    "
                >

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
                            Personal Information
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Update your customer profile details.
                        </p>

                    </div>


                    <div
                        class="
                            flex
                            items-center
                            gap-2
                            text-xs
                            uppercase
                            tracking-wider
                            text-slate-500
                        "
                    >

                        <span
                            class="
                                w-2
                                h-2
                                rounded-full
                                bg-cyan-400
                                shadow-[0_0_8px_#22d3ee]
                            "
                        ></span>

                        Profile Data

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- FORM -->
                <!-- ================================================= -->

                <form
                    action="{{ route('customer.profile.update') }}"
                    method="POST"
                    class="mt-8 space-y-7"
                >

                    @csrf

                    @method('PUT')



                    <!-- NAME + EMAIL -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- NAME -->

                        <div>

                            <label
                                for="name"
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
                                Full Name
                            </label>

                            <div class="relative">

                                <div
                                    class="
                                        absolute
                                        inset-y-0
                                        left-0
                                        pl-4
                                        flex
                                        items-center
                                        pointer-events-none
                                        text-cyan-400
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

                                </div>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $profile['name'] ?? session('profile.name')) }}"
                                    required
                                    class="
                                        w-full
                                        pl-12
                                        pr-4
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



                        <!-- EMAIL -->

                        <div>

                            <label
                                for="email"
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
                                Email Address
                            </label>

                            <div class="relative">

                                <div
                                    class="
                                        absolute
                                        inset-y-0
                                        left-0
                                        pl-4
                                        flex
                                        items-center
                                        pointer-events-none
                                        text-cyan-400
                                    "
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                        class="w-5 h-5"
                                    >
                                        <rect
                                            x="3"
                                            y="5"
                                            width="18"
                                            height="14"
                                            rx="2"
                                        />

                                        <path d="M3 7l9 6 9-6"/>
                                    </svg>

                                </div>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $profile['email'] ?? '') }}"
                                    placeholder="customer@email.com"
                                    required
                                    class="
                                        w-full
                                        pl-12
                                        pr-4
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

                    </div>



                    <!-- PHONE + ADDRESS -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- PHONE -->

                        <div>

                            <label
                                for="phone"
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

                            <div class="relative">

                                <div
                                    class="
                                        absolute
                                        inset-y-0
                                        left-0
                                        pl-4
                                        flex
                                        items-center
                                        pointer-events-none
                                        text-cyan-400
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
                                                M5 4h3l2 5-2 1
                                                a14 14 0 006 6
                                                l1-2 5 2v3
                                                a2 2 0 01-2 2
                                                C10 21 3 14 3 6
                                                a2 2 0 012-2z
                                            "
                                        />
                                    </svg>

                                </div>

                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone', $profile['phone'] ?? '') }}"
                                    placeholder="09XX XXX XXXX"
                                    class="
                                        w-full
                                        pl-12
                                        pr-4
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



                        <!-- ADDRESS -->

                        <div>

                            <label
                                for="address"
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
                                Address
                            </label>

                            <div class="relative">

                                <div
                                    class="
                                        absolute
                                        top-[15px]
                                        left-4
                                        text-cyan-400
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

                                </div>

                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    value="{{ old('address', $profile['address'] ?? '') }}"
                                    placeholder="Enter your address"
                                    class="
                                        w-full
                                        pl-12
                                        pr-4
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

                    </div>



                    <!-- ================================================= -->
                    <!-- ACCOUNT INFO -->
                    <!-- ================================================= -->

                    <div
                        class="
                            rounded-xl
                            border
                            border-cyan-400/15
                            bg-[#061522]/70
                            p-5
                        "
                    >

                        <p
                            class="
                                text-xs
                                uppercase
                                tracking-[0.14em]
                                text-cyan-400
                                font-semibold
                            "
                        >
                            Account Information
                        </p>


                        <div
                            class="
                                mt-5
                                grid
                                grid-cols-1
                                sm:grid-cols-2
                                gap-5
                            "
                        >

                            <div>

                                <p
                                    class="
                                        text-xs
                                        uppercase
                                        tracking-wide
                                        text-slate-500
                                    "
                                >
                                    Account Type
                                </p>

                                <p
                                    class="
                                        mt-1
                                        font-semibold
                                        text-slate-200
                                    "
                                >
                                    RideSync Customer
                                </p>

                            </div>


                            <div>

                                <p
                                    class="
                                        text-xs
                                        uppercase
                                        tracking-wide
                                        text-slate-500
                                    "
                                >
                                    Status
                                </p>

                                <p
                                    class="
                                        mt-1
                                        flex
                                        items-center
                                        gap-2
                                        font-semibold
                                        text-green-300
                                    "
                                >

                                    <span
                                        class="
                                            w-2
                                            h-2
                                            rounded-full
                                            bg-green-400
                                            shadow-[0_0_8px_#4ade80]
                                        "
                                    ></span>

                                    Active

                                </p>

                            </div>

                        </div>

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
                            pt-5
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
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                class="w-5 h-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12l4 4L19 6"
                                />
                            </svg>

                            Save Changes

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
                            Back to Dashboard
                        </a>

                    </div>

                </form>

            </div>

        </section>

    </div>

</div>

@endsection