<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard(Request $request)
    {
        $bookings = $request->session()->get('bookings', []);

        $activeBooking = collect($bookings)
            ->where('status', '!=', 'Completed')
            ->sortByDesc('created_at')
            ->first();

        if (!$activeBooking) {
            $activeBooking = [
                'id' => 'RS-00125',
                'motorcycle' => 'Honda Click 160',
                'service' => 'Preventive Maintenance',
                'date' => now()->format('F d, Y'),
                'status' => 'Repair in Progress',
                'queue' => 8,
                'created_at' => now()->timestamp,
            ];
        }

        $profile = $request->session()->get('profile', [
            'name' => 'Customer',
            'email' => 'customer@email.com',
            'phone' => '0912 345 6789',
        ]);

        return view('customer.dashboard', compact(
            'activeBooking',
            'profile'
        ));
    }


    public function booking(Request $request)
    {
        $profile = $request->session()->get('profile', [
            'name' => 'Customer',
            'email' => 'customer@email.com',
            'phone' => '0912 345 6789',
        ]);

        return view('customer.booking', compact('profile'));
    }


    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'motorcycle' => 'required|string|max:100',
            'service' => 'required|string|max:100',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:500',
        ]);

        $bookings = $request->session()->get('bookings', []);

        $queueNumber = count($bookings) + 8;

        $bookingId = 'RS-' . str_pad(
            count($bookings) + 126,
            5,
            '0',
            STR_PAD_LEFT
        );

        $booking = [
            'id' => $bookingId,
            'motorcycle' => $validated['motorcycle'],
            'service' => $validated['service'],
            'date' => date('F d, Y', strtotime($validated['date'])),
            'notes' => $validated['notes'] ?? '',
            'status' => 'Booking Confirmed',
            'queue' => $queueNumber,
            'created_at' => now()->timestamp,
        ];

        $bookings[] = $booking;

        $request->session()->put('bookings', $bookings);
        $request->session()->put('active_booking', $booking);

        return redirect()
            ->route('customer.status')
            ->with('success', 'Your service booking has been created successfully.');
    }


    public function status(Request $request)
    {
        $bookings = $request->session()->get('bookings', []);

        $activeBooking = collect($bookings)
            ->sortByDesc('created_at')
            ->first();

        if (!$activeBooking) {
            $activeBooking = [
                'id' => 'RS-00125',
                'motorcycle' => 'Honda Click 160',
                'service' => 'Preventive Maintenance',
                'date' => now()->format('F d, Y'),
                'status' => 'Repair in Progress',
                'queue' => 8,
                'created_at' => now()->timestamp,
            ];
        }

        return view('customer.status', compact('activeBooking'));
    }


    public function history(Request $request)
    {
        $bookings = $request->session()->get('bookings', []);

        return view('customer.history', compact('bookings'));
    }


    public function queue(Request $request)
    {
        $bookings = $request->session()->get('bookings', []);

        $activeBooking = collect($bookings)
            ->sortByDesc('created_at')
            ->first();

        if (!$activeBooking) {
            $activeBooking = [
                'id' => 'RS-00125',
                'motorcycle' => 'Honda Click 160',
                'service' => 'Preventive Maintenance',
                'date' => now()->format('F d, Y'),
                'status' => 'Repair in Progress',
                'queue' => 8,
                'created_at' => now()->timestamp,
            ];
        }

        $currentServing = max(1, $activeBooking['queue'] - 2);
        $waitingTime = max(5, ($activeBooking['queue'] - $currentServing) * 10);

        return view('customer.queue', compact(
            'activeBooking',
            'currentServing',
            'waitingTime'
        ));
    }


    public function profile(Request $request)
    {
        $profile = $request->session()->get('profile', [
            'name' => 'Customer',
            'email' => 'customer@email.com',
            'phone' => '0912 345 6789',
        ]);

        return view('customer.profile', compact('profile'));
    }


    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
        ]);

        $request->session()->put('profile', $validated);

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Profile updated successfully.');
    }


    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('customer.dashboard');
    }
}