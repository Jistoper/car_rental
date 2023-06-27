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
        ])->put('http://localhost:8080/api/cars/' . $car_id, $data);

        return redirect()->route('car.getall');
    }

    public function delete(Request $request)
    {
        $car_id = $request->input('car_id');

        $data = [
            "id" => $car_id,
        ];

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2ODkxNjgwMjMsInN1YiI6InRlc3QxMiJ9.-ezLSqJzIuUbum_p1NXeInNHkG953SP_4fMdbOgrlUo";

        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $token,
            "Content-Type" => "application/json",
        ])->delete('http://localhost:8080/api/cars', $data);

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

    public function storeRent(Request $request)
    {
        $data = [
            "user_id" => 2,
            "car_id" => $request->input('car_id'),
            "usage_region" => $request->usage_region,
            "rental_date" => $request->registration_number,
            "return_date" => $request->vin,
            "total_price" => $request->total_price,
            "is_completed" => false
        ];

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2ODkxNjgwMjMsInN1YiI6InRlc3QxMiJ9.-ezLSqJzIuUbum_p1NXeInNHkG953SP_4fMdbOgrlUo"; // Replace with your actual auth token

        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $token,
            "Content-Type" => "application/json",
        ])->put('http://localhost:8080/api/cars/' . $car_id, $data);

        return redirect()->route('car.getlist');
    }
    // End Rent Data

    // Start Maintenance Data
    public function getListMtn()
    {
        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2ODkxNjgwMjMsInN1YiI6InRlc3QxMiJ9.-ezLSqJzIuUbum_p1NXeInNHkG953SP_4fMdbOgrlUo";
        
        $response = Http::withHeaders([
            "Authorization" => "Bearer " . $token,
            "Content-Type" => "application/json",
        ])->get('http://localhost:8080/api/maintenance');

        $mtn = json_decode($response, true);

        return view('backsite.content.maintenance.mtntable', ['Mtn' => $mtn['MaintenanceHistory'], 'car' => $mtn['Car']]);
    }

    public function mtnEditView(Request $request)
    {
        $data = [
            "maintenance_id" => $request->maintenance_id,
            "last_odometer" => $request->last_odometer,
            "type" => $request->type,
            "description" => $request->description,
            "expense" => $request->expense,
        ];

        return view('backsite.content.maintenance.editmtn')->with('data', $data);
    }
    // End Maintenance Data
}
