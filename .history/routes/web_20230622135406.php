<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carcontroller;

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

Route::get('/dashboard', function () {
    return view('backsite.dashboard');
})->name('dashboard');

Route::controller(CarController::class)->as('car.')->group(function(){
    Route::get('/car', 'getall')->name('getall');
    Route::get('/create', 'create')->name('create');
});
