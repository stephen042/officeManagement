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

Route::get('/', [HandlerController::class, "index"])->name('login');
Route::get('/home', [HandlerController::class, "home"])->name('home');
Route::post('/', [HandlerController::class, "index"])->name('login_post');


// dashboard = d*
Route::prefix('dashboard')->group(function () {
    Route::get('/', [HandlerController::class, "dashboardindex"])->middleware('auth')->name('dashboard');
    Route::get('dashboard/edit_indicator/{id}', [HandlerController::class, "edit_indicator"])->middleware('auth')->name('edit_indicator');
    Route::post('dashboard/edit_indicator/{id}', [HandlerController::class, "edit_indicator"])->middleware('auth')->name('edit_indicator_post');

    Route::get('/invoice', [HandlerController::class, "invoice"])->middleware('auth')->name('invoice');
    Route::post('/invoice', [HandlerController::class, "invoice"])->middleware('auth')->name('pdf');
    Route::post('/dashboard', [HandlerController::class, "logout"])->name('logout');

    // d* event Routing
    Route::get('/event', [HandlerController::class, 'event'])->middleware('auth')->name('event');
    Route::get('/state_csv', [HandlerController::class, 'state_csv'])->middleware('auth')->name('state_csv');
    Route::post('/event', [HandlerController::class, 'event'])->middleware('auth')->name('event-post');
    Route::get('/event/edit_event/{event_tb}', [HandlerController::class, 'edit_event'])->middleware('auth')->name('edit_event');
    Route::post('/event/edit_event/{event_tb}', [HandlerController::class, 'edit_event'])->middleware('auth')->name('edit_event_post');

    // stakeolderEngagementTracker
    Route::prefix('/stakeholderEngagementTracker')->group(function () {

        Route::get('/', [HandlerController::class, "stakeholderEngagementTracker"])->middleware('auth')->name('stakeholderEngagementTracker');
        Route::post('/', [HandlerController::class, "stakeholderEngagementTracker"])->middleware('auth')->name('stakeholderEngagementTracker-post');

        Route::get('/edit-stakeholderEngagementTracker/{stakeHolderEngagementTracker}', [HandlerController::class, "Edit_stakeholderEngagementTracker"])->middleware('auth')->name('edit-stakeholderEngagementTracker');
        Route::post('/edit-stakeholderEngagementTracker/{stakeHolderEngagementTracker}', [HandlerController::class, "Edit_stakeholderEngagementTracker"])->middleware('auth')->name('edit-stakeholderEngagementTracker-post');
    });
});


