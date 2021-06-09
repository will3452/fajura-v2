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
use App\Http\Controllers\AdminAccountManagementController;

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

Route::middleware(['auth'])->prefix('admin/')->name('admin.')->group(function(){

    // admin account management
    Route::prefix('accounts')->name('account.')->group(function(){\
        // list of new accounts
        Route::get('/list-new-patients', [AdminAccountManagementController::class, 'listOfNewAccounts'])->name('list_of_all_new_patients');
        Route::post('/list-new-patients/{id}/update', [AdminAccountManagementController::class, 'updateListOfNewAccounts'])->name('list_of_all_new_patients.update');
        // end of list new accounts

        // patient accounts
        Route::get('/patients-accounts', [AdminAccountManagementController::class, 'patientAccounts'])->name('patient_accounts');
        Route::get('/patients-accounts/{id}', [AdminAccountManagementController::class, 'patientAccountsShow'])->name('patient_accounts.show');
        Route::put('/patients-accounts/{id}', [AdminAccountManagementController::class, 'patientAccountUpdate'])->name('patient_accounts.update');
        // end of patient accounts

        // dentist account
        Route::get('/dentist-accounts', [AdminAccountManagementController::class, 'dentistAccounts'])->name('dentist_accounts');
        // endof dentist account 

        // account create
        Route::get('/create', [AdminAccountManagementController::class, 'create'])->name('create');
        Route::post('/', [AdminAccountManagementController::class, 'store'])->name('store');
        // end account create
    });

    // end of admin account management


    Route::post('permission/update/{role}', AdminPermissionUpdateController::class)->name('permission.update')->middleware('auth');


});


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
            'type' => request()->type ?? 'gcash',
            'amount' => intval(request()->amount) ?? 100.00,
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
