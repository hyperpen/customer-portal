<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| CUSTOMER DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get(
    '/customer',
    [CustomerController::class, 'dashboard']
)->name('customer.dashboard');


/*
|--------------------------------------------------------------------------
| SERVICE BOOKING
|--------------------------------------------------------------------------
*/

Route::get(
    '/customer/booking',
    [CustomerController::class, 'booking']
)->name('customer.booking');


Route::post(
    '/customer/booking',
    [CustomerController::class, 'storeBooking']
)->name('customer.booking.store');


/*
|--------------------------------------------------------------------------
| EDIT BOOKING
|--------------------------------------------------------------------------
*/

Route::get(
    '/customer/booking/{id}/edit',
    [CustomerController::class, 'editBooking']
)->name('customer.booking.edit');


Route::put(
    '/customer/booking/{id}',
    [CustomerController::class, 'updateBooking']
)->name('customer.booking.update');


/*
|--------------------------------------------------------------------------
| CANCEL BOOKING
|--------------------------------------------------------------------------
*/

Route::patch(
    '/customer/booking/{id}/cancel',
    [CustomerController::class, 'cancelBooking']
)->name('customer.booking.cancel');


/*
|--------------------------------------------------------------------------
| TRACK STATUS
|--------------------------------------------------------------------------
*/

Route::get(
    '/customer/status',
    [CustomerController::class, 'status']
)->name('customer.status');


/*
|--------------------------------------------------------------------------
| BOOKING HISTORY
|--------------------------------------------------------------------------
*/

Route::get(
    '/customer/history',
    [CustomerController::class, 'history']
)->name('customer.history');


/*
|--------------------------------------------------------------------------
| CUSTOMER PROFILE
|--------------------------------------------------------------------------
*/

Route::get(
    '/customer/profile',
    [CustomerController::class, 'profile']
)->name('customer.profile');


Route::post(
    '/customer/profile',
    [CustomerController::class, 'updateProfile']
)->name('customer.profile.update');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post(
    '/customer/logout',
    [CustomerController::class, 'logout']
)->name('customer.logout');