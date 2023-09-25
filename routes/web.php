<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandlerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| #This user is making user of route model binding (current developer)
|
*/

Route::get('/',[HandlerController::class, "index"])->middleware('guest')->name('login');
Route::get('/home',[HandlerController::class, "home"])->name('home');
Route::post('/',[HandlerController::class, "index"])->name('login_post');


// dashboard = d*
Route::get('/dashboard',[HandlerController::class, "dashboardindex"])->middleware('auth')->name('dashboard');
Route::get('dashboard/edit_indicator/{id}',[HandlerController::class, "edit_indicator"])->middleware('auth')->name('edit_indicator');
Route::post('dashboard/edit_indicator/{id}',[HandlerController::class, "edit_indicator"])->middleware('auth')->name('edit_indicator_post');

Route::get('/invoice',[HandlerController::class, "invoice"])->middleware('auth')->name('invoice');
Route::post('/invoice',[HandlerController::class, "invoice"])->middleware('auth')->name('pdf');
Route::post('/dashboard',[HandlerController::class, "logout"])->name('logout');

// d* event Routing
Route::get('dashboard/event',[HandlerController::class, 'event'])->middleware('auth')->name('event');
Route::post('dashboard/event',[HandlerController::class, 'event'])->middleware('auth')->name('event-post');
Route::get('dashboard/event/edit_event/{event_tb}',[HandlerController::class, 'edit_event'])->middleware('auth')->name('edit_event');
Route::post('dashboard/event/edit_event/{event_tb}',[HandlerController::class, 'edit_event'])->middleware('auth')->name('edit_event_post');



// Admin Routing System
Route::get('/admin',[AdminController::class, "index"])->middleware('auth')->name('admin');

// Route for create state
Route::get('/admin/create-state',[AdminController::class, "state"])->middleware('auth')->name('create_state');
Route::get('/admin/create-state/edit/{user}',[AdminController::class, "state_edit"])->middleware('auth')->name('create_state_edit');
Route::post('/admin/create-state',[AdminController::class, "state"])->middleware('auth')->name('create_state_post');
Route::post('/admin/create-state/edit/{user}',[AdminController::class, "state_edit"])->middleware('auth')->name('create_state_edit_post');
Route::delete('/admin/create-state/{user}',[AdminController::class, "state_delete"])->middleware('auth')->name('create_state_delete');

// Routeing for Output (Indicator)
Route::get('/admin/create-indicator',[AdminController::class, "indicator"])->middleware('auth')->name('create_indicator');
Route::post('/admin/create-indicator',[AdminController::class,'indicator'])->middleware('auth')->name('create_indicator_post');
Route::get('/admin/create-indicator/edit/{outputTable}',[AdminController::class,'indicator_edit'])->middleware('auth')->name('create_indicator_edit');
Route::post('/admin/create-indicator/edit/{outputTable}',[AdminController::class,'indicator_edit'])->middleware('auth')->name('create_indicator_edit_post');
Route::delete('/admin/create-indicator/edit/{outputTable}',[AdminController::class,'indicator_delete'])->middleware('auth')->name('create_indicator_delete');

Route::get('/admin/create-indicator/create-deliverable/{id}',[AdminController::class, 'create_deliverable'])->middleware('auth')->name('create_deliverable');
Route::post('/admin/create-indicator/create-deliverable/{id}',[AdminController::class, 'create_deliverable'])->middleware('auth')->name('create_deliverable_post');
Route::get('/admin/create-indicator/create-deliverable/edit-deliverable/{deliverable_table}',[AdminController::class, 'create_deliverable_edit'])->middleware('auth')->name('create_deliverable_edit');
Route::post('/admin/create-indicator/create-deliverable/edit-deliverable/{deliverable_table}',[AdminController::class, 'create_deliverable_edit'])->middleware('auth')->name('create_deliverable_edit_post');
Route::delete('/admin/create-indicator/create-deliverable/{deliverable_table}',[AdminController::class, 'create_deliverable_delete'])->middleware('auth')->name('create_deliverable_delete');

Route::get('/admin/deliverable',[AdminController::class,"deliverable_approve"])->middleware('auth')->name('deliverable_approve');
Route::get('/admin/deliverable/edit/{deliverableTbale}',[AdminController::class,"deliverable_approve_edit"])->middleware('auth')->name('deliverable_approve_edit');
Route::post('/admin/deliverable/edit/{deliverableTbale}',[AdminController::class,"deliverable_approve_edit"])->middleware('auth')->name('deliverable_approve_edit_post');

Route::get('/admin/states/{user}',[AdminController::class, 'stateinfo'])->middleware('auth')->name('states');
Route::post('/admin/states/{user}',[AdminController::class, 'stateinfoPdf'])->middleware('auth')->name('statesPdf');
Route::get('/admin/states/{user}/{outputTable}',[AdminController::class, 'statesDetails'])->middleware('auth')->name('statesDetails');
Route::post('/admin/states/{user}/{outputTable}',[AdminController::class, 'selectedChart'])->middleware('auth')->name('selectedChart');
Route::get('/admin/profile/{user}',[AdminController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/admin/profile/{user}',[AdminController::class, 'profile'])->middleware('auth')->name('profile.update');

Route::get('/admin/event',[AdminController::class, 'event'])->middleware('auth')->name('admin_event');
Route::get('/admin/event/event_csv',[AdminController::class, 'event_csv'])->middleware('auth')->name('event_csv');
Route::post('/admin/event/{name}',[AdminController::class, 'all_event_Pdf'])->middleware('auth')->name('all_event_pdf');
Route::put('/admin/event',[AdminController::class, 'event'])->middleware('auth')->name('admin_event_post');
Route::delete('/admin/event/{event_tb}',[AdminController::class, 'event_delete'])->middleware('auth')->name('admin_event_delete');

Route::get('/admin/event/edit/{event_loc_bene}',[AdminController::class, 'location_bene'])->middleware('auth')->name('location_bene');
Route::post('/admin/event/edit/{event_loc_bene}',[AdminController::class, 'location_bene'])->middleware('auth')->name('location_bene_post');
Route::delete('/admin/event/edit/{event_loc_bene}',[AdminController::class, 'location_bene_delete'])->middleware('auth')->name('location_bene_delete');
