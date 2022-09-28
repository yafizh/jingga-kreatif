<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DashboardEmployeeController;
use App\Http\Controllers\DashboardNewlywedController;
use App\Http\Controllers\DashboardVendorController;
use App\Http\Controllers\DashboardVendorTypeController;
use App\Http\Controllers\DashboardWeddingController;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

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
})->middleware('auth');

Route::get('/dashboard/meeting', function () {
    return view('dashboard.client.page.meeting.index', [
        "active" => "meeting",
    ]);
});

Route::get('/dashboard/vendor/getCategorizedVendor', [DashboardVendorController::class, 'getCategorizedVendor'])->middleware('auth');
Route::post('/dashboard/wedding/storeChoosedVendor', [DashboardWeddingController::class, 'storeChoosedVendor'])->middleware('auth');

Route::post('/dashboard/mail/send', [MailerController::class, 'composeEmail']);
// Admin
Route::resource('/dashboard/employee', DashboardEmployeeController::class);
Route::resource('/dashboard/client', DashboardClientController::class);
Route::resource('/dashboard/vendor-type', DashboardVendorTypeController::class);
Route::resource('/dashboard/vendor', DashboardVendorController::class)->middleware('auth');
Route::resource('/dashboard/newlywed', DashboardNewlywedController::class);