// Admin Routing System
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, "index"])->middleware('auth')->name('admin');

    // Route for create state
    Route::get('/create-state', [AdminController::class, "state"])->middleware('auth')->name('create_state');
    Route::get('/create-state/edit/{user}', [AdminController::class, "state_edit"])->middleware('auth')->name('create_state_edit');
    Route::post('/create-state', [AdminController::class, "state"])->middleware('auth')->name('create_state_post');
    Route::post('/create-state/edit/{user}', [AdminController::class, "state_edit"])->middleware('auth')->name('create_state_edit_post');
    Route::delete('/create-state/{user}', [AdminController::class, "state_delete"])->middleware('auth')->name('create_state_delete');

    // Routeing for Output (Indicator)
    Route::get('/create-indicator', [AdminController::class, "indicator"])->middleware('auth')->name('create_indicator');
    Route::post('/create-indicator', [AdminController::class, 'indicator'])->middleware('auth')->name('create_indicator_post');
    Route::get('/create-indicator/edit/{outputTable}', [AdminController::class, 'indicator_edit'])->middleware('auth')->name('create_indicator_edit');
    Route::post('/create-indicator/edit/{outputTable}', [AdminController::class, 'indicator_edit'])->middleware('auth')->name('create_indicator_edit_post');
    Route::delete('/create-indicator/edit/{outputTable}', [AdminController::class, 'indicator_delete'])->middleware('auth')->name('create_indicator_delete');

    Route::get('/create-indicator/create-deliverable/{id}', [AdminController::class, 'create_deliverable'])->middleware('auth')->name('create_deliverable');
    Route::post('/create-indicator/create-deliverable/{id}', [AdminController::class, 'create_deliverable'])->middleware('auth')->name('create_deliverable_post');
    Route::get('/create-indicator/create-deliverable/edit-deliverable/{deliverable_table}', [AdminController::class, 'create_deliverable_edit'])->middleware('auth')->name('create_deliverable_edit');
    Route::post('/create-indicator/create-deliverable/edit-deliverable/{deliverable_table}', [AdminController::class, 'create_deliverable_edit'])->middleware('auth')->name('create_deliverable_edit_post');
    Route::delete('/create-indicator/create-deliverable/{deliverable_table}', [AdminController::class, 'create_deliverable_delete'])->middleware('auth')->name('create_deliverable_delete');

    Route::get('/deliverable', [AdminController::class, "deliverable_approve"])->middleware('auth')->name('deliverable_approve');
    Route::get('/deliverable/edit/{deliverableTbale}', [AdminController::class, "deliverable_approve_edit"])->middleware('auth')->name('deliverable_approve_edit');
    Route::post('/deliverable/edit/{deliverableTbale}', [AdminController::class, "deliverable_approve_edit"])->middleware('auth')->name('deliverable_approve_edit_post');

    Route::get('/states/{user}', [AdminController::class, 'stateinfo'])->middleware('auth')->name('states');
    Route::post('/states/{user}', [AdminController::class, 'stateinfoPdf'])->middleware('auth')->name('statesPdf');
    Route::get('/states/{user}/{outputTable}', [AdminController::class, 'statesDetails'])->middleware('auth')->name('statesDetails');
    Route::post('/states/{user}/{outputTable}', [AdminController::class, 'selectedChart'])->middleware('auth')->name('selectedChart');
    Route::get('/profile/{user}', [AdminController::class, 'profile'])->middleware('auth')->name('profile');
    Route::post('/profile/{user}', [AdminController::class, 'profile'])->middleware('auth')->name('profile.update');

    Route::get('/event', [AdminController::class, 'event'])->middleware('auth')->name('admin_event');
    Route::get('/event/event_csv', [AdminController::class, 'event_csv'])->middleware('auth')->name('event_csv');
    Route::post('/event/{name}', [AdminController::class, 'all_event_Pdf'])->middleware('auth')->name('all_event_pdf');
    Route::put('/event', [AdminController::class, 'event'])->middleware('auth')->name('admin_event_post');
    Route::delete('/event/{event_tb}', [AdminController::class, 'event_delete'])->middleware('auth')->name('admin_event_delete');

    Route::get('/event/edit/{event_loc_bene}', [AdminController::class, 'location_bene'])->middleware('auth')->name('location_bene');
    Route::post('/event/edit/{event_loc_bene}', [AdminController::class, 'location_bene'])->middleware('auth')->name('location_bene_post');
    Route::delete('/event/edit/{event_loc_bene}', [AdminController::class, 'location_bene_delete'])->middleware('auth')->name('location_bene_delete');

    // stakeolderEngagementTracker
    Route::prefix('/stakeholderEngagementTracker')->group(function () {
        Route::get('/', [AdminController::class, "stakeholderEngagementTracker"])->middleware('auth')->name('admin_stakeholderEngagementTracker');
        Route::get('/stakeHolderEngagementTracker_csv', [AdminController::class, 'stakeHolderEngagementTracker_csv'])->middleware('auth')->name('stakeHolderEngagementTracker_csv');
        Route::delete('/{stakeHolderEngagementTracker}', [AdminController::class, "delete_stakeholderEngagementTracker"])->middleware('auth')->name('delete-stakeholderEngagementTracker');
    });
});
