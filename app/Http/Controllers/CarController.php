<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars_categories = Brand::all();
        return view('landpage',compact('cars_categories'));
    }

    public function list_car($type)
    {
      $cars_list = Car::all();
      $cars = collect($cars_list)->where('type', $type)->all();

      return view('car',compact('cars'));
    }
}
