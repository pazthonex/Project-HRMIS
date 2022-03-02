<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'employee'], function() {
    Route::get('/' , [EmployeeController::class, 'index']);
    Route::get('/{id}' , [EmployeeController::class, 'edit']);
    Route::post('/create' , [EmployeeController::class, 'store']);
    Route::post('/update/{id}' , [EmployeeController::class, 'update']);
    Route::delete('/delete' , [EmployeeController::class, 'destroy']);
});



