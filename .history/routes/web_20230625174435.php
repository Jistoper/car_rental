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
    Route::get('/car', 'getall')->name('getall'); // car index
    Route::get('/create', 'create')->name('create'); // car create (view form)
    Route::post('/create', 'storeCar')->name('store'); // car store (store data to database)
    Route::get('/edit', 'editView')->name('edit'); // car edit (view form)
    Route::post('/edit', 'storeEdit')->name('storeEdit'); // car store edit (store changes to database)
    Route::delete('/car_delete_', 'delete')->name('delete'); // car delete (delete car data)
    
    Route::get('/rent', 'getListCar')->name('getListCar'); // rental index
    Route::get('/rent_car', 'rentView')->name('rentView'); // rent create (view form)
    Route::post('/car/rent/{$car_id}', 'storeRent')->name('storeRent'); // rent store create (store data to database)

    Route::get('/maintenance', 'getListMtn')->name('getListMtn'); // maintenance index
    Route::get('/maintenance_add', 'mtnView')->name('mtnView'); // maintenance edit
    // Route::get('/rent', 'getList')->name('getList');
});
