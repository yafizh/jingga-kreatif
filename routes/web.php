<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Client as Client;
use App\Http\Controllers\Landing as Landing;
use App\Http\Controllers\Helper as Helper;
use Illuminate\Support\Facades\Route;


// Authentication Route
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

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

// Mail Sender
Route::post('/dashboard/mail/send', [Helper\MailerController::class, 'composeEmail']);

// Admin Route
Route::get('/dashboard/admin', [Admin\DashboardController::class, 'index'])->middleware(['auth', 'is_admin']);

// --- Master Data ---
Route::resource('/dashboard/employee', Admin\EmployeeController::class)->middleware(['auth', 'is_admin']);
Route::resource('/dashboard/bank', Admin\BankController::class)->except('show')->middleware(['auth', 'is_admin']);
Route::resource('/dashboard/client', Admin\ClientController::class)->middleware(['auth', 'is_admin']);
Route::resource('/dashboard/vendor-type', Admin\VendorTypeController::class)->except('show')->middleware(['auth', 'is_admin']);
Route::resource('/dashboard/theme', Admin\ThemeController::class)->middleware(['auth', 'is_admin']);
Route::resource('/dashboard/vendor', Admin\VendorController::class)->middleware(['auth', 'is_admin']);

// --- Wedding ---
Route::resource('/dashboard/wedding', Admin\WeddingController::class)->middleware(['auth', 'is_admin']);
Route::put('/dashboard/newlywed/{newlywed}', [Admin\NewlywedController::class, 'update'])->middleware(['auth', 'is_admin']);

// --- Meeting History ---
Route::get('/dashboard/meeting-history/{meetingHistory}', [Admin\MeetingHistoryController::class, 'show'])->middleware(['auth', 'is_admin']);
Route::get('/dashboard/meeting-history/create/{wedding}', [Admin\MeetingHistoryController::class, 'create'])->middleware(['auth', 'is_admin']);
Route::post('/dashboard/meeting-history/{wedding}', [Admin\MeetingHistoryController::class, 'store'])->middleware(['auth', 'is_admin']);;
Route::get('/dashboard/meeting-history/{meetingHistory}/edit', [Admin\MeetingHistoryController::class, 'edit'])->middleware(['auth', 'is_admin']);;
Route::put('/dashboard/meeting-history/{meetingHistory}', [Admin\MeetingHistoryController::class, 'update'])->middleware(['auth', 'is_admin']);;
Route::delete('/dashboard/meeting-history/{meetingHistory}', [Admin\MeetingHistoryController::class, 'destroy'])->middleware(['auth', 'is_admin']);;

// --- Payment ---
Route::get('/dashboard/payment/{payment}', [Admin\PaymentController::class, 'show'])->middleware(['auth', 'is_admin']);
Route::get('/dashboard/payment/create/{wedding}', [Admin\PaymentController::class, 'create'])->middleware(['auth', 'is_admin']);
Route::post('/dashboard/payment/{wedding}', [Admin\PaymentController::class, 'store'])->middleware(['auth', 'is_admin']);
Route::get('/dashboard/payment/{payment}/edit', [Admin\PaymentController::class, 'edit'])->middleware(['auth', 'is_admin']);
Route::put('/dashboard/payment/{payment}', [Admin\PaymentController::class, 'update'])->middleware(['auth', 'is_admin']);
Route::delete('/dashboard/payment/{payment}', [Admin\PaymentController::class, 'destroy'])->middleware(['auth', 'is_admin']);
Route::put('dashboard/payment/verification/{payment}', [Admin\PaymentController::class, 'verification'])->middleware(['auth', 'is_admin']);

// ----------------------------------------------------------------------------------

// Client Route
Route::resource('/wedding', Client\ClientController::class)->middleware(['auth', 'is_client']);
Route::get('/groom', [Client\NewlywedController::class, 'create'])->name('groom')->middleware(['auth', 'is_client']);
Route::get('/bride', [Client\NewlywedController::class, 'create'])->name('bride')->middleware(['auth', 'is_client']);
Route::post('/newlywed', [Client\NewlywedController::class, 'store'])->middleware(['auth', 'is_client']);
Route::get('/theme-vendor', [Client\VendorController::class, 'index'])->middleware(['auth', 'is_client']);
Route::get('/payment', [Client\PaymentController::class, 'index'])->middleware(['auth', 'is_client']);
Route::get('/meeting-history', [Client\MeetingHistoryController::class, 'index'])->middleware(['auth', 'is_client']);

// --- AJAX Route ---
Route::get('/theme/getCategorizedTheme', [Client\ThemeController::class, 'getCategorizedTheme'])->middleware(['auth', 'is_client']);
Route::get('/vendor/getCategorizedVendor', [Client\VendorController::class, 'getCategorizedVendor'])->middleware(['auth', 'is_client']);
Route::post('/wedding/storeChoosedThemeAndVendor', [Client\WeddingController::class, 'storeChoosedThemeAndVendor'])->middleware(['auth', 'is_client']);
Route::get('/bank/getAllBank', [Client\BankController::class, 'getAllBank'])->middleware(['auth', 'is_client']);
Route::post('/payment/{payment}', [Client\PaymentController::class, 'store'])->middleware(['auth', 'is_client']);

// ----------------------------------------------------------------------------------

// Landing Page Route
Route::get('/', [Landing\HomeController::class, 'index']);
Route::get('/vendor', [Landing\VendorController::class, 'index']);
Route::get('/crew', [Landing\CrewController::class, 'index']);
