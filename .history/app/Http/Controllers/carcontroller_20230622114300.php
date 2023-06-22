<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;


class CarController extends Controller
{
    public function getall(Request $request)
    {
        $response = Http::get('http://localhost:8080/api/cars');
        $cars = json_decode($response, true);

        return View('backsite.content.car.cartable', ['cars' => $cars]);
    }

    public function getbyid()
    {

    }

    public function create()
    {
        $data = [
            "brand" => "Toyota",
            "model" => "Avanza",
            "year" => 2022,
            "registration_number" => "AB123CD",
            "vin" => "1HGCM82633A123456",
            "engine_number" => "ENG123456789",
            "color" => "Black",
            "is_available" => true
        ];

        $token = "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2ODkxNjgwMjMsInN1YiI6InRlc3QxMiJ9.-ezLSqJzIuUbum_p1NXeInNHkG953SP_4fMdbOgrlUo"; // Replace with your actual auth token

        $response = Http::withHeaders([
            "Authorization" => $token,
            "Content-Type" => "application/json",
        ])->post('http://localhost:8080/api/cars', $data);

        // Process the response as needed

        // Redirect back or show a success message
        return redirect()->back()->with('success', 'Car data stored successfully.');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
