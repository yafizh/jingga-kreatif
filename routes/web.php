<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DashboardEmployeeController;
use App\Http\Controllers\DashboardVendorController;
use App\Http\Controllers\DashboardVendorTypeController;
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

// Route::get('/dashboard/vendor', function () {
//     return view('dashboard.client.page.vendor.create', [
//         "active" => "vendor",
//         "active_navigation" => 3
//     ]);
// });

Route::get('/dashboard/groom', function () {
    return view('dashboard.client.page.groom.create', [
        "active" => "groom",
        "active_navigation" => 4
    ]);
});

Route::get('/dashboard/bride', function () {
    return view('dashboard.client.page.bride.create', [
        "active" => "bride",
        "active_navigation" => 5
    ]);
});

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

Route::post('/dashboard/mail/send', [MailerController::class, 'composeEmail']);
// Admin
Route::resource('/dashboard/employee', DashboardEmployeeController::class);
Route::resource('/dashboard/client', DashboardClientController::class);
Route::resource('/dashboard/vendor-type', DashboardVendorTypeController::class);
Route::resource('/dashboard/vendor', DashboardVendorController::class);
