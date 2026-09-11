<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DEFAULT BOOKING
    |--------------------------------------------------------------------------
    */
    private function defaultBooking()
    {
        return [
            'id' => 'RS-00125',
            'customer_name' => 'Customer',
            'contact_number' => '0912 345 6789',
            'motorcycle' => 'Honda Click 160',
            'service' => 'Preventive Maintenance',
            'date' => now()->format('F d, Y'),
            'time' => '10:00 AM',
            'notes' => '',
            'status' => 'Repair in Progress',
            'queue' => 8,
            'created_at' => now()->timestamp,
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | DEFAULT PROFILE
    |--------------------------------------------------------------------------
    */
    private function defaultProfile()
    {
        return [
            'name' => 'Customer',
            'email' => 'customer@email.com',
            'phone' => '0912 345 6789',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | ADD NOTIFICATION
    |--------------------------------------------------------------------------
    */
    private function addNotification(
        Request $request,
        string $title,
        string $message,
        string $type = 'info'
    ): void {
        $notifications = $request->session()->get(
            'notifications',
            []
        );

        array_unshift(
            $notifications,
            [
                'id' => uniqid('NTF-'),
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'read' => false,
                'created_at' => now()->timestamp,
            ]
        );

        $notifications = array_slice(
            $notifications,
            0,
            50
        );

        $request->session()->put(
            'notifications',
            $notifications
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function dashboard(Request $request)
    {
        $bookings = $request->session()->get(
            'bookings',
            []
        );

        $activeBooking = collect($bookings)
            ->whereNotIn('status', [
                'Completed',
                'Cancelled',
            ])
            ->sortByDesc('created_at')
            ->first();

        if (!$activeBooking) {
            $activeBooking = $this->defaultBooking();
        }

        $profile = $request->session()->get(
            'profile',
            $this->defaultProfile()
        );

        return view(
            'customer.dashboard',
            compact(
                'activeBooking',
                'profile'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | BOOKING PAGE
    |--------------------------------------------------------------------------
    */
    public function booking(Request $request)
    {
        $profile = $request->session()->get(
            'profile',
            $this->defaultProfile()
        );

        return view(
            'customer.booking',
            compact('profile')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE BOOKING
    |--------------------------------------------------------------------------
    */
    public function storeBooking(Request $request)
    {
        $validated = $request->validate(
            [
                'motorcycle' => 'required|string|max:100',
                'service' => 'required|string|max:100',
                'other_service' => 'nullable|string|max:150',
                'date' => 'required|date',
                'time' => 'required|string|max:50',
                'notes' => 'nullable|string|max:500',
            ],
            [
                'motorcycle.required' =>
                    'Please enter your motorcycle.',

                'service.required' =>
                    'Please select a service type.',

                'date.required' =>
                    'Please select your preferred date.',

                'time.required' =>
                    'Please select your preferred time.',
            ]
        );


        $profile = $request->session()->get(
            'profile',
            $this->defaultProfile()
        );


        if (
            $validated['service'] === 'Other'
            && empty($validated['other_service'])
        ) {
            return back()
                ->withErrors([
                    'other_service' =>
                        'Please specify the service you need.',
                ])
                ->withInput();
        }


        $finalService =
            $validated['service'] === 'Other'
                ? $validated['other_service']
                : $validated['service'];


        $bookings = $request->session()->get(
            'bookings',
            []
        );


        $bookingId = 'RS-' . str_pad(
            count($bookings) + 126,
            5,
            '0',
            STR_PAD_LEFT
        );


        $queueNumber =
            count($bookings) + 8;


        $booking = [
            'id' =>
                $bookingId,

            'customer_name' =>
                $profile['name'],

            'contact_number' =>
                $profile['phone'] ?? '',

            'motorcycle' =>
                $validated['motorcycle'],

            'service' =>
                $finalService,

            'date' =>
                date(
                    'F d, Y',
                    strtotime($validated['date'])
                ),

            'time' =>
                $validated['time'],

            'notes' =>
                $validated['notes'] ?? '',

            'status' =>
                'Booking Confirmed',

            'queue' =>
                $queueNumber,

            'created_at' =>
                now()->timestamp,

            'updated_at' =>
                now()->timestamp,
        ];


        $bookings[] = $booking;

        $request->session()->put(
            'bookings',
            $bookings
        );

        $request->session()->put(
            'active_booking',
            $booking
        );


        $this->addNotification(
            $request,
            'Booking Confirmed',
            'Booking ' .
            $booking['id'] .
            ' for ' .
            $booking['motorcycle'] .
            ' has been created.',
            'success'
        );


        return redirect()
            ->route('customer.status')
            ->with(
                'success',
                'Your service booking has been created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | TRACK STATUS
    |--------------------------------------------------------------------------
    */
    public function status(Request $request)
    {
        $bookings = $request->session()->get(
            'bookings',
            []
        );

        $activeBooking = collect($bookings)
            ->whereNotIn('status', [
                'Completed',
                'Cancelled',
            ])
            ->sortByDesc('created_at')
            ->first();

        if (!$activeBooking) {
            $activeBooking =
                $this->defaultBooking();
        }

        return view(
            'customer.status',
            compact('activeBooking')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | BOOKING HISTORY
    |--------------------------------------------------------------------------
    */
    public function history(Request $request)
    {
        $bookings = $request->session()->get(
            'bookings',
            []
        );

        return view(
            'customer.history',
            compact('bookings')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT BOOKING PAGE
    |--------------------------------------------------------------------------
    */
    public function editBooking(
        Request $request,
        string $id
    ) {
        $bookings = $request->session()->get(
            'bookings',
            []
        );

        $booking = collect($bookings)
            ->firstWhere(
                'id',
                $id
            );


        if (!$booking) {
            return redirect()
                ->route('customer.history')
                ->with(
                    'error',
                    'Booking not found.'
                );
        }


        if (
            ($booking['status'] ?? '')
            === 'Cancelled'
        ) {
            return redirect()
                ->route('customer.history')
                ->with(
                    'error',
                    'Cancelled bookings cannot be edited.'
                );
        }


        if (
            ($booking['status'] ?? '')
            === 'Completed'
        ) {
            return redirect()
                ->route('customer.history')
                ->with(
                    'error',
                    'Completed bookings cannot be edited.'
                );
        }


        return view(
            'customer.edit-booking',
            compact('booking')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE BOOKING
    |--------------------------------------------------------------------------
    */
    public function updateBooking(
        Request $request,
        string $id
    ) {
        $validated = $request->validate(
            [
                'motorcycle' =>
                    'required|string|max:100',

                'service' =>
                    'required|string|max:100',

                'other_service' =>
                    'nullable|string|max:150',

                'date' =>
                    'required|date',

                'time' =>
                    'required|string|max:50',

                'notes' =>
                    'nullable|string|max:500',
            ],
            [
                'motorcycle.required' =>
                    'Please enter your motorcycle.',

                'service.required' =>
                    'Please select a service type.',

                'date.required' =>
                    'Please select your preferred date.',

                'time.required' =>
                    'Please select your preferred time.',
            ]
        );


        if (
            $validated['service'] === 'Other'
            && empty($validated['other_service'])
        ) {
            return back()
                ->withErrors([
                    'other_service' =>
                        'Please specify the service you need.',
                ])
                ->withInput();
        }


        $finalService =
            $validated['service'] === 'Other'
                ? $validated['other_service']
                : $validated['service'];


        $bookings = $request->session()->get(
            'bookings',
            []
        );

        $bookingFound = false;
        $updatedBooking = null;


        foreach (
            $bookings as $index => $booking
        ) {
            if (
                ($booking['id'] ?? null)
                !== $id
            ) {
                continue;
            }


            if (
                ($booking['status'] ?? '')
                === 'Cancelled'
            ) {
                return redirect()
                    ->route('customer.history')
                    ->with(
                        'error',
                        'Cancelled bookings cannot be edited.'
                    );
            }


            if (
                ($booking['status'] ?? '')
                === 'Completed'
            ) {
                return redirect()
                    ->route('customer.history')
                    ->with(
                        'error',
                        'Completed bookings cannot be edited.'
                    );
            }


            $bookings[$index]['motorcycle'] =
                $validated['motorcycle'];

            $bookings[$index]['service'] =
                $finalService;

            $bookings[$index]['date'] =
                date(
                    'F d, Y',
                    strtotime(
                        $validated['date']
                    )
                );

            $bookings[$index]['time'] =
                $validated['time'];

            $bookings[$index]['notes'] =
                $validated['notes'] ?? '';

            $bookings[$index]['updated_at'] =
                now()->timestamp;


            $updatedBooking =
                $bookings[$index];

            $bookingFound = true;

            break;
        }


        if (!$bookingFound) {
            return redirect()
                ->route('customer.history')
                ->with(
                    'error',
                    'Booking not found.'
                );
        }


        $request->session()->put(
            'bookings',
            $bookings
        );


        $activeBooking =
            $request->session()->get(
                'active_booking'
            );

        if (
            $activeBooking
            && ($activeBooking['id'] ?? null)
                === $id
        ) {
            $request->session()->put(
                'active_booking',
                $updatedBooking
            );
        }


        $this->addNotification(
            $request,
            'Booking Updated',
            'Booking ' .
            $id .
            ' has been updated successfully.',
            'info'
        );


        return redirect()
            ->route('customer.history')
            ->with(
                'success',
                'Booking updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | CANCEL BOOKING
    |--------------------------------------------------------------------------
    */
    public function cancelBooking(
        Request $request,
        string $id
    ) {
        $bookings = $request->session()->get(
            'bookings',
            []
        );

        $bookingFound = false;


        foreach (
            $bookings as $index => $booking
        ) {
            if (
                ($booking['id'] ?? null)
                !== $id
            ) {
                continue;
            }


            if (
                ($booking['status'] ?? '')
                === 'Cancelled'
            ) {
                return redirect()
                    ->route('customer.history')
                    ->with(
                        'error',
                        'This booking is already cancelled.'
                    );
            }


            if (
                ($booking['status'] ?? '')
                === 'Completed'
            ) {
                return redirect()
                    ->route('customer.history')
                    ->with(
                        'error',
                        'Completed bookings cannot be cancelled.'
                    );
            }


            $bookings[$index]['status'] =
                'Cancelled';

            $bookings[$index]['cancelled_at'] =
                now()->timestamp;

            $bookings[$index]['updated_at'] =
                now()->timestamp;

            $bookingFound = true;

            break;
        }


        if (!$bookingFound) {
            return redirect()
                ->route('customer.history')
                ->with(
                    'error',
                    'Booking not found.'
                );
        }


        $request->session()->put(
            'bookings',
            $bookings
        );


        $activeBooking =
            $request->session()->get(
                'active_booking'
            );

        if (
            $activeBooking
            && ($activeBooking['id'] ?? null)
                === $id
        ) {
            $request->session()->forget(
                'active_booking'
            );
        }


        $this->addNotification(
            $request,
            'Booking Cancelled',
            'Booking ' .
            $id .
            ' has been cancelled.',
            'danger'
        );


        return redirect()
            ->route('customer.history')
            ->with(
                'success',
                'Booking cancelled successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATIONS PAGE
    |--------------------------------------------------------------------------
    */
    public function notifications(
        Request $request
    ) {
        $notifications =
            $request->session()->get(
                'notifications',
                []
            );

        return view(
            'customer.notifications',
            compact('notifications')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MARK ALL NOTIFICATIONS AS READ
    |--------------------------------------------------------------------------
    */
    public function markNotificationsRead(
        Request $request
    ) {
        $notifications =
            $request->session()->get(
                'notifications',
                []
            );

        foreach (
            $notifications as $index => $notification
        ) {
            $notifications[$index]['read'] = true;
        }

        $request->session()->put(
            'notifications',
            $notifications
        );

        return redirect()
            ->route('customer.notifications')
            ->with(
                'success',
                'All notifications marked as read.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PROFILE PAGE
    |--------------------------------------------------------------------------
    */
    public function profile(Request $request)
    {
        $profile = $request->session()->get(
            'profile',
            $this->defaultProfile()
        );

        return view(
            'customer.profile',
            compact('profile')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */
    public function updateProfile(
        Request $request
    ) {
        $validated = $request->validate([
            'name' =>
                'required|string|max:100',

            'email' =>
                'required|email|max:150',

            'phone' =>
                'nullable|string|max:30',
        ]);


        $request->session()->put(
            'profile',
            $validated
        );


        $this->addNotification(
            $request,
            'Profile Updated',
            'Your RideSync profile information has been updated.',
            'info'
        );


        return redirect()
            ->route('customer.profile')
            ->with(
                'success',
                'Profile updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()
            ->regenerateToken();


        return redirect()
            ->route('customer.dashboard');
    }
}