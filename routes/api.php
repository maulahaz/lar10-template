<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;

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


Route::resource('clients', ClientController::class);

//--API/Auth
//-----------------------------------------------------------------------------------
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('karyawan', AuthController::class);
});

//--API/Employee
//-----------------------------------------------------------------------------------
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('employees', EmployeeController::class);
});

//--API/Karyawan
//-----------------------------------------------------------------------------------
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('karyawan', KaryawanController::class);
});
