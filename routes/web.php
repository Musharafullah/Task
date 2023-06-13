<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\MeetingController;
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
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])
->name('logout');

    //admin dashboard

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/admin/add-attendees', [AdminController::class, 'store'])->name('add_attendees');
    Route::post('/admin/update-attendees', [AdminController::class, 'update_attendees'])->name('update_attendees');

    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::get('/meetings/create', [MeetingController::class, 'create'])->name('meetings.create');
    Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store');
    Route::get('/meetings/{id}/edit', [MeetingController::class, 'edit'])->name('meetings.edit');
    Route::put('/meetings/{id}', [MeetingController::class, 'update'])->name('meetings.update');
    Route::delete('/meetings/{id}', [MeetingController::class, 'destroy'])->name('meetings.destroy');
