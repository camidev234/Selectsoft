<?php

use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\DepartamentController;
use App\Http\Controllers\API\OccupationController as APIOccupationController;
use App\Http\Controllers\API\RequisitionController;
use App\Http\Controllers\CityController;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Models\User;
use App\Models\Occupation;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cities', [CityController::class, 'index']);
Route::post( '/city/store' ,[CityController::class,'store']) ; 
Route::get('/city/{id}', [CityController::class, 'getById']);

Route::get('/users', [UserController::class, 'index']);
Route::post( '/user/store' ,[UserController::class,'store']) ; 
Route::get('user/{id}', [UserController::class, 'getById']);

Route::get('/occupations', [APIOccupationController::class, 'index']);
Route::post( '/occupation/store' ,[APIOccupationController::class,'store']) ; 
Route::get('occupation/{id}', [APIOccupationController::class, 'getById']);

Route::get('/requisitions', [RequisitionController::class, 'index']);
Route::post('/requisition/store', [RequisitionController::class, 'store']);
Route::get('requisition/{id}', [RequisitionController::class, 'getById']);

Route::get('/countries', [CountryController::class, 'index']);
Route::post('/country/store', [CountryController::class, 'store']);
Route::get('country/{id}', [CountryController::class, 'getById']);

Route::get('/departaments', [DepartamentController::class, 'index']);
Route::post('/departament/store', [DepartamentController::class, 'store']);
Route::get('/departament/{id}', [DepartamentController::class, 'getById']);