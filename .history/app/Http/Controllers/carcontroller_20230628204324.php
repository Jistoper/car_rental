<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;


class CarController extends Controller
{
    // Start Car Data---------------------------------------------------------------------------------------
    public function getall()
    {
        $response = Http::get('http://localhost:8080/api/cars');
        $cars = json_decode($response, true);

        return view('backsite.content.car.cartable', ['Cars' => $cars['Cars']]);
    }

    public function create()
    {
        return view('backsite.content.car.createcar');
    }

    public function storeCar(Request $request)
    {
        $data = [
            "brand" => $request->brand,
            "model" => $request->model,
            "type" => $request->type,
            "capacity" => $request->capacity,
            "year" => intval($request->year),
            "registration_number" => $request->registration_number,
            "vin" => $request->vin,
            "engine_number" => $request->engine_number,
            "color" => $request->color,
            "is_available" => true
        ];

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2ODkxNjgwMjMsInN1YiI6InRlc3QxMiJ9.-ezLSqJzIuUbum_p1NXeInNHkG953SP_4fMdbOgrlUo"; // Replace with your actual auth token

        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $token,
            "Content-Type" => "application/json",
        ])->post('http://localhost:8080/api/cars', $data);

        return redirect()->route('car.getall');
    }

    public function editView(Request $request)
    {
        $data = [
            "car_id" => $request->car_id,
            "brand" => $request->brand,
            "model" => $request->model,
            "type" => $request->type,
            "capacity" => $request->capacity,
            "year" => $request->year,
            "registration_number" => $request->registration_number,
            "vin" => $request->vin,
            "engine_number" => $request->engine_number,
            "color" => $request->color,
        ];

        return view('backsite.content.car.editcar')->with('data', $data);
    }

    public function storeEdit(Request $request)
    {
        $car_id = $request->input('car_id');

        $data = [
            "brand" => $request->brand,
            "model" => $request->model,
            "type" => $request->type,
            "capacity" => $request->capacity,
            "year" => intVal($request->year),
            "registration_number" => $request->registration_number,
            "vin" => $request->vin,
            "engine_number" => $request->engine_number,
            "color" => $request->color,
            "is_available" => true
        ];

        $response = Http::put('http://localhost:8080/api/cars/' . $car_id, $data);

        return redirect()->route('car.getall');
    }

    public function delete(Request $request)
    {
        $car_id = $request->input('car_id');

        $data = [
            "id" => $car_id,
        ];

        $response = Http::delete('http://localhost:8080/api/cars', $data);

        return redirect()->back()->with('success', 'Car data deleted successfully.');
    }
    // End Car Data

    // Start Rent Data----------------------------------------------------------------------------------
    public function getListCar()
    {
        $response = Http::get('http://localhost:8080/api/cars');
        $cars = json_decode($response, true);

        return view('backsite.content.rent.renttable', ['Cars' => $cars['Cars']]);
    }

    public function rentView(Request $request)
    {
        $data = [
            "car_id" => $request->car_id,
            "brand" => $request->brand,
            "model" => $request->model,
            "registration_number" => $request->registration_number,
            "color" => $request->color,
        ];

        return view('backsite.content.rent.createrent')->with('data', $data);
    }

    public function rentStore(Request $request)
    {
        $data = [
            "user_id" => 2,
            "car_id" => intVal($request->input('car_id')),
            "usage_region" => $request->usage_region,
            "rental_date" => $request->rent_date,
            "return_date" => $request->return_date,
            "total_price" => intVal($request->total_price),
            "nik" => $request->nik,
            "name" => $request->name,
        ];

        $response = Http::post('http://localhost:8080/api/rentals', $data);

        return redirect()->route('car.getListCar');
    }

    public function getListRent()
    {
        $response = Http::get('http://localhost:8080/api/rentals');

        $rent = json_decode($response->getBody(), true);
        $rentalHistory = $rent['Rental'];
        $carData = [];

        foreach ($rentalHistory as $rental) {
            $car = $rental['Car'];
            $carData[$car['car_id']] = $car;
        }

        return view('backsite.content.rent.historyrent', [
            'Rent' => $rentalHistory,
            'Car' => $carData,
        ]);
    }
    
    public function rentEditView(Request $request)
    {
        $data = [
            "rental_id" => $request->rental_id,
            "user_id" => $request->user_id,
            "car_id" => $request->car_id,
            "usage_region" => $request->usage_region,
            "rental_date" => $request->rental_date,
            "return_date" => $request->return_date,
            "total_price" => $request->total_price,
            "is_completed" => $request->is_completed,
            "brand" => $request->brand,
            "model" => $request->model,
            "registration_number" => $request->registration_number,
            "color" => $request->color,
        ];

        return view('backsite.content.rent.createrent')->with('data', $data);
    }
    
    // End Rent Data

    // Start Maintenance Data
    public function getCarMtn()
    {
        $response = Http::get('http://localhost:8080/api/cars');
        $cars = json_decode($response, true);

        return view('backsite.content.maintenance.tablemtn', ['Cars' => $cars['Cars']]);
    }

    public function getListMtn()
    {
        $response = Http::get('http://localhost:8080/api/maintenance');

        $mtn = json_decode($response->getBody(), true);
        $maintenanceHistory = $mtn['MaintenanceHistory'];
        $carData = [];

        foreach ($maintenanceHistory as $maintenance) {
            $car = $maintenance['Car'];
            $carData[$car['car_id']] = $car;
        }

        return view('backsite.content.maintenance.historymtn', [
            'Mtn' => $maintenanceHistory,
            'Car' => $carData,
        ]);
    }

    public function createMtn(Request $request)
    {
        $data = [
            "car_id" => $request->car_id,
            "brand" => $request->brand,
            "model" => $request->model,
            "registration_number" => $request->registration_number,
        ];
        return view('backsite.content.maintenance.createmtn', ['data' => $data]);
    }

    public function storeMtn(Request $request)
    {
        $data = [
            "car_id" => $request->car_id,
            "last_odometer" => $request->last_odometer,
            "type" => $request->type,
            "car_id" => $request->description,
            "expense" => intVal($request->expense),
        ];

        $response = Http::post('http://localhost:8080/api/maintenance', $data);

        return redirect()->route('car.getCarMtn');
    }

    public function mtnEditView(Request $request)
    {
        $data = [
            "maintenance_id" => $request->maintenance_id,
            "car_id" => $request->car_id,
            "last_odometer" => $request->last_odometer,
            "type" => $request->type,
            "description" => $request->description,
            "expense" => $request->expense,
        ];

        return view('backsite.content.maintenance.editmtn')->with('data', $data);
    }
    // End Maintenance Data
}
