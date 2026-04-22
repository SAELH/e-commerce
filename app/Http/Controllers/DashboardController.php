<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function get_brands(){

        $brands = Brand::all();
        return view('dashboard.brand',compact('brands'));
    }

    public function get_cars(){
        
        $cars=DB::table('cars')->join('brands','cars.brand_id','=','brands.id')->select('cars.*','brands.name')->get();
        $brands =DB::table('brands')->get();
        return view('dashboard.cars',compact('cars','brands'));
    }

    public function add_brand(Request  $request){
    
        $rule=[
        'name' => 'required',
        'type' => 'required',
        'description' => 'required',
        'icons'=> 'required',
       ];


       $message=[
        'name.required'=>'يرجى ادخال اسم العلامة التجارية',
        'type.required'=>'يرجى ادخال نوع العلامة التجارية',
        'description.required'=>'يرجى ادخال وصف العلامة التجارية',
        'icons.required'=>'يرجى ادخال الايقونه'
       ];

        $request->validate($rule,$message);

        Brand::create([
            'name'=> $request->name,
            'type'=> $request->type,
            'description'=> $request->description,
            'icons'=> $request->icons
        ]);

        return back();
    }

    public function add_car(Request  $request){
        
        $rule=[
        'model_name' => 'required',
        'year' => 'required',
        'color' => 'required',
        'price' => 'required',
        'mileage' => 'required',
        ];

        $message=[
            'model_name.required'=>'يرجى ادخال اسم الموديل',
            'year.required'=>'يرجى ادخال سنة الصنع',
            'color.required'=>'يرجى ادخال لون السيارة',
            'price.required'=>'يرجى ادخال سعر السيارة',
            'mileage.required'=>'يرجى ادخال عدد الكيلومترات المقطوعة'
        ];

        $image_name=null;

        if($request->hasFile('image')){
            $image= $request->file('image');
            $image_name = time().'_'.uniqid().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $image_name);
        }

        $request->validate($rule, $message);

        Car::create([
            'brand_id' => $request->brand_id,
            'model_name'=> $request->model_name,
            'year'=> $request->year,
            'color'=> $request->color,
            'price'=> $request->price,
            'mileage'=> $request->mileage,
            'image'=> $image_name
        ]);

        return back();
    }

    public function delete_brand($id){

        $brand = Brand::find($id);
        $brand->delete();
        return back();
    }
    public function delete_car($id){

        $car = Car::find($id);
        $car->delete();
        return back();
    }

    public function edit_brand($id){

        $brand = Brand::find($id); // serch for the brand by id
        return view('dashboard.edit_brands', compact('brand'));
    }

    public function edit_car($id){
        $car=Car::find($id);
        return view('dashboard.edit_cars',compact('car'));
    }

    public function update_brand(Request $request, $id){
        $brand = Brand::find($id);
        $brand->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'icons' => $request->icons,
        ]);
        return redirect()->route('dashboard.brand');
    }

    public function update_car(Request $request, $id){

        $image_Name=null;

        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_Name=time().'_'. uniqid().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'),$image_Name);
        }

        $car = Car::find($id);
        $car->update([
            'model_name' => $request->model_name,
            'year' => $request->year,
            'color' => $request->color,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'image' => $image_Name,
            'type' => $request->type,
        ]);
        return redirect()->route('dashboard.cars');
    }
}
