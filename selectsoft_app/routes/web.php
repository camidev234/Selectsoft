<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// index route

Route::get('/', function() {
    return view('index');
})->name('system.index');

Route::get('/login', function() {
    return view('/auth/login');
})->name('user.login');

Route::get('create_occupation',[OccupationController::class,'create'])->name('create_occupation');
Route::post('save_occupation',[OccupationController::class,'store'])->name('save_occupation');
Route::get('/occupations/index',[OccupationController::class, 'index'])->name('occupations.index');
Route::get('/updateOccupation/{occupation}',[OccupationController::class, 'edit'])->name('occupations.edit');
Route::put('/occupations/{id}',[OccupationController::class, 'update'])->name('update_occupation');
Route::delete('/occupations/deleteoccupation/{id}',[OccupationController::class, 'destroy'])->name('delete_occupation');


// auth routes

Route::get('/register', [UserController::class, 'create'])->name('users.create')->middleware('guest');
Route::post('user/register', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [LoginController::class,'index'])->name('user.login');
Route::post('/logininicio',[LoginController::class, 'autenticar'])->name('user.auth');
Route::get('index',[UserController::class, 'index'])->name('user.index')->middleware('auth');

//logout
Route::post('logout',[logoutcontroller::class,'store'])->name('logout');