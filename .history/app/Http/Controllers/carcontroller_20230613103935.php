<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;


class CarController extends Controller
{
    public function getall(Request $request)
    {
        // Route::get('/api/cars', function () {
        //     $response = file_get_contents('http://localhost:8080/api/cars');
        //     $data = json_decode($response, true);
        //     return View::make('cars.index', ['cars' => $data['cars']]);
        // });
        // Route::get('/api/cars/{id}', function ($id) {
        //     $url = 'http://localhost:8080/api/cars/' . $id;
        //     $response = file_get_contents($url);
        //     $data = json_decode($response, true);
        //     return View::make('cars.show', ['car' => $data['cars']]);
        // });

      #  $response = Http::withHeaders([
     #       "Authorization" => $token,
        #    "Content-Type" => "application/json",
       # ])->get('http://localhost:8080/api/cars');

        $response = Http::get('http://localhost:8080/api/cars');
        $cars = json_decode($response, true);
        return View::make('backsite.content.cartable', ['cars' => $cars['cars']]);
        #return view('backsite.content.cartable', ['cars' => $cars ?? []]);
        // return View::make('backsite.content.table', ['cars' => $data['cars']]);
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
