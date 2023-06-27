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
    Route::get('/edit', 'editView')->name('edit');
    Route::post('/edit', 'storeEdit')->name('storeEdit');
    Route::delete('/car_delete_', 'delete')->name('delete');
    
    Route::get('/rent', 'getListCar')->name('getListCar');
    Route::get('/rent_car', 'rentView')->name('rentView');
    Route::post('/car/rent/{$car_id}', 'storeRent')->name('storeRent');

    Route::get('/maintenance', 'getListMtn')->name('getListMtn');
    Route::get('/rent', 'mtnView')->name('mtnView');
    // Route::get('/rent', 'getList')->name('getList');
});
