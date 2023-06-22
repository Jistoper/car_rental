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
    Route::post('/create', 'storeCar')->name('store');
    Route::get('/edit/{$car_id}', 'edit')->name('edit');
    Route::post('/edit/{$car_id}', 'storeEdit')->name('storeEdit');
    Route::delete('/delete/{$car_id}', 'delete')->name('delete');
});
