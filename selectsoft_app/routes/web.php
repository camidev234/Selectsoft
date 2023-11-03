<?php

use App\Http\Controllers\OccupationController;
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

Route::get('create_occupation',[OccupationController::class,'create'])->name('create_occupation');
Route::post('save_occupation',[OccupationController::class,'store'])->name('save_occupation');
Route::get('/',[OccupationController::class, 'index'])->name('occupations.index');
Route::get('/updateOccupation/{occupation}',[OccupationController::class, 'edit'])->name('occupations.edit');
Route::put('/occupations/{id}',[OccupationController::class, 'update'])->name('update_occupation');
