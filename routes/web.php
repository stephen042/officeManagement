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


// dashboard 
Route::get('/dashboard',[HandlerController::class, "dashboardindex"])->middleware('auth')->name('dashboard');
Route::get('dashboard/edit_indicator/{id}',[HandlerController::class, "edit_indicator"])->middleware('auth')->name('edit_indicator');
Route::post('dashboard/edit_indicator/{id}',[HandlerController::class, "edit_indicator"])->middleware('auth')->name('edit_indicator_post');

Route::get('/invoice',[HandlerController::class, "invoice"])->middleware('auth')->name('invoice');
Route::post('/invoice',[HandlerController::class, "invoice"])->middleware('auth')->name('pdf');
Route::post('/dashboard',[HandlerController::class, "logout"])->name('logout');



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