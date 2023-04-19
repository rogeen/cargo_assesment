<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

Route::get('report/order-based-on-city', [ReportController::class, 'totalOrderBasedOnCity']);
Route::get('report/order-based-on-specific-city', [ReportController::class, 'totalOrderBasedOnSpecificCity']);

Route::get('/', function () {
    return view('welcome');


});
