<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DashboardEmployeeController;
use App\Http\Controllers\DashboardMeetingController;
use App\Http\Controllers\DashboardNewlywedController;
use App\Http\Controllers\DashboardPaymentController;
use App\Http\Controllers\DashboardThemeController;
use App\Http\Controllers\DashboardVendorController;
use App\Http\Controllers\DashboardVendorTypeController;
use App\Http\Controllers\DashboardWeddingController;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Route;


// Authentication Route
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return view('landing.page.portfolio', [
        "active" => "home"
    ]);
});

Route::get('/vendor', function () {
    return view('landing.page.vendor', [
        "active" => "vendor"
    ]);
});

Route::get('/crew', function () {
    return view('landing.page.crew', [
        "active" => "crew"
    ]);
});

Route::get('/dashboard/introduction', function () {
    return view('dashboard.client.page.introduction.index', [
        "active" => "introduction",
        "active_navigation" => 1
    ]);
});

Route::get('/dashboard/registration', function () {
    return view('dashboard.client.page.registration.create', [
        "active" => "registration",
        "active_navigation" => 2
    ]);
});
Route::post('/dashboard/registration', [AuthController::class, 'registration']);

Route::get('/dashboard/groom', function () {
    return view('dashboard.client.page.newlywed.create', [
        "active" => "groom",
        "newlywed" => true,
        "active_navigation" => 3
    ]);
})->middleware('auth');

Route::get('/dashboard/bride', function () {
    return view('dashboard.client.page.newlywed.create', [
        "active" => "bride",
        "newlywed" => false,
        "active_navigation" => 4
    ]);
})->middleware('auth');

Route::get('/dashboard/payment', function () {
    return view('dashboard.client.page.payment.index', [
        "active" => "payment",
        "active_navigation" => 6
    ]);
});

Route::get('/dashboard/meeting', function () {
    return view('dashboard.client.page.meeting.index', [
        "active" => "meeting",
    ]);
});

// Meeting
Route::get('/dashboard/meeting/create/{wedding}', [DashboardMeetingController::class, 'create']);
Route::post('/dashboard/meeting/{wedding}', [DashboardMeetingController::class, 'store']);
Route::get('/dashboard/meeting/{meeting}/edit', [DashboardMeetingController::class, 'edit']);
Route::put('/dashboard/meeting/{meeting}', [DashboardMeetingController::class, 'update']);
Route::delete('/dashboard/meeting/{meeting}', [DashboardMeetingController::class, 'destroy']);

// Payment
Route::get('/dashboard/payment/create/{wedding}', [DashboardPaymentController::class, 'create']);
Route::post('/dashboard/payment/{wedding}', [DashboardPaymentController::class, 'store']);
Route::get('/dashboard/payment/{payment}/edit', [DashboardPaymentController::class, 'edit']);
Route::put('/dashboard/payment/{payment}', [DashboardPaymentController::class, 'update']);
Route::delete('/dashboard/payment/{payment}', [DashboardPaymentController::class, 'destroy']);

Route::get('/dashboard/vendor/getCategorizedVendor', [DashboardVendorController::class, 'getCategorizedVendor'])->middleware('auth');
Route::post('/dashboard/wedding/storeChoosedVendor', [DashboardWeddingController::class, 'storeChoosedVendor'])->middleware('auth');

Route::post('/dashboard/mail/send', [MailerController::class, 'composeEmail']);
// Admin
Route::resource('/dashboard/employee', DashboardEmployeeController::class);
Route::resource('/dashboard/client', DashboardClientController::class);
Route::resource('/dashboard/vendor-type', DashboardVendorTypeController::class);
Route::resource('/dashboard/vendor', DashboardVendorController::class)->middleware('auth');
Route::resource('/dashboard/newlywed', DashboardNewlywedController::class);
Route::resource('/dashboard/wedding', DashboardWeddingController::class);
Route::resource('/dashboard/theme', DashboardThemeController::class);
