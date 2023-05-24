<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CarModelController extends Controller
{

    public function index()
    {
        $carmodels = CarModel::with('Manufacture')->orderBy('model_name', 'ASC')->get();

        return view('carmodels.index', compact('carmodels'));
    }

    public function create()
    {
        $categories = Manufacture::where('status', true)->orderBy('name', 'ASC')->get();
        return view('carmodels.create',compact('categories'));
    }

    public function store(Request $request)
    {
      $validator = Validator::make(
        $request->all(),
        [
          'manufacturer_name_id' => 'required',
          'model_name' => 'required|string|unique:car_models',
          'color_code' => 'required|string',
          'manufacturing_year' => 'required|int',
          'registration_number' => 'required|string',
          'image1' => 'required|image|max:2048|mimes:jpeg,png',
          'image2' => 'required|image|max:2048|mimes:jpeg,png',
          'status' => 'required|int|between:0,1',
        ],
        [
          'name.required' => 'Please Enter Model Name',
          'name.unique' => $request->model_name . ' Manufacturer Name Already Available',
          'status.required' => 'Please Enter Status',
          'int'  => 'Please Enter 1 or 0 for status'
  
          
          ]
      );
      // $response = array(['status' => '200', 'error' => 1, 'message' => '']);
      if ($validator->fails()) {
        return response()->json([
          'status' => 'success',
          'error' => 1,
          'message' => $validator->errors()->first(),
  
        ]);
      } else {
  
        if ($request->hasFile('image1')) {
          $request['img'] = Str::slug(Str::limit($request->model_name, 20), '-') . '-' . rand(0000, 9999) . '.' . pathinfo($request->image1->getClientOriginalName(), PATHINFO_EXTENSION);
          $request->image1->storeAs('public/images/car_models', $request->img);
      }

      if ($request->hasFile('image2')) {
          $request['img1'] = Str::slug(Str::limit($request->model_name, 20), '-') . '-' . rand(0000, 9999) . '.' . pathinfo($request->image2->getClientOriginalName(), PATHINFO_EXTENSION);
          $request->image2->storeAs('public/images/car_models', $request->img1);
      }

        $car_model = CarModel::create([
          'manufacturer_name_id' => $request->manufacturer_name_id,
          'model_name' => $request->model_name,
          'color_code' => $request->color_code,
          'manufacturing_year' => $request->manufacturing_year,
          'registration_number' => $request->registration_number,
          'image1' =>  $request->img,
          'image2' => $request->img1,
          'status' => $request->status,


        ]);
        return response()->json([
          'status' => 'success',
          'message' => 'Car Model Created Successfully',
          'Car Model' => $car_model,
  
        ]);
      }
    }
    public function edit(Request $request,$id)
    {
      $carmodels = CarModel::with('Manufacture')->where('id',$request->id)->orderBy('model_name', 'ASC')->firstOrFail();
      $categories = Manufacture::where('status', true)->orderBy('name', 'ASC')->get();

      return view('carmodels.edit', compact('carmodels','categories'));
    }
    public function update(Request $request)
    {
      $validator = Validator::make(
        $request->all(),
        [
          'manufacturer_name_id' => 'required',
          'model_name' => 'required|string|unique:car_models',
          'color_code' => 'required|string',
          'manufacturing_year' => 'required|int',
          'registration_number' => 'required|string',
          'image1' => 'required|image|max:2048|mimes:jpeg,png',
          'image2' => 'required|image|max:2048|mimes:jpeg,png',
          'status' => 'required|int|between:0,1',
        ],
        [
          'name.required' => 'Please Enter Model Name',
          'name.unique' => $request->model_name . ' Manufacturer Name Already Exist',
          'status.required' => 'Please Enter Status',
          'int'  => 'Please Enter 1 or 0 for status'
  
          
          ]
      );
      // $response = array(['status' => '200', 'error' => 1, 'message' => '']);
      if ($validator->fails()) {
        return response()->json([
          'status' => 'success',
          'error' => 1,
          'message' => $validator->errors()->first(),
  
        ]);
      } else {
  
        if ($request->hasFile('image1')) {
          $request['img'] = Str::slug(Str::limit($request->model_name, 20), '-') . '-' . rand(0000, 9999) . '.' . pathinfo($request->image1->getClientOriginalName(), PATHINFO_EXTENSION);
          $request->image1->storeAs('public/images/car_models', $request->img);
      }

      if ($request->hasFile('image2')) {
          $request['img1'] = Str::slug(Str::limit($request->model_name, 20), '-') . '-' . rand(0000, 9999) . '.' . pathinfo($request->image2->getClientOriginalName(), PATHINFO_EXTENSION);
          $request->image2->storeAs('public/images/car_models', $request->img1);
      }
      $carmodel=CarModel::where('id',$request->id)->first();
        $car_model = $carmodel->update([
          'manufacturer_name_id' => $request->manufacturer_name_id,
          'model_name' => $request->model_name,
          'color_code' => $request->color_code,
          'manufacturing_year' => $request->manufacturing_year,
          'registration_number' => $request->registration_number,
          'image1' =>  $request->img,
          'image2' => $request->img1,
          'status' => $request->status,


        ]);
        return response()->json([
          'status' => 'success',
          'message' => 'Car Model Updated Successfully',
          'Car Model' => $car_model,
  
        ]);
      }
    }
    public function delete(Request $request)
    {
        // dd('i m here',$request);
        $user = CarModel::where('id', $request->carmodel_id)->firstOrFail();
        $user->delete();
        return redirect()->route('carmodels.index')->with('success', 'Car Model has been Sold Out  !!!.');
    }
}
