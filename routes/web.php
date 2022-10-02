<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardBankController;
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

// Meeting
Route::get('/dashboard/meeting', [DashboardMeetingController::class, 'index']);
Route::get('/dashboard/meeting/create/{wedding}', [DashboardMeetingController::class, 'create']);
Route::post('/dashboard/meeting/{wedding}', [DashboardMeetingController::class, 'store']);
Route::get('/dashboard/meeting/{meeting}/edit', [DashboardMeetingController::class, 'edit']);
Route::put('/dashboard/meeting/{meeting}', [DashboardMeetingController::class, 'update']);
Route::delete('/dashboard/meeting/{meeting}', [DashboardMeetingController::class, 'destroy']);

// Payment
Route::get('/dashboard/payment', [DashboardPaymentController::class, 'index'])->middleware('auth');
Route::get('/dashboard/payment/create/{wedding}', [DashboardPaymentController::class, 'create'])->middleware('auth');
Route::post('/dashboard/payment/{wedding}', [DashboardPaymentController::class, 'store'])->middleware('auth');
Route::get('/dashboard/payment/{payment}/edit', [DashboardPaymentController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/payment/{payment}', [DashboardPaymentController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/payment/{payment}', [DashboardPaymentController::class, 'destroy'])->middleware('auth');

// Vendor (Order Matter)
Route::get('/dashboard/vendor/getCategorizedVendor', [DashboardVendorController::class, 'getCategorizedVendor'])->middleware('auth');
Route::resource('/dashboard/vendor', DashboardVendorController::class)->middleware('auth');

// Theme (Order Matter)
Route::get('/dashboard/theme/getCategorizedTheme', [DashboardThemeController::class, 'getCategorizedTheme'])->middleware('auth');
Route::resource('/dashboard/theme', DashboardThemeController::class)->except('show')->middleware('auth');

// Wedding
Route::post('/dashboard/wedding/pay/{payment}', [DashboardWeddingController::class, 'pay']);
Route::post('/dashboard/wedding/storeChoosedThemeAndVendor', [DashboardWeddingController::class, 'storeChoosedThemeAndVendor'])->middleware('auth');
Route::resource('/dashboard/wedding', DashboardWeddingController::class)->middleware('auth');

// Bank (Order Matter)
Route::get('/dashboard/getAllBank', [DashboardBankController::class, 'getAllBank'])->middleware('auth');
Route::resource('/dashboard/bank', DashboardBankController::class)->except('show')->middleware('auth');


// Mail Sender
Route::post('/dashboard/mail/send', [MailerController::class, 'composeEmail']);

// Master Data
Route::resource('/dashboard/employee', DashboardEmployeeController::class)->middleware('auth');
Route::resource('/dashboard/client', DashboardClientController::class)->middleware('auth');
Route::resource('/dashboard/vendor-type', DashboardVendorTypeController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/newlywed', DashboardNewlywedController::class)->middleware('auth');

// Admin Dashboard
Route::get('/dashboard/admin', [DashboardAdminController::class, 'index']);
