<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Session\Session;


class UserController extends Controller
{
    public function login(Request $request)
    {
    
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function user_store(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            $password = Hash::make($request->password);

            if (password_verify($request->password, $user->password)) {
                session(['login_user' => $user->name]);
                // dd('im at password match',$request->password,$user->password);
                // return response()->json(['status'=>'200','error'=>0,'message'=>'You have successfully logged in']);

                return redirect()->route('carmodels.index')->with('success', 'You have successfully logged in');
            } else {
                // dd($request->password,$user->password,password_verify($request->password, $user->password));
                // return response()->json(['status'=>'200','error'=>1,'message'=>'Please Enter Valid Password']);
                return redirect()->route('user.login')->with('error', 'Please Enter Valid Password ');

            }
        } else {
        //   return response()->json(['status'=>'200','error'=>1,'message'=>'Please Enter Valid Email Id']);
        return redirect()->route('user.login')->with('error', 'Please Enter Valid Email Id');

        }
    }
    public function logout(Request $request)
    {
        if ($request->session()->has('login_user')) {
            $request->session()->forget('login_user');
            return redirect()->route('user.login');
        }
    }

    
   
    // public function store(Request $request)
    // {
    //     $password = Hash::make($request->password);

    //     User::create([
    //         'name' => $request->name,
    //         'mobile' => $request->mobile,
    //         'email' => $request->email,
    //         'password' => $password,
    //         'status' => $request->status,
    //     ]);
    //     return redirect()->route('users.index')->with('success', 'User has been Addded Sucessfully  !!!.');
    // }
   
   
 
}
