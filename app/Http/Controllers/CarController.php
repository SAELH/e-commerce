<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view("landpage");
    }

    public function list_car(){
        return view("car");
    }
}
