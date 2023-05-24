<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
  public function register_store(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'name' => 'required|string|min:6|unique:users',
        'email' => 'required|string|email:rfc,dns|unique:users',
        'password' => 'required|min:8',
        'mobile' => 'required|min:10',
      ],
      [
        'name.required' => 'Please Enter User Name',
        'name.unique' => $request->name . ' User Name Already Exist',
        'email.required' => 'Please Enter Email',
        'email.unique' => 'Email Already Exist',
        'mobile.min' => 'Mobile Number should be of 10 ',
        ]
    );
    if ($validator->fails()) {
      return response()->json([
        'status' => 'success',
        'error' => 1,
        'message' => $validator->errors()->first(),

      ]);
    }
    $email = $request->email;
    $password = $request->password;
    $user = User::where(['email' => $email])->select(['id', 'email', 'password'])->first();;
    if ($user != null) {
      return response()->json(['status' => '200', 'error' => 1, 'message' => 'email already registered']);
    }

    $user =  User::create([
      'name' => $request->name,
      'email' => $request->email,
      'mobile' => $request->mobile,
      'password' => bcrypt($password),
    ]);
    $message = 'Thanks for registering with us.';
    return response()->json(['status' => '200', 'error' => 0, 'message' => 'Thanks for registering with us.', 'user' => $user]);

    // return redirect()->route('user.login')->with('success', 'User has been Registered Sucessfully  !!!.');
  }


  // category api start here

  public function store(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'name' => 'required|string|unique:manufactures',
        'status' => 'required|int|between:0,1',
      ],
      [
        'name.required' => 'Please Enter Manufacturer Name',
        'name.unique' => $request->manufacturer_name . ' Manufacturer Name Already Exist',
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

      $category = Manufacture::create([
        'name' => $request->name,
        'status' => $request->status,
      ]);
      return response()->json([
        'status' => 'success',
        'message' => 'Manufacturer created successfully',
        'manufacturer' => $category,

      ]);
    }
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'name' => 'required|string|unique:manufactures',
        'status' => 'required|int|between:0,1',
      ],
      [
        'name.required' => 'Please Enter Manufacturer Name',
        'name.unique' => $request->manufacturer_name . ' Manufacturer Name Already Available',
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
      $category = Manufacture::where('id', $id)->firstOrFail();

      $category = $category->update([
        'name' => $request->name,
        'status' => $request->status,
      ]);
      return response()->json([
        'status' => 'success',
        'message' => 'Manufacturer updated successfully',
        'manufacturer' => $category,

      ]);
    }
  }
  // category api end here

}
