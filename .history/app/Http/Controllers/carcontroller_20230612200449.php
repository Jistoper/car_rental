<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class carcontroller extends Controller
{
    public function store() {
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

        $response = Http::post('http://localhost:8080/api/cars', $data);
    }
}
