<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authLogin (Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $data = [
            "username" => $request->username,
            "password" => $request->password
        ];

        $response = Http::post('http://localhost:8080/api/users/login', $data);

        if ($response->is(200))
        {
            $token = json_decode($response, true);

            // Store the token in a cookie
            $cookieName = 'api_token';
            $cookie = Cookie::make($cookieName, $token, 60); // Expires in 60 minutes

            // Make an API request with the token as a header to validate it
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://api.example.com/validate');

            // Check the response status code
            if ($response->successful()) {
                // Login successful
                return response('Login successful.')->withCookie($cookie);
            } else {
                // Login failed
                return response('Login failed.', $response->status());
            }
        }
        else
        {
            return View('login')->with();
        }
    }
}
