<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;


class CarController extends Controller
{
    public function getall()
    {
        $response = Http::get('http://localhost:8080/api/cars');
        $cars = json_decode($response, true);

        return view('backsite.content.car.cartable', ['Cars' => $cars['Cars']]);
    }

    public function getbyid()
    {

    }

    public function create()
    {
        return View('backsite.content.car.createcar');
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

        return redirect()->back()->with('success', 'Car data stored successfully.');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete(Request $request)
    {
        // $data = [
        //     "id" => $request
        // ];
        dd($request);

        // $response = Http::delete('http://localhost:8080/api/cars', $data);

        return redirect()->back()->with('success', 'Car data deleted successfully.');
    }
}