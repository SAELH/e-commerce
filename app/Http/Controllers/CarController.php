<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index(){ 
        $cars_categories = Brand::all();
        return view('landpage',compact('cars_categories'));
    }

    public function list_car($type){
      //$cars=DB::table('cars')->join('brands','cars.brand_id','=','brands.id')->select('cars.*','brands.name')->get();
      $cars_list = Car::all();
      $cars = collect($cars_list)->where('type', $type)->all();
      return view('car',compact('cars'));
    }
}
