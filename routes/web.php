<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeethController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminLogController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\getDentistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminBlockingController;
use App\Http\Controllers\DentalRecordsController;
use App\Http\Controllers\MedicalAnswerController;
use App\Http\Controllers\AllAppointmentController;
use App\Http\Controllers\AccountPasswordController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AccountManagementController;
use App\Http\Controllers\DentistAppointmentController;
use App\Http\Controllers\AdminMedicalQuestionController;
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

        // staff account
        Route::get('/staff-accounts', [AdminAccountManagementController::class, 'staffAccounts'])->name('staff_accounts');
        // endof staff account 

        // account create
        Route::get('/create', [AdminAccountManagementController::class, 'create'])->name('create');
        Route::post('/', [AdminAccountManagementController::class, 'store'])->name('store');
        // end account create

        
    });

    // end of admin account management

    // service management
    Route::resource('services', AdminServiceController::class);
    // end of service manegment

    // permission management
    Route::resource('permissions', AdminPermissionController::class);
    Route::post('permission/update/{role}', AdminPermissionUpdateController::class)->name('permission.update')->middleware('auth');

    // end of permissions

    // appointment management
    Route::prefix('appointments')->name('appointments.')->group(function(){
        Route::get('/', [AdminAppointmentController::class, 'all'])->name('all');
        Route::get('/today', [AdminAppointmentController::class, 'today'])->name('today');
        Route::get('/incomming', [AdminAppointmentController::class, 'incomming'])->name('incomming');
        Route::get('/resolved', [AdminAppointmentController::class, 'resolved'])->name('resolved');
        Route::get('/cancelled', [AdminAppointmentController::class, 'cancelled'])->name('cancelled');
        Route::delete('/{id}', [AdminAppointmentController::class, 'destroy'])->name('destroy');
    });
    // end of appoibntment management

    // Medical question management 
    Route::prefix('medicals')->name('medical.')->group(function(){
        Route::resource('questions', AdminMedicalQuestionController::class);
    });
    // end of medical queestion management 

    // log 
    Route::resource('log', AdminLogController::class);
    // end of log

    // blocking account 
    Route::get('/blocking', [AdminBlockingController::class, 'blockedList'])->name('blocked.list');
    // end of blocking

    // setting
    Route::get('setting', [AdminSettingController::class, 'setting'])->name('setting');
    Route::post('setting/save-account', [AdminSettingController::class, 'AccountSave'])->name('setting.account.save');
    Route::post('setting/save-app', [AdminSettingController::class, 'AppSave'])->name('setting.app.save');
    // end of setting

});

Route::get('/', function () {
    $app = \App\Models\AppSetting::first();
    return view('welcome', compact('app'));
});

Auth::routes();
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::resource('services', ServiceController::class)->middleware('auth');
Route::resource('schedules', SchedulesController::class)->middleware('auth');
Route::resource('appointments', AppointmentController::class)->middleware('auth');
Route::resource('dentist-appointments', DentistAppointmentController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::post('profile-picture/{id}', ProfilePictureUpdateController::class);
Route::resource('feedbacks', FeedbackController::class);
Route::resource('dental-records', DentalRecordsController::class);
Route::get('settings', [SettingController::class, 'setting'])->name('settings');

// notifications
Route::prefix('notifications')->name('notif.')->middleware('auth')->group(function(){
    Route::get('/', [NotificationController::class, 'showNotifications'])->name('show');
    Route::get('/{id}', [NotificationController::class, 'updateNotification'])->name('update');
    Route::post('/clear', [NotificationController::class, 'clearNotification'])->name('clear');
});
// endof notifications

//patient medical answers 
Route::resource('medical-history', MedicalAnswerController::class);

// user spassword changing
Route::get('change-password', [AccountPasswordController::class, 'showPasswordForm'])->name('show.password.form');
Route::post('change-password', [AccountPasswordController::class, 'storePassword'])->name('store.password');

//staff of dentist 
Route::resource('account-management', AccountManagementController::class);

//all appointemt for staff only 
Route::resource('all-appointments', AllAppointmentController::class);

//privacy and policies
Route::view('privacy-policy', 'privacy-policy');

Route::post('send-message', function(){
    $data = request()->validate([
        'email'=>'required|email',
        'message'=>'required|max:200',
        'concern_type'=>'required|in:'.implode(',',['Registration related', 'Appointment related', 'Account related', 'Others'])
    ]);
    
    if(Message::where('email', $data['email'])->where('is_resolved', false)->count()){
        toast('Oooops! You have sent already a message to us!', 'error');
        return redirect('/#contact');
    }
    
    Message::create($data);
    toast('Message sent!', 'success');
    return redirect('/#contact');
    
});