<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function index(){
        $respon = [
            "status" => "200",
            "message" => "Success",
            "data" => [
                "user" => "goeroeku",
                "token" => "xxxxxx"
            ]
        ];

        return $respon;
    }
}
