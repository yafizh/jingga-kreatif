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

// Mail Sender
Route::get('/registration/verification-code/{email}', [Helper\MailerController::class, 'composeEmail']);

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
Route::get('/dashboard/wedding/print/{wedding}', [Admin\WeddingController::class, 'print'])->middleware(['auth', 'is_admin']);
Route::put('/dashboard/wedding/{wedding}/finish', [Admin\WeddingController::class, 'finish'])->middleware(['auth', 'is_admin']);
Route::put('/dashboard/wedding/{wedding}/cancel', [Admin\WeddingController::class, 'cancel'])->middleware(['auth', 'is_admin']);
Route::resource('/dashboard/wedding', Admin\WeddingController::class)->except('edit')->middleware(['auth', 'is_admin']);
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
Route::get('/introduction', function () {
    return view('dashboard.client.page.introduction.index', [
        "active" => "introduction",
        "active_navigation" => 1
    ]);
});
Route::get('/registration', [Client\ClientController::class, 'create']);
Route::post('/registration', [Client\ClientController::class, 'store']);
Route::resource('/wedding', Client\ClientController::class)->middleware(['auth', 'is_client']);
Route::post('/wedding/storeChoosedThemeAndVendor', [Client\WeddingController::class, 'storeChoosedThemeAndVendor'])->middleware(['auth', 'is_client']);
Route::put('/wedding/updateChoosedThemeAndVendor/{wedding}', [Client\WeddingController::class, 'updateChoosedThemeAndVendor'])->middleware(['auth', 'is_client']);
Route::get('/groom', [Client\NewlywedController::class, 'create'])->name('groom')->middleware(['auth', 'is_client']);
Route::get('/bride', [Client\NewlywedController::class, 'create'])->name('bride')->middleware(['auth', 'is_client']);
Route::post('/newlywed', [Client\NewlywedController::class, 'store'])->middleware(['auth', 'is_client']);
Route::get('/groom/{newlywed}/edit', [Client\NewlywedController::class, 'edit'])->middleware(['auth', 'is_client']);
Route::get('/bride/{newlywed}/edit', [Client\NewlywedController::class, 'edit'])->middleware(['auth', 'is_client']);
Route::put('/newlywed/{newlywed}', [Client\NewlywedController::class, 'update'])->middleware(['auth', 'is_client']);
Route::get('/theme-vendor', [Client\VendorController::class, 'index'])->middleware(['auth', 'is_client']);
Route::get('/theme-vendor/{wedding}/edit', [Client\VendorController::class, 'edit'])->middleware(['auth', 'is_client']);
Route::get('/payment', [Client\PaymentController::class, 'index'])->middleware(['auth', 'is_client']);
Route::get('/meeting-history', [Client\MeetingHistoryController::class, 'index'])->middleware(['auth', 'is_client']);
Route::get('/setting', [Client\WeddingController::class, 'index'])->middleware(['auth', 'is_client']);
Route::get('/client/{client}/edit', [Client\ClientController::class, 'edit'])->middleware(['auth', 'is_client']);
Route::put('/client/{client}', [Client\ClientController::class, 'update'])->middleware(['auth', 'is_client']);
Route::put('/client/change-email/{client}', [Client\ClientController::class, 'updateEmail'])->middleware(['auth', 'is_client']);
Route::put('/client/change-password/{client}', [Client\ClientController::class, 'updatePassword'])->middleware(['auth', 'is_client']);

// --- AJAX Route ---
Route::post('/payment/{payment}', [Client\PaymentController::class, 'store'])->middleware(['auth', 'is_client']);

// ----------------------------------------------------------------------------------

// Landing Page Route
Route::get('/', [Landing\HomeController::class, 'index']);
Route::get('/vendor', [Landing\VendorController::class, 'index']);
Route::get('/crew', [Landing\CrewController::class, 'index']);

// ----------------------------------------------------------------------------------

// --- AJAX ROUTE ---
Route::get('/theme/getCategorizedTheme', [Client\ThemeController::class, 'getCategorizedTheme']);
Route::get('/vendor/getCategorizedVendor', [Client\VendorController::class, 'getCategorizedVendor']);
Route::get('/bank/getAllBank', [Client\BankController::class, 'getAllBank']);
