<?php

use Illuminate\Support\Facades\Route;
use Luigel\Paymongo\Facades\Paymongo;
use App\Http\Controllers\TeethController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\getDentistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentalRecordsController;
use App\Http\Controllers\DentistAppointmentController;
use App\Http\Controllers\ProfilePictureUpdateController;
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

Route::resource('services', ServiceController::class)->middleware('auth');
Route::resource('schedules', SchedulesController::class)->middleware('auth');
Route::resource('appointments', AppointmentController::class)->middleware('auth');
Route::resource('dentist-appointments', DentistAppointmentController::class)->middleware('auth');
Route::resource('dental-records', DentalRecordsController::class)->middleware('auth');
Route::resource('teeth', TeethController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::post('profile-picture/{id}', ProfilePictureUpdateController::class);
Route::resource('feedbacks', FeedbackController::class);

// testing

Route::view('chart', 'chart');


//payment
Route::get('/payment', function(){
        $gcashSource = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => 100.00,
            'currency' => 'PHP',
            'redirect' => [
                'success' => url('/p/success'),
                'failed' => url('/p/failed')
            ]
        ]);
        return redirect($gcashSource->getRedirect()['checkout_url']);
});

Route::get('/p/success', function(){
    return 'success';
});

Route::get('/p/failed', function(){
    return 'failed';
});
