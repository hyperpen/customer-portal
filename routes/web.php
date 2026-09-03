<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/customer', [CustomerController::class, 'dashboard'])
    ->name('customer.dashboard');

Route::get('/customer/booking', [CustomerController::class, 'booking'])
    ->name('customer.booking');

Route::post('/customer/booking', [CustomerController::class, 'storeBooking'])
    ->name('customer.booking.store');

Route::get('/customer/status', [CustomerController::class, 'status'])
    ->name('customer.status');

Route::get('/customer/history', [CustomerController::class, 'history'])
    ->name('customer.history');

Route::get('/customer/queue', [CustomerController::class, 'queue'])
    ->name('customer.queue');

Route::get('/customer/profile', [CustomerController::class, 'profile'])
    ->name('customer.profile');

Route::post('/customer/profile', [CustomerController::class, 'updateProfile'])
    ->name('customer.profile.update');

Route::post('/customer/logout', [CustomerController::class, 'logout'])
    ->name('customer.logout');