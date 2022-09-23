<?php

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

Route::get('/dashboard/vendor', function () {
    return view('dashboard.client.page.vendor.create', [
        "active" => "vendor",
        "active_navigation" => 3
    ]);
});

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

Route::get('/dashboard/meeting', function () {
    return view('dashboard.client.page.meeting.index', [
        "active" => "meeting",
        "active_navigation" => 6
    ]);
});
