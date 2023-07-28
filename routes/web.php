<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\scheduleController;
use App\Http\Controllers\stationController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\profileConroller;
use App\http\Controllers\paymentController;

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
//Load landing page



Route::get('/', [CommonController::class, 'index'])->name('index');


//admin load login page if session is false
Route::get('admin', function () {
    if (session()->has('AName')) {

        return redirect('dashboard');
    }

    return view('admin_login');
})->name('admin');


//admin login function
Route::post('login_admin', [userController::class, 'loginAdmin'])->name('login_admin');

//admin logout function
Route::get('logout_admin', [userController::class, 'logoutAdmin'])->name('logout_admin');

//Load passenger login page if session is false
Route::get('login', function () {
    if (session()->has('pName')) {

        return view('profile');
    }

    return view('user_login');
})->name('login');


//Load login page if session is false

Route::get('registration', function () {
    if (session()->has('pName')) {

        return view('profile');
    }
    return view('registration');
})->name('registration');

//Load reports page if session is false

Route::get('reports', function () {
    if (session()->has('pName')) {

        return view('reports');
    }
    return view('admin_login');
});


    //Load dashboard page if session is false


    
//passenger dashboard function
Route::get('dashboard', [CommonController::class, 'dashboardWidget'])->name('dashboard');

/* 
    Route::get('dashboard', function () {
        if (session()->has('AName')) {

            return view('dashboard');
        }
        return view('admin_login');
    })->name('dashboard'); */

//Load payment page if session is false

Route::get('payment', function () {
    if (session()->has('pName')) {

        return view('payment');
    }
    return view('user_login');
});


//Load passenger cart  page if session is false

Route::get('checkout', function () {
    if (session()->has('pName')) {

        return view('checkout');
    }
    return view('user_login');
})->name('checkout');

//Load Train Info page if session is false

Route::get('train_info', function () {
    if (session()->has('pName')) {

        return view('train_info');
    }
    return view('user_login');
});





//passenger login function
Route::post('login_user', [userController::class, 'loginUser'])->name('login_user');

//passenger registration function
Route::post('register_user', [userController::class, 'registerUser'])->name('register_user');

//passenger logout function
Route::get('logout', [userController::class, 'logoutUser'])->name('logout');

//get the active tickets info
Route::get('active_ticket',[TrainController::class,'getTicket']);

//get the train tracing info
Route::get('track_train/{id}',[TrainController::class,'trackTrain']);


//get the add_train
Route::get('add_train',[TrainController::class,'addTrain'])->name('add_train');

//get the add_train to DB
Route::post('addtraindb',[TrainController::class,'trainToDb'])->name('addtraindb');

//get the view_train
Route::get('view_train',[TrainController::class,'trainList'])->name('view_train');

//get the Edit Train
Route::get('edit_train/{id}',[TrainController::class,'trainEdt']);

//get the Delete Train
Route::get('delete_train/{id}',[TrainController::class,'trainDelete']);

//get the update Train form
Route::post('update_train',[TrainController::class,'updateForm'])->name('update_train');

//get the add_train_stations
Route::get('add_train_stations',[stationController::class,'viewAddStations'])->name('add_train_stations');

//get the add_train_Station to DB
Route::post('add_stationsTo_db',[stationController::class,'addStationsToDb'])->name('add_stationsTo_db');

//get the view_train_stations
Route::get('view_train_stations',[stationController::class,'viewStations'])->name('view_train_stations');

//get the Edit Train
Route::get('edit_stations/{id}',[stationController::class,'stationEdtview']);

//get the Delete Train
Route::get('delete_stations/{id}',[stationController::class,'stationDelete']);

//get the Update Station
Route::post('update_station',[stationController::class,'updateStation'])->name('update_station'); 

//get the view_train
Route::get('create_schedule',[scheduleController::class,'addSchedule'])->name('create_schedule');

//get the add_admin_user
Route::get('add_admin_user',[userController::class,'viewAddAdmin'])->name('add_admin_user');

//get add add_admin_user
Route::post('submit_admin_user',[userController::class,'addAdminUser'])->name('submit_admin_user');

//get the view_admin_user
Route::get('view_admin_user',[userController::class,'viewAdminUser'])->name('view_admin_user');


//get the Edit User
Route::get('edit_admin_user/{id}',[userController::class,'userEdtview']);

// Update Admin User
Route::post('update_admin',[userController::class,'updateAdminUser'])->name('update_admin'); 

// Delete Admin User
Route::get('delete_admin/{id}',[userController::class,'adminDelete'])->name('delete_admin'); 


Route::get('profile',[profileConroller::class,'getTrainData'])->name('profile');

// create Schedule
Route::post('new_schedule',[scheduleController::class,'createSchedule'])->name('new_schedule');

//view schedules
Route::get('view_schedules',[scheduleController::class,'viewSchedules'])->name('view_schedules');

//update schedule 
Route::get('update_schedule/{id}',[scheduleController::class,'updateSchedule'])->name('update_schedule');


//re-schedule
Route::get('reschedule/{id}',[scheduleController::class,'reschedule'])->name('reschedule');
Route::post('create_reschedule',[scheduleController::class,'createReschedule'])->name('create_reschedule');
//delete schedule
Route::get('delete_schedule/{id}',[scheduleController::class,'deleteSchedule'])->name('delete_schedule');

//seach data
Route::post('search_data',[CommonController::class,'searchData'])->name('search_data');



// Update Admin User
Route::post('Passenger_submit',[profileConroller::class,'updatePassenger'])->name('Passenger_submit');


//view schedules
Route::get('view_schedules',[scheduleController::class,'viewSchedules'])->name('view_schedules');

// create Schedule
Route::post('new_schedule',[scheduleController::class,'createSchedule'])->name('new_schedule');

// Edit Schedule
Route::post('edit_schedule',[scheduleController::class,'editSchedule'])->name('edit_schedule');

// Card payment submit
Route::post('cardpayment',[paymentController::class,'makePayment'])->name('cardpayment');

//delay schedule 
Route::post('delay_schedule',[scheduleController::class,'delaySchedule'])->name('delay_schedule');


// cancel schedule 
Route::get('cancel_schedule/{id}',[scheduleController::class,'cancelSchedule'])->name('cancel_schedule');


// contact_us submit
Route::post('contact_us',[CommonController::class,'contactEmail'])->name('contact_us');


//seach data
Route::get('search_result',[CommonController::class,'searchData'])->name('search_result');

//checkout
Route::get('book-tour/{data}',[paymentController::class,'loadCheckout'])->name('book_tour');

//create ticket
Route::post('create-ticket',[paymentController::class,'createTicket'])->name('create-ticket');

//add promotion
Route::get('add-promotion',[CommonController::class,'addPromotion'])->name('add-promotion');

Route::post('create-promotion',[CommonController::class,'createPromotion'])->name('create-promotion');

//edit promotion
Route::get('edit-promotion/{id}',[CommonController::class,'editPromotion'])->name('edit-promotion');

Route::post('update-promotion',[CommonController::class,'updatePromotion'])->name('update-promotion');

//view=promotion
Route::get('view-promotions',[CommonController::class,'viewPromotions'])->name('view-promotions');

//remove=promotion
Route::get('delete-promotion/{id}',[CommonController::class,'removePromotion'])->name('delete-promotions');

//update_location
Route::post('tracking_update',[scheduleController::class,'updateLocation'])->name('tracking_update');

//sales report
Route::get('sales-report', [CommonController::class, 'salesReport'])->name('sales-report');

Route::get('sales-report-data',[CommonController::class,'salesReportSearch'])->name('sales-report-data');