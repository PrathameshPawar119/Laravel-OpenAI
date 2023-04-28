<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetchApiData(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            "headers" => [
                "Content-Type" => "application/json",
                "Authorization" => "Bearer ". env('OPENAI_API_KEY')
            ],
            "json" => [
                "model"=> "gpt-3.5-turbo",
                "messages"=> [
                    [
                        "role"=> "user",
                        "content" => "Detail about Indian Festival ". $request->festival
                    ]
                ]
            ]
        ]);

        $result = json_decode($response->getBody());
        echo json_encode($result, JSON_PRETTY_PRINT);
    }


    public function fetchApiImage(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/images/generations', [
            "headers" => [
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . env('OPENAI_API_KEY')
            ],
            "json" => [
                "prompt" => "Indian Festival " . $request->festival,
                "n"=> 4,
                "size"=> "1024x1024"
            ]
        ]);

        $result = json_decode($response->getBody());
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}
