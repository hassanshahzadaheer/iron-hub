<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Dashboard route for all authenticated users
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/admin/members', [AdminController::class, 'membersIndex'])->name('admin.members.index');


// Route::middleware(['admin'])->group(function () {
//     Route::get('/home', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// Routes for staff
Route::group(['middleware' => 'staff'], function () {
    Route::get('/home', [StaffController::class, 'dashboard'])->name('staff.dashboard');
});

// Routes for members (default)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
