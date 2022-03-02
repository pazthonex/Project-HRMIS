<?php

use Illuminate\Http\Request;
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
    Route::get('/edit' , [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/create' , [EmployeeController::class, 'store'])->name('employee.add');
    Route::post('/update' , [EmployeeController::class, 'update'])->name('employee.update');
    Route::post('/delete' , [EmployeeController::class, 'destroy'])->name('employee.delete');
});



