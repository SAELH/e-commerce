<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars_categories = [
        [
            'name' => 'سيدان (Sedan)',
            'description' => 'سيارات عائلية مريحة ومناسبة للمدينة.',
            'icon' => 'bi-car-front',
            'type'=> 'sedan'
        ],
        [
            'name' => 'دفع رباعي (SUV)',
            'description' => 'سيارات قوية مخصصة للطرق الوعرة والمساحات الواسعة.',
            'icon' => 'bi-truck',
            'type'=> 'suv'
        ],
        [
            'name' => 'رياضية (Sports)',
            'description' => 'سيارات ذات أداء عالٍ وتصميم انسيابي جذاب.',
            'icon' => 'bi-speedometer',
            'type'=> 'sport'
        ]
    ];
        return view('landpage',compact('cars_categories'));
    }




    public function list_car($type)
    {
      $cars_list = [
        [
            'brand' => 'تويوتا',
            'model' => 'كامري 2024',
            'type'  => 'sedan',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => '120,000'
        ],
           [
            'brand' => 'هيونداي',
            'model' => ' 2024 النترا',
            'type'  => 'sedan',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => '120,000'
        ],
        [
            'brand' => 'هيونداي',
            'model' => 'توسان 2024',
            'type'  => 'suv',
            'image' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?q=80&w=400',
            'price' => '115,000'
        ],

        [
            'brand' => 'كيا',
            'model' => 'سبورتاج 2024',
            'type'  => 'suv',
            'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=400',
            'price' => '115,000'
        ],
        [
            'brand' => 'مرسيدس',
            'model' => 'S-Class',
            'type'  => 'sport',
            'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=400',
            'price' => '550,000'
        ]
        ];

      $cars = collect($cars_list)->where('type', $type)->all();

      return view('car',compact('cars'));
    }
}
