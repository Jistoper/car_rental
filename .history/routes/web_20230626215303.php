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
    Route::get('/car-create', 'create')->name('create'); // car create (view form)
    Route::post('/car-create-store', 'storeCar')->name('store'); // car store (store data to database)
    Route::get('/car-edit-', 'editView')->name('edit'); // car edit (view form)
    Route::post('/car-edit-store', 'storeEdit')->name('storeEdit'); // car store edit (store changes to database)
    Route::delete('/car-delete-', 'delete')->name('delete'); // car delete (delete car data)
    
    Route::get('/rent', 'getListCar')->name('getListCar'); // rental index
    Route::get('/rent-car-', 'rentView')->name('rentView'); // rent create (view form)
    Route::post('/rent-car-store', 'rentStore')->name('rentStore'); // rent store create (store data to database)

    Route::get('/maintenance-registry', 'getCarMtn')->name('getCarMtn'); // maintenance index
    Route::get('/maintenance-history', 'getListMtn')->name('getListMtn'); // maintenance index
    Route::get('/maintenance-add-', 'createMtn')->name('createMtn'); // maintenance create (view form)
    Route::post('/maintenance-add-store', 'storeMtn')->name('storeMtn'); // maintenance store create (store data to database)
    Route::get('/maintenance-edit', 'mtnEditView')->name('mtnEdit'); // maintenance edit (view form)
    Route::post('/maintenance-edit-store', 'mtnEditStore')->name('mtnStoreEdit'); // maintenance store edit (store changes to database)
});
