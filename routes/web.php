<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.dashboard');
});

Route::group(['prefix' => 'employee'], function() {
    Route::get('/' , [EmployeeController::class, 'index']);
    Route::get('/edit' , [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/create' , [EmployeeController::class, 'store'])->name('employee.add');
    Route::post('/update' , [EmployeeController::class, 'update'])->name('employee.update');
});
Route::get('dashboard' , [DashboardController::class, 'index']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
