<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\getDentistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentalRecordsController;
use App\Http\Controllers\DentistAppointmentController;
use App\Http\Controllers\AdminPermissionUpdateController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::post('admin/permission/update/{role}', AdminPermissionUpdateController::class)->name('admin.permission.update')->middleware('auth');

Route::resource('services', ServiceController::class);
Route::resource('schedules', SchedulesController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('dentist-appointments', DentistAppointmentController::class);
Route::resource('dental-records', DentalRecordsController::class);


// testing

Route::view('chart', 'chart');

