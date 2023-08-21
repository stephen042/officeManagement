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